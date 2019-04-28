<?php 
session_start();
include 'registration_cards_database.php';
$sql1="SELECT * FROM setting_invoice";
$res=mysqli_query($con,$sql1) or die(mysqli_error($con));
$row=mysqli_fetch_assoc($res);

$sql2="SELECT * FROM departure_info where folio= $_SESSION[folio]";
$res1=mysqli_query($con,$sql2) or die(mysqli_error($con));
$row1=mysqli_fetch_assoc($res1);

$sql3="SELECT * FROM international_registration where folio= $_SESSION[folio]";//it should come from guest session or guest id
$res3=mysqli_query($con,$sql3) or die(mysqli_error($con));
$row2=mysqli_fetch_assoc($res3);


$sql4="SELECT * FROM arrival_info where folio= $_SESSION[folio]";//it should come from guest session or guest id
$res4=mysqli_query($con,$sql4) or die(mysqli_error($con));
$row3=mysqli_fetch_assoc($res4);


$sql5="SELECT * FROM for_hotel_use";//it should come from guest session or guest id
$res5=mysqli_query($con,$sql5) or die(mysqli_error($con));
$row4=mysqli_fetch_assoc($res5);

$sql6="SELECT * FROM invoice where folioId= $_SESSION[folio]" ;//add on services
$res6=mysqli_query($con,$sql6) or die(mysqli_error($con));




$sql7="SELECT * FROM setting_invoice";
$res7=mysqli_query($con,$sql7) or die(mysqli_error($con));
$row6=mysqli_fetch_assoc($res7);

$sql8="SELECT * FROM reservation where folio_id= $_SESSION[folio]" ;
$res8=mysqli_query($con,$sql8) or die(mysqli_error($con));
$row7=mysqli_fetch_assoc($res8);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Print Invoice</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		
			<div class="row" style="margin-top: 30px;" >
				<div>
					<?php echo"<img src='data:image/jpeg;base64,".base64_encode($row6['logo'])."' style='width:200px;height:80px;margin-top: -20px;' class='img'/>" ?>


					<!-- <img  src="lakeside.png" style=" width: 200px;height: 200px;margin-top: -20px;"> -->
				</div>
				<div class="col-md-6 " style="background: #DCDCDC;" >
						
					<label class="mt-3">
						Name:
						<?php echo $row['property_name']?>

					</label> 
					<br>
					<label >
						Address:
						<?Php echo $row['property_address'] ?>
					</label>
					
				</div>
				
				<div class="col-md-3 " style="background: #DCDCDC;">
					<label class="mt-3">Tax_GST:
											<?php echo $row['tax_gst']; ?>
					</label>
					<br>
					<label >
						Invoice No:
						<?php

						echo $row['invoice_prefix'];
						$sql="SELECT invoice_no FROM invoice where folioId=$_SESSION[folio]";
						$res=mysqli_query($con,$sql);
						$row=mysqli_fetch_array($res);
						echo $row['invoice_no'];

						?>

					 </label>
					<br>
					<label>Dated:</label>
					<label id="date"></label>
					<script>
	
					var dt = new Date();
					document.getElementById("date").innerHTML = dt.toLocaleDateString();
					</script>

				</div>
				<div class="col-md-2" style="margin-left: 10px;"></div>
				<div class="col-md-4" > 
					<label >Bill to: 
						<?php echo $row1['bill_to']; ?>
					 </label>
					<br>

					<label>Email </label>
					<label><?php echo $_SESSION['guest_email']; ?></label>
					<br>
					<label >Phone:</label>
					<label><?php echo $_SESSION['phone']; ?></label>
					<br>
					<label >Tax/GST ID: 
						<?php echo $row2['Tax']; ?>
						
					</label>
					<br>
					<label >Address: </label>

				</div>
				<div class="col-md-5" >
					<label style="margin-left: 190px;" >Arrival date:
						<?php echo $row3['arrived_date']; ?>
					 </label>
					<br>
					<label style="margin-left: 190px;" >Arrival Time:
						<?php echo $row3['arrived_time']; ?>
					</label>
					<br>
					<label style="margin-left: 190px;" >Departure Date:
						<?php echo $row3['departure_date']; ?>
					 </label>
					<br>
					<label style="margin-left: 190px;" >Departure Time
						<?php echo $row3['departure_time']; ?>
					</label>
					<br>
					<label style="margin-left: 190px;" >Room type: 
						<?php echo $row4['room_type']; ?>
					</label>
					<br>
					<label style="margin-left: 190px;" >Room no:
						<?php echo $row4['room_no']; ?>
					 </label>
					<br>
					<label style="margin-left: 190px;" >Folio no: </label>
					<label> <?php echo $_SESSION['folio']; ?></label>
					<br>
					<label style="margin-left: 190px;" >Duty Manager:
					<?php echo $row4['duty_manager']; ?>

					 </label>

					
				</div>
			</div>
			
			<table class="table mt-3  table-bordered " >
				<tr style="background: tomato;">

					<th>
						Date
					</th>
					<th>
						Description
					</th>
					
					<th>
						Debit
					</th>
					<th>
						Credit
					</th>
				</tr>
				<tr>
					<td>
						<?php echo $row3['arrived_date'];; ?>
					</td>
					<td>
						Room Charges: 
					</td>
					
					<td>
						<?php
						$debit=0;
						$debit=$row7['total'];
						 echo $row7['total']; 
						 ?>

					</td>
					<td>
						<?php
						$credit=0;
						$credit=$row7['received_ammount'];
						 echo $row7['received_ammount']; 
						 ?>
					</td>
				</tr>
				
					
					<?php
					
					while($row5=mysqli_fetch_assoc($res6))
					{
						echo "<tr>";
						echo "<td>";
						echo $row5['debit_Dated'];
						echo "</td>";
						echo "<td>";
						echo $row5['description'];
						echo "</td>";
						
						echo "<td>";
						echo $row5['Charge'];
						$debit=$debit+$row5['Charge'];
						echo "</td>";
						echo "<td>";
						echo "....";
						echo "</td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td>";
						echo $row5['debit_Dated'];
						echo "</td>";
						echo "<td>";
						echo "<b>Tax</b>";
						echo "</td>";
						
						echo "<td>";
						echo $row5['tax_gst'];
						$debit=$debit+$row5['tax_gst'];
						echo "</td>";
						echo "<td>";
						echo "....";
						echo "</td></tr>";


					}
					
					$sql="SELECT * FROM invoice where folioId= $_SESSION[folio]" ;
					$res6=mysqli_query($con,$sql) or die(mysqli_error($con));
					while($row=mysqli_fetch_assoc($res6))
					{
					echo "<tr>";
						echo "<td>";
						echo $row['credit_date'];
						echo "</td>";
						echo "<td>";
						echo $row['note'];
						echo "</td>";
						
						echo "<td>";
						echo "....";
						echo "</td>";
						echo "<td>";
						echo $row['credit'];
						$credit=$row['credit'] + $credit;
						echo "</td></tr>";
						

					}
					?>
				<tr>
					<td>
						
					</td>
					
					<td>
						<b>Total</b>
					</td>
					<td>
					<b>	<?php echo $debit; ?></b>
					</td>
					<td>
						<b> <?php echo $credit; ?> </b>
					</td>
				</tr>

				<tr>
					<td>
						
					</td>
					<td>
						
					</td>
					
					<td >
						<b>Balance</b>
					</td>
					<td>
						<b> <?php echo $debit - $credit; ?> </b>
					</td>
				</tr>
				<?php

				/*if(!$debit )
				{	$debit=0;
					
				}
				else
				{*/
					$_SESSION['final_debit']=$debit;
				/*}
				if(!$credit)
				{
					$credit=0;
					$_SESSION['final_credit']=$credit;
				}
				else
				{*/
					$_SESSION['final_credit']=$credit;
				/*}
				if(!$debit Or !$credit)
				{
					$credit=0;
					$debit=0;
					$_SESSION['final_balance']=$debit-$credit;	
				}
				else
				{*/
					$_SESSION['final_balance']=$debit-$credit;
				//}
				
				?>

			</table>
	<center>
       <div>
          <button type="button" class="btn btn-danger btn-lg" id="print" style="border-radius: 25px;width: 150px;margin-top: 20px;margin-bottom: 20px;" onclick="Print();">Print</button>
       </div>
   </center>
        
      
  

<script type="text/javascript">
	function Print() 
	{
		document.getElementById('print').style.display='none';
		window.print();
	}
</script>

	</div>
</body>
</html>