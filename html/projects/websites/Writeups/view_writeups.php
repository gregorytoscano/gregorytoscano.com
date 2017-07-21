<?php
ob_start();
include 'header.php';

  $result = queryMySQL("SELECT * FROM writeups");
  $count = $result->num_rows;
  $_SESSION['retwerror'] = 'No Writeups Found';

if ($count > 0)
{
  echo "<div class='container'>
          <div class='row'>
            <div class='col-md-2'></div>
            <div class='col-md-8'>
              <h2 class='text-center'>Writeups</h2>
		          <table class='table table-hover table-responsive'>
			         <thead>
          				<th>Name</th>
                  <th>Position</th>
          				<th>Shift</th>
          				<th>Category</th>
                  <th>Issued</th>
                  <th class='text-center'>Details</th>
			         </thead>";
            	while($wRow = $result->fetch_assoc())
              {
              		$id = $wRow['id'];
                  $emp_name = $wRow['emp_name'];
              		$position = $wRow['position'];
              		$shift = $wRow['shift'];
                  $category = $wRow['category'];
                  $issued = $wRow['issued'];
                  $details = $wRow['details'];


            	    echo "<tbody>";
                  echo "<tr>";
                  echo "<td>" . $emp_name . "</td>";
                  echo "<td>" . $position . "</td>";
                  echo "<td>" . $shift . "</td>";
                  echo "<td>" . $category . "</td>";
                  echo "<td>" . $issued . "</td>";
                  echo "<td>" . $details . "</td>";
                  echo "<td><a href='edit_writeup.php?id='$wRow[id]' style='color: #000; text-decoration: none;'><span class='fa fa-pencil'></span></a>&nbsp; &nbsp;
                  <a data-href='delete_writeup.php?id=$id' data-toggle='modal' data-target='#modalDelete' style='color: #000; text-decoration: none; cursor:pointer;'><span class='fa fa-close'></span></a></td>";
                  echo "<div class='modal fade modal-danger' id='modalDelete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header' style='background-color: #d9534f; color: #FFF;'>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                                <h4 class='modal-title text-center' id='myModalLabel'>Delete Confirmation</h4>
                                            </div>
                                            <div class='modal-body'>
                                                <p class='text-center'><strong>This action cannot be undone.</strong></p>
                                                <p class='text-center'>Are you sure you wish to delete this writeup?</p>          
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
              echo "</tbody></table></div><div class='col-md-2'</div></div>";
              
}
else 
{
    if(isset($_SESSION['retwerror']))
    {
        echo "<div class='text-center alert alert-danger'>". $_SESSION['retwerror'] ."</div>";
        unset($_SESSION['retwerror']);
    } 
      
}



?>

<script>
$('#modalDelete').on('show.bs.modal', function(e){
   $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>