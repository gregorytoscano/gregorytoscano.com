<?php
include_once 'header.php';
?>

<div align="center">
<h3>Resum&eacute;  Upload</h3>
<div style="width:500px;" align="justify">
	<font color="#666666">This is a simple resum&eacute;  upload system. Just fill out the information and upload it to our database.</font></div>
<form name="resumeUpload" method="post" action="resume.php">
<p>
    <label for="fname">First Name:</label>
    <input type="text" name="fname">
</p>
<p>
	<label for="lname">Last Name:</label>
    <input type="text" name="lname">
</p>
<p>
	<label for="lname">Email:</label>
    <input type="email" name="email">
</p>
<p>
	<label for="lname">Education:</label>
    <select name="education">---Select One---
    <option value="phd">PHD</option>
    <option value="masters">Master's Degree</option>
    <option value="bachelor">Bachelor's Degree</option>
    <option value="associate">Associate's Degree</option>
    <option value="scollege">Some College</option>
    <option value="hschool">High School Diploma</option>
    <option value="other">Other</option>
    </select>
</p>
<p>
    <label for="skills">Skills & Other Information:</label><br />
    <textarea name="skills" cols="50" rows="10"></textarea>
</p>
<p>
	<input type="submit" name="submit" class="classname" value=" Upload ">
</p> 
</form>
</div>
