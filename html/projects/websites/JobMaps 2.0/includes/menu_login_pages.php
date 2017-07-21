<?php
ob_start();
require_once 'header_pages.php';
echo "<nav class='navbar navbar-default navbar-fixed-top' role='navigation' style='background-color: #FFF;'>
  <div class='container'>
    <div class='navbar-header'>
      <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
        <span class='sr-only'>Toggle navigation</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <a href='./index.php'><img src='images/logo.png'></a>
    </div>
      <ul class='nav navbar-nav navbar-right'>
        <li><p class='navbar-text'>Login System is Under Construction.</p></li>
        <li class='dropdown'>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown'><b>Login</b> <span class='caret'></span></a>
      <ul id='login-dp' class='dropdown-menu'>
        <li>
           <div class='row'>
              <div class='col-md-12'>
                Login via
                <div class='social-buttons'>
                  <a href='#' class='btn btn-fb'><i class='fa fa-facebook'></i><font color='white'> Facebook</font></a>
                  <a href='#' class='btn btn-tw'><i class='fa fa-twitter'></i><font color='white'> Twitter</font></a>
                </div>";
$error = $username = $password = "";
if (isset($_POST['username']))
{
  $username = sanitizeString($_POST['username']);
  $password = sanitizeString($_POST['password']);
  if ($username == "" || $password == "")
  {
    $error = "Not all fields were entered<br>";
  }
  else
  {
    $result = queryMySQL("SELECT username,password FROM applicant
    WHERE username='$username' AND password='$password'");
    if ($result->num_rows == 0)
    {
      $error = "<span class='error' style='color: red;'>Username/Password invalid</span><br><br>";
    }
    else
    {
      $_SESSION['username'] = ucfirst($username);
      $_SESSION['password'] = $password;
      header("Location: ../menu_success_index.php");
    }
  }
}
echo <<<_END
<form class='form' role='form' method='post' action='includes/menu_login_index.php' accept-charset='UTF-8' id='login-nav'>$error
                    <div class='form-group'>
                       <label class='sr-only' for='username'>Username</label>
                       <input type='text' class='form-control' id='username' name='username' value='$username' placeholder='Username' required>
                    </div>
                    <div class='form-group'>
                       <label class='sr-only' for='password'>Password</label>
                       <input type='password' class='form-control' id='password' name='password' value='$password' placeholder='Password' required>
                      <div class='help-block text-right'><a href='#'>Forgot The Password?'</a></div>
                    </div>
_END;
?>

                 
                    <div class='form-group'>
                       <button type='submit' class='btn btn-primary btn-block'>Sign in</button>
                    </div>
                    <div class='checkbox'>
                       <label>
                       <input type='checkbox'> Keep Me Logged In
                       </label>
                    </div>
                 </form>
              </div>
              <div class='bottom text-center'>
                <a href='includes/signup.php'><b>Join Us Today</b></a>
              </div>
           </div>
        </li>
      </ul>
        </li>
      </ul>
  </div>
</nav>
</body>
</html>