<?php
include 'header.php';

$result = queryMySQL("SELECT * FROM employees");
$count = $result->num_rows;
$_SESSION['reterror'] = 'No Employees Found';

if($count>0)
{
  echo "<div class='container'>
  <div class='row'>
    <div class='col-md-2'></div>
    <div class='col-md-8'>
      <h2 class='text-center'>Employees</h2>
		<table class='table table-hover table-responsive'>
			<thead>
				<th>Firstname</th>
				<th>Lastname</th>
        <th>Employee ID</th>
				<th>Position Title</th>
				<th>Phone Number</th>
			</thead>";
	while($empRow = $result->fetch_assoc())
    {	
      $id = $empRow['id'];
      $emp_firstname = $empRow['emp_firstname'];
  		$emp_lastname = $empRow['emp_lastname'];
      $emp_number = $empRow['emp_number'];
  		$position = $empRow['position'];
  		$telephone = $empRow['telephone'];

  		$emp_firstname = ucfirst($emp_firstname);
  		$emp_lastname = ucfirst($emp_lastname);

	  echo "<tbody>";
      echo "<tr>";
      echo "<td>" . $emp_firstname . "</td>";
      echo "<td>" . $emp_lastname . "</td>";
      echo "<td>" . $emp_number . "</td>";
      echo "<td>" . $position . "</td>";
      echo "<td>" . $telephone . "</td>";
      echo "<td><a href='edit_employee.php?id='$empRow[id]' style='color: #000; text-decoration: none;'><span class='fa fa-pencil'></span></a>&nbsp; &nbsp;
                <a data-href='delete_employee.php?id=$id' data-toggle='modal' data-target='#modalDelete' style='color: #000; text-decoration: none; cursor:pointer;'><span class='fa fa-close'></span></a></td>";    
          echo "<div class='modal modal-danger fade'  id='modalDelete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
              <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='modal-header' style='background-color: #d9534f; color: #FFF;'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title text-center' id='myModalLabel'>Delete Confirmation</h4>
                  </div>
                  <div class='modal-body'>
                    <p class='text-center'><strong>This action cannot be undone.</strong></p>
                    <p class='text-center'>Are you sure you wish to delete this employee?</p>          
                  </div>
                  <div class='modal-footer'>
                    <a class='btn btn-danger btn-ok'>Confirm Delete</a>&nbsp
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                  </div>
                </div>
              </div>
            </div>"; 
            echo "</tr>";
  	}

    echo "</div><div class='col-md-2'</div></div>";
}
else 
{
    if(isset($_SESSION['reterror']))
    {
        echo "<div class='text-center alert alert-danger'>". $_SESSION['reterror'] ."</div>";
        unset($_SESSION['reterror']);
    } 
      
}



?>

<script>
$('#modalDelete').on('show.bs.modal', function(e){
   $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>