
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mytravaly | User management</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">




</head>

<script>

	function v_func() {
		var x = document.getElementById("indiv_report");
  		var x2 = document.getElementById("summary_report");
   		if (window.getComputedStyle(x2).display === "block") {
    	x2.style.display = "none";

  		}
  		if (window.getComputedStyle(x).display === "none") {
    		x.style.display = "block";
  		}
	}
	function v_func1() {
		var x = document.getElementById("indiv_report");
  		var x2 = document.getElementById("summary_report");
   		if (window.getComputedStyle(x).display === "block") {
    	x.style.display = "none";
  		}
  		if (window.getComputedStyle(x2).display === "none") {
    		x2.style.display = "block";
  		}
	}

	//punch in/out function
	function punch() {
	  var x = document.getElementById("in_out");
	  if (x.innerHTML === "Punch out") {
	  	var d = new Date();
		var h = d.getHours();
		var m = d.getMinutes();
		var n = h+":"+m
	    return confirm("It is "+n+" and you are punching out");
	  } 
	}

	function setMaxDate(){
    var val = document.getElementById('datefrom').value;
    document.getElementById('dateto').min = val;
  }


	function setMaxDateS(){
    var vals = document.getElementById('datefromsum').value;
    document.getElementById('datetosum').min = vals;
  }
</script>

<script type="text/javascript">
	


</script>


<body>
	<!--Header part-->
	   
	
	<!-- <div class="container"> -->
		<?php
		 include '../mytravalyAdmin/myheader.php';
		include"../mytravalyAdmin/mtsidebar.php";

	 ?>
	 <div class="col-md-9 col-lg-10" >
	 	<?php
		include"user_header1.php";
	?>
	
			<?php
				$inf_sql="SELECT username FROM users WHERE punchin=1 AND hotelid = '$loginid'";
				$inf_run = mysqli_query($con, $inf_sql);
				$inf_ver=0;
				$inf_rows = mysqli_fetch_assoc($inf_run);
				if ($inf_rows) {
					$inf_ver=1;
					echo "<div class='dropdown alert alert-info'>
					<ul class='dropdown-menu fade in'>";}
					$inf_run = mysqli_query($con, $inf_sql);
					$c = 0;
					while ($inf_rows=mysqli_fetch_assoc($inf_run)) {
						echo "<li class='text-center alert alert-info '>$inf_rows[username]<li>";
						$c++;

					}
					if($inf_ver){
					echo "</ul><span class='w-75' data-toggle='dropdown'><strong>$c</strong> Users are present today</span><span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
				}

				$abs_sql="SELECT username FROM users WHERE punchin=0 AND hotelid = '$loginid'";
				$abs_run = mysqli_query($con, $abs_sql);
				$abs_ver=0;
				$abs_rows = mysqli_fetch_assoc($abs_run);
				if ($abs_rows) {
					$abs_ver=1;
					echo "<div class='dropdown alert alert-warning'>
					<ul class='dropdown-menu fade in'>";}
					$abs_run = mysqli_query($con, $abs_sql);
					$c = 0;
					while ($abs_rows=mysqli_fetch_assoc($abs_run)) {
						echo "<li class='text-center alert alert-warning'>$abs_rows[username]<li>";
						$c++;

					}
					if($abs_ver){
					echo "</ul><span class='w-75 ' data-toggle='dropdown'><strong>$c</strong> Users are still not present </span><span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
					}
			?>
		<div class="card">
			<div class="card-header">
				<h4>Welcome</h4>
			</div>
			<div class="card-body">
				<h2>Welcome to the User Management Dashboard  <?php echo $_SESSION['user']['username'];?> </h2>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-4">
			<div class="card" style="height: 260px;">
					<div class="card-header">
						<i class="far fa-list-alt"></i> Punch In/Out</div>	
					<div class="card-body">
						<form method="POST"> 
						<?php
							$psql ="SELECT punchin FROM users WHERE userid=".$_SESSION['user']['userid']; //session
							$prun =mysqli_query($con, $psql);
							$prows = mysqli_fetch_assoc($prun);
							$pch='';
							if ($prows['punchin']==0) {
								$pch="Punch in";
							}else{
								$pch="Punch out";
							}
							echo "<button type='submit' name='punchinout' onclick='return punch();' id='in_out' class='btn btn-success btn-block'>$pch</button>";
						?>
					</form>
					</div>
			</div>
			</div>
			<div class="col-md-4">
			<div class="card ml-2" style="height: 260px;" >
					<div class="card-header">
						<i class="far fa-list-alt"></i> Attendance Reports</div>	
					<div class="card-body">
						<div class="dropdown">
							<button class="btn btn-warning dropdown-toggle btn-block" data-toggle="dropdown">Reports</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" onclick="v_func();" href="#">Individual Report </a>
								<a onclick="v_func1();" href="#" class="dropdown-item">Summary Report</a>
							</div>
						</div>
					</div>
			</div>
			</div>
			<div class="col-md-4" id="indiv_report" style="display:none;">
			<div class="card ml-2">
					<div class="card-header">
						<i class="far fa-list-alt"></i> Individual Report</div>	
					<div class="card-body">
						<form action="reportindiv.php" method="post">
						<div class="form-group">
						<label for="">From</label><input id="datefrom" name="datefrom" type="date" value="<?php echo date('Y-m-d');?>" style="margin: 0 0 20px 20px;" max="<?php echo date('Y-m-d');?>">
						</div>
						<div class="form-group">
						<label for="">To</label>
						<input name="dateto" id="dateto" type="date" value="<?php echo date('Y-m-d');?>" style="margin: 0 0 20px 35px;" max="<?php echo date('Y-m-d');?>" onclick="return setMaxDate();">
						</div>
						<div class="form-inline">
						<label for="">User</label>
							<select name="inuser" required style="margin-left: 20px; height: 40px;">
								<option value="">Select a user</option>
								<?php
									$inuser_sel="SELECT userid, username FROM users WHERE hotelid = '$loginid'";
									$inuser_run = mysqli_query($con, $inuser_sel);
									while ($inuser_rows=mysqli_fetch_assoc($inuser_run)) {
										echo "<option value='$inuser_rows[userid]'>$inuser_rows[username]</option>";
									}
								?>								
							</select>
						<input type="submit" name="reportindiv" class="btn btn-primary ml-2" value="Report">
						</div>
						</form>
						

					</div>
			</div>
			</div>
			<div class="col-md-4" id="summary_report" style="display: none;">
			<div class="card ml-2">
					<div class="card-header">
						<i class="far fa-list-alt"></i> Summary Report</div>	
					<div class="card-body">
						<form action="reportsum.php" method="post">
						<div class="form-group">
						<label for="">From</label><input id="datefromsum" name="datefromsum" type="date" value="<?php echo date('Y-m-d');?>" style="margin: 0 0 20px 20px;" max="<?php echo date('Y-m-d')?>">
						</div>
						<div class="form-group">
						<label for="">To</label>
						<input id="datetosum" name="datetosum" type="date" value="<?php echo date('Y-m-d');?>" style="margin: 0 0 20px 35px;" max="<?php echo date('Y-m-d')?>" onclick="return setMaxDateS();" >
						<input name="reportsum" type="submit" value="Report" class="btn btn-primary ml-5">
						</div>
						</form>
					</div>
			</div>
			</div>
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
	if(isset($_POST['punchinout'])){
		$thisdate;
		$a_sel_p ="SELECT punchin FROM users WHERE userid =".$_SESSION['user']['userid']; //session
		$a_run_p = mysqli_query($con, $a_sel_p);
		$p_rows = mysqli_fetch_assoc($a_run_p);
		if ($p_rows['punchin'] == 0) {
			$attdate = date('Y-m-d');
			$timein = date('H:i');
			$sel_att1 ="SELECT *  FROM attendance WHERE attuserid =".$_SESSION['user']['userid']; //session
			$run_att1 = mysqli_query($con, $sel_att1);
			$a=mysqli_fetch_assoc($run_att1);
			if(gettype($a)!="NULL"){

			$sel_att ="SELECT MAX(attdate) AS attdate FROM attendance WHERE attuserid =".$_SESSION['user']['userid']; //session
			$run_att = mysqli_query($con, $sel_att);
			while($att_rows = mysqli_fetch_assoc($run_att)){
				$thisdate=$att_rows['attdate'];	
				$diff =(strtotime($attdate)-strtotime($att_rows['attdate']));
			}
			

			$days = $diff/(60*60*24);
			
			if ($days > 1) {
				$monthdate = date('Y-m-d', strtotime($attdate.' -'.$days.' day'));
				
				$sel_hol ="SELECT holdate FROM holidays WHERE (holdate BETWEEN '$monthdate' AND '$attdate') AND huserid = '$loginid'";
				
				//session

		$sel_app ="SELECT appdate FROM leave_application WHERE (appdate BETWEEN '$monthdate' AND '$attdate') AND (appuserid =".$_SESSION['user']['userid'] ." AND appstatus=1)"; 
				
				
				$prevdate = date('Y-m-d', strtotime($attdate.' -1 day'));
				while ($prevdate!=$thisdate) {
					$run_app = mysqli_query($con, $sel_app);
					while ($app_rows = mysqli_fetch_assoc($run_app)) {
						if ($prevdate==$app_rows['appdate']) {
							goto inc;
						}else{
							goto hol;
						}
					}
					hol:{
					$run_hol = mysqli_query($con, $sel_hol);
					while ($hol_rows = mysqli_fetch_assoc($run_hol)) {
						if ($prevdate==$hol_rows['holdate']) {
							goto inc;
						}else{
							goto week;
						}
					}}
					week: {
					$weekend = date("l", strtotime($prevdate));
					if ($weekend=="Sunday" || $weekend=="Saturday" ) {
						goto inc;
					}else{
						$atab_ins = "INSERT INTO attendance(attuserid, attdate, attstatus) VALUES (".$_SESSION['user']['userid'].", '$prevdate', 'Absent')";  //session
						mysqli_query($con, $atab_ins);
						goto inc;

					}}
					inc:
					$prevdate = date('Y-m-d', strtotime($prevdate.' -1 day'));
				}
			}}

			$at_ins = "INSERT INTO attendance(attuserid, timein, attdate, attstatus) VALUES (".$_SESSION['user']['userid'].", '$timein', '$attdate', 'Present')";  //session
			mysqli_query($con, $at_ins);
			$punchin_sql = "UPDATE users SET punchin = 1 WHERE userid = ".$_SESSION['user']['userid']; //session
			if (mysqli_query($con, $punchin_sql)){?>
				<script>window.location = "user_main1.php";</script>
				<?php
			}
		}else{
			$attdate = date('Y-m-d');
			$timeout = date('H:i');
			$atid_run=mysqli_query($con,"SELECT MAX(attid) AS maxid FROM attendance WHERE attuserid=".$_SESSION['user']['userid']); //session
			$atid_rows = mysqli_fetch_assoc($atid_run);
			$atid = $atid_rows['maxid'];
			$at_up = "UPDATE attendance SET timeout='$timeout' WHERE attid=$atid";
			mysqli_query($con, $at_up);
			$punchin_sql = "UPDATE users SET punchin = 0 WHERE userid =".$_SESSION['user']['userid']; //session
			if (mysqli_query($con, $punchin_sql)){?>
				<script>window.location = "user_main1.php";</script>
				<?php
			}
		}
	}
?>