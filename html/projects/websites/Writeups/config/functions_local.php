<!-- FOR LOCAL HOST TESTING -->
<?php
$dbhost  = 'localhost';    			//SEVER HOST NAME (TESTING LOCAL HOST: LOCALHOST)
$dbuser  = 'root';   				//YOUR USERNAME (TESTING LOCAL USERNAME: ROOT)
$dbpass  = '';   					//PASSWORD (TESTING LOCAL PASSWORD: '')
$dbname  = 'writeup';      			//YOUR DATABASE NAME (TESTING LOCAL NAME: TABLENAME) 
$appname = "Employee Writeups";   	//STICK INTO TITLE IN HEADER/FOOTER (OPTIONAL)


$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if($connection->connect_error)
{
	die($connection->connect_error);
}

function createTable($name, $query)
{
	queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
	echo "Table '$name' created or already exists. <br />";
}

function queryMysql($query)
{
	global $connection;
	$result = $connection->query($query);
	if(!$result)
	{
		die($connection->error);
	}
	return $result;
}

function destroySession()
{
	$_SESSION=array();
	if (session_id() != "" || isset($_COOKIE[session_name()]))
	setcookie(session_name(), '', time()-2592000, '/');
	session_destroy();
}

function sanitizeString($var)
{
	global $connection;
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	return $connection->real_escape_string($var);
}

function display_errors($errors){
	$display = '<ul class="bg-danger">';
	foreach($errors as $error){
		$display .= '<li class="text-danger">'.$error.'</li>';
	}
	$display .= '</ul>';
	return $display;
}


?>