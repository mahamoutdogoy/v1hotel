<form class="form-horizontal" action="mt_edit_reservation_code.php" method="post">
		<input type="hidden" name="noOfRoom" value='<?php echo $row['no_rooms']; ?>'>
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
	  		<label class="control-label col-sm-3" for="hName">Property :</label>
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
		      <input type="text"  class="form-control" value='<?php echo $row['price']; ?>' name="rPrice" id="rPrice" required>
	    	</div>
  		<!-- </div>
  	</div>
  		<div class="form-group">
  			<div class="row"> -->
	  		<label class="control-label col-sm-1" for="rTax"> Tax :</label>
		    <div class="col-sm-2">
		      <input type="text"  class="form-control" value='<?php echo $row['tax']; ?>' name="rTax" id="rTax" required>
	    	</div>
  		<!-- </div>
  	</div>
  		<div class="form-group">
  			<div class="row"> -->
	  		<label class="control-label col-sm-1" for="rTotal">Total :</label>
		    <div class="col-sm-3">
		      <input type="text"  class="form-control" value='<?php echo $row['total']; ?>' name="rTotal" id="rTotal" required readonly>
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
	    	</div>
  		</div>
  	</div>
  	<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="gName">Phone Number :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo $row['phoneNo']; ?>' name="gName" id="gName" placeholder="Enter Guest Phone Number" required>
	    	</div>
  		</div>
  	</div>
  	<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="gName">Guest Email :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo $row['email']; ?>' name="gName" id="gName" placeholder="Enter Guest Email" required>
	    	</div>
  		</div>
  	</div>
  		<div class="form-group">
  			<div class="row">
	  		<label class="control-label col-sm-3" for="doR">Date of Reservation :</label>
		    <div class="col-sm-9">
		      <input type="text"  class="form-control" value='<?php echo $row['reservation_date']; ?>' name="DOR" id="doR" readonly required>
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