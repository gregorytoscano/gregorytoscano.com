<?php // Example 21-2: header.php
session_start();
echo "<!DOCTYPE html>\n
<html>
<head>";
include 'functions.php';

$user = $_SESSION['username'];
$query1 = mysql_query("SELECT * FROM applicant");
$query2 = mysql_query("SELECT username FROM employer");

while ($row = mysql_fetch_array($query1))
	{
	if($user==$row["username"])	{$var1 = TRUE; }
	
	}
while ($row = mysql_fetch_array($query2))
	{
	if($user==$row["username"])	{$var2 = TRUE; }
	
	}



if ($var1 == TRUE)
	{
		$username  = $_SESSION['username'];
		$apploggedin = TRUE;
		$emploggedin = FALSE;

	}
else if ($var2 == TRUE)
	{
		$username  = $_SESSION['username'];
		$emploggedin = TRUE;
		$apploggedin = FALSE;
	}


 if ($apploggedin)
 {
echo  "<div class='header'>" .
      "<div id='login'>".    
         "<a href='resumeUpload.php'> Resum&eacute;  </a> |".
         "<a href='logout.php'> Logout</a>".
     "</div> ".
   "</div>";
}

//ADDED
else if($emploggedin)
{
echo  "<div class='header'>" .
      "<div id='emplogin'>".
         "<a href='post.php'> Post Job </a> |".
	     "<a href='ressearch.php'> Resume Search </a> |".
         "<a href='logout.php'> Logout</a>".
     "</div> ".
   "</div>";    
}
/////////////////   
else
{
  
echo  "<div class='header'>" .
   "<div id='login' style='color:#F60;'>
     <a href='login.php'>Login</a> | 
     <a href='signup.php'>Signup</a>
   </div>".
 "</div> ";
}
?>