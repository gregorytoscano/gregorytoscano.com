<html>
<link href="style.css" rel="stylesheet" type="text/css">
<?php
include_once 'header.php';

echo '<head>'.
     '<title>'.$appname.'</title>'.
     '</head>';
	 
    $fname = sanitizeString($_POST['fname']);
    $lname = sanitizeString($_POST['lname']);
    $email = sanitizeString($_POST['email']);
    $education = sanitizeString($_POST['education']);
    $skills = sanitizeString($_POST['skills']);
   


queryMysql("INSERT INTO resume (fname, lname, email, education, skills) VALUES('$fname', '$lname', '$email', '$education', '$skills')");

?>
<body>

<p>Successful Resum&eacute;  Upload!!</p>

<p>Here is a copy of your submitted Resum&eacute; </p>
<div class="box">
<?php

echo "<center><h2>Resum&eacute;</h2></center><table cellspacing='10'>".
	"<tr><td><b>First Name: </b></td><td>" . $fname . "</td></tr>" .
	"<tr><td><b>Last Name: </b></td><td>". $lname ."</td></tr>".
	"<tr><td><b>Email: </b></td><td>". $email ."</td></tr>".
	"<tr><td><b>Education: </b></td><td>". $education ."</td></tr>".
	"<tr><td><b>Skills: </b></td><td>". $skills ."</td></tr>".
	"</table>"
?>

</div>

</body>
</html>