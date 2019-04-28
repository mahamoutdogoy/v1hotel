<?php
session_start();
include_once("../dbConnect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Reservation</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
<?php
	 include_once("myheader.php"); 
	include_once("mtsidebar.php"); 	
	$query=mysqli_query($conn,"SELECT res_Reference,property_id,folio_id, guestName,phoneNo,email,  reservation_date, check_in, check_out,sum(price) as price,sum(tax) as tax, sum(total) as total,sum(received_amount) as received,  payment_mode ,payment_reference,count(inventory_id) as no_rooms FROM `reservation` WHERE  channel  REGEXP '^my *travaly$' and res_Reference='$_POST[res_ref]'") or die(mysqli_error($conn));

	if(mysqli_num_rows($query)>0)
	{
		$row=mysqli_fetch_array($query);
	?>
	<div class="col-md-8 col-lg-9 m-5">
		<!--<form>
			<div class="row form-group">
				<label class="col-md-3"></label>
				<div class="col-md-3">
					<input type="radio" class="load" name="type" value='1' >&ensp; Edit Booking
				</div>
				<div class="col-md-3">
					<input type="radio" class="load" name="type" value='2'  checked="checked">&ensp; Change Hotel / Room's
				</div>
			
		</div>
		</form>-->


	 <!--	<div id="content1"  style="display: none">
			<form class="form-horizontal" action="mt_edit_reservation_code1.php" method="post">
		<input type="hidden" name="noOfRoom" value='<?php echo $row['no_rooms']; ?>'>
		<div class="form-group">
			<div class="row">
	  		<label class="control-label col-sm-3" for="resRef">Reservation Reference :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo $row['res_Reference']; ?>' id="bresRef" name="rReference" placeholder="Enter Reservation Reference" readonly="" required>
	    	</div>
  		</div>
  	</div>
  	<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="hName">Property :</label>
		    <div class="col-sm-5">
		    	<?php 
		    	$query1=mysqli_query($conn,"select property_name from propertydetails where property_id=".$row['property_id']) or die(mysqli_error($conn));
	    	
				if(mysqli_num_rows($query1)>0)
				{
					$row1=mysqli_fetch_array($query1);
					
				}
			?>
		    	 <input type="text"  class="form-control"  id="bhNmae" name="propName" value="<?php echo $row1['property_name']; ?>" placeholder="Enter Hotel Name"  required>
		    	 <input type="hidden"  value="<?php echo $row['property_id']; ?>" name="propId">

	    	</div>
	    	
	    	
		   
	    	
  		</div>
  	</div>
  	<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="cin">Check In :</label>
		    <div class="col-sm-9">
		      <input type="date"  class="form-control" value='<?php echo $row['check_in']; ?>' name="cin" id="bcin" placeholder="Select Check In" min='<?php echo date('Y-m-d'); ?>' readonly required> 
	    	</div>
  		</div>
  	</div>
  		<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="cout">Check Out :</label>
		    <div class="col-sm-9">
		      <input type="date"  class="form-control" value='<?php echo $row['check_out']; ?>' min='<?php echo date('Y-m-d'); ?>' name="cout" id="bcout" placeholder="Select Check Out date" readonly required>
	    	</div>
  		</div>
  	</div>
  		
  	
  		
  		
  		<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="rPrice">Room Price :</label>
		    <div class="col-sm-2">
		      <input type="text"  class="form-control" value='<?php echo $row['price']; ?>' name="rPrice" id="brPrice" required>
	    	</div>
  	
	  		<label class="control-label col-sm-1" for="rTax"> Tax :</label>
		    <div class="col-sm-2">
		      <input type="text"  class="form-control" value='<?php echo $row['tax']; ?>' name="rTax" id="brTax" required>
		  </div>
	  
	  		<label class="control-label col-sm-1" for="rTotal">Total :</label>
		    <div class="col-sm-3">
		      <input type="text"  class="form-control" value='<?php echo $row['total']; ?>' name="rTotal" id="brTotal" required readonly>
	    	</div>
  		</div>
  	</div>
  		<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="rFees">Reservation Fees :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo 10; ?>' name="mtFees" id="brFees"  required>
	    	</div>
  		</div>
  	</div>
  		<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="rFeeTax">Reservation Tax :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo 1; ?>' name="mtFeeTax" id="brFeeTax" required>
	    	</div>
  		</div>
  	</div>
  	<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" >Donation For Talaash :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo 10; ?>' name="talaash" id="btalaash" required>
	    	</div>
  		</div>
  	</div>
  		<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="rFeeTotal">Total :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo 12; ?>' name="rFeeTotal" id="brFeeTotal" required readonly>
	    	</div>
  		</div>
  	</div>
  	<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="gName">Guest Name :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo $row['guestName']; ?>' name="gName" id="bgName" placeholder="Enter Guest Name" required>
	    	</div>
  		</div>
  	</div>
  	<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="gName">Phone Number :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo $row['phoneNo']; ?>' name="gPhone" id="bgName" placeholder="Enter Guest Phone Number" required>
	    	</div>
  		</div>
  	</div>
  	<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="gName">Guest Email :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo $row['email']; ?>' name="gemail" id="bgName" placeholder="Enter Guest Email" required>
	    	</div>
  		</div>
  	</div>
  		<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="doR">Date of Reservation :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo $row['reservation_date']; ?>' name="DOR" id="bdoR"  required>
	    	</div>
  		</div>
  	</div>
  

             <div class="row mt-3">
              <div class="col-md-3">
                <label>Payment Status</label><br>
                <select class="form-control" name="payment_status">
                  <option>Prepaid</option>
                </select>
              </div>
              <div class="col-md-2">
                <label>Payment Mode</label><br>
                <select class="form-control" name="payment_mode">
                  <option><?php echo $row['payment_mode'] ?></option>
                   <option>Cash</option>
                  <option>Card Machine</option>
                  <option>Mobile Wallet</option>
                  <option>UPI</option>
                  <option>Bank Transfer</option>
                  <option>Cheque Deposit</option>
                  <option>Payment Gateway</option>
                </select>
              </div>
             
              <div class="col-md-3">
                <label>Received Amount </label><br>
                <input type="text" id="breceived_amount" class="form-control" name="received_amount" value='<?php echo $row['received']; ?>' autocomplete="off" required="">

             </div>
             <div class="col-md-4">
             <div claas="form-group">
               <label >Payment Reference</label>
               <input type="text" class="form-control"  name="reference" value='<?php echo $row['payment_reference']; ?>'>
                                
             </div> 
           </div>
       </div>
           
         
  	
  	<div class="form-group mt-3">
  		<div class="row float-right">
  			<div class="col-sm-3 ">
  				<input type="submit" name="update_con1" class="btn btn-success " style="width: 150px" value="Update" required>
  			</div>
  		</div>
  </div>

</form>
</div>
		 -->






	<div id="content2">
	<form class="form-horizontal" action="mt_edit_reservation_code1.php" method="post">
		<!-- <input type="hidden" name="noOfRoom" value='<?php echo $row['no_rooms']; ?>'> -->
		<div class="form-group">
			<div class="row">
	  		<label class="control-label col-sm-3" for="resRef">Reservation Reference :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo $row['res_Reference']; ?>' id="resRef" name="rReference" placeholder="Enter Reservation Reference" readonly="" required>
	    	</div>
  		</div>
  	</div>
  	<div class="form-group top_dateselector">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="cin">Check In :</label>
		    <div class="col-sm-9">
		      <input type="date"  class="form-control" value='<?php echo $row['check_in']; ?>' name="cin" id="cin" placeholder="Select Check In" min='<?php echo date('Y-m-d'); ?>' required>
	    	</div>
  		</div>
  	</div>
  		<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="cout">Check Out :</label>
		    <div class="col-sm-9">
		      <input type="date"  class="form-control" value='<?php echo $row['check_out']; ?>' min='<?php echo date('Y-m-d'); ?>' name="cout" id="cout" placeholder="Select Check Out date" required>
	    	</div>
  		</div>
  	</div>
  		<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="hName">Property Name :</label>
		    <div class="col-sm-5">
		    	 <input type="text"  class="form-control"  id="hNmae" name="propId" placeholder="Enter Hotel Name" list="hotelList" required>
		    	 <datalist id="hotelList">
		    	 	
		    	
		    <?php 
		    	$query1=mysqli_query($conn,"select property_id,property_name from propertydetails") or die(mysqli_error($conn));
	    	
				if(mysqli_num_rows($query1)>0)
				{
					while($row1=mysqli_fetch_array($query1))
					{
						echo '<option value="'.$row1['property_id'].'">'.$row1['property_name'].'</option>';
					}
					
				}
			?>
		      </datalist>

	    	</div>
	    	
	    	
		    <div class="col-sm-4">
		      <input type="button"  class="form-control btn btn-info" value="Show Rooms" name="showRooms" id="showRooms" >
	    	</div>
	    	
  		</div>
  	</div>
  	<div id="available_rooms" >
  		
  	</div>
  		
  		
  		<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="rPrice">Room Price :</label>
		    <div class="col-sm-2">
		      <input type="text"  class="form-control" value='' name="rPrice" id="rPrice" placeholder="Select Room" required>
	    	</div>
  		<!-- </div>
  	</div>
  		<div class="form-group">
  			<div class="row"> -->
	  		<label class="control-label col-sm-1" for="rTax"> Tax :</label>
		    <div class="col-sm-2">
		      <input type="text"  class="form-control" value='' name="rTax" id="rTax" placeholder="Select Room" required>
	    	</div>
  		<!-- </div>
  	</div>
  		<div class="form-group">
  			<div class="row"> -->
	  		<label class="control-label col-sm-1" for="rTotal">Total :</label>
		    <div class="col-sm-3">
		      <input type="text"  class="form-control" value='' name="rTotal" id="rTotal" placeholder="Select Room" required >
	    	</div>
  		</div>
  	</div>
  		<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="rFees">Reservation Fees :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo 10; ?>' name="rFees" id="rFees"  required>
	    	</div>
  		</div>
  	</div>
  		<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="rFeeTax">Reservation Tax :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo 1; ?>' name="rFeeTax" id="rFeeTax" required>
	    	</div>
  		</div>
  	</div>
  	<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" >Donation For Talaash :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo 10; ?>' name="talaash" id="talaash" required>
	    	</div>
  		</div>
  	</div>
  		<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="rFeeTotal">Total :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo 12; ?>' name="rFeeTotal" id="rFeeTotal" required readonly>
	    	</div>
  		</div>
  	</div>
  	<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="gName">Guest Name :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo $row['guestName']; ?>' name="gName" id="gName" placeholder="Enter Guest Name" required>
		      <input type="hidden" name="rFolio" value='<?php echo $row['folio_id']; ?>'>
	    	</div>
  		</div>
  	</div>
  	<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="gName">Phone Number :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo $row['phoneNo']; ?>' name="gPhone" id="gPhone" placeholder="Enter Guest Phone Number" required>
	    	</div>
  		</div>
  	</div>
  	<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="gEmail">Guest Email :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo $row['email']; ?>' name="gEmail" id="gEmail" placeholder="Enter Guest Email" required>
	    	</div>
  		</div>
  	</div>
  		<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="doR">Date of Reservation :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo $row['reservation_date']; ?>' name="DOR" id="doR"  required>
	    	</div>
  		</div>
  	</div>
  
  	<!-- <div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" >Payment Status :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo 123; ?>' name="pstatus" required>
	    	</div>
  		</div>
  	</div> -->
  	<!--********-->
<div class="row mt-2">
                <div class="col-md-3">
                  <label>Reservation Status</label>
                </div>
                <div class="col-md-3">
                  <input type="radio" name="BookingStatus" class="mr-2" value="Confirm Reservation" checked><label >Confirm Reservation </label>
                </div>
                <!-- <div class="col-md-3">
                  <input type="radio" name="BookingStatus"  class="mr-2" value="Hold Reservation" ><label > Hold Reservation</label> 
                </div> -->
             </div>

             <div class="row mt-3">
              <div class="col-md-3">
                <label>Payment Status</label><br>
                <select class="form-control" name="payment_status">
                  <option>Prepaid</option>
                </select>
              </div>
              <div class="col-md-2">
                <label>Payment Mode</label><br>
                <select class="form-control" name="payment_mode">
                  <option><?php echo $row['payment_mode'] ?></option>
                </select>
              </div>
             
              <div class="col-md-3">
                <label>Received Amount </label><br>
                <input type="text" id="received_amount" class="form-control" name="received_amount" value='<?php echo $row['received']; ?>' autocomplete="off" required="">

             </div>
             <div class="col-md-4">
             <div claas="form-group">
               <label >Payment Reference</label>
               <input type="text" class="form-control"  name="reference" value='<?php echo $row['payment_reference']; ?>'>
                                
             </div> 
           </div>
       </div>
           
         
  	<!--********-->
  	<div class="form-group mt-3">
  		<div class="row float-right">
  			<div class="col-sm-3 ">
  				<input type="submit" name="update" class="btn btn-success " style="width: 150px" value="Update" required>
  			</div>
  		</div>
  	</div>
  	
	</form>
</div>


</div>
</div>
</div>
<?php } ?>
</body>
</html>
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$("#rPrice,#rTax,#rTotal").keydown(function(e){     
      		 e.preventDefault();      
    	});


		$(".load").click(function(){

			if($(this).val()=='1')
			{
				$("#content2").css('display','none');
				$("#content1").css('display','block');
			}
			else if(($(this).val()=='2'))
			{


				$("#content1").css('display','none');
				$("#content2").css('display','block');


			}
		});


		$("#brPrice,#brTax").keyup(function(){
			var a,b;
			a=$("#brPrice").val();
			b=$("#brTax").val();
			
			if($("#brPrice").val()=="" )
			{
				a=0;
			}
			if($("#brTax").val()=="")
			{
				b=0;
			}

			
			$("#brTotal").val(parseInt(a)+parseInt(b));
		});


		$("#brFees,#brFeeTax,#btalaash").keyup(function(){
			var a,b,c;
			a=$("#brFees").val();
			b=$("#brFeeTax").val();
			c=$("#btalaash").val();

			if($("#brFees").val()=="" )
			{
				a=0;
			}
			if($("#brFeeTax").val()=="")
			{
				b=0;
			}
			if($("#btalaash").val()=="")
			{
				c=0;
			}

			
			$("#brFeeTotal").val(parseInt(a)+parseInt(b)+parseInt(c));
		});


		$('#showRooms').click(function(){
			
        if($('#cin').val()=="" )
        {
          alert("Please Select Check in Date ...");
          $('#cin').focus();
        }
        else if($('#cout').val()=="" )
        {
          alert("Please Select Check out Date ...");
          $('#cout').focus();
        }
        else if($("#hNmae").val()=="")
        {
        	alert("Please Select Hotel Name ...");
          $('#hName').focus();
        }
        else{
        var  c_in_date=$('#cin').val();
         var  c_out_date=$('#cout').val();
         var hid=$("#hNmae").val();
         $('#cin').prop("readonly", true);
         $('#cout').prop("readonly", true);
         $(this).prop('disabled',true);
         $('.top_dateselector').before('<div class="col-md-12 alert"><input type="button" class="btn btn-info btn-sm" value="click" onclick="location.reload()"> click here to enable the date picker </div>');
        $('#available_rooms').empty();
        
       
        var path="avl_room.php?hid="+hid+"&cin="+c_in_date+"&cout="+c_out_date;
       
        $('#available_rooms').load(path);
       
      }
        
        /*window.location=path;*/
        
     });
	});
	
</script>