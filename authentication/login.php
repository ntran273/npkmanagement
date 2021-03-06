<?php

  require_once(__DIR__.'/../db.php');
  $mysqli = new mysqli(DATA_BASE_HOST, USER_NAME, USER_PASSWORD, DATA_BASE_NAME);

  $email = trim(preg_replace("/\t|\R/",' ', $_POST['email']));
  $result = $mysqli->query("SELECT * FROM ACCOUNT WHERE email='$email'" );

  if ($result->num_rows == 0) {
    $_SESSION['message'] = 'User with this email does not exist!';
    header("location: error.php");

  }else{
    $user = $result->fetch_assoc();

    //verify password hash
    if(password_verify($_POST['password'], $user['password'])){
      $_SESSION['email'] = $user['email'];
      $_SESSION['first_name'] = $user['first_name'];
      $_SESSION['last_name'] = $user['last_name'];
      $_SESSION['type'] = $user['type'];

      $_SESSION['logged_in'] = true;

      if($_SESSION['type'] == '0'){
        header("location: observer/index.php");
      }else if ($_SESSION['type'] == '1'){
        header("location: director/index.php");
      }else{
        header("location: admin/index.php");
      }

    }
    else{
      $_SESSION['message'] = "You have entered wrong password, try again!";
      header("location: error.php");
    }

  }
?>
