<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mytravaly | Department and designation</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


	<script>
	</script>

</head>
<body>
	<!--Header part-->
	
	<?php
	include '../mytravalyAdmin/myheader.php';
		include"../mytravalyAdmin/mtsidebar.php";	?>

	<!--Create User form-->
	<div class="col-md-9 col-lg-10">
		<?php
		include"user_header1.php";
	?>
		<div class="row">
		<div class="card col-md-6">
			<div class="card-header">
				<h3 "> <i class="far fa-edit"></i> Create new Designation</h3>
				<hr>
			</div>
			<div class="card-body">
				<form method="POST" style="margin-left: 10%" class="col-md-8">
					<div class="form-group">
						<label for="" style="margin-left: 30%" class="font-weight-bold">Designation Name</label>
						<input type="text" name="desg" class="form-control mx-auto" required placeholder="Designation name" style="width: 75%;">
					</div>
				
					<div class="form-group" class="text-center" style="margin-left: 35%">
						<input type="submit" name="createDesg" value="Create" class=" btn btn-success">
					</div>
				</form>

		</div>
		</div>

		<div class="card col-md-6">
			<div class="card-header">
				<h3 "> <i class="far fa-edit"></i> Create new Department</h3>
				<hr>
			</div>
			<div class="card-body">
				<form method="POST" style="margin-left: 10%" class="col-md-8">
					<div class="form-group">
						<label for="" style="margin-left: 30%" class="font-weight-bold">Department Name</label>
						<input type="text" name="dep" class="form-control mx-auto" required placeholder="Department name" style="width: 75%;">
					</div>
					<div class="form-group" class="text-center" style="margin-left: 35%">
						<input type="submit" name="createDep" value="Create" class=" btn btn-success">
					</div>
				</form>
				</div>
		</div>
		</div>

		<div class="row">
		<div class="card col-md-6" style="margin-top: 25px;">
				<div class="card-header"><h3><i class="fas fa-user-alt"> </i> List of existing Designation</h3></div>	
				<div class="card-body">
					<table class="table table-sm col-md-12 table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Designation</th>
								<td>Delete</td>
							</tr>
						</thead>
						<tbody>
							<?php
								$sel_sql = "SELECT * FROM designations WHERE duserid = '$loginid' ORDER BY desid DESC";
								$run=mysqli_query($con, $sel_sql);
								$c = 0;
								while ($rows = mysqli_fetch_assoc($run)) {
									$c++;
									echo "<tr>
									<td>$c</td>
									<td>$rows[desname]</td>
									<td><form action='' method='post' class='float-right'><input type='hidden' name='delid' value='$rows[desid]'><input type='submit' value='Delete' name ='del_des' class='btn btn-danger btn-sm' onclick = 'return del_conf();'></form></td>
									</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card col-md-6" style="margin-top: 25px;">
				<div class="card-header"><h3><i class="fas fa-user-alt"> </i> List of existing Department</h3></div>	
				<div class="card-body">
					<table class="table table-sm col-md-12 table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Department</th>
								<td>Delete</td>
							</tr>
						</thead>
						<tbody>
							<?php
								$sel_sql_d = "SELECT * FROM departments WHERE dpuserid = '$loginid
								' ORDER BY depid DESC";
								$run_d=mysqli_query($con, $sel_sql_d);
								$c = 0;
								while ($drows = mysqli_fetch_assoc($run_d)) {
									$c++;
									echo "<tr>
									<td>$c</td>
									<td>$drows[depname]</td>
									<td><form action='' method='post' class='float-right'><input type='hidden' name='delidd' value='$drows[depid]'><input type='submit' value='Delete' name='del_deprt' class='btn btn-danger btn-sm' onclick = 'return del_conf();'></form></td>
									</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
			</div>
	</div>
	</div></div>

	<!--Footer part-->
	<?php
		//include"footer.php";
	?>
</body>
</html>

<!--Inserting data into the designation table -->
<?php
	if(isset($_POST['createDesg'])){
		$desg = mysqli_real_escape_string($con, strip_tags($_POST['desg']));
		$ins_sql = "INSERT INTO designations (duserid, desname) VALUES ('$loginid', '$desg')";
		if (mysqli_query($con, $ins_sql)){?>
			<script>window.location = "designation.php";</script>
			<?php
		}
	}
?>


<!--Deleting a record from designation table -->
<?php
	if(isset($_POST['del_des'])){
		$del_sql = "DELETE FROM designations WHERE desid = '$_POST[delid]' AND duserid = '$loginid'";
		if (mysqli_query($con, $del_sql)){?>
			<script>window.location = "designation.php";</script>
			<?php
		}
	}
?>


<!--Inserting data into the department table -->
<?php
	if(isset($_POST['createDep'])){
		$dep = mysqli_real_escape_string($con, strip_tags($_POST['dep']));
		$ins_sql_d = "INSERT INTO departments (dpuserid, depname) VALUES ('$loginid', '$dep')";
		if (mysqli_query($con, $ins_sql_d)){?>
			<script>window.location = "designation.php";</script>
			<?php
		}
	}
?>


<!--Deleting a record from department table -->
<?php
	if(isset($_POST['del_deprt'])){
		$del_sql_d = "DELETE FROM departments WHERE depid = '$_POST[delidd]' AND dpuserid = '$loginid'";
		if (mysqli_query($con, $del_sql_d)){?>
			<script>window.location = "designation.php";</script>
			<?php
		}
	}
?>