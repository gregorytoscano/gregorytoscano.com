<?php
include_once 'header.php';

?>

<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">

<script type="text/javascript">
function thanks()
{
 alert("Message Sent.\nThank You I will contact you as soon as I can!");
}
</script>

</head>
<body>
<center>   <h2>Contact Us</h2>
                    <form name="contact" action="index.html" onSubmit="thanks();" autocomplete="on">
                    
                    <table cellspacing="10" >
                      <tr>
                        <td><label for="fname"><font color="red">*</font>First name:</label></td> <td><input type="text" name="fname" required autofocus></td>
                      </tr>
                      <tr>
                        <td><label for="lname"><font color="red">*</font>Last  Name:</label></td> <td><input type="text" name="lname" required> </td>
                      </tr>
                      <tr>
                        <td><label for="phone">&nbsp&nbspTelephone:</label></td> <td><input type="phone" name="phone"> </td>
                      </tr>
                      <tr>
                        <td><label for="email"><font color="red">*</font>Email Address:</label></td> <td><input type="email" name="email" required> </td>
                      </tr>
                      <tr>
                        <td><label for="topic"><font color="red">*</font>Topic: </label></td> <td><select name="topic" required="required">
                                                       <option value="" SELECTED>--Select One--
                                                       <option value="website">Website Issue</option>
                                                       <option value="shipping">Shipping</option>
                                                       <option value="selling">Selling</option>
                                                       <option value="custom">Custom Job</option>
                                                       <option value="quote">Quote/Appointment</option>
                                                       <option value="other">Other</option>
                                                </select>
                        </td>
                      </tr>
                      <tr>
                        <td><label for="message"><font color="red">*</font>Message:</label> </td><td><textarea rows="10" cols="30" name="message" required></textarea> </td>
                      <tr>
                        <td colspan="2"><center><input type="submit" value="       Submit       " name="submit"></td>
                      </tr>
                    </table>
                    </center>
                    </form>
                   <br />
                   
      </center>
      </body>             
</html>