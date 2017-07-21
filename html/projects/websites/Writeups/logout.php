<?php
ob_start();
include 'header.php';

if(isset($_SESSION['user']))
{
	destroySession();
	header("Location: login.php");
}

?>