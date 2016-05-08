<?php
require_once('clientDB.php.inc');
session_start(); //oirginal portion before changes



//echo ' Welcome '.$_SESSION['username']; // this is the original portion before changes </p>";

//$user = $_SESSION['username'];



 if ( isset( $_SESSION['username'] ) ){
  $x =  "<p class='welcome'>Welcome, <a class='removealine' href='logout.php' title=''>".$_SESSION['username']."</a></p>";

  require_once('clientDB.php.inc');
  $login = new clientDB("connect.ini");
 }
 /// below the php is prototype material
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Flight Lookup</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#myTab li:eq(1) a").tab('show');
});
</script>
<style type="text/css">
	.bs-example{
		margin: 20px;
	}
 .sansserif {
    font-family: "Comic Sans MS", cursive, sans-serif;
}
th {

font-family: "Comic Sans MS", cursive, sans-serif; }

tbody {
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif; }
</style>
</head>
<body>
<div class="bs-example">
    <ul class="nav nav-tabs" id="myTab">
	<a href="logout.php" class="btn btn-success btn pull-right"><span ></span> Logout</a>
	<h4 class="pull-right"><?php echo "Welcome  ".$_SESSION['username'];?></h4>	
        <li><a data-toggle="tab" class="active" href="#sectionA">Champions League Info</a></li>
        <li><a data-toggle="tab" href="#sectionB">Search Leagues</a></li>
        <li><a data-toggle="tab" href="#sectionC">Search Teams</a></li>
        <li><a data-toggle="tab" href="#sectionD">Add Team/League</a></li>
        <li><a data-toggle="tab" href="#sectionE">BookMarks</a></li>
    </ul>
    <div class="tab-content">

        <div id="sectionA" class="tab-pane active ">
	    <h3 class="sansserif"><center>Champions League Info</center></h3>
			<div class="container">
			    <table class="table table-striped" class="table">
			      <thead  class="thead-default">
			        <tr>
							          <th>Team Name</th>

							          <th>Country</th>

							          <th>Top Scorer</th>

							          <th>Number of Titles</th>
			        </tr>
			      </thead>
			         <tbody>
									 <?php
									   mysql_connect("localhost", "root", "r3fl3ct89") or die(mysql_error());

									    mysql_select_db("202web") or die(mysql_error());

									   $result = mysql_query("SELECT * FROM teams order by NumberofTitles DESC") or die(mysql_error());

									   while ($row = mysql_fetch_array($result)){

									   echo "<tr>";
									   echo "<td>".$row['TeamName']."</td>";
									   echo "<td>".$row['Country']."</td>";
									   echo "<td>".$row['TopScorer']."</td>";
									   echo "<td>".$row['NumberofTitles']."</td>";
									   echo "</tr>";
									   }



									?>

			      </tbody>

			      <tbody></tbody>
			    </table>
			  </div><!-- /container -->
        </div>
        <div id="sectionB" class="tab-pane">
        		    <h3 class="sansserif"><center>Search Leagues</center></h3>
			<div class="container">
			<form action="" method="post">  
		      <select name='searchmyleague' >
		      <option value = "La Liga">La Liga</option>
		      <option value = "Bundesliga">Bundesliga</option>
		      <option value = "Premier League">Barclays Premier League</option>
		      <option value = "Serie A">Calcio Serie A</option>
		      <option value = "Ligue 1">France Ligue 1</option>
		      <option value = "Primeira Liga">Primeira Liga</option>
		      <option value = "Eredevisie">Netherlands Eredevisie</option>
		      
		      </select>
		      <input type="submit"  value ="search" name="submit1"/>
		     
		  </form>	
			
			    <table class="table table-striped" class="table">
			      <thead  class="thead-default">
			        <tr>
			          <th>League</th>

			          <th>League Rating</th>

			          <th>Country</th>

			          <th>Top Team</th>

			        </tr>
			      </thead>
			         <tbody>
					 <?php
					 
					   mysql_connect("localhost", "root", "r3fl3ct89") or die(mysql_error());
			           
					    mysql_select_db("202web") or die(mysql_error());
					    
					   if (isset ($_POST['searchmyleague'])){
					   
					      $league = $_POST['searchmyleague'];
  
 

					   
					   $result = mysql_query("select * from LeagueInfo where League = '$league'") or die(mysql_error());
					  
					   while ($row = mysql_fetch_array($result)){
      
					      echo "<tr>";
					      echo "<td>".$row['League']."</td>";
					      echo "<td>".$row['LeagueRating']."</td>";
					      echo "<td>".$row['Country']."</td>";
					      echo "<td>".$row['TopTeam']."</td>";
					      echo "</tr>";
					      }
					}
					
					?>


			      </tbody>

			      <tbody></tbody>
			    </table>

			    			  </div><!-- /container -->
        </div>
           <div id="sectionC" class="tab-pane">
        		    <h3 class="sansserif"><center>Search Teams</center></h3>
			<div class="container">
			<form action="" method="post">
			      <select name='teamS' >
			      <option value = "Ajax">Ajax Fc</option>
			      <option value = "Aston Villa">Aston Villa Fc</option>
			      <option value = "Barcelona"> Barcelona </option>
			      <option value = "Bayern Munich">Bayern Munich</option>
			      <option value = "Benfica">Benfica</option>
			      <option value = "Borussia Dortmund">Borussia Dortmund</option>
			      <option value = "Chelsea">Chelsea</option>
			      <option value = "Internazionale">Internazionale</option>
			      <option value = "Juventus">Juventus</option>
			      <option value = "Liverpool">Liverpool</option>
			      <option value = "Manchester United">Manchester United</option>
			      <option value = "Marseille">Marseille</option>
			      <option value = "Milan">Milan</option>
			      <option value = "Porto">Manchester United</option>
			      <option value = "Real Madrid">Real Madrid</option>
			      </select>
			      <input type="submit"  value ="search" name="submit2"/>

			   
			 </form>  
			 
			    <table class="table table-striped" class="table">
			      <thead  class="thead-default">
			        <tr>
			          <th>Teamn Name</th>

			          <th>Country</th>

			          <th>Top Scorer</th>

			          <th>Number of Titles</th>

			        </tr>
			      </thead>
			         <tbody>
					 <?php
					 
					   mysql_connect("localhost", "root", "r3fl3ct89") or die(mysql_error());
			           
					    mysql_select_db("202web") or die(mysql_error());
					    
					   if (isset ($_POST['teamS'])){
					   
					      $team = $_POST['teamS'];
  
 

					   
					   $result = mysql_query("select * from teams where TeamName = '$team'") or die(mysql_error());
					 while ($row = mysql_fetch_array($result)) {
      
					      echo "<tr>";
					      echo "<td>".$row['TeamName']."</td>";
					      echo "<td>".$row['Country']."</td>";
					      echo "<td>".$row['TopScorer']."</td>";
					      echo "<td>".$row['NumberofTitles']."</td>";
					      echo "</tr>";
					    }
					  
					}
					
					?>


			      </tbody>

			      <tbody></tbody>
			    </table>

			 

			    			  </div><!-- /container -->
        </div>
			    <div id="sectionD" class="tab-pane">
					      <h3 class="sansserif"><center>Add Team/League </center></h3>
					  <div class="container">
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
					    <form action="" method="post">
					    <div class="right">
							    <select name='team1' >
							    <option value = "Ajax">Ajax Fc</option>
							    <option value = "Aston Villa">Aston Villa Fc</option>
							    <option value = "Barcelona"> Barcelona </option>
							    <option value = "Bayern Munich">Bayern Munich</option>
							    <option value = "Benfica">Benfica</option>
							    <option value = "Borussia Dortmund">Borussia Dortmund</option>
							    <option value = "Chelsea">Chelsea</option>
							    <option value = "Internazionale">Internazionale</option>
							    <option value = "Juventus">Juventus</option>
							    <option value = "Liverpool">Liverpool</option>
							    <option value = "Manchester United">Manchester United</option>
							    <option value = "Marseille">Marseille</option>
							    <option value = "Milan">Milan</option>
							    <option value = "Porto">Manchester United</option>
							    <option value = "Real Madrid">Real Madrid</option>
							    </select>
							    <input type="submit"  value ="submitmyTeam" name="submitmyTeam"/>
							    
							  <p>  
							  <?php 
							      if ( isset( $_POST['submitmyTeam'] ) ){
							      echo $response;
								}
							  ?>
							  </p>
															
							    </div>   
							    
							  <div class="left">
							    <select name='league' >
							    <option value = "La Liga">La Liga</option>
							    <option value = "Bundesliga">Bundesliga</option>
							    <option value = "Premier League">Barclays Premier League</option>
							    <option value = "Serie A">Calcio Serie A</option>
							    <option value = "Ligue 1">France Ligue 1</option>
							    <option value = "Primeira Liga">Primeira Liga</option>
							    <option value = "Eredevisie">Netherlands Eredevisie</option>
							    
							    </select>
							    <input type="submit"  value ="submitmyLeague" name="submitmyLeague"/>
							    
							  <p>
							  <?php
							  if (isset($_POST['submitmyLeague'])){
							  echo $response2;
							  }
							  ?>
							  </p>
							  </div>
							  </form>    

								    </div><!-- /container -->
			  </div>
			     <div id="sectionE" class="tab-pane">
        		    <h3 class="sansserif"><center>BookMarks</center></h3>
			    <div class="container">
			    <table class="table table-striped" class="table">
			      <thead  class="thead-default">
			        <tr>
							          <th>User </th>

							          <th>Team</th>

							          <th>League</th>

							          
			        </tr>
			      </thead>
			         <tbody>
									 <?php
									   $user = $_SESSION['username'];
									   mysql_connect("localhost", "root", "r3fl3ct89") or die(mysql_error());

									    mysql_select_db("202web") or die(mysql_error());
									    

									   $result = mysql_query("select * from userprofiles where clientName = '$user'") or die(mysql_error());

									   while ($row = mysql_fetch_array($result)){

									     echo "<tr>";
									      echo "<td>".$row['clientName']."</td>";
									      echo "<td>".$row['team']."</td>";
									      echo "<td>".$row['league']."</td>";
									      echo "</tr>";
									}



									?>

			      </tbody>

			      <tbody></tbody>
			    </table>

			    			  </div><!-- /container -->
        </div>

    </div>
</div>
</body>
</html>