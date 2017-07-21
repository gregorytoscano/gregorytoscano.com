<?php // Example 21-5: signup.php
require_once 'inclues/header_pages.php';

$error = $username = $password = "";

if (isset($_SESSION['username']))
{
  destroySession(); 
} 

if (isset($_POST['username']))
{
    $username = sanitizeString($_POST['username']);
    $password = sanitizeString($_POST['password']);
    $email = sanitizeString($_POST['email']);    
    
    $result = queryMysql("SELECT * FROM applicants WHERE username='$username'");
  if ($result->num_rows)
  {
    echo "<span class='taken'>&nbsp;&#x2718; " . "This username is taken</span>";
  }
  else
  {
    echo "<span class='available'>&nbsp;&#x2714; " . "This username is available</span>";
  }
    
    if ($username == "" || $password == "" || $email == "")
    {
        $error = "Not all fields were entered<br /><br />";
    }
    else
    {
        if (mysql_num_rows(queryMysql("SELECT * FROM applicant
          WHERE username='$username'")))
            $error = "That username already exists<br /><br />";
        else
      {
            queryMysql("INSERT INTO applicant (username, password, email) VALUES('$username', '$password', '$email')");
            $_SESSION['username'] = ucfirst($username);
            header("Location: index.php");
        }
    }
}
echo <<<_END
     <div id='logsign' align='center'>
          <fieldset>
          <legend style='color:#FF6600;'><h2>Applicant Signup</h2></legend>
          <form method='post' action='signup.php' autocomplete='off' autofocus>$error
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
</div>


