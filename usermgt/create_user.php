<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mytravaly | Create user</title>
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
		include"../mytravalyAdmin/mtsidebar.php";
	?>	

	<!--Create User form-->
	<div class="col-md-9 col-lg-10">
			<?php
		include"user_header1.php";
	?>
		<div class="card">
			<div class="card-header">
				<h3> <i class="far fa-edit"></i>Create New User</h3>
				<hr>
			</div>
			<div class="card-body">
				<form style="background: #F4F4ED;" method="post">
					<div class="form-inline">
						<label for="" class="ml-4">Name &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </label><div class="clearfix"></div>
						<input type="text" name="user" class="form-control mb-4 mt-4 mx-auto" required placeholder="name" style="width: 35%;">
					</div>
					<div class="form-inline">
						<label for="" class="ml-4">Email &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
						<input type="email" name="email" class="form-control mb-4 mx-auto" required placeholder="email address" style="width: 35%;">
					</div>
					<div class="form-inline">
						<label for="" class="ml-4">userName  &nbsp;&nbsp;&nbsp;</label>
						<input type="text" name="uname" class="form-control mb-4 mx-auto" required placeholder="user name" style="width: 35%;">
					</div>
					<div class="form-inline">
						<label for="" class="ml-4">Password &nbsp;&nbsp;&nbsp;</label>
						<input type="password" name="pwd" class="form-control mb-4 mx-auto" required placeholder="password" style="width: 35%;">
					</div>
					<div class="form-inline">
						<label for="" class="ml-4">Confirm Pwd</label>
						<input type="password" name="conf_pass" class="form-control mb-4 mx-auto" required placeholder="password" style="width: 35%;">
					</div>
					<div class="form-inline">
						<label for="" class="ml-4">Designation</label>
						<select name="desg" id="" class="form-control mb-4 mx-auto" required placeholder="Designation" style="width: 35%;">
							<option value="">Select a Designation</option>
								<?php
									$sel_sql = "SELECT * FROM designations WHERE duserid = '$loginid'";
									$run = mysqli_query($con, $sel_sql);
									while ($rows = mysqli_fetch_assoc($run)) {
										# code...
										echo "<option value='$rows[desid]'>$rows[desname]</option>";
									}
								?>
						</select>
					</div>
					<div class="form-inline">
						<label for="" class="ml-4">Department</label>
						<select name="dep" id="" class="form-control mb-4 mx-auto" required placeholder="Department" style="width: 35%;">
							<option value="">Select a Department</option>
								<?php
									$sel_sql_d = "SELECT * FROM departments WHERE dpuserid = '$loginid'";
									$run_d = mysqli_query($con, $sel_sql_d);
									while ($drows = mysqli_fetch_assoc($run_d)) {
										# code...
										echo "<option value='$drows[depid]'>$drows[depname]</option>";
									}
								?>
						</select>
					</div>
					<div class="form-inline">
						<label for="" class="ml-4"> Role &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<select name="role" id="" class="mb-4 mx-auto" style="width: 35%; height: 35px;" required>
							<option value="">Select User role</option>
							<option value="User">user</option>
							<option value="Admin">admin</option>
						</select>
					</div>
					<div class="form-inline">
						<label for="" class="ml-4">Mobile &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<input type="number" name="num" class="form-control mb-4 mx-auto" required placeholder="mobile number" style="width: 35%;">
					</div>
					<div class="">
						<input type="submit" name="create_user" value="Create User" class="btn btn-success" style="width: 35%; margin-left: 37%">
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>

	<!--Footer part-->
	<?php
		//include"footer.php";
	?>
</body>
</html>

<?php
	//Saving a user to the database
	if(isset($_POST['create_user'])){
		$user = mysqli_real_escape_string($con, strip_tags($_POST['user']));
		$pass = mysqli_real_escape_string($con, strip_tags($_POST['pwd']));
		$conf_pass = mysqli_real_escape_string($con, strip_tags($_POST['conf_pass']));
		$email = mysqli_real_escape_string($con, strip_tags($_POST['email']));
		$mobile = mysqli_real_escape_string($con, strip_tags($_POST['num']));
		$username = mysqli_real_escape_string($con, strip_tags($_POST['uname']));
		$desig = mysqli_real_escape_string($con, strip_tags($_POST['desg']));
		$dep = mysqli_real_escape_string($con, strip_tags($_POST['dep']));
		$status = 0;
		//$prev;
		$role = mysqli_real_escape_string($con, strip_tags($_POST['role']));
		$hotelid = $_SESSION['user']['userid'];
		//$pic ;
		$date = date('Y-m-d');
		if ($pass !== $conf_pass) {
		      echo "<script>alert('Passwords do no match')</script>";
		    }else{

		  // first check the database to make sure
		  // a user does not already exist with the same username and/or email
		  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
		  $hresult = mysqli_query($con, $user_check_query);
		  $signup = mysqli_fetch_assoc($hresult);

		 
		  if ($signup) { // if user exists
		    if ($signup['email'] === $email) {
		      echo "<script>alert('Email already exists')</script>";
		    }
		  }else{
		  	$pass = password_hash($pass, PASSWORD_DEFAULT);//encrypt the password before saving in the database

		$ins_sql = "INSERT INTO users (name, email, password, username, mobile, designation, department, status, role, hotelid, dateofcreation) VALUES('$user', '$email', '$pass', '$username', '$mobile', '$desig', '$dep', '$status', '$role','$hotelid', '$date')";
		if(mysqli_query($con, $ins_sql)){
			echo "Save successfully";
		}else die("Something went wrong");}}
	}
?>