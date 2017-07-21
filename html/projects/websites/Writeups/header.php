<?php
session_start();
require_once 'config/functions.php';  //CHANGE THIS WHEN UPLOADING TO SERVER TO FUNCTIONS.PHP
echo "<!DOCTYPE html>
	  <html>
	  <head>
	    <!-- Meta, title, CSS, favicons, etc. -->
	    <meta charset='utf-8'>
	    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
	    <meta name='viewport' content='width=device-width, initial-scale=1'>
		<title>". $appname ."</title>
		<link href='css/bootstrap.css' rel='stylesheet' />
    	<link href='css/main.css' rel='stylesheet' />
    	<link href='fonts/font-awesome/css/font-awesome.min.css' rel='stylesheet' />
    	<link href='css/shadows.css' rel='stylesheet' />
		<script type='text/javascript' src='js/jquery.min.js'></script>
		<script type='text/javascript' src='js/bootstrap.js'></script>
		<!-- jquery.inputmask -->
    	<script src='js/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js'></script>
	  </head>";


if(isset($_SESSION['user']))
{
	$loggedin = TRUE;
	$result = queryMySQL('SELECT * FROM users WHERE id='.$_SESSION['user']);
	$userRow = mysqli_fetch_array($result);

	$firstname = $userRow['firstname'];
	$lastname = $userRow['lastname'];

	$firstname = ucfirst($firstname);
	$lastname = ucfirst($lastname);

}
else $loggedin = FALSE;

if($loggedin == TRUE)
{
	echo"<body>
	<div class='container-fluid'>
	  <div class='navbar navbar-default'>
		<div class='navbar-header'>
			<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#top' aria-expanded='false'>
				<span class='sr-only'> Toggle Navigation </span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
			</button>
			<a class='navbar-brand' href='#top'> Employee Writeups</a>
		</div>
		<div class='collapse navbar-collapse' id='top'>
			<ul class='nav navbar-nav'>
			<li>
				<a href='dashboard.php'><span class='glyphicon glyphicon-home'></span> Home </a>
			</li>
			<li class='dropdown'>
				<a hreF='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span class='glyphicon glyphicon-user'></span> Manage Employees</a>
				<ul class='dropdown-menu'>
					<li><a href='create_employee.php'> Add New Employee</a></li>
					<li><a href='view_employees.php'>View Employees</a></li>
				</ul>
			</li>
			<li class='dropdown'>
			<a hreF='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span class='glyphicon glyphicon-pencil'></span> Manage Writeups </a>
				<ul class='dropdown-menu'>
					<li><a href='create_writeup.php'>Create Writeup</a></li>
					<li><a href='view_writeups.php'>View Writeups</a></li>
				</ul>
			</li>
			<li class='dropdown'>
				<a hreF='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span class='glyphicon glyphicon-exclamation-sign'></span> Manage Claims </a>
				<ul class='dropdown-menu'>
					<li><a href='new_claim.php'>Create a Claim</a></li>
					<li><a href='view_claims.php'>View All Claims</a></li>
				</ul>
			</li>
			</ul>
			<ul class='nav navbar-nav navbar-right'>
			<li class='dropdown'>
				<a hreF='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
				<span class='glyphicon glyphicon-user'></span> ". $firstname ." ". $lastname ."</a>
				<ul class='dropdown-menu'>
					<li><a href='settings.php'><span class='glyphicon glyphicon-cog'></span> Settings</a></li>
					<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout </a></li>		
				</ul>
			</li>
			</ul>
		</div>
	</div>
</div>";
    
}
else
{
	echo"<body class='login'>
			<div class='container-fluid'>
				<div class='navbar navbar-default'>
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#top' aria-expanded='false'>
							<span class='sr-only'> Toggle Navigation </span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
						</button>
					</div>
					<div class='collapse navbar-collapse' style='background: url(images/main-bg.gif);' id='top'>
						<ul class='nav navbar-nav navbar-right'>
							<li><a href='login.php'> Login </a></li>
							<li><a href='signup.php'> Signup </a></li>		
						</ul>
					</div>
				</div>
			</div>";
}
?>


