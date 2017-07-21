<?php
ob_start();
include 'header.php';

if(isset($_POST['btn-createwriteup']))
{
    $emp_name = sanitizeString($_POST['emp_name']);
    $position = sanitizeString($_POST['position']);
    $shift = sanitizeString($_POST['shift']);
    $category = sanitizeString($_POST['category']);
    $issued = sanitizeString($_POST['issued']);
    $details = sanitizeString($_POST['details']);
	

    $emp_name = trim($emp_name);
	$position = trim($position);
	$shift = trim($shift);
	$category = trim($category);
	$issued = trim($issued);
	$details = trim($details);

	queryMySQL("INSERT INTO writeups(emp_name,position,shift,category,issued,details) VALUES"."('$emp_name','$position','$shift','$category','$issued','$details')");
	$_SESSION['waddsuccess'] = "<div class='row'>
    								<div class='col-lg-12'>
								      	<h3 class='text-center'>Writeup Successful</h3>
										<table class='table table-hover shadow-btn'>
											<thead>
												<th class='text-center'>Name</th>
        										<th class='text-center'>Position</th>
												<th class='text-center'>Shift</th>
												<th class='text-center'>Category</th>
        										<th class='text-center'>Issued</th>
        										<th class='text-center'>Details</th>
											</thead>
											<tbody>
      											<tr>
											      <td>" . $emp_name . "</td>
											      <td>" . $position . "</td>
											      <td>" . $shift . "</td>
											      <td>" . $category . "</td>
											      <td>" . $issued . "</td>
											      <td>" . $details . "</td>
      											</tr>
      										</tbody>
      									</table>";

}
?>

<div class="container">
  <div class="row">
  <div class="col-md-3"></div>
    <div class="col-md-6">
      <h2 class="text-center">Create Writeup</h2>
        <form method="post">
          <div class="form-group">
          	  <div class="row">
          	  	<div class="col-lg-12">
		          	<label for="emp_name">Employee Name</label>
		          	<select class='form-control' id='emp_name' name='emp_name' required>
		          	<?php 
		          		$result = queryMySQL("SELECT * FROM employees");
  						$row = mysqli_fetch_array($result);
						$count = $result->num_rows;

						if ($count > 0)
						{
							$_SESSION['employees'] = $row['id'];

						}
						else
						{
						    $_SESSION['retrerror'] = "<option value='' selected disabled>--- No Employees Found ---</option>";
						}
		          		if(isset($_SESSION['employees']))
						{
							echo"<option value='' selected disabled>--- Select Employee ---</option>";
	  						$results = queryMySQL('SELECT * FROM employees');
	  						$empRow = mysqli_fetch_array($result);

	  						while($empRow = $results->fetch_assoc())
	    					{
	  							$emp_firstname = $empRow['emp_firstname'];
	  							$emp_lastname = $empRow['emp_lastname'];

	  							$emp_firstname = ucfirst($emp_firstname);
	  							$emp_lastname = ucfirst($emp_lastname);


		          				echo "<option value=". $emp_firstname, $emp_lastname .">". $emp_firstname ." ". $emp_lastname ."</option>";
							}	
						}
						else
						{
							if(isset($_SESSION['retrerror']))
    						{
							    echo  $_SESSION['retrerror'];
							    unset($_SESSION['retrerror']);
							} 
						}
					?>
					</select>
				</div>
			</div>
		  </div>
          <div class="form-group">
		    <div class="row">
			 	<div class="col-lg-8"> 
				    <label for="position">Position Worked </label> 
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
				    <label for="shift">Shift </label> 
				    <select class="form-control" id="shift" name="shift" required>
						<option value="" selected disabled>--- Select One ---</option>
						<option value="AM Shift">AM Shift</option>
					    <option value="MID Shift">MID Shift</option>
					    <option value="PM Shift">PM Shift</option>
					    <option value="Midnight Shift">Midnight Shift</option>
					    <option value="GH Shift">GH Shift</option>
					    <option value="Satellite">Satellite</option>
					    <option value="Mizner Event">Mizner Event</option>
					    <option value="Self Parking">Self Parking</option>
				    </select>
				</div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="row">
			 	<div class="col-lg-8"> 
				    <label for="category">Category </label> 
				    <select class="form-control" id="category" name="category" required>
						<option value="" selected disabled>--- Select One ---</option>
						<option value="Time/Attendance">Time/Attendance</option>
					    <option value="Attitude">Attitude</option>
					    <option value="Reckless Driving">Reckless Driving</option>
					    <option value="Vehical Damage">Vehical Damage</option>
					    <option value="Uniform">Uniform</option>
					    <option value="On Phone">On Phone</option>
					    <option value="Clock In/Out Break">Clock In/Out Break</option>
					    <option value="Other">Other</option>
				    </select>
				</div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="row">
			 	<div class="col-lg-8"> 
				    <label for="issued">Issued </label> 
				    <select class="form-control" id="issued" name="issued" required>
						<option value="" selected disabled>--- Select One ---</option>
						<option value="Verbal">Verbal</option>
					    <option value="Written">Written</option>
					    <option value="Final">Final</option>
					    <option value="Suspension">Suspension</option>
				    </select>
				</div>
		    </div>
		  </div>
		  <div class="form-group">
		  	<label for="details">More Details</label>
		  	<textarea class="form-control" rows="4" name="details" placeholder="Enter More Details....(not required)"></textarea>
		  </div>		    		
          <div class="form-group">
            <button type="submit" class="btn btn-danger btn-lg center-block shadow-btn" name="btn-createwriteup"> Create Writeup </button>
          </div>
        </form>
        <?php
        if(isset($_SESSION['waddsuccess']))
          {
            echo "<div class='text-center alert alert-success'>". $_SESSION['waddsuccess'] ."<br /></div>";
            unset($_SESSION['waddsuccess']);
          }
          ?>
      </div>
    <div class="col-md-3"></div>
  </div>
</div>