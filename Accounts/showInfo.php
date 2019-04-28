<?php 

include_once("../dbConnect.php");

if(isset($_GET['resref']))
{
	$query=mysqli_query($conn,"select guestName,email,phoneNo from reservation where res_Reference='$_GET[resref]'") or die(mysqli_error($conn));
	if(mysqli_num_rows($query)>0){
		$row=mysqli_fetch_array($query);
		echo '<h6>'.$row['guestName'].'</h6>
		<h6>'.$row['email'].'</h6>
		<h6>'.$row['phoneNo'].'</h6>';

	}
}
else if(isset($_GET['prop']))
{
	$query=mysqli_query($conn,"select pd.property_id,property_name,propertytype,resname,resemail,resphone from propertydetails pd, reservationmanager rm where pd.property_id='$_GET[prop]' and rm.property_id='$_GET[prop]'") or die(mysqli_error($conn));
	if(mysqli_num_rows($query)>0){
		$row=mysqli_fetch_array($query);
		echo '<h6> Id : '.$row['property_id'].'</h6>
		<h6> Name : '.$row['property_name'].'</h6>
		<h6> Type : '.$row['propertytype'].'</h6>
		<br><h5>Reservation Manager</h5> <hr>
		<h6> Name : '.$row['resname'].'</h6>
		<h6> Email : '.$row['resemail'].'</h6>
		<h6> Phone : '.$row['resphone'].'</h6>';
	}
	else{
		echo "string";
	}
}
else
{
	echo 'Oops..! <br> Something Go Wrong No Record Found ';
}
	


?>