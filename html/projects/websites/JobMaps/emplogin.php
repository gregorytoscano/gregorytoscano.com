<?php // Example 21-7: login.php
include_once 'header.php';
$error = $username = $password = "";

if (isset($_POST['username']))
{
    $username = sanitizeString($_POST['username']);
    $password = sanitizeString($_POST['password']);
    
    if ($username == "" || $password == "")
    {
        $error = "Not all fields were entered<br />";
    }
    else
    {
        $query = "SELECT username,password FROM employer
            WHERE username='$username' AND password='$password'";

        if (mysql_num_rows(queryMysql($query)) == 0)
        {
            $error = "<span class='error'>Username/Password
                      invalid</span><br /><br />";
        }
        else
        {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("Location: index.php"); // redirect
        }
    }
}

echo <<<_END
<div class='header'>
     <div class='centered' align='center'>
          <fieldset>
          <legend style='color:#FF6600;'><h2>Employer Login</h2></legend>
          <form method='post' action='emplogin.php' autocomplete='off'>$error
          <div class="row">
               Username:
               <span class="form">
                     <input type='text' maxlength='16' name='username' autofocus/><br /><span id='info'></span>
               </span>
          </div>          
          <div class="row">
               Password:&nbsp
               <span class="form">
                     <input type='password' maxlength='16' name='password' />
               </span>
          </div>

_END;
?>
<div class="row">
     <span class="form">
           <input type='submit' value=' Login ' />
     </span>
</div>
</form></fieldset>
<h3>Not A Member?</h3>
<fieldset>
<a style='color:#FF6600;' href='empsignup.php'>Join Today</a></li>
</fieldset>
</div>

</center></div></body></html>





