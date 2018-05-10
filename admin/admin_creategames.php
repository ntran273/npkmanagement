<?php
/*Displayer user information*/
session_start();

//Check if user is logged in using the session variable
if($_SESSION['logged_in'] != 1){
  $_SESSION['message'] = "You must log in to see your profile page!";
  header("location: ../error.php");
}
else{
  $first_name = $_SESSION['first_name'];
  $last_name = $_SESSION['last_name'];
  $email = $_SESSION['email'];
  $type = $_SESSION['type'];

}

if($type != '2'){
    session_destroy();
    header("location: ../index.php");
 }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Schedule & Games</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <?php include '../partials/navbaradmin.php'; ?>

      <!-- ========================================================================== -->
<!-- ============================CREATE GAMES=================================== -->
<!-- ==================================================================================== -->

<?php
require_once( '../db.php' );
// Connect to database
/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DATA_BASE_HOST, USER_NAME, USER_PASSWORD, DATA_BASE_NAME);
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//GET TEAM
$query3 = "SELECT TeamID, TeamName
FROM TEAM;";
if ($stmt3 = $mysqli->prepare($query3)) {
  $stmt3->execute();
  $stmt3->store_result();
  $stmt3->bind_result(
    $ti2,
    $teamNAME2
  );
}

?>
<section>
        <div class="container">
          <form method="post" action="admin_processGame.php">
            <h1 class="mb-3 text-center">Schedule Games</h1>
            <div class="form-group">
              <label>Start Date</label>
              <input type="date" class="form-control" name="StartDate" class="form-control" value="" placeholder="mm/dd/yyyy" required> </div>
            <div class="form-group">
              <label>Time Schedule</label>
              <input type="time" class="form-control" name="TimeSchedule" required placeholder="Type here"> </div>
            <div class="form-group">
              <label>Home Team</label>
              <select name="team_id2" required>
                    <option value="" selected disabled hidden>Choose Team</option>
                  <?php
                    $stmt3->data_seek(0);
                    //testing
                    $rowgroupcheck = array();
                    while( $stmt3->fetch() )
                    {
                      echo '<option '.$ti2.' value="'.$ti2.'">'.$teamNAME2.'</option>';
                    }
                  ?>
              </select>
              <label>Away Team</label>
              <select name="team_id3" required>
                    <option value="" selected disabled hidden>Choose Team</option>
                  <?php
                    $stmt3->data_seek(0);
                    while( $stmt3->fetch() )
                    {
                      echo '<option '.$ti2.' value="'.$ti2.'">'.$teamNAME2.'</option>';
                    }
                    $stmt3->free_result();
                    $mysqli->close();
                  ?>
              </select>

              <script type="text/javascript">
              $('select').on('change', function() {
                $('option').prop('disabled', false); //reset all the disable options on everychange event
                  $('select').each(function() { //loop through all the select elements
                    var val = this.value;
                  $('select').not(this).find('option').filter(function() { //filter option that is already selected
                    return this.value === val;
                  }).prop('disabled', true); //disable those option elements
                });
              }).change(); //trihgger change handler initially!
              </script>

          </div>


            <button type="submit" class="btn mt-4 btn-block btn-info ">ADD GAMES
              <b></b>
            </button>
          </form>

          <br>

          <!-- ========================================================================== -->
    <!-- ============================VIEW GAMES=================================== -->
    <!-- ==================================================================================== -->
          <?php include '../features/viewgames.php'; ?>


        </div>
    </section>
  </body>
</html>
