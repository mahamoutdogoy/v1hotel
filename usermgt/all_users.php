<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mytravaly | Users list</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	
	<!--<link href="alertifyjs/css/alertify.css" rel="stylesheet">
	<link href="alertifyjs/css/themes/default.css" rel="stylesheet" id="toggleCSS">
	<script src="alertifyjs/alertify.min.js"></script>-->


	<script>
	</script>

	<style>
	input[type=checkbox]{
		width: 70px;
	}
</style>

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
			<a href="create_user.php" class="btn btn-warning" style="margin: 20px;"><i class="fas fa-plus"></i> Create New User</a>
			<a  class="btn btn-warning" onclick="return userfunc();" style="margin: 20px;">Inhouse users</a>
			<a  class="btn btn-warning" onclick="return customfunc();" style="margin: 20px;">Customers</a>

			<!--Listing the Existing Users-->
			<div id="inhouseusers"  class="card">
				<div class="card-header">
					<h3><i class="fas fa-user-alt"> </i> List of existing Users</h3>
					<hr>
				</div>
				<div class="card-body">
					<table class="table-hover table-sm table-bordered text-center" style="width: 100%">
						<thead class="thead-light">
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Email</th>
								<th>UserName</th>
								<th>Designation</th>
								<th >Status</th>
								<th>Privileges</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sel_sql = "SELECT * FROM users WHERE hotelid = '$loginid'";//session
							$run=mysqli_query($con, $sel_sql);
							$ex = mysqli_query($con, "SELECT privilege FROM users WHERE userid= '$loginid'");
							$exr= mysqli_fetch_assoc($ex);
							$yes = explode(',', $exr['privilege']);
							$in = join(',', $yes);
							$in = trim($in, ',');
							$p_sel_sql = "SELECT * FROM privileges where preid IN ($in)";
							$c = 0;
							$id=0;
							while ($rows = mysqli_fetch_assoc($run)) {
								$c++;
								$active_txt = "Inactive";
								$active_cls = "btn-danger";
								if ($rows['status'] == 1) {
									$active_txt = "Active";
									$active_cls = "btn-success";
								}
								echo "<tr>
								<td>$c</td>
								<td>$rows[name]</td>
								<td>$rows[email]</td>
								<td>$rows[username]</td>
								<td>$rows[role]</td>
								<td><form action='' method='post' class='float-right w-100' ><input type='hidden' name='activeid' value='$rows[userid]'><input type='submit' value='$active_txt' class='btn $active_cls btn-sm btn-block'></form></td>
								<td>
								<button class='btn btn-primary btn-sm btn-block' data-toggle='modal' data-target='#prev_modal$rows[userid]' data-backdrop='static' data-keyboard='false'>privileges
								</button>
								<div  class='modal' id='prev_modal$rows[userid]'>
								<div class='modal-dialog modal-dialog-centered' >
								<div class='modal-content mx-auto'>
								<div class='modal-header' style='background:#f15025;color:white'>
								<div class='modal-title' style='margin-left: 30%'><h5>User privileges($rows[name])</h5></div>
								<button class='close' data-dismiss='modal'>&times;</button>
								</div>
								<div class='modal-body'>
								<form action='' method='post'> 
								<table class='table table-condensed table-borderless'>";
								$p_run=mysqli_query($con, $p_sel_sql);
								while ($p_rows = mysqli_fetch_assoc($p_run)) {
									$chk = ' ';
									$parr=explode(',',$rows['privilege']);
									for ($i=0; $i < (sizeof($parr)-1) ; $i++) { 
																# code...
										if($parr[$i]==$p_rows['preid']){
											$chk = 'checked';
										}
									}

									echo "<tr><td class='float-left'><label for='resmail'>$p_rows[prename]</label></td><td class='float-right border border-warning'><input type='checkbox' id='chid' name='chkbx$rows[userid][]' value='$p_rows[preid]' $chk></td></tr>";

								}			 
								echo "</table><input type='hidden' value='$rows[userid]' name='uprid'>
								<input type='submit' class='btn btn-success btn-lg' value='Submit' name='modal_sub'>
								</form>
								</div>
								</div>
								</div>
								</div>
								</td>
								<td><form action='' method='post' class='float-right'><input type='hidden' name='delid' value='$rows[userid]'><input type='submit' value='Delete' class='btn btn-danger btn-sm' onclick = 'return del_conf();'></form></td>
								</tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>

			<div id="customusers" class="card" style="display: none;">
				<div class="card-header">
					<h3><i class="fas fa-user-alt"> </i> List of Guests</h3>
					<hr>
				</div>
				<div class="card-body">
					<table class="table-hover table-sm table-bordered text-center" style="width: 100%">
						<thead class="thead-light">
							<tr>
								<th>No</th>
								<th>Guest Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Check_in</th>
								<th >Check_out</th>
								<th>Amount</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sel_sql_guest = "SELECT * FROM reservation WHERE property_id= '$loginid' ORDER BY reservationId DESC";;//sission
								$run_guest=mysqli_query($con, $sel_sql_guest);
								$c = 0;
								while ($guest_rows = mysqli_fetch_assoc($run_guest)) {
									$c++;
									echo "<tr>
									<td>$c</td>
									<td>$guest_rows[guestName]</td>
									<td>$guest_rows[email]</td>
									<td>$guest_rows[phoneNo]</td>
									<td>$guest_rows[check_in]</td>
									<td>$guest_rows[check_out]</td>
									<td>$guest_rows[total]</td>
									<td><form action='' method='post' class='float-right w-100' ><input type='hidden' name='guest_delid' value='$guest_rows[reservationId]'><input type='submit' value='Delete' class='btn btn-danger btn-sm btn-block' onclick = ' return del_conf();'></form></td></tr>";
								}

							?>
						</tbody>
					</table>
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

<!--Associating user with privileges -->
<?php	
if (isset($_POST['modal_sub'])) {
	$userid = $_POST['uprid'];
	$prev='';
	if (isset($_POST['chkbx'.$userid])) {
		foreach ($_POST['chkbx'.$userid] as $key) {
			# code...
			$prev = $prev.$key.',';
		}}
		$up_sql = "UPDATE users SET privilege = '$prev' WHERE userid = $userid AND hotelid = '$loginid'";
		if(mysqli_query($con, $up_sql)){?>
		<script>window.location = "all_users.php";</script>
		<?php
	}}
?>
	


<!--Deleting a record from Users table -->
<?php
if(isset($_POST['delid'])){
	$del_sql = "DELETE FROM users WHERE userid = '$_POST[delid]' AND hotelid = '$loginid'";
	if (mysqli_query($con, $del_sql)){?>
		<script>window.location = "all_users.php";</script>
		<?php
	}
}
	

//Deleting a record from reservation table 
if(isset($_POST['guest_delid'])){
	$del_sql_guest = "DELETE FROM reservation WHERE reservationId = '$_POST[guest_delid]' AND property_id = '$loginid'";
	if (mysqli_query($con, $del_sql_guest)){?>
		<script>window.location = "all_users.php";</script>
		<?php
	}
}


?>

<!--Activating or deactivating a user -->
<?php
if(isset($_POST['activeid'])){
	$sel_active ="SELECT status FROM users WHERE userid = '$_POST[activeid]' AND hotelid = '$loginid'";
	$run_active = mysqli_query($con, $sel_active);
	while ($active_rows = mysqli_fetch_assoc($run_active)) {
		if ($active_rows['status'] == 0) {
			$grant_sql = "UPDATE users SET status = 1 WHERE userid = '$_POST[activeid]' AND hotelid = '$loginid'";
			if (mysqli_query($con, $grant_sql)){?>
				<script>window.location = "all_users.php";</script>
				<?php
			}
		}else{
			$grant_sql = "UPDATE users SET status = 0 WHERE userid = '$_POST[activeid]' AND hotelid = '$loginid'";
			if (mysqli_query($con, $grant_sql)){?>
				<script>window.location = "all_users.php";</script>
				<?php
			}
		}
	}
}

?>

<script>function clicedit(id){
	document.getElementById('custid').value=id;
}
</script>