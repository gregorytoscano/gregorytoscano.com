<?php 
include_once 'iheader.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Maps</title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
<a href="http://www.gregorytoscano.com/websites.html"><div class="back-arrow-left"></div></a>  
<div class="wrapper">
	<div class="centered">
		<div class="logo">
			<img src="logo.png" width="400" height="106" />
		</div>
		<form method="post" action="search.php" onsubmit=codeAddress()>
		&nbsp;&nbsp;  
        <input type="text" name="search" style="font-size:14pt;height:35px" value="<?php echo isset($_POST['search'])?$_POST['search']:''?>" placeholder="Job Title" autofocus>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="city" style="font-size:14pt;height:35px" placeholder="Location"><br /><br /><p></p>
		<center>
        	<input type="submit" name="submit" value="Find Jobs" class="classname">
        </center>
     </form>
	</div>
</div>



<div class="footer" sytle="color: #F60;">
	<div id="fleft">  &nbsp;&nbsp;&copy;MapJobs </div>
    <div id="fright"> <a style="color:#F60;" href="about.php">About Us</a> | <a style="color:#F60;" href="contact.php">Contact</a></div>
</div>


</body>
</html>
