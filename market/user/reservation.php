<?php
	include 'connect.php';
	if(!isset($_SESSION['user_id'])){
        header("location: login.php");
    }?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<title>My reservations</title>

<style>
	#reserv{
        box-shadow: 10px 10px 15px #e6e6e6;
        border-radius: 10px;
        padding: 3%;
    } 

</style>

<div class="container bg-light h-100" id="reserv">
<a href="index.php" class="m-3 btn btn-warning"><i class="fa fa-backward"></i> Back</a>
<table class="table table-hover mt-3 table-sm table-bordered text-center bg-light" style="width: 100%">
	<thead class="text-light bg-info" style="background: #f15025;">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Reservation Date</th>
			<th>Check In Date</th>
			<th>Check Out Date</th>
			<th>Amount</th>
			<th>Status</th>
			<th>Cancel</th>
		</tr>
	</thead>
	<tbody>
<?php
	$gid = $_SESSION['user_id'];
	$res_sql = "SELECT * FROM reservation WHERE folio_id = '$gid' ORDER BY reservationId DESC";
	$res_run = mysqli_query($con, $res_sql);
	$c = 0;
	while ($res_rows = mysqli_fetch_assoc($res_run)) {
		$status = "Pending...";
		$status_cls = "bg-warning";
		$cancel = 'Cancel';
		$cancel_cls ='btn-danger';
		$ccls = '';
		if ($res_rows['status'] == 0) {
			$status = "Closed...";
			$status_cls = "bg-secondary";
			$ccls = "invisible";
		}elseif ($res_rows['status'] == 1) {
			$status = "Conformed!";
			$status_cls = "bg-success";
		}elseif ($res_rows['status'] == 3) {
			$status = "Cancelled.";
			$status_cls = "bg-danger";
			$ccls = "invisible";
		}
		$c++;
		echo "<tr>
			<td>$c</td>
			<td>$res_rows[guestName]</td>
			<td>$res_rows[reservationDate]</td>
			<td>$res_rows[check_in]</td>
			<td>$res_rows[check_out]</td>
			<td>$res_rows[price]</td>
			<td class='$status_cls text-white'>$status</td>
			<td>
				<form method='post' class='m-0'> 
					<input type='hidden' name='cancelid' value='$res_rows[reservationId]'>
					<input type='submit' value='$cancel' class='btn btn-sm btn-block $cancel_cls $ccls' onclick = 'return can_conf();'></form>
			</td>
		</tr>";
	}


	if(isset($_POST['cancelid'])){
		$cancel_sql = "UPDATE reservation SET status = 3 WHERE folio_id = '$gid' AND reservationId = '$_POST[cancelid]'";
		if (mysqli_query($con, $cancel_sql)){?>
			<script>window.location = "reservation.php";</script>
			<?php
		}
	}
?>
</tbody>
</table>

<script>
	function can_conf(){
  		return confirm("WARNING!!! Are you sure you want to cancel this booking, it is not possible to you to undo this again???");
}
</script>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>