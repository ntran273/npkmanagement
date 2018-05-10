<?php

    require_once(__DIR__.'/../db.php');

    $selectOption = (string) $_POST['teamname'];

    // $test = 'UCLA';
    $query = "SELECT Player.PlayerId, Player.Name_First, Player.Name_Last, Player.Street, Player.City, Player.State, Player.Country, Player.ZipCode, Team.TeamName
    FROM PLAYER INNER JOIN TEAM ON
    PLAYER.PlayerTeamId = Team.TeamId AND team.TeamName = '$selectOption'
    ORDER BY Player.PlayerId;";

    $mysqli = new mysqli(DATA_BASE_HOST, USER_NAME, USER_PASSWORD, DATA_BASE_NAME);
    // Check connection
    if($mysqli === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    if ($stmt = $mysqli->prepare($query)) {
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result(
        $PlayerId,
        $Name_First,
        $Name_Last,
        $Street,
        $City,
        $State,
        $Country,
        $Zipcode,
        $TeamN
      );
    }

    if(!isset($_SESSION))
       {
           session_start();
       }
    /*Displayer user information*/
    //Check if user is logged in using the session variable
    if($_SESSION['logged_in'] != 1){
      $_SESSION['message'] = "You must log in to see this page!";
      header("location: error.php");
    }
    else{
      $first_name = $_SESSION['first_name'];
      $last_name = $_SESSION['last_name'];
      $email = $_SESSION['email'];
      $type = $_SESSION['type'];

    }

    if($type == '0'){
        session_destroy();
        header("location: ../index.php");
     }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Players</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body>
<?php include 'viewplayers.php';?>

<table class="table table-bordered table-hover">
  <thead class="thead-dark">
    <tr class="info">
      <th scope="col">PLAYERID</th>
      <th scope="col">FIRST NAME</th>
      <th scope="col">LAST NAME</th>
      <th scope="col">STREET</th>
      <th scope="col">CITY</th>
      <th scope="col">STATE</th>
      <th scope="col">COUNTRY</th>
      <th scope="col">ZIPCODE</th>
      <th scope="col">TEAM</th>


    </tr>
  </thead>
  <?php
    $stmt->data_seek(0);
    while($stmt->fetch()){
      echo "<tr>\n";
      echo "<th scope=\"row\">".$PlayerId."</th>\n";
      echo "<td>".$Name_First."</td>\n";
      echo "<td>".$Name_Last."</td>\n";
      echo "<td>".$Street."</td>\n";
      echo "<td>".$City."</td>\n";
      echo "<td>".$State."</td>\n";
      echo "<td>".$Country."</td>\n";
      echo "<td>".$Zipcode."</td>\n";
      echo "<td>".$TeamN."</td>\n";

      echo "</tr>";
    }
    $stmt->free_result();

  ?>

</table>
</div>


</body>


</html>
