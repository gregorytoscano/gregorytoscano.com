<?php
ob_start();
include_once 'header.php';

if(isset($_POST['btn-createemp']))
{
  $emp_number = sanitizeString($_POST['emp_number']);
  $emp_firstname = sanitizeString($_POST['emp_firstname']);
  $emp_lastname = sanitizeString($_POST['emp_lastname']);
  $position = sanitizeString($_POST['position']);
  $telephone = sanitizeString($_POST['telephone']);

	$emp_number = trim($emp_number);
	$emp_firstname = trim($emp_firstname);
	$emp_lastname = trim($emp_lastname);
	$position = trim($position);
	$telephone = trim($telephone);

	// email exist or not
	$query = "SELECT emp_number FROM employees WHERE emp_number='$emp_number'";
	$result = queryMySQL($query);
	$count = mysqli_num_rows($result); // if email not found then register

	if($count == 0)
	{
		queryMySQL("INSERT INTO employees(emp_number,emp_firstname,emp_lastname,position,telephone) VALUES"."('$emp_number','$emp_firstname','$emp_lastname','$position','$telephone')");
		$_SESSION['empaddsuccess'] = 'You have been successfully registered!';
	}
	else{
    	$_SESSION['empiderror'] = 'Employee Number has already been taken!';
  	}
}
?>

<div class="container-fluid">
  <div class="row">
  <div class="col-md-4"></div>
    <div class="col-md-4">
      <h2 class="text-center">Add New Employee</h2>
        <form method="post" id="myform">
          <div class="form-group">
          	<div class="row">
			 	      <div class="col-lg-8">
            		<label for="emp_number">Employee Number</label>
            		<input type="number" class="form-control" name="emp_number" min="6" max="6" maxlength="6" required>
          		</div>
          	</div>
          </div>
          <div class="form-group">
            <label for="emp_firstname">Employee Firstname</label>
            <input type="text" class="form-control" name="emp_firstname" placeholder="Firstname" required>
          </div>
          <div class="form-group">
            <label for="emp_lastname">Employee Lastname</label>
            <input type="text" class="form-control" name="emp_lastname" placeholder="Lastname" required>
          </div>
          <div class="form-group">
		    <div class="row">
			 	<div class="col-lg-8"> 
				    <label for="position">Position Title </label> 
				    <select class="form-control" id="position" name="position" required>
				    	<option value="" selected disabled>--- Select One ---</option>
						<option value="Runner">Runner</option>
					    <option value="CSR">CSR</option>
					    <option value="Doorman">Doorman</option>
					    <option value="Prodoor">Prodoor</option>
					    <option value="Dispatcher">Dispatcher</option>
				    </select>
				</div>
		    </div>
		  </div>
          <div class="form-group">
          	<div class="row">
			 	<div class="col-lg-8"> 
			 		<!-- jquery.inputmask -->
    				<script>
      				$(document).ready(function() {
        				$(":input").inputmask();
      				});
    				</script>
    				<!-- /jquery.inputmask -->
		            <label for="telephone">Telephone Number</label>
		            <input type="text" name="telephone" class="form-control" data-inputmask="'mask' : '(999) 999-9999'">
		        </div>
		    </div>    
          </div>		    		
          <div class="form-group">
            <button type="submit" class="btn btn-danger btn-lg center-block shadow-btn" name="btn-createemp"> Add Employee </button>
          </div>
        </form>
        <?php
          if(isset($_SESSION['empaddsuccess']))
          {
            echo "<div class='text-center alert alert-success'>". $_SESSION['empaddsuccess'] ."<br /></div>";
            unset($_SESSION['empaddsuccess']);
          }
          elseif(isset($_SESSION['empiderror']))
          {
            echo "<div class='text-center alert alert-danger'>". $_SESSION['empiderror'] ."</div>";
            unset($_SESSION['empiderror']);
          }
        ?>
      </div>
    <div class="col-md-4"></div>
  </div>
</div>