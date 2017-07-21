<?php
ob_start();
include_once 'header.php';

if(isset($_POST['btn-recover']))
{
  $username = sanitizeString($_POST['username']);
  $username = trim($username);

  $result = queryMySQL("SELECT email_address FROM users WHERE username='$username'");
  $row = mysqli_fetch_array($result);
  $count = $result->num_rows;
 
  if ($count == 1)
  {
    $_SESSION['passwordrecovery'] = $row['email_address'];
  }
  else{
    $_SESSION['passwordrecoveryerror'] = 'Your Username was incorrect!';
  }
}

?>
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <h2 class="text-center">Password Recovery</h2>
        <form method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-default btn-lg center-block shadow-btn" name="btn-recover"> Recover Password </button>
          </div>
        </form>
        <?php
          if(isset($_SESSION['passwordrecovery']))
          {
            echo "<div class='text-center alert alert-success'> Email Sent to: ". $_SESSION['passwordrecovery'] ."</div>";
            unset($_SESSION['passwordrecovery']);
          }
          if(isset($_SESSION['passwordrecoveryerror']))
          {
            echo "<div class='text-center alert alert-danger'>". $_SESSION['passwordrecoveryerror'] ."</div>";
            unset($_SESSION['passwordrecoveryerror']);
          }  
        ?>
      </div>
    <div class="col-md-4"></div>
  </div>
</div>
