<?php
session_start();
echo "<!DOCTYPE html>\n<html><head>";
require_once 'functions.php';

$userstr = ' (Guest)';
if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	$loggedin = TRUE;
	$userstr = " ($username)";
}

else $loggedin = FALSE;


include 'helpers.php';

if ($loggedin)
{
	include 'menu_success_pages.php';
}

else
{
	include 'menu_login_pages.php';
}
	
?>