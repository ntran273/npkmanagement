<?php
$ID       = (int) $_POST['user_id'];
$type       = (int) $_POST['type'];

if( ! empty($ID ))
{
  require_once( '../db.php' );
  $mysqli = new mysqli(DATA_BASE_HOST, USER_NAME, USER_PASSWORD, DATA_BASE_NAME);
  // Check connection
  if($mysqli === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  $query ="UPDATE ACCOUNT
         SET ACCOUNT.TYPE = ?
         WHERE
         ACCOUNT.USER_ID  = '$ID'
          ";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('d', $type);
    $stmt->execute();
    require('admin_promote.php');

}
?>
