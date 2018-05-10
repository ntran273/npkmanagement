
<?php


$path = dirname($_SERVER['PHP_SELF']);
$position = strrpos($path,'/') + 1;
//If parent directory is admin
if(substr($path,$position) == "admin"){
  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">MENU</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="admin_page.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_promote.php">Promote</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_creategames.php">Schedule</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_createStats.php">Stats</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../viewplayers.php">Players</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_createteams.php">Teams</a>
      </li>
      <li id="logout"class="nav-item active">
        <a class="nav-link" href="../logout.php">SIGN OUT</a>
      </li>
    </ul>
  </div>
    </nav>';
}else{
  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">MENU</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="admin/admin_page.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin/admin_promote.php">Promote</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin/admin_creategames.php">Schedule</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin/admin_createStats.php">Stats</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewplayers.php">Players</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin/admin_createteams.php">Teams</a>
      </li>
      <li id="logout"class="nav-item active">
        <a class="nav-link" href="logout.php">SIGN OUT</a>
      </li>
    </ul>
  </div>
    </nav>
';
}

?>
