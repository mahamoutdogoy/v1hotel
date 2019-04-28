<?php
include_once("../dbConnect.php");
if(isset($_POST['update_invoice']))
{
	$update_query="update invoice set transactionDate='$_POST[t_date]',transactionReference='$_POST[t_ref]',transactionFees='$_POST[t_fees]',transferredAmount='$_POST[t_amount]',Status='Paid' where res_reference='$_POST[res_ref]'";
	if(mysqli_query($conn,$update_query)or die(mysqli_error($conn)))
	{
		echo "updated successfully";
	}
	else
	{
		echo "not updated successfully";
	}
}
?>