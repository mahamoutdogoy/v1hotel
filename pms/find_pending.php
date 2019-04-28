<?php 
session_start();
include_once("registration_cards_database.php");
if(isset($_GET['invoc']))
{
$sql="SELECT * FROM invoice WHERE folioId='$_SESSION[folio]' AND (credit is NULL or credit<debit) and invoice_no='$_GET[invoc]'";
							$res1=mysqli_query($con,$sql);
							$row1=mysqli_fetch_assoc($res1);
							if($row1['credit']==NULL)
								echo "<input type='hidden' id='p_bal' value='".$row1['debit']."' >";
							else
								echo "<input type='hidden' id='p_bal' value='".($row1['debit'] - $row1['credit'])."' >";
}
else if(isset($_GET['res_id']))
{
	$sql="SELECT * FROM reservation WHERE folio_id='$_SESSION[folio]' AND (received_ammount < total) and reservationId='$_GET[res_id]'";

							$res1=mysqli_query($con,$sql)or die(mysqli_error($con));
							
							$row1=mysqli_fetch_assoc($res1);
							if($row1['received_ammount']==NULL)
								echo "<input type='hidden' id='p_bal' value='0' >";
							else
								echo '<input type="hidden" id="p_bal" value="'.($row1['total'] - $row1['received_ammount']).'" />';

						
}
?>