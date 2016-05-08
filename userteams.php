<?php
session_start(); 

if ( isset( $_POST['team1'] ) &&  isset($_SESSION['username']) &&  isset($_POST['submitmyTeam'])){
   require_once('clientDB.php.inc');
   $login = new clientDB ("connect.ini");
   $team = $_POST['team1']; // trying to clean my session variables;
   $user1 = $_SESSION['username']; // doing the same as the line above
  $response = $login->addteam($team,$user1);
}
///-------------------------------------------------------------///
if ( isset( $_POST['league'] ) &&  isset($_SESSION['username']) && isset($_POST['submitmyLeague'])){
   require_once('clientDB.php.inc');
   $login = new clientDB ("connect.ini");
   $league = $_POST['league'];
   $user2 = $_SESSION['username'];
  $response2 = $login->addLeague($league,$user2);
}
//----------------------------------------------------------------////
if ( isset( $_SESSION['username'] ) ){
  
  
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
}
 
?>