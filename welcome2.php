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
<title>Welcome page</title>
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
	<h2><?php echo "Welcome  ".$_SESSION['username'];?></h2>
    <a href="logout.php" class="btn btn-success btn pull-right"><span class="glyphicon glyphicon-home"></span>logout</a>
        <li><a data-toggle="tab" href="#sectionA">Champions League Info</a></li>
        <li><a data-toggle="tab" href="#sectionB">Search Leagues</a></li>
	<li><a data-toggle="tab" href="#sectionC">Search Teams</a></li>
        <li><a data-toggle="tab" href="#sectionD">Add Teams</a></li>
        <li><a data-toggle="tab" href="#sectionE">My bookmarked Items</a></li>
    </ul>
    <div class="tab-content">

        <div id="sectionA" class="tab-pane fade in active">
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
         
           <div id="sectionB">
	   
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
		      <input type="submit"  value ="search" name="submit"/>
		     
		  </form>
		 <h3 class="sansserif"><center>Search Leagues</center></h3>	
			
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
    
</div>
</body>
</html>