<?php // Example 21-6: checkuser.php
include_once 'functions.php';

if (isset($_POST['username']))
{
    $username = sanitizeString($_POST['username']);

    if (mysql_num_rows(queryMysql("SELECT * FROM applicant
        WHERE username='$username'")))
        echo  "<span class='taken'>&nbsp;&#x2718; " .
              "Sorry, this username is taken</span>";
    else echo "<span class='available'>&nbsp;&#x2714; " .
              "This username is available</span>";
}
?>
