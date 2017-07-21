<?php
session_start();
include_once 'config/functions.php';

if(!$loggedin)
{
    header('Location: dashboard.php');
}
else
{
    header('Location: login.php');
}
?>