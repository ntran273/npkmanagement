<?php
session_start();
/*Displayer user information*/
//Check if user is logged in using the session variable
if($_SESSION['logged_in'] != 1){
  $_SESSION['message'] = "You must log in to see your profile page!";
  header("location: error.php");
}
else{
  $email = $_SESSION['email'];
  $type = $_SESSION['type'];

}

if($type != '2'){
    session_destroy();
    header("location: ../index.php");
 }

?>

<head>
  <meta charset="utf-8">
  <title>Teams In League</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <?php include '../partials/navbaradmin.php'; ?>

  <section id="body">
      <div class="container">

        <form action="admin_processTeam.php" align="center" method="post">
          <div class="form-group">
            <h1>Create Team</h1>

            <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
              <input type="text" name="teamName" required placeholder="Team Name">
              <?php if (isset($name_error)): ?>
                <span><?php echo $name_error; ?></span>
              <?php endif ?>
            </div>
        </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Create">
              <input type="reset" class="btn btn-default" value="Reset">
          </div>

        </form>

        <!-- Call View Team -->
        <?php include '../features/viewteams.php'; ?>


      </body>

      </div>
  </section>
</body>
