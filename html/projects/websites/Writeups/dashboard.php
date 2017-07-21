<?php
include 'header.php';

  //Employee Count
  $result1 = queryMySQL('SELECT * FROM employees');
  $count1 = $result1->num_rows;

  //Writeup Count
  $result2 = queryMySQL('SELECT * FROM writeups');
  $count2 = $result2->num_rows;

  //Claim Count
  //$result3 = queryMySQL('SELECT * FROM claims');
  //$count3 = $result3->num_rows;

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary" style="box-shadow: 1px 1px 20px #337ab7;">
				<div class="panel-heading">
					<h2 class="text-center">View Employees</h2>
				</div>
				<div class="panel-body text-center">
					<i class="fa fa-user fa-4x"></i><br />
					<h3><?= $count1 ?> Employees</h3>
				</div>
				<div class="panel-footer" style="background-color: #FFF;">
					<a href="view_employees.php" style="text-decoration: none;"> 
					<button type="button" class="btn btn-primary center-block">View Employees</button>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel" style="background-color: #FFF; box-shadow: 1px 1px 20px #000;">
				<div class="panel-heading">
					<h2 class="text-center">View Writeups</h2>
				</div>

				<div class="panel-body text-center">
					<i class="fa fa-list-alt fa-4x"></i>
					<h3><?= $count2 ?> Writeups This Week</h3>
				</div>
				<div class="panel-footer" style="background-color: #FFF">
					<a href="view_writeups.php" style="text-decoration: none;">
						<button type="button" class="btn btn-default center-block">View Writeups</button>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-danger"  style="box-shadow: 1px 1px 20px #d9534f;">
				<div class="panel-heading" style="background-color: #d9534f; color: #FFF;">
					<h2 class="text-center">View Claims</h2>
				</div>
				<div class="panel-body text-center">
					<i class="fa fa-exclamation fa-4x"></i>
					<h3>Coming Soon</h3>
				</div>
				<div class="panel-footer" style="background-color: #FFF">
					<a href="view_claims.php" style="text-decoration: none;">
						<button type="button" class="btn btn-danger center-block">View Claims</button>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
