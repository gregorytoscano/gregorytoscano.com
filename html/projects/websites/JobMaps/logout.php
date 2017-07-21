<?php // Example 21-12: logout.php
include_once 'header.php';

if (isset($_SESSION['username']))
{
    destroySession();
    header("Location: index.php"); // redirect
}
?>

<br /><br /></div></body></html>
