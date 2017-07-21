<?php
ob_start();
require_once 'header.php';

$id = $_REQUEST['id'];

queryMysql("DELETE FROM writeups WHERE id = '$id'");
header("Location: view_writeups.php");
?>