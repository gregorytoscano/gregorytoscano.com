<?php
ob_start();
include_once 'header.php';

if(isset($_POST['btn-login']))
{
  $username = sanitizeString($_POST['username']);
  $password = sanitizeString($_POST['password']);

  $username = trim($username);
  $password = trim($password);

  $result = queryMySQL("SELECT id, username, password, firstname, lastname, email_address FROM users WHERE username='$username'");
  $row = mysqli_fetch_array($result);
  $count = $result->num_rows;

  if ($count == 1 && $row['password']==md5($password))
  {
    $_SESSION['user'] = $row['id'];
    header('Location: dashboard.php');
    exit();
  }
  else{
		$_SESSION['loginerror'] = 'Your Username/Password was incorrect!';
	}
	
}

?>
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="panel" style="top: 50%; left: 50%; box-shadow: 1px 1px 20px #000;">
        <div class="panel-heading" style="background: url(images/main_bg.gif);">
          <h2 class="text-center">Login</h2>
        </div>

        <div class="panel-body" style="background: url(images/main_bg.gif);">
        <form method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
          <p class="text-center"><a href="recover_password.php" style="color:#000; text-decoration: none;">Forgot Password?</a></p>
          
          <div class="form-group">
            <button type="submit" class="btn btn-default btn-lg center-block" name="btn-login"> Login </button>
          </div>
        </form>
        </div>

        <div class="panel-footer" style="background: url(images/main_bg.gif);">
        <?php
          if(isset($_SESSION['loginerror']))
          {
            echo "<div class='text-center alert alert-danger'>". $_SESSION['loginerror'] ."</div>";
            unset($_SESSION['loginerror']);
          } 
        ?>
        <p class="text-center">Demonstration Purposes <br />
          username: admin <br />
          password: admin</p>
        </div>
      </div>
    </div>

    <div class="col-md-4"></div>
  </div>
</div>

