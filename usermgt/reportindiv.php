<?php
   include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mytravaly | Individual user report</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


</head>
<body>
	<!--Header part-->
	<?php
		//include"user_header1.php";
	?>
		<?php
		//include"sidebar.php";
	 ?>
	
	<div class="container-fluid">
<button class="btn btn-info m-4" id="printid" onclick="return myFunction();">Print this page</button>

<script>
function myFunction() {
	document.getElementById('printid').style.display = 'none'; 
  	window.print();
}
</script>
<?php
	if (isset($_POST['inuser'])) {
		$inu_sel = "SELECT username FROM users WHERE userid = '$_POST[inuser]'";
		$inu_run = mysqli_query($con, $inu_sel);
		$inu_row = mysqli_fetch_assoc($inu_run);
	}
	
?>
		
		<div class="card col-md-12">
				<div class="card-header"><h3><i class="fas fa-user-alt"> </i> Attendance list of <?php  echo $inu_row['username']; ?> from <?php if (isset($_POST['datefrom'])) {
					echo $_POST['datefrom'];
				} ?> to <?php if (isset($_POST['dateto'])) {
					echo $_POST['dateto'];
				}?></h3></div>	
				<div class="card-body">
					<table class="table table-sm col-md-12">
						<thead>
							<tr>
								<th>Username</th>
								<th>Date</th>
								<th>Time in</th>
								<th>Time out</th>
								<th>Working hour</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if (isset($_POST['reportindiv'])) {
									$uid = $_POST['inuser'];
									$rpt_sql = "SELECT * FROM attendance WHERE (attdate BETWEEN '$_POST[datefrom]' AND '$_POST[dateto]') AND (attuserid=$uid)";
									$rpt_run = mysqli_query($con, $rpt_sql);
									while ($rpt_rows = mysqli_fetch_assoc($rpt_run)) {
										$timein = date($rpt_rows['timein']);
										$timeout = date($rpt_rows['timeout']);
										$datetime1 = new DateTime($timein);
										$datetime2 = new DateTime($timeout);
										$interval = $datetime1->diff($datetime2);
										$work = $interval->format('%H:%I:%S');
										echo "<tr>
										<td>$inu_row[username]</td>
										<td>$rpt_rows[attdate]</td>
										<td>$rpt_rows[timein]</td>
										<td>$rpt_rows[timeout]</td>
										<td>$work</td>
										<td>$rpt_rows[attstatus]</td>
									</tr>";
									}
								}								

							?>
							
						</tbody>
					</table>
				</div>
			</div>

 </div>

	<!--Footer part-->
	<?php
		//include"footer.php";
	?>
</body>
</html>