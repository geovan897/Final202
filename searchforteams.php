<?php 
session_start();
if ( isset( $_SESSION['username'] ) ){
  
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
}
if (isset ($_POST['teamS'])){
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
   $team = $_POST['teamS'];
  $ohmyrage = $login->searchTeams($team);
}
?>


