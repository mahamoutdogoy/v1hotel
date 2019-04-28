<?php
session_start();
include_once("../dbConnect.php");
$request_status='Not Yet Initiated';


?>
<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<style type="text/css">

	</style>

</head>
<body>
	
	<?php
	 include_once("myheader.php"); 
	include_once("mtsidebar.php"); 	
	?>
	
		
		
		
			<div class="col-md-9 col-lg-10 ">
				<div>
				
				<i class="fas fa-chevron-circle-left  fa-2x" style="color: #5bc0de" onclick="window.location='mt_account_dashboard.php'" ></i>
				
			</div>
				<form action="process_invoice_code.php" method="post">
					<input type="hidden" name="res_ref" value='<?php echo $_POST['res_ref']; ?>' >
				<?php 
				 $query=mysqli_query($conn,"select * from invoice where PropertyId='".$_SESSION['user']['hotelid']."' and res_reference='$_POST[res_ref]'") or die(mysqli_error($conn));
				 if(mysqli_num_rows($query)>0){
				 	
				 	$row=mysqli_fetch_array($query);
				 	$request_status=$row['Status'];
				 	$max_inv=$row['InvoiceId'];
				 	if(strcasecmp(trim($request_status), "Paid")==0)
				 	{
				 		echo '<div class="row  ml-1 p-3" style="color:green;border-radius:10px;border:solid 2px green"><i class="far fa-check-circle fa-2x pt-2" ></i><h3 class="ml-5 pt-2">Paid...</h3>  </div>';
				 		global $t_date;
				 		global $t_ref;
				 		global $t_fees;
				 		global $t_amount;
				 		$t_date=$row['transactionDate'];
				 		$t_ref=$row['transactionReference'];
				 		$t_fees=$row['transactionFees'];
				 		$t_amount=$row['transferredAmount'];

				 	}
				 	
				 	
				 	
				 }
				 ?>
				<div class="row ml-1 mt-4">
            
			<div class="col-md-5  " >
				 <?php 


			
				

				$query=mysqli_query($conn,"SELECT res_Reference,property_id, guestName,  channel, reservation_date, check_in, check_out,sum(price) as price,sum(tax) as tax, sum(total) as total, sum(received_amount) as received, payment_mode  FROM `reservation` WHERE status=1 and res_Reference='".$_POST['res_ref']."' GROUP BY  res_Reference")or die(mysqli_error($conn));
				if(mysqli_num_rows($query))
				{
					$row=mysqli_fetch_array($query);

					$query2=mysqli_query($conn,"select * from propertydetails where property_id=".$row['property_id']) or die(mysqli_error($conn));
					//echo $row['property_id'];
					//print_r($query2);
					if (mysqli_num_rows($query2)) {
						$row2=mysqli_fetch_array($query2);
					?>
					<h3>Hotel Info</h3>
					<div class="row">
					<div class="col-md-4 mt-2">Hotel Name</div> 
					<div class="col-md-6 mt-2"><?php echo $row2['property_name']; ?>
						<input type="hidden" name="hotel_name" value='<?php echo $row2['property_name']; ?>'></div>
					<?php
					$query1=mysqli_query($conn,"select * from reservationmanager where property_id=".$row['property_id']) or die(mysqli_error($conn));
					if (mysqli_num_rows($query1)>0) {
						$row1=mysqli_fetch_array($query1);
						
						?>
						 <div class="col-md-4 mt-2">Email</div>
						<div class="col-md-6 mt-2"><?php echo $row1['resemail']; ?></div>
						<div class="col-md-4 mt-2">Phone</div>
						<div class="col-md-6 mt-2"><?php echo $row1['resphone']; ?></div>  
					<?php 
					}
					 
					 ?>
					 <div class="col-md-4 mt-2">Tax/GST</div>
						<div class="col-md-6 mt-2">abc123</div>
					</div>
					
					<!-- /*$query1=mysqli_query($conn,"select * from address where property_id=".$row['property_id']) or die(mysqli_error($conn));
					if (mysqli_num_rows($query1)) {
						$row1=mysqli_fetch_array($query1);
					echo '<tr> <td>Address </td> <td>'.$row2['property_name'].',<br>'.$row1['street'].",".$row1['city'].",".$row1['state'].",".$row1['zipcode']."<br>".$row1['country'].'</td> </tr>';
				}*/ -->
				<?php
				}
			?> 				
			</div>
			<div class="col-md-7 float-right pl-3" >
					<?php	
					if($request_status=='Not Yet Initiated')
					{
						$query1=mysqli_query($conn,"SELECT max(InvoiceNo) as max FROM invoice ");
					if(mysqli_num_rows($query1))
					{
						$row1=mysqli_fetch_array($query1);
						
						
						$max_inv="MT#".$_SESSION['user']['hotelid']."-".($row1['max']+1);
						//print_r($id);Cin'mt#hotelid-123;
					}
					 else 
					{
						$max_inv="MT#".$_SESSION['user']['hotelid']."-1";	
					}

				}

				?>
						<h2>Invoice Number : <?php echo $max_inv; ?></h2>
						<input type="hidden" name="inv_id" value='<?php echo $max_inv; ?>'>
						<div class="row">
							<div class="col-md-3 mt-2">
								Bill To
							</div>
							<div class="col-md-8 mt-2">
								Mytravaly Worldwide Travel Technology Pvt. Ltd.
							</div>
							<div class="col-md-3 mt-2">
								CIN
							</div>
							<div class="col-md-8 mt-2">
								*******
							</div>
							<div class="col-md-3 mt-2">
								Tax/GST
							</div>
							<div class="col-md-8 mt-2">
								abc123
							</div>
							<div class="col-md-3 mt-2">
								Email
							</div>
							<div class="col-md-8 mt-2">
								payment@mytravaly.com
							</div>
						</div>
			</div>
		</div>
		
		<h3 class="ml-3 mt-3">Guest Details</h3>
		<div class="row   ml-1 mt-3" style="border-radius: 10px;font-weight: bold;">
			
					<?php
					
					echo '<div class="col-md-3 p-3">&emsp;Guest Name  <spna class="float-right pr-1">: '.$row['guestName'].' </span></div>
					<div class="col-md-3 p-3 pr-1">&emsp;Date of Booking  <spna class="float-right pr-1">: '.$row['reservation_date'].'</span></div>
					<div class="col-md-3 p-3">&emsp;Check in  <spna class="float-right pr-1">: '.$row['check_in'].' </span></div>
					<div class="col-md-3 p-3">&emsp;Check out  <spna class="float-right pr-1">: '.$row['check_out'].' </span></div>';
					 ?>
					 <input type="hidden" name="g_name" value='<?php echo $row['guestName']; ?>' >
					 <input type="hidden" name="cin" value='<?php echo $row['check_in']; ?>' >
				</div>
			<?php
	
			 }

			?> 
				
			

	
	<div>
		<hr>
		<div>
			<br>
			<table  class="table">
			<?php	$query=mysqli_query($conn,"select * from reservation where res_Reference=".$_POST['res_ref']) or die(mysqli_error($conn));

			?>
        <thead>
           <tr class="bg-warning">                
                <th style="border-radius: 10px 0px 0px 10px ">Room</th>
                <th>Price</th>
                <th>Tax/GST</th>
                <th>Total</th>
                <th>Payable</th>
                <th style="border-radius: 0px 10px 10px 0px ">Status</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
        	$price=0;
        	$tax=0;
        	$total=0;
        		if(mysqli_num_rows($query))
        		{
        			$i=0;
        			while ($row=mysqli_fetch_array($query)) {
        				echo '<tr><td>'.(++$i).'</td>
        				<td>'.$row['price'].'</td>
        				<td>'.$row['tax'].'</td>
        				<td>'.$row['total'].'</td>
        				<td>****</td><td>'.$request_status.' </td></tr>';
        				$price+=$row['price'];
        				$tax+=$row['tax'];
        				$total+=$row['total'];
        			}
        		}
        	?>
        	<tr ><td colspan="4"></td><td ><b>Price</b></td><td><b><?php echo $price;?></b></td></tr>
        	<tr><td colspan="4"></td><td ><b>Tax/GST</b></td><td><b><?php echo $tax;?></b></td></tr>
        	<tr><td colspan="4"></td><td ><b>Total</b></td><td><b><?php echo $total;?></b></td></tr>
        	<input type="hidden" name="total" value='<?php echo $total; ?>'>
        </tbody>
      </table>
    <?php  if(strcasecmp(trim($request_status), "Paid")==0)
				 	{
				 		echo '<h3 class="ml-3">Payment Details</h3>
				 		<div class="row  ml-1 p-3" >

						 		<div class="col-md-3">
						 		Transaction Date :<br>
						 		<spna class="pl-3" style="font-weight:bold;" > '.$t_date.'</span>
						 		</div>
						 		<div class="col-md-3">
						 		Transaction Reference :<br>  
						 		<spna class="pl-3" style="font-weight:bold;" > '.$t_ref.'</span>
						 		</div>
						 		<div class="col-md-3">
						 		Transaction Fee :<br>
						 		<spna class="pl-3" style="font-weight:bold;" > '.$t_fees.'</span>
						 		</div>
						 		<div class="col-md-3">
						 		Transferred Amount :<br>  
						 		<spna class="pl-3" style="font-weight:bold;" > '.$t_amount.'</span>
						 		</div>
				 		
				 		</div>';
				 	} ?>
	</div>
				 <?php  if(strcasecmp(trim($request_status), "Paid")!=0)
				 	{ ?>
	
		<div class="row  ml-1 p-3" style="font-size: 18px;font-weight:bold;">

						<div class="col-md-3">
				 		Transaction Date  
				 		<input type="date" class="form-control" name="t_date" placeholder="Transaction Date" required="" value='<?php echo date('Y-m-d'); ?>'>
				 		</div>
				 		<div class="col-md-3 form-group">
				 		Transaction Reference  
				 		<input type="text"  class="form-control" name="t_ref" placeholder="Transaction Reference"  required="">
				 		</div>
				 		<div class="col-md-3">
				 		Transaction Fees 
				 		<input type="text" class="form-control" name="t_fees" placeholder="Enter '0-Zero' For No Fees" required="">
				 		</div>
				 		<div class="col-md-3">
				 		Transferred Amount   
				 		<input type="text" class="form-control" name="t_amount" placeholder="Amount" required="">
				 		</div>
		</div>
	<?php } ?>
	
	<div class="row justify-content-md-center" style="margin: auto;">
		<div class="col-md-1 mt-2" >
		<input type="submit" class="btn btn-success " style="width: 80px" name="update_invoice" value="Update" <?php 
		if(strcasecmp($request_status,'paid')==0) echo "disabled"; ?> >
	</div>
		<div class="col-md-1 mt-2" >
		<input type="submit" class="btn btn-info  " style="width: 80px" name="print" value="Print" <?php 
		if(strcasecmp($request_status,'paid')==0) echo "disabled"; ?> >
	</div>

	</div>

</div>
</form>
</div>

</div>
</div>
	
</body>
</html>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

