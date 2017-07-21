<?php
$dbhost  = 'gregorytoscano.com.mysql';    // Unlikely to require changing
$dbname  = 'gregorytoscano_';       // Modify these...
$dbuser  = 'gregorytoscano_';   // ...variables according
$dbpass  = 'Fishing00';   // ...to your installation
$appname = "NFLTeamSearch"; // ...and preference

mysql_connect($dbhost, $dbuser, $dbpass) or die("Could Not Connect");
mysql_select_db($dbname) or die(mysql_error());
$output = '';

if(isset($_POST['search'])) {
	$searchq = $_POST['search'];
	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
	
	$query = mysql_query("SELECT * FROM nfl WHERE teamCity LIKE '%$searchq%' OR teamMascot LIKE '%searchq%'") or die("Could not search");
	$count = mysql_num_rows($query);
	
	if($count == 0)
	{
		$output = 'If you typed a team name, type the city and it will find it. This is a bug I am working on.';
	}
	else
	{
		
		while($row = mysql_fetch_array($query)) {
			$id = $row['id'];
			$tcity = $row['teamCity'];
			$tname = $row['teamMascot'];
			$logo = $row['logo'];
			
			$output .= '<center>' . '<img src="' . $logo . '"width="70px" height="50px">' . ' ' . $tcity . ' ' . $tname . '</center>';
		}
	}
	
}
?>

<!doctype html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="Search a database of NFL Teams." />
	<meta name="keywords" content="NFL, Team, Team Names, Team Search, Team Logo, Team Logo Search, NFL Teams, National Football League " />
	<meta http-equiv="author" content="Gregory Toscano" />
	<title>NFL Team Search</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/search.css" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Walter+Turncoat' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/
html5.js"></script>
<![endif]-->

</head>
<body onLoad="functions.php">
<div class="wrapper">
<center><img src="images/nfl-logo.jpg"><br />
<h2 style="text-decoration:none;">NFL Team Search</h2></center>
    <form class="form-wrapper cf" method="post" action="NFLTeamSearch.php">
        <input type="text" name="search" placeholder="Search For An NFL Team..." required autofocus>
        <button type="submit">Search</button>
    </form>

<?php print("$output");?>	
       <footer>
           &copy No Affilation With The NFL 
       </footer>

</div>
</body>
</html>
