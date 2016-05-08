<?php 
session_start();
if ( isset( $_SESSION['username'] ) ){
  $x =  "<p class='welcome'>Welcome, <a class='removealine' href='logout.php' title=''>".$_SESSION['username']."</a></p>";
  
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
}
if (isset ($_POST['searchmyleague'])){
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
   $league = $_POST['searchmyleague'];
  $result = $login->searchLeague($league);

  
 
}

?>