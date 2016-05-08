<?php
session_start(); 

if ( isset( $_SESSION['username'] ) ){
  
  
  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
  $user = $_SESSION['username'];
  $response2 = $login->bookMarks($user);

 }
 
 /// below the php is prototype material
?>
