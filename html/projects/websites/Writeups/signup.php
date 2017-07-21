<?php
ob_start();
include 'header.php';

if(isset($_POST['btn-signup']))
{
	$username = sanitizeString($_POST['username']);
	$password = md5(sanitizeString($_POST['password']));
	$firstname = sanitizeString($_POST['firstname']);
	$lastname = sanitizeString($_POST['lastname']);
	$email_address = sanitizeString($_POST['email_address']);

	$username = trim($username);
	$password = trim($password);
	$firstname = trim($firstname);
	$lastname = trim($lastname);
	$email_address = trim($email_address);

	// email exist or not
	$query = "SELECT email_address FROM users WHERE email_address='$email_address'";
	$result = queryMySQL($query);
	$count = mysqli_num_rows($result); // if email not found then register
  // username exist or not
  $queryUser = "SELECT username FROM users WHERE username='$username'";
  $resultUser = queryMySQL($queryUser);
  $countUser = mysqli_num_rows($resultUser); // if username not found then register
	if($count == 0 && $countUser == 0)
	{
    queryMySQL("INSERT INTO users(username,password,firstname,lastname,email_address) VALUES"."('$username','$password','$firstname','$lastname','$email_address')");
		$_SESSION['signupsuccess'] = 'You have been successfully registered!';
	}
	elseif($count != 0 && $countUser == 0){
			$_SESSION['emailerror'] = 'Email Already Taken!';
	}
  elseif($count == 0 && $countUser != 0){
      $_SESSION['usernameerror'] = 'Username Already Used!';
  }
  else{
    $_SESSION['signuperror'] = 'Error registering!';
  }
}
?>

<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="panel" style="top: 50%; left: 50%; box-shadow: 1px 1px 20px #000;">
        <div class="panel-heading" style="background: url(images/main_bg.gif);">
          <h2 class="text-center">Register</h2>
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
          <div class="form-group">
            <label for="firstname">Firstname</label>
            <input type="text" class="form-control" name="firstname" placeholder="Firstname" required>
          </div>
          <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" class="form-control" name="lastname" placeholder="Lastname" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email_address" placeholder="Email Address" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-default btn-lg center-block" name="btn-signup"> Register </button>
          </div>
        </form>

        

        
        <?php
          if(isset($_SESSION['signupsuccess']))
          {
            echo "<div class='text-center alert alert-success'>". $_SESSION['signupsuccess'] ."<br />
            <a href='login.php'>
              <button type='button' class='btn btn-success btn-sm'>Login Now</button>
            </a>
            </div>";
            unset($_SESSION['signupsuccess']);
          }
          elseif(isset($_SESSION['emailerror']))
          {
            echo "<div class='text-center alert alert-danger'>". $_SESSION['emailerror'] ."</div>";
            unset($_SESSION['emailerror']);
          }
          elseif(isset($_SESSION['signuperror']))
          {
            echo "<div class='text-center alert alert-danger'>". $_SESSION['signuperror'] ."</div>";
            unset($_SESSION['signuperror']);
          } 
          elseif(isset($_SESSION['usernameerror']))
          {
            echo "<div class='text-center alert alert-danger'>". $_SESSION['usernameerror'] ."</div>";
            unset($_SESSION['usernameerror']);
          } 
        ?></div>
      </div>
    <div class="col-md-4"></div>
  </div>
</div>

