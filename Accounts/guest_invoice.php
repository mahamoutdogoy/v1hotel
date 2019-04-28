<?php 
session_start();
include_once("../dbConnect.php");
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	
						
</head>
<body>
	<form>

	<?php
	 include_once("myheader.php"); 
	include_once("mtsidebar.php"); 	
	?>
	
		
		
		
			<div class="col-md-9 col-lg-10 " >
				<div class="row ml-2">
							
							<h3 style="color:#FA7268">	Mytravaly Worldwide Travel Technology Pvt. Ltd.</h3>
				</div>
				<div class="row  ml-1">
					<div class="col-md-2 ">
								Tax/GST
					</div>
					<div class="col-md-9 ">
								abc123
					</div>
				</div>
				<div class="row  ml-1">
							<div class="col-md-2 ">
								Email
							</div>
							<div class="col-md-9 ">
								payment@mytravaly.com
							</div>
				</div>
		
				<div class="row ml-1 mt-4" >
		<?php
			 $query=mysqli_query($conn,"SELECT res_Reference,property_id, guestName,email,phoneNo,  reservation_date, check_in, check_out,sum(noOfAdults) as adults,sum(noOfChildren) as children,sum(noOfExtraperson)as extra,count(inventory_id) as no_rooms,sum(price) as price,sum(tax) as tax, sum(total) as total, sum(received_amount) as received, payment_mode ,status FROM `reservation` WHERE   res_Reference = '$_POST[res_ref]' GROUP BY res_Reference") or die(mysqli_error($conn));
			 if(mysqli_num_rows($query)>0)
                {
                    while($row=mysqli_fetch_array($query))
                    { 
			 		?>
						
					
	
		<div class="col-xl-6 " >
			<h3 style="color: #00BFFF">Guest Info</h3>
		<div class="row mt-3">
			
		<div class="col-md-5">Guest Name</div>
		<div class="col-md-6"><?php echo $row['guestName']; ?></div>

		<div class="col-md-5">Phone Number</div>
		<div class="col-md-6"><?php echo $row['phoneNo']; ?></div>

		<div class="col-md-5">Email</div>
		<div class="col-md-6"><?php echo $row['email']; ?></div>

		</div>
	</div>
	<div class="col-md-6  ">
			<h3 style="color: #00BFFF">Hotel Details</h3>
			<div class="row mt-3">
			
			<div class="col-md-5">Hotel Name</div>
			<?php $query1=mysqli_query($conn,"select property_name from propertydetails where property_id=".$row['property_id']) or die(mysqli_error($conn));
			$row1=mysqli_fetch_array($query1);
			?>
			<div class="col-md-6"><?php echo $row1['property_name']; ?></div>
			<?php
					$query1=mysqli_query($conn,"select * from reservationmanager where property_id=".$row['property_id']) or die(mysqli_error($conn));
					if (mysqli_num_rows($query1)>0) {
						$row1=mysqli_fetch_array($query1);
						
			?>
			<div class="col-md-5">Phone Number</div>
			<div class="col-md-6"><?php echo $row1['resphone']; ?></div>

			<div class="col-md-5">Email</div>
			<div class="col-md-6"><?php echo $row1['resemail']; ?></div>
			<?php } ?>
		</div>
		</div>
		
	</div>
	
		<div class="row  mt-3  ml-1" >
			<div class="col-md-11">
				<h3 style="color: #00BFFF">Reservation Info</h3>
			</div>
		</div>
			<div class="row mt-3  ml-1" >
		<div class="col-md-3">Reservation Reference<!-- </div> --><br>
		<!-- <div class="col-md-6"> --><b><?php echo $row['res_Reference']; ?></b></div>

		<div class="col-md-2">Reservation date<!-- </div>
		<div class="col-md-6"> --><br><?php echo $row['reservation_date']; ?></div>
		
		<div class="col-md-2">Arrival date<!-- </div>
		<div class="col-md-6"> --><br><?php echo $row['check_in']; ?></div>

		<div class="col-md-2">Departure date<!-- </div>
		<div class="col-md-6"> --><br><?php echo $row['check_out']; ?></div>
			
		<div class="col-md-2">Number of Rooms<!-- </div>
		<div class="col-md-6"> --><br><?php echo $row['no_rooms']; ?></div>
	</div>
<?php } ?>
	<div class="mt-3 ml-2">
<h5 >Room Charges</h5>
	<table  class="table">
			<?php	$query=mysqli_query($conn,"select * from reservation where res_Reference=".$_POST['res_ref']) or die(mysqli_error($conn));

			?>

        <thead>
           <tr class="bg-warning">                
                <th style="border-radius: 10px 0px 0px 10px ">Room</th>
                <th>Room Price</th>
                <th>Room Tax/GST</th>
                <th style="border-radius: 0px 10px 10px 0px ">Total</th>
                
               <!--  <th >Status</th> -->
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
        				</tr>';/* <td>'.$row['Status'].' </td>*/
        				$price+=$row['price'];
        				$tax+=$row['tax'];
        				$total+=$row['total'];
        			}
        		}
        	?>
        	<!-- <tr><th>Reservation Fees </th>
                <th>Reservation Tax/GST </th>
                <th>Total</th>
                <th >Talaash Donation </th></tr>
             <tr>
             	<td>10 <br><br></td> 
             	<td>2</td>
             	<td>12</td>
             	<td>1</td>
             </tr>   -->

        	<tr style="height: 70px"> <td colspan="2" style="vertical-align:bottom;"></td><td valign="bottom"  style="vertical-align:bottom;"><b>Price</b></td><td valign="bottom" style="vertical-align:bottom;"><b><?php echo ($price);?></b></td></tr>
        	<tr><td colspan="2"></td><td ><b>Tax/GST</b></td><td><b><?php echo ($tax);?></b></td></tr>
        	<tr><td colspan="2"></td><td ><b>Total</b></td><td><b><?php echo ($total);?></b> <br><br></td></tr>
        	<input type="hidden" name="total" value='<?php echo $total; ?>'>
        </tbody>
        <tr> <td> <h5>Web Reservation Charges</h5></td></tr>
        <thead>
      		<tr class="bg-warning"><th>Reservation Fees </th>
                <th>Reservation Tax/GST </th>
                <th >Talaash Donation </th>
                <th>Total</th>
                </tr>
            </thead>
            <tbody>
             <tr>
             	<td>10 <br><br></td> 
             	<td>2</td>
             	<td>1</td>
             	<td>13</td>
             </tr> 
             <tr style="height: 70px"> <td colspan="2" style="vertical-align:bottom;"></td><td valign="bottom"  style="vertical-align:bottom;"><b>Price</b></td><td valign="bottom" style="vertical-align:bottom;"><b><?php echo ($price+11);?></b></td></tr>
        	<tr><td colspan="2"></td><td ><b>Tax/GST</b></td><td><b><?php echo ($tax+2);?></b></td></tr>
        	<tr><td colspan="2"></td><td ><b>Total</b></td><td><b><?php echo ($total+13);?></b> <br><br></td></tr>
        	
             </tbody>
      </table>
      </div>
      <div >
      	<div class="row mb-5">
      		<div class="col">
      	<input type="button" id="btn-refunde" name="" class="btn btn-danger float-right" value="Refunde To Guest" onclick="">
      </div>
      </div>
      </div>
      <!-- <div class="float-right " style="border: solid;">
      		<div >
    			</div>
      </div> -->
      <div id="refunde-section" style="display: none">
      	<div >
      		<p class='close' style="color: red;font-size: 24px;"  data-dismiss='alert' aria-label='close'>&times;</p>
      	</div>
      	<div class="row  ml-1 mt-2 " style="font-size: 18px;font-weight:bold;" >


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
		<div class="mb-5">
			<input type="submit" name="" class="btn btn-info float-right mt-3" value="Refunde">
		</div>
	</div>
      
      
<?php 
}
else
{
	echo '<div>No Record Found ....     try again ';
}

	?>


</div>
</div>
</div>
</form>
</body>
</html>
<script type="text/javascript">
	
	$(document).ready(function()
	{
		$("#btn-refunde").click(function(){

			$("#refunde-section").css("display","block");
			$("input[type='date']").focus();
			$(this).css("display","none");
		});
	});
	$('.close').click(function(){
       
			$("#refunde-section").css("display","none");
			//$("input[type='date']").focus();
			$("#btn-refunde").css("display","block");
	 
    });
</script>