<?php // Example 21-5: signup.php
include_once 'header.php';
echo "<link rel='stylesheet' href='style.css' type='text/css'>";
echo <<<_END
<script>
function checkUser(username)
{
    if (username.value == '')
    {
        O('info').innerHTML = ''
        return
    }

    params  = "username=" + username.value
    request = new ajaxRequest()
    request.open("POST", "checkuser.php", true)
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    request.setRequestHeader("Content-length", params.length)
    request.setRequestHeader("Connection", "close")
    
    request.onreadystatechange = function()
    {
        if (this.readyState == 4)
            if (this.status == 200)
                if (this.responseText != null)
                    O('info').innerHTML = this.responseText
    }
    request.send(params)
}

function ajaxRequest()
{
    try { var request = new XMLHttpRequest() }
    catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
            try { request = new ActiveXObject("Microsoft.XMLHTTP") }
            catch(e3) {
                request = false
    }   }   }
    return request
}
</script>
_END;

$error = $user = $pass = "";
if (isset($_SESSION['username'])) destroySession();

if (isset($_POST['username']))
{
    $user = sanitizeString($_POST['username']);
    $pass = sanitizeString($_POST['password']);
    $email = sanitizeString($_POST['email']);   

    if ($user == "" || $pass == "" || $email == "")
        $error = "Not all fields were entered<br /><br />";
    else
    {
        if (mysql_num_rows(queryMysql("SELECT * FROM employer
		      WHERE username='$user'")))
            $error = "That username already exists<br /><br />";
        else
		  {
            queryMysql("INSERT INTO employer (username, password, email) VALUES('$user', '$pass', '$email')");
            $_SESSION['username'] = $user;
            header("Location: index.php"); // redirects
        }
    }
}

echo <<<_END
<div class='header'>
     <div id='logsign' align='center'>
          <fieldset>
          <legend style='color:#FF6600;'><h2>Employer Signup</h2></legend>
          <form method='post' action='empsignup.php' autocomplete='off'>$error
          <div class="row">
               Username:
               <span class="form">
                     <input type='text' maxlength='16' name='username' onBlur='checkUser(this)' autofocus/><br /><span id='info'></span>
               </span>
          </div>          
          <div class="row">
               Password:&nbsp
               <span class="form">
                     <input type='password' maxlength='16' name='password' />
               </span>
          </div>
          <div class="row">
               Email: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
               <span class="form">
                     <input type='email' maxlength='100' name='email'/>
               </span>
          </div>

_END;
?>
<div class="row">
     <span class="form">
           <input type='submit' value='Sign Up' />
     </span>
</div>
</form></fieldset>
<h3>Already a Member</h3>
<fieldset>
<a style='color:#FF6600;' href='emplogin.php'>Login Here</a></li>
</fieldset>
</div>



</center></div></body></html>
