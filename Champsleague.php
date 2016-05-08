<?php
session_start(); 

if ( isset( $_SESSION['username'] ) ){
  
  
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
  $response = $login->teams(); //this portion and the code below works fine but we need to make a nav bar for the list of teams in a league
 //$response2 = $login->leagues();

 }
 
 /// below the php is prototype material
?>

