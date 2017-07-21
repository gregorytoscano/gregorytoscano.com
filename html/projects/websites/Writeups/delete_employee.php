<?php
ob_start();
require_once 'header.php';

$id = $_REQUEST['id'];

queryMysql("DELETE FROM employees WHERE id = '$id'");
header("Location: view_employees.php");
?>