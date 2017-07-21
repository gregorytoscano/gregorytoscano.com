<?php
ob_start();
require_once 'header.php';
if (isset($_SESSION['username']))
{
	destroySession();
	header("Location: ../index.php");
}
else
{ 
	echo "<div class='main'><br>" . "You cannot log out because you are not logged in";
}

?>
</body>
</html>