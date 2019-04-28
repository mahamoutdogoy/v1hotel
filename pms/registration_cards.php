<?php  
session_start();
include 'registration_cards_database.php';


$sql1="SELECT MAX(registration_reference) FROM international_registration";
$res=mysqli_query($con,$sql1);
$row=mysqli_fetch_row($res);
$international_ref=$row[0]+1;


$sql2="SELECT MAX(registration_reference) FROM domestic_registration";
$res1=mysqli_query($con,$sql2);
$row1=mysqli_fetch_row($res1);
$domestic_ref=$row1[0]+1;

$res_ref=$_GET['res_ref'];
echo $res_ref;
$sql3="SELECT * FROM reservation where reservationId='$res_ref'";
$res2=mysqli_query($con,$sql3);
$row2=mysqli_fetch_array($res2);

$_SESSION['folio']=$row2['folio_id'];

$_SESSION['guest_email']=$row2['email'];
$_SESSION['phone']=$row2['phoneNo'];

$sql="SELECT * FROM reservation WHERE folio_id='$_SESSION[folio]'";
$ress=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($ress);
	$_SESSION['hotel_id']=$row['property_id'];
	$_SESSION['room_id']=$row['room_id'];
	$_SESSION['room_sub_id']=$row['inventory_id'];
	$_SESSION['guestName']=$row['guestName'];
	$_SESSION['email']=$row['email'];
	$_SESSION['phoneNo']=$row['phoneNo'];
	$_SESSION['noOfAdults']=$row['noOfAdults'];
	$_SESSION['noOfChildren']=$row['noOfChildren'];
	/*$_SESSION['noOfRoom']=$row['noOfRoom'];*/
	$_SESSION['price']=$row['price'];
	$_SESSION['total']=$row['total'];
	$_SESSION['nights']=$row['nights'];
	$_SESSION['channel']=$row['channel'];
	$_SESSION['status']=$row['status'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>registration card</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<style type="text/css">
	#b1
	{
		margin-right: 20px;
		margin-left: -180px;
	}

</style>

<script>
           $(document).ready(function(){
           $('.unassign_room').change(function(){
               //Selected value
               
                   //Ajax for calling php function
                   $.post('change_room.php', {}, function(data){

                       alert('Room Unassigned successfully...');
                       location.reload();
                       //do after submission operation in DOM
                   });
                  
               
          
       });

       });

</script>

        	

			
</head>
<body>
	
<div class="container" align="center">
  
  
          
          <h4 class="modal-title">Guest Profile | <a style="text-decoration: none;color: black" href='pms_dashboard.php' ><span><<</span>Back to PMS</a></h4>       
          <table align="center"  cellpadding="10px" class=" table-borderless ">
          	<tr>
          		<td>
          			<label  >Reservation Id</label >
          		</td>
          		<td>
          			<input type="text" style="border-radius: 25px;" name="" readonly="" value=" <?php echo $row2['reservationId'];?>">
          		</td>

          		<td>
          			<label>Guest Name</label >
          		</td>
          		<td>
          			<input type="text" name="" style="border-radius: 25px;" readonly="" value=" <?php echo $row2['guestName']; ?>">
          			
          		</td>
          	</tr>
          	<tr>
          		<td>
          			<label>Email</label >
          		</td>
          		<td>
          			<input type="text" name="" readonly="" style="border-radius: 25px;" value=" <?php echo $row2['email']; ?>">
          			
          		</td>
          		<td>
          			<label>Phone</label >
          		</td>
          		<td>
          			<input type="text" name="" readonly="" style="border-radius: 25px;" value=" <?php echo $row2['phoneNo']; ?>">
          			
          		</td>
          	</tr>
          	<tr>
          		<td>
          		<label>Amount&nbsp;Recieved</label >
          	</td>
          	<td>
          		<input type="text" name="" readonly="" style="border-radius: 25px;" value=" <?php echo $row2['price']; ?>">
          		
          	</td>
          	<td>
          		<label>Pending&nbsp;Amount</label >
          	</td>
          	<td>
          		<input type="text" name="" readonly="" style="border-radius: 25px;" value=" <?php echo $row2['total']-$row2['price'] ?>">
          		
          	</td>
          	</tr>
          	<tr >
          		
          			<td class="text-center" colspan="4">
          				<b> Guest Count</b>
          			</td>
          		
          	
          	</tr>
          	<tr>
          		<td>
          			<label>Child</label >
          		</td>
          		<td>
          			<input type="text" name="" readonly="" style="border-radius: 25px;" value=" <?php echo $row2['noOfChildren']; ?>">
          			
          		</td>
          		<td>
          			<label>Adults</label >
          		</td>
          		<td>
          			<input type="text" name="" readonly="" style="border-radius: 25px;" value=" <?php echo $row2['noOfAdults']; ?>">
          			
          		</td>
          	</tr>
          	<tr>
          		<td>
          			<label>Nights</label >
          		</td>
          		<td>
          			<input type="text" name="" readonly="" style="border-radius: 25px;" value=" <?php echo $row2['nights']; ?>">
          			
          		</td>
          		<td>
          			<label>Channel</label >
          		</td>
          		<td>
          			<input type="text" name="" readonly="" style="border-radius: 25px;" value=" <?php echo $row2['channel']; ?>">
          			
          		</td>
          	</tr>
          </table>
        	
			
			<label>Registration Card</label >
			
			
			
			<br>
			<input type="button"  class="btn btn-danger " data-dismiss="modal" data-toggle="modal" data-target="#myModal3" value="international" name="international">
			<input type="button" class="btn  btn-danger " data-dismiss="modal" data-toggle="modal" data-target="#myModal2" value="domestic"  name="domestic">
			
</div>
<div align="center">
			
			<input type="button" style="margin-left: 20px;margin-top: 20px;width: 160px;" name="add_on_services" class="btn btn-info" value="Add On Services" data-dismiss="modal" data-toggle="modal" data-target="#myModal4">
			<input type="button" style="margin-left: 20px;margin-top: 20px;width: 160px;" name="departure_payment" class="btn btn-info" value="Payment & Invoice" data-dismiss="modal" data-toggle="modal" data-target="#myModal6">
			<input type="button" style="margin-left: 20px;margin-top: 20px;width: 160px;" name="departure_information" class="btn btn-info" value="Departure Info" data-dismiss="modal" data-toggle="modal" data-target="#myModal7">
			<input type="button" style="margin-left: 20px;margin-top: 20px;width: 160px;" name="change_room" class="btn btn-info" value="Change Room" data-dismiss="modal" data-toggle="modal" data-target="#myModal11">
			<!-- <input type="button" style="margin-left: 20px;margin-top: 20px;width: 160px;" name="assign_room" class="btn btn-info" value="Assign Room"> -->
			<form action="registration_cards_be.php" method="post">
			<input type="submit" style="margin-left: 20px;margin-top: 20px;width: 160px;" name="cancel_reservation" class="btn btn-info" value="Cancel Reservation">
			
			<input type="button"  style="margin-left: 20px;margin-top: 20px;width: 160px;" name="modification" class="btn btn-info" value="Modify Reservation" data-dismiss="modal" data-toggle="modal" data-target="#myModal12">
			<!-- <input type="button" style="margin-left: 20px;margin-top: 20px;width: 160px;" name="record_payment" class="btn btn-info" value="Record Payment"> -->

			<input type="submit" style="margin-left: 20px;margin-top: 20px;width: 160px;" name="email" class="btn btn-info" value="Email" onclick="javascript: form.action='send_mail.php'">

			

			<span class="dropdown">


			<input type="button" style="margin-left: 20px;margin-top:20px;width: 160px;"  class="btn btn-info dropdown-toggle" data-toggle="dropdown" value="print" ">
			<span class="dropdown-menu">
				<a class="dropdown-item" href="http://localhost/pms/print_details.php" >Registration Card</a>
				<a class="dropdown-item" href="http://localhost/pms/print_invoice.php" >Invoice</a>

			</span>
			</span>

		</form>
        
  
</div>


<form action="registration_cards_be.php" method="post" name="dom_reg">

<div class="container">
  

  <!-- The Modal -->
  <div class="modal" id="myModal2">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #f15025;color: white;">
        	 <button type="button"  class="btn   " data-toggle="modal" data-target="#myModal1" data-dismiss="modal"><i  class="fas fa-arrow-circle-left fa-2x"></i>       	 	 
        	 </button>
          <h4 class="modal-title mx-auto">DOMESTIC REGISTRATION</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <table  class="table table-responsive table-borderless " >
				<tr style="display: none;">
					<td>
						<label>domestic</label>
					</td>
					<td>
						<input type="text" name="domestic" value="domestic" >
					</td>

				</tr>
				<tr>
				<td>
					<label >Registration Ref</label >
				</td>
				<td>
					<input type="text" name="dom_reg" readonly="" value=" <?php echo $domestic_ref ?>">
		       </td>
		       <td>
					<label >Registration Date</label >
				</td>
				<td>
					
					<input  type="text"  readonly="" id="reg_date" name="reg_date" required="" >

					<script>
	
					var dt = new Date();
					document.getElementById("reg_date").value = dt.toLocaleDateString();
					</script>
				</td>
				
				</tr>
				<tr>
					<td>
					<label>Guest Name</label >
				</td>
				<td>
					<input type="text" name="guest_name" required="">
				</td>
			
				<td>
					<label>Designation</label >
				</td>
				<td>
					<input type="text" name="designation" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Birth Day</label >
				</td>
				<td>
					<input type="date" name="birthday" required="" style="width:175px;">
				</td>
				<td>
					<label>Anniversary</label >
				</td>
				<td>
					<input type="date" name="anniversary" >
				</td>
			</tr>
			<tr>
				<td>
					<label>Company/Org</label >
				</td>
				<td>
					<input type="text" name="com_org" required="">
				</td>
				<td>
					
					<label>Tax./GST </label >
				</td>
				<td><input type="text" name="tax_gst" required=""></td>
			</tr>
		

		
			<tr style="text-align: center;background: tomato;" rowspan="4">
				<th>Address Details</th>
			</tr>
			<tr>
				<td>
					<label>street</label >
				</td>
				<td>
					<input type="text" name="street">
				</td>
				<td>
					<label>City</label>
				</td>
				<td>
					<input type="text" name="city">
				</td>
			</tr>
			<tr>
				<td>
					<label>State</label>
				</td>
				<td>
					<input type="text" name="state">
				</td>
				<td>
					<label>Country</label>
				</td>
				<td>
					<input type="text" name="country">
				</td>
			</tr>
			<tr>
				<td>
					<label>ZipCode</label>
				</td>
				<td>
					<input type="number" name="zipcode">
				</td>
			</tr>
		</table>
		
			
			
		
        </div>
        <script>
   	function domestic_validation() 
   		
   	{
   	if (document.dom_reg.reg_date.value == "")
    {
      alert("Please enter the field value ");
      document.dom_reg.reg_date.focus();
      return false;
    }
    else if (document.dom_reg.guest_name .value == "")
    {
      alert("Please enter the field value ");
      document.dom_reg.guest_name .focus();
      return false;
    }
    else if (document.dom_reg.designation.value == "")
    {
      alert("Please enter the field value ");
      document.dom_reg.designation.focus();
      return false;
    }
    else if (document.dom_reg.birthday.value == "")
    {
      alert("Please enter the field value ");
      document.dom_reg.birthday.focus();
      return false;
    }
   /* else if (document.dom_reg.anniversary.value == "")
    {
      alert("Please enter the field value ");
      document.dom_reg.anniversary.focus();
      return false;
    }*/
    else if (document.dom_reg.com_org.value == "")
    {
      alert("Please enter the field value ");
      document.dom_reg.com_org.focus();
      return false;
    }
    else if (document.dom_reg.tax_gst .value == "")
    {
      alert("Please enter the field value ");
      document.dom_reg.tax_gst.focus();
      return false;
    }
    else if (document.dom_reg.street.value == "")
    {
      alert("Please enter the field value ");
      document.dom_reg.street.focus();
      return false;
    }
    else if (document.dom_reg.city.value == "")
    {
      alert("Please enter the field value ");
      document.dom_reg.city.focus();
      return false;
    }
    else if (document.dom_reg.state.value == "")
    {
      alert("Please enter the field value ");
      document.dom_reg.state.focus();
      return false;
    }
    else if (document.dom_reg.country.value == "")
    {
      alert("Please enter the field value ");
      document.dom_reg.country.focus();
      return false;
    }
    else if (document.dom_reg.zipcode.value == "")
    {
      alert("Please enter the field value ");
      document.dom_reg.zipcode.focus();
      return false;
    }

   
     
    else
    {
    	$('#myModal2').modal('hide');
    	$('#myModal10').modal('show'); 
    }
}
   </script>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onclick="domestic_validation()" data-target="#myModal10">Save and Continue</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>


<div class="container">
<div class="modal" id="myModal10">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #f15025;color: white;">
        	 <button type="button"  class="btn " data-toggle="modal" data-target="#myModal2" data-dismiss="modal"><i  class="fas fa-arrow-circle-left fa-2x"></i>       	 	 
        	 </button>
          <h4 class="modal-title mx-auto">Domestic Guest Arrival Info.</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <table style="margin-left: 20px;" class="table table-responsive table-borderless ">
          	
			
			<tr>
				<td>
					<label>Arrived From</label >
				</td>
				<td>
					<input type="text" name="arrived_from" required="">
				</td>
				<td>
					<label>Proceeding To</label >
				</td>
				<td>
					<input type="text" name="proceeding_to" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Arrived Date</label >
				</td>
				<td>
					<input type="date" name="arr_date" required="" style="width:175px;">
				</td>
				<td>
					<label>Time</label >
				</td>
				<td>
					<input type="time" name="arr_time" required="" style="width: 175px;">
				</td>

			</tr> 
			<tr>  
			   <td> 
			           <label>Departure Date</label >
			</td>     
			<td>        
			 <input type="date" name="dep_date" required="" style="width:175px;">    
			  </td>     
			  <td>
			<label>Time</label >     
		</td>    
		 <td>         
		 	<input type="time" name="dep_time" required="" style="width: 175px;">     
		 </td>
		  </tr>
			<tr > 
			    <td> 
			        <label>Purpose Of Visit</label > 
			            </td>  
			               <td>
					
					<input type="radio" name="visit_purpose" value="tourist" required="">
					<label>Tourist</label >
				</td>
			
			<td>
				<input type="radio" name="visit_purpose" value="holiday">
				<label>Holiday</label >
			</td>
			
				<td>
					<input type="radio" name="visit_purpose" value="conference">
					<label>Conference</label >
				</td>
			</tr>
			<tr>
				
					
				
				<td>
					
					<input type="radio" name="visit_purpose" value="group">
					<label>Group</label >
				</td>
				<td>
					<input type="radio" name="visit_purpose" value="business">
					<label>Business</label >
				</td>
				<td>
					<input type="radio" name="visit_purpose" value="medical_treatment">
					<label>Medical Treatment</label >
				</td>
				<td>
					<input type="radio" name="visit_purpose" value="leisure">
					<label>Leisure</label >
				</td>
				
			</tr>
			
			<tr>
				
					<th class="text-center" colspan="4">Sharer Occupants</th>
				
			</tr>
			<tr>
				<td>
					<label>Name</label >
				</td>
				<td>
				<input type="text" name="occup_name" required=""> 
				</td>
				<td>
					<label>Relationship</label >
				</td>

				<td>
				<input type="text" name="occup_relation" required="">
				</td>
			</tr>
				<tr>
					<td>
						<label>Email</label >
					</td>
				<td>
				<input type="email" name="occup_email" required="">
				</td>
				<td>
					<label>Mobile</label >
				</td>
				<td>
				<input type="number" name="occup_mobile" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Nationality</label >  
				</td>
				<td>
					<input type="text" name="nation" required="" >
				</td>
				<td>
					<label>Identification/Passport</label >
				</td>
				<td>
				<input type="text" name="identification" required="">
				</td>
			</tr>
		</table>


		<div style="overflow:scroll;height:250px;width:100%;overflow:auto;display: none;" id="add_new_scroll1">
    <table id="add_Occupant1" class="table table-borderless table-responsive">
    	
    	
			<script >
			var loop = 1;
				function add_domestic_Occupant()
				{
				 		
						document.cookie="i="+loop;
					  
	           			document.getElementById("add_new_scroll1").style.display="block";

			            var table=document.getElementById("add_Occupant1");

			            var row=table.insertRow((table.rows.length));
			            var cell0=row.insertCell(0);
 						var t0=document.createElement("LABEL");
 						t0.id = "sharer"+loop;
 						t0.name = "sharer"+loop;
  						t0.innerHTML = "Sharer Occupant "+loop;
  						
			            cell0.appendChild(t0);



			            var row=table.insertRow((table.rows.length));

 						var cell0=row.insertCell(0);
 						var t0=document.createElement("LABEL");
 						t0.id = "name"+loop;
  						t0.innerHTML = 'Name';
  						
			            cell0.appendChild(t0);

			            var cell1=row.insertCell(1);
			            var t1=document.createElement("input");
			            t1.id = "occup_name"+loop;
			            t1.name="occup_name"+loop;
			            cell1.appendChild(t1);


			            var cell2=row.insertCell(2);
			            var t2=document.createElement("LABEL");
			            t2.innerHTML = 'Relationship';
			            cell2.appendChild(t2);


			            	var cell3=row.insertCell(3);
			            	var t3=document.createElement("input");
			                t3.id = "occup_rel"+loop;
			                t3.name = "occup_rel"+loop;
			                cell3.appendChild(t3);

			            var row=table.insertRow((table.rows.length));


 						var cell0=row.insertCell(0);
 						var t4=document.createElement("LABEL");
  						t4.innerHTML = 'Email';
			            cell0.appendChild(t4);
			            

			            	var cell1=row.insertCell(1);
			                var t5=document.createElement("input");
			                t5.id = "occup_email"+loop;
			                t5.name = "occup_email"+loop;
			                cell1.appendChild(t5);

			                var cell2=row.insertCell(2);
			                var t6=document.createElement("LABEL");
	  						t6.innerHTML = 'Mobile';
				            cell2.appendChild(t6);

				            var cell3=row.insertCell(3);
			                var t6=document.createElement("input");
			                t6.id = "occup_mobile"+loop;
			                t6.name = "occup_mobile"+loop;
			                cell3.appendChild(t6);


			                var row=table.insertRow((table.rows.length));


 						var cell0=row.insertCell(0);
 						var t7=document.createElement("LABEL");
  						t7.innerHTML = 'Nationality';
			            cell0.appendChild(t7);
			            

			            	var cell1=row.insertCell(1);
			                var t8=document.createElement("input");
			                t8.id = "occup_nationality"+loop;
			                t8.name = "occup_nationality"+loop;
			                cell1.appendChild(t8);

			                var cell2=row.insertCell(2);
			                var t9=document.createElement("LABEL");
	  						t9.innerHTML = 'Identification';
				            cell2.appendChild(t9);

				            var cell3=row.insertCell(3);
			                var t10=document.createElement("input");
			                t10.id = "occup_identification"+loop;
			                t10.name = "occup_identification"+loop;
			                cell3.appendChild(t10);

			                document.getElementById("sharer"+loop).style.fontSize = "20px";
			                document.getElementById("sharer"+loop).style.color = "tomato";

			                document.getElementById("occup_name"+loop).focus();
			                        loop++;






}
				
			</script>
		</table>
	</div>


		<table class="table table-borderless table-responsive">
			<tr>
				<td>
					<input type="button" name="add_new" class="btn btn-primary" value="Add New" onclick="add_domestic_Occupant()">
				</td>
			</tr>
		

			<tr>
				<th class="text-center" colspan="4">
					FOR HOTEL USE	://this data will come from room dashboard (abhi dashboard)
				</th>
			</tr>
			<tr>
				<td>
					<label>Room No.</label >
				</td>
				<td>
					<input type="text" value="abhi" name="room_no" required="">
				</td>
				<td>
					<label>Room Type</label >
				</td>
				<td>
					<input type="text" value="abhi" name="room_type" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Room Rate</label >
				</td>
				<td>
					<input type="text" value="<?php echo $row2['total'];?>" name="room_rate" required="">
				</td>
				<td>
					<label>Adults</label >
				</td>
				<td>
					<input type="text" value="<?php echo $row2['noOfAdults']; ?>" name="adults" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Children</label >
				</td>
				<td>
					<input type="text" value="<?php echo $row2['noOfChildren'] ?> "name="children" required="">
				</td>
				<td>
					<label>Extra Person</label >
				</td>
				<td>
					<input type="text" value="<?php echo $row2['noOfExtraperson'] ?> "name="extra_bed" required="">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label>Billing Instructions/Address</label >
				</td>
				<td colspan="3">
					<textarea name="address_billing" style="width:60%" rows="3" required=""></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label>Front Desk Name</label >
				</td>
				<td>
					<input type="text" name="front_desk" required="">
				</td>
				<td>
					<label>Duty Manager</label >
				</td>
				<td>
					<input type="text" name="duty_manager" required="">
				</td>
			</tr>
		</table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="domestic_reg">Save</button>
          
        </div>
        
      </div>
    </div>
  </div>
  
</div>
</form>


<form action="registration_cards_be.php" method="post" name="int_reg">
<div class="container">
  

  <!-- The Modal -->
  <div class="modal" id="myModal3">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->

        <div class="modal-header" style="background-color: #f15025;color: white;">
        	
        	 <button type="button"  class="btn   " data-toggle="modal" data-target="#myModal1" data-dismiss="modal"><i  class="fas fa-arrow-circle-left fa-2x"></i>       	 	 
        	 </button>
          <h4 class="modal-title mx-auto">INTERNATIONAL REGISTRATION</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	
         <table class="table  table-responsive table-borderless" >
         	<tr style="display: none;">
					<td>
						<label>international</label>
					</td>
					<td>
						<input type="text" name="international" value="international" >
					</td>

				</tr>
         	<tr>
				<td> 
					<label >Registration Ref</label >
				</td>
				<td>
					<input type="text" name="reg_no" readonly="" value="<?php echo $international_ref ?>"  >
		       </td>
		       <td>
					<label >Registration Date</label >
				</td>
				<td>
					<input  type="text" readonly="" id="date" name="reg_date" required="" >
					<script>
	
					var dt = new Date();
					document.getElementById("date").value = dt.toLocaleDateString();
					</script>
				</td>
				</tr>
			<tr>
				<td>
					<label>Guest Name</label >
				</td>
				<td>
					<input type="text" name="gst_name">
				</td>
				<td>
					<label>Nationality</label >
				</td>
				<td>
					<input type="text" name="nationality" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Birth Day</label >
				</td>
				<td>
					<input type="date" name="birthday" required="" style="width:175px;">
				</td>
				<td>
					<label>Anniversary</label >
				</td>
				<td>
					<input type="date" name="anniversary" >
				</td>
			</tr>
			<tr>
				<td>
					<label>Company/Org</label >
				</td>
				<td>
					<input type="text" name="com_org" required="">
				</td>
				<td>
					
					<label>Tax./GST </label >
				</td>
				<td><input type="text" name="tax_gst" required=""></td>
			</tr>
			<tr>
				
				<td>
					<label>Passport No.</label >
				</td>
				<td>
					<input type="text" name="passport_no" required="">
				</td>
				<td>
					<label>Expiry  Date :</label >
				</td>
				<td>
					<input type="date" name="passport_expiry" required="">
				</td>
			</tr>

			<tr>
				
				
				 <td>
					<label>Visa No.</label >
				</td>
				<td>
					<input type="text" name="visa_no" required="">
				</td>
				<td>
					<label>Expiry  Date:</label >
				</td>
				<td>
					<input type="date" name="visa_expiry" required="">
				</td>

			</tr>
			<tr>
				
				
				

				<td>
					<label>Date Of Arrival In India: </label >
				</td>
				<td>
					<input type="date" name="doa" required="">
				</td>

				<td>
				<label>Proposed Duration of Stay In India</label >
				</td>
				<td>
					<input type="number" name="duration" required="">
				</td>
			</tr>

			<tr>
				<td>
					<label>Arrival Immigration</label >
				</td>
				<td>
					<input type="text" name="immigration" required="">
				</td>
			</tr>

			<tr>
				<td>
					<label>Whether Employed In India</label >
				</td>
				<td>
					<input type="radio" name="employed" value="yes" >
					<label>Yes</label >
				</td>
				<td>
					<input type="radio" name="employed" value="no">
					<label>No</label >
				</td>

			</tr>
			<tr  style="text-align: center;background: tomato;">
				<th>Address Details</th>
			</tr>
			<tr>
				<td>
					<label>street</label >
				</td>
				<td>
					<input type="text" name="street">
				</td>
				<td>
					<label>City</label>
				</td>
				<td>
					<input type="text" name="city">
				</td>
			</tr>
			<tr>
				<td>
					<label>State</label>
				</td>
				<td>
					<input type="text" name="state">
				</td>
				<td>
					<label>Country</label>
				</td>
				<td>
					<input type="tetx" name="country">
				</td>
			</tr>
			<tr>
				<td>
					<label>ZipCode</label>
				</td>
				<td>
					<input type="number" name="zipcode">
				</td>
			</tr>


			
		</table>
		

       
</div>
        <!-- Modal footer -->

        <script>
   	function validation() 
   		
   	{
   	if (document.int_reg.reg_date.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.reg_date.focus();
      return false;
    }
    else if (document.int_reg.gst_name .value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.gst_name .focus();
      return false;
    }
    else if (document.int_reg.nationality.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.nationality.focus();
      return false;
    }
    else if (document.int_reg.birthday.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.birthday.focus();
      return false;
    }
    /*else if (document.int_reg.anniversary.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.anniversary.focus();
      return false;
    }*/
    else if (document.int_reg.com_org.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.com_org.focus();
      return false;
    }
    else if (document.int_reg.tax_gst .value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.tax_gst.focus();
      return false;
    }
     else if (document.int_reg.passport_no.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.passport_no.focus();
      return false;
    }
     else if (document.int_reg.passport_expiry.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.passport_expiry.focus();
      return false;
    }
     else if (document.int_reg.visa_no.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.visa_no.focus();
      return false;
    }
     else if (document.int_reg.visa_expiry.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.visa_expiry.focus();
      return false;
    }
     else if (document.int_reg.doa.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.doa.focus();
      return false;
    }
     else if (document.int_reg.duration.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.duration.focus();
      return false;
    }
    else if (document.int_reg.immigration.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.immigration.focus();
      return false;
    }
    else if (document.int_reg.employed.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.employed.focus();
      return false;
    }
    else if (document.int_reg.street.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.street.focus();
      return false;
    }
    else if (document.int_reg.city.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.city.focus();
      return false;
    }
    else if (document.int_reg.state.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.state.focus();
      return false;
    }
    else if (document.int_reg.country.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.country.focus();
      return false;
    }
    else if (document.int_reg.zipcode.value == "")
    {
      alert("Please enter the field value ");
      document.int_reg.zipcode.focus();
      return false;
    }

    else
    {
    	$('#myModal3').modal('hide');
    	$('#myModal5').modal('show');
    	

    }
}
   </script>
      
        <div class="modal-footer">
          <input  type="button" class="btn btn-danger" onclick="validation()" name="international_registration" value='Save And Continue'>
        </div>
         </div>
        </div>
    </div>

    
        
     
  </div>





  <div class="container">
  

  <!-- The Modal -->
  <div class="modal" id="myModal5">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
       <!--  Modal Header -->
        <div class="modal-header" style="background-color: #f15025;color: white;">
        	 <button type="button"  class="btn   " data-toggle="modal" data-target="#myModal3" data-dismiss="modal"><i  class="fas fa-arrow-circle-left fa-2x"></i>       	 	 
        	 </button>
          <h4 class="modal-title mx-auto">International Guest Arrival Info.</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <table style="margin-left: 20px;" class="table table-responsive table-borderless " id="int_gst">
          	
			
			<tr>
				<td>
					<label>Arrived From</label >
				</td>
				<td>
					<input type="text" name="arrived_from" required="">
				</td>
				<td>
					<label>Proceeding To</label >
				</td>
				<td>
					<input type="text" name="proceeding_to" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Arrived Date</label >
				</td>
				<td>
					<input type="date" name="arr_date" required="" style="width:175px;">
				</td>
				<td>
					<label>Time</label >
				</td>
				<td>
					<input type="time" name="arr_time" required="" style="width: 175px;">
				</td>

			</tr> 
			<tr>  
			   <td> 
			           <label>Departure Date</label >
			</td>     
			<td>        
			 <input type="date" name="dep_date" required="" style="width:175px;">    
			  </td>     
			  <td>
			<label>Time</label >     
		</td>    
		 <td>         
		 	<input type="time" name="dep_time" required="" style="width: 175px;">     
		 </td>
		  </tr>
			<tr > 
			    <td> 
			        <label>Purpose Of Visit</label > 
			            </td>  
			               <td>
					
					<input type="radio" name="visit_purpose" value="tourist" required="">
					<label>Tourist</label >
				</td>
			
			<td>
				<input type="radio" name="visit_purpose" value="holiday">
				<label>Holiday</label >
			</td>
			
				<td>
					<input type="radio" name="visit_purpose" value="conference">
					<label>Conference</label >
				</td>
			</tr>
			<tr>
				
					
				
				<td>
					
					<input type="radio" name="visit_purpose" value="group">
					<label>Group</label >
				</td>
				<td>
					<input type="radio" name="visit_purpose" value="business">
					<label>Business</label >
				</td>
				<td>
					<input type="radio" name="visit_purpose" value="medical_treatment">
					<label>Medical Treatment</label >
				</td>
				<td>
					<input type="radio" name="visit_purpose" value="leisure">
					<label>Leisure</label >
				</td>
				
			</tr>
			
			<tr>
				
					<th class="text-center" colspan="4">Sharer Occupants</th>
				
			</tr>
			<tr>
				<td>
					<label>Name</label >
				</td>
				<td>
				<input type="text" name="occup_name" required=""> 
				</td>
				<td>
					<label>Relationship</label >
				</td>

				<td>
				<input type="text" name="occup_relation" required="">
				</td>
			</tr>
				<tr>
					<td>
						<label>Email</label >
					</td>
				<td>
				<input type="email" name="occup_email" required="">
				</td>
				<td>
					<label>Mobile</label >
				</td>
				<td>
				<input type="number" name="occup_mobile" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Nationality</label >  
				</td>
				<td>
					<input type="text" name="nation"  required="">
				</td>
				<td>
					<label>Identification/Passport</label >
				</td>
				<td>
				<input type="text" name="identification" required="">
				</td>
			</tr>
</table>


<div style="overflow:scroll;height:250px;width:100%;overflow:auto;display: none;" id="add_new_scroll">
    <table id="add_Occupant" class="table table-borderless table-responsive">
    	
    	
			<script >
			var index = 1;

				function addOccupant()
				{
				 		


					  	document.cookie="i="+index;
	           			document.getElementById("add_new_scroll").style.display="block";

			            var table=document.getElementById("add_Occupant");

			            var row=table.insertRow((table.rows.length));
			            var cell0=row.insertCell(0);
 						var t0=document.createElement("LABEL");
 						t0.id = "sharer"+index;
 						t0.name = "sharer"+index;
  						t0.innerHTML = "Sharer Occupant "+index;
  						
			            cell0.appendChild(t0);



			            var row=table.insertRow((table.rows.length));

 						var cell0=row.insertCell(0);
 						var t0=document.createElement("LABEL");
 						t0.id = "name"+index;
  						t0.innerHTML = 'Name';
  						
			            cell0.appendChild(t0);

			            var cell1=row.insertCell(1);
			            var t1=document.createElement("input");
			            t1.id = "occup_name"+index;
			            t1.name="occup_name"+index;
			            cell1.appendChild(t1);


			            var cell2=row.insertCell(2);
			            var t2=document.createElement("LABEL");
			            t2.innerHTML = 'Relationship';
			            cell2.appendChild(t2);


			            	var cell3=row.insertCell(3);
			            	var t3=document.createElement("input");
			                t3.id = "occup_rel"+index;
			                t3.name = "occup_rel"+index;
			                cell3.appendChild(t3);

			            var row=table.insertRow((table.rows.length));


 						var cell0=row.insertCell(0);
 						var t4=document.createElement("LABEL");
  						t4.innerHTML = 'Email';
			            cell0.appendChild(t4);
			            

			            	var cell1=row.insertCell(1);
			                var t5=document.createElement("input");
			                t5.id = "occup_email"+index;
			                t5.name = "occup_email"+index;
			                cell1.appendChild(t5);

			                var cell2=row.insertCell(2);
			                var t6=document.createElement("LABEL");
	  						t6.innerHTML = 'Mobile';
				            cell2.appendChild(t6);

				            var cell3=row.insertCell(3);
			                var t6=document.createElement("input");
			                t6.id = "occup_mobile"+index;
			                t6.name = "occup_mobile"+index;
			                cell3.appendChild(t6);


			                var row=table.insertRow((table.rows.length));


 						var cell0=row.insertCell(0);
 						var t7=document.createElement("LABEL");
  						t7.innerHTML = 'Nationality';
			            cell0.appendChild(t7);
			            

			            	var cell1=row.insertCell(1);
			                var t8=document.createElement("input");
			                t8.id = "occup_nationality"+index;
			                t8.name = "occup_nationality"+index;
			                cell1.appendChild(t8);

			                var cell2=row.insertCell(2);
			                var t9=document.createElement("LABEL");
	  						t9.innerHTML = 'Identification';
				            cell2.appendChild(t9);

				            var cell3=row.insertCell(3);
			                var t10=document.createElement("input");
			                t10.id = "occup_identification"+index;
			                t10.name = "occup_identification"+index;
			                cell3.appendChild(t10);

			                document.getElementById("sharer"+index).style.fontSize = "20px";
			                document.getElementById("sharer"+index).style.color = "tomato";

			                document.getElementById("occup_name"+index).focus();
			                        index++;






}
				
			</script>
		</table>
	</div>
		
		<table class="table table-borderless table-responsive">

			<tr>
				<td>
					<input type="button" name="add_new_int" class="btn btn-primary" value="Add New" onclick="addOccupant()"> <!-- data-dismiss="modal" data-toggle="modal" data-target="#myModal9" -->
				</td>
			</tr>
		

			<tr>
				<th class="text-center" colspan="4">
					FOR HOTEL USE	://this data will come from room dashboard (booking time data) abhi dashboard//read only fields 
				</th>
			</tr>
			<tr>
				<td>
					<label>Room No.</label >
				</td>
				<td>
					<input type="text" name="room_no" required="">
				</td>
				<td>
					<label>Room Type</label >
				</td>
				<td>
					<input type="text" name="room_type" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Room Rate</label >
				</td>
				<td>
					<input type="text" value="<?php echo $row2['total'];?>" name="room_rate" required="">
				</td>
				<td>
					<label>Adults</label >
				</td>
				<td>
					<input type="text" value="<?php echo $row2['noOfAdults'];?>" name="adults" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Children</label >
				</td>
				<td>
					<input type="number" name="children" value="<?php echo $row2['noOfChildren'];?>" required="">
				</td>
				<td>
					<label>Extra Person</label >
				</td>
				<td>
					<input type="number" name="extra_bed" value="<?php echo $row2['noOfExtraperson'];?>" required="">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label>Billing Instructions/Address</label >
				</td>
				<td colspan="3">
					<textarea name="address_billing" style="width:60%" rows="3"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label>Front Desk Name</label >
				</td>
				<td>
					<input type="text" name="front_desk" required="">
				</td>
				<td>
					<label>Duty Manager</label >
				</td>
				<td>
					<input type="text" name="duty_manager" required="">
				</td>
			</tr>
		</table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

          <input type="submit"  class="btn btn-success" id="int_regs" name="international_reg" value="Save">
          
        </div>
        
      </div>
    </div>
  </div>
  
</div>

  </form>

<form action="registration_cards_be.php" method="get">
  <div class="container">
  
  <!-- The Modal -->
  <div class="modal" id="myModal4">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #f15025;color: white;">

        	 <button type="button"  class="btn   " data-toggle="modal" data-target="#myModal1" data-dismiss="modal"><i  class="fas fa-arrow-circle-left fa-2x"></i>       	 	 
        	 </button>
          <h4 class="modal-title mx-auto">Add On Services</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <table class="table  table-borderless table-responsive" id="table4" style="width: 100%">
			<tr>
			<th class="text-center" colspan="6">Add On Services</th>
			</tr>
			<tr>
				<th>
					Date
				</th>
				<th>
					Services
				</th>
				<th>
					Charge
				</th>
				<th>
					Tax/GST
				</th>
				<th>
					Total
				</th>
				
			</tr>
			<tr>
				<td>
					<input type="button" name="addrow" id="addrow"  class="btn btn-dark" onclick="addRow();" value="Add New">
				</td>
			</tr>
			<script >
			var index = 1;
				function addRow()
				{
				 
					  
	                    document.cookie="i="+index;
	                    
			            var table=document.getElementById("table4");
			            var row=table.insertRow((table.rows.length)-1);

 						var cell0=row.insertCell(0);
			            var t0=document.createElement("input");
			            	t0.setAttribute("type", "date");
			                t0.id = "dated"+index;
			                t0.name="dated"+index;


			                cell0.appendChild(t0);



			            var cell1=row.insertCell(1);
			            var t1=document.createElement("input");

			                t1.id = "services"+index;
			                t1.name="services"+index;

			                cell1.appendChild(t1);
			            var cell2=row.insertCell(2);
			            var t2=document.createElement("input");
			            	t2.setAttribute("type", "number");
			            	t2.setAttribute('onkeyup','total()');
			                t2.id = "charge"+index;
			                t2.name = "charge"+index;
			                cell2.appendChild(t2);
			            var cell3=row.insertCell(3);
			            var t3=document.createElement("input");
			            	t3.setAttribute("type", "number");
			                t3.id = "tax"+index;
			                t3.name = "tax"+index;
			                t3.setAttribute('onkeyup','total()');
			                cell3.appendChild(t3);
			            var cell4=row.insertCell(4);
			            var t4=document.createElement("input");
			                t4.id ="total"+index;
			                 t4.name ="total"+index;
			                cell4.appendChild(t4);

			                index+=1;
			            /*var cell5=row.insertCell(5);
			            var t5=document.createElement("BUTTON");
			            t5.innerHTML = 'Save';
			                t5.id = "edit"+index;
			                cell5.appendChild(t5);*/
			                document.getElementById("edit"+index).style.background = "#2F4F4F";
			                document.getElementById("edit"+index).style.width = "100px";
			                document.getElementById("edit"+index).style.height = "40px";

			                document.getElementById("edit"+index).style.borderRadius="25px";
			                 document.getElementById("edit"+index).style.color = "white";

			           

}


function total()
{

	var tax = document.getElementById("tax"+ (index - 1)).value;
	var charge = document.getElementById("charge" + (index - 1)).value;
	var t = Number(tax) + Number(charge);
	document.getElementById("total" + (index - 1)).value = t;
}
				
			</script>

		</table>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-danger" name="add_on" value="save">
        </div>
        
      </div>
    </div>
  </div>
  
</div>
</form>





<form action="registration_cards_be.php" method="post">
<div class="container">
  

  <!-- The Modal -->
  <div class="modal" id="myModal6">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #f15025;color: white;">
        	 <button type="button"  class="btn   " data-toggle="modal" data-target="#myModal1" data-dismiss="modal"><i  class="fas fa-arrow-circle-left fa-2x"></i>       	 	 
        	 </button>
          <h4 class="modal-title mx-auto" >Payment And Invoice</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
		          
        		<table class="table  table-responsive table-borderless " id="table5" >

			
		<?php
		$query1="SELECT * FROM reservation where folio_id='$_SESSION[folio]'";
		$res1=mysqli_query($con,$query1) or die(mysqli_error($con));
		$row1=mysqli_fetch_assoc($res1);
		$roomcharges=$row1['price']+$row1['tax'];


		$recv_amount=$row1['received_amount'];

		$query2="SELECT * FROM invoice where folioId='$_SESSION[folio]'";
		$res2=mysqli_query($con,$query2) or die(mysqli_error($con));
		$total=0;
		$credit=0;
		while($row2=mysqli_fetch_assoc($res2))
		{
			$price = ($row2['Charge']+$row2['tax_gst']);
			$total= $total + $price;
			$credit=$credit+$row2['credit'];
	    }

	    $total_charge=$roomcharges + $total;

	    $total_bill_paid=$recv_amount + $credit;





		?>
			<tr>
				<td>
				<label>Total&nbsp;Billed&nbsp;Amount</label >
				</td>
				<td>
					
					<input type="text" name="total_bill" readonly="" value=<?php echo $total_charge?> >
				</td>
				<td>
					<label>Paid Bill</label >
				</td>
				<td>
					<input type="text" name="paid_bill" readonly="" value="<?php echo $total_bill_paid; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label>Balance</label >
				</td>
				<td>
					<input type="text" name="balance" readonly="" value="<?php echo $total_charge -  $total_bill_paid; ?>">
				</td>
				<td>
					
				</td>
				<td>
					<input type="button" name="add_new" value="Add on Services" data-dismiss="modal" data-toggle="modal" data-target="#myModal4" class="btn btn-info"> 
				</td>
			</tr>

		</table>

          <div class="col-lg-12">
				<center>
			<span  colspan="4">Record Payment</span>
		</center> 
			<br>
				<label>Mode&nbsp;Of&nbsp;Payment</label >
				
					<input type="radio" style="margin-left: 25px;" name="payment_mode" required="" value="cash">
					<label><b>Cash</b></label >
					
			
					<input type="radio" style="margin-left: 25px;" name="payment_mode" required="" value="card">
					<label><b>Card</b></label >
					
					
					<input type="radio" style="margin-left: 25px;" name="payment_mode" required="" value="bank_transfer">
					<label><b>Bank Transfer</b></label >
					
					<input type="radio" style="margin-left: 25px;" name="payment_mode" required="" value="pos">
					<label><b>POS</b></label >
						
				
					<input type="radio" style="margin-left: 25px;" name="payment_mode" required="" value="wallet_payment">
					<label><b>Wallet</b></label >
				
					<input type="radio" style="margin-left: 25px;" name="payment_mode" required="" value="voucher_payment">
					<label><b>Voucher</b></label >

				
          </div>
	
		<table class="table  table-borderless table-responsive" id="table6" >

			<tr>
				<td>
					<label>Payment For</label>
				</td>
				<td>
					<select name="pending_bills" required onchange="change_value()" id="pending">
						<option value="">select</option>
						<?php 

						$query1="SELECT * FROM reservation WHERE folio_id='$_SESSION[folio]'";
						$res1=mysqli_query($con,$query1);
						while($row1=mysqli_fetch_assoc($res1))
						{
						$pending_a = $row1['total'] - $row1['received_amount'];
						if($pending_a)
							echo"<option value='1/".$row1['reservationId']."/".$row1['folio_id']."'>Reservation $row1[reservationId]</option>";
					}

							$sql="SELECT * FROM invoice WHERE folioId='$_SESSION[folio]' AND (credit is NULL or credit<debit)";
							$res=mysqli_query($con,$sql);
							while($row=mysqli_fetch_assoc($res))
							{
								echo "<option value = '2/".$row['invoice_no']."'>$row[description]</option>";
							}

						?>
						<option>safe deposit</option>
					</select>

					<div class="" id="select_value">
					</div>
				</td>

				
				<script>
					$(document).ready(function()
						{
							$('#pending').change(function(){
								var value=$(this).val();
								var sub_value=value.split("/");
								if(sub_value[0]==2)
								{
									var path="find_pending.php?invoc="+sub_value[1];
									$('#select_value').load(path,function(response,status){
										if(status=="success")
										{
											
											$("input[name='amount']").val($('#p_bal').val());
											
										}

									});
								}
								else if(sub_value[0]==1)
								{
									var path="find_pending.php?res_id="+sub_value[1];
									$('#select_value').load(path,function(response,status){
										if(status=="success")
										{
											
											$("input[name='amount']").val($('#p_bal').val());
											
										}

									});			
								}
							});
						});
				</script>

			</tr>
				<tr>
					<td>
						<label>Amount</label >
					</td>
					<td>
						<input type="text" name="amount" required="" value="<?php ?>">
					</td>
				
					<td>
						<label>Date&nbsp;Of&nbsp;Payment</label >
					</td>
					<td>
						<input type="date" name="date_of_payment" required="">
					</td>
				</tr>
				<tr>
					<td>
						<label>Transaction ref</label >
					</td>
					<td>
						<input type="text" name="transaction_ref" readonly="" value="<?php echo $_SESSION['folio']; ?>">
					</td>
				</tr>
				
			</table>
			<table class="table table-responsive table-borderless">
				<tr>
					<td>
						<label>Note</label>
					</td>
					<td >
						<textarea rows="3" cols="60" name="note" required=""></textarea>
					</td>
				</tr>
			</table>
			
						
					

		
		

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-danger" name="credit" value="Record">
        </div>
        
      </div>
    </div>
  </div>
  
</div>
</form>

<form action="registration_cards_be.php" method="post">
<div class="container">
  

  <!-- The Modal -->
  <div class="modal" id="myModal7">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #f15025;color: white;">
        	 <button type="button"  class="btn   " data-toggle="modal" data-target="#myModal1" data-dismiss="modal"><i  class="fas fa-arrow-circle-left fa-2x"></i>       	 	 
        	 </button>
          <h4 class="modal-title mx-auto">Departure Information</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	
          <table class="table   table-borderless table-responsive"  id="table6" >

			
			<tr>
				<td>
					<label>Guest&nbsp;Check&nbsp;Out</label >
				</td>
				<td>
					<input type="date" name="out_date" required="">
				</td>
				<td>
					<input type="time" name="out_time" required="" style="width: 150px;">
				</td>
			</tr>
			<tr>
				<td>
				<label>Duty Manager</label >
				</td>
				<td>
					<select name="duty_manager" required="" style="width: 170px;height: 30px;">
						<option>abc</option>
						<option>def</option>
						<option>ghi</option>
						<option>jkl</option>
					</select>
				</td>
				<td>
					<label>Room Inspected By</label >
				</td>
				<td>
					<input type="text" name="room_checked" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Room Key Recieved</label >
				</td>
				<td>
					<input type="radio" name="room_key" value="yes" required="">
					<label>Yes</label >
					&emsp;&emsp;
					<input type="radio" name="room_key" value="no">
					<label>No</label >
				</td>
			</tr>
			<tr>
				<td>
					<label>Room Status</label >
				</td>
				<td>
					<input type="radio" name="room_status" value="clean" required="">
					<label>Clean</label >
					&emsp;
					<input type="radio" name="room_status" value="dirty">
					<label>Dirty</label >
				</td>
			</tr>

			<tr>
				<td>
					<label>Bill To</label >
				</td>
				<td>
					<input type="radio" name="bill_to" value="Guest" required="">
					<label>Guest</label >
					&emsp;
					<input type="radio" name="bill_to" value="Company">
					<label>Company</label >
				</td>
			</tr>
		</table>
		  <div class="modal-footer">
        	<?php  
        	$sql="SELECT * FROM invoice where folioId='$_SESSION[folio]'";
        	$res=mysqli_query($con,$sql);
        	$row=mysqli_fetch_assoc($res);
        	if($row['credit'] - $row['debit']===0)
        	{
        	 
         echo" <input type='submit' name='generate_invoice' class='btn btn-primary'  value='Generate Invoice' >";
          }
          else
          {
          	echo "<input type='button' style='margin-left: 20px;width: 160px;display:none;' id='show_payment' name='departure_payment' class='btn btn-primary' value='Payment & Invoice' data-dismiss='modal' data-toggle='modal' data-target='#myModal6'>";

          	 echo" <input type='button' name='alert_message' class='btn btn-primary' onclick='message()' value='Generate Invoice' >";
          }
          ?>
          <script >
          	function message()
          	{
          		alert("please clear the balance");
          		document.getElementById('show_payment').click();

          	}
          </script>
        </div>
	
	
        </div>
        
        <!-- Modal footer -->
      
        
      </div>
    </div>
  </div>
  
</div>
</form>




<form action="registration_cards_be.php" method="post" enctype="multipart/form-data">
<div class="container">
 
  <!-- Button to Open the Modal -->
  <!-- <button type="button" class="btn btn-primary mt-5 " data-toggle="modal" data-target="#myModal8">
    Setting Invoice
  </button> -->

  <!-- The Modal -->
  <div class="modal fade" id="myModal8">
    <div class="modal-dialog modal-xl ">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #f15025;color: white;">
          <h4 class="modal-title">Setting Invoice</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <table class="table table-borderless table-responsive">
          	<tr>
          		<td>
          			<label>Property&nbsp;Name</label >
          		</td>
          		<td>
          			<input type="text" name="property_name" required="" >
          			<td>
          				<label>Address</label>
          			</td>
          			<td>
          				<input type="text" name="property_address" required="">
          			</td>
          		</td>
          
          		
          	</tr>
          	<tr>
          		<td>
          			<label >Logo</label >
          		</td>
          		<td>
          			<input type="file" name="logo"  accept=".jpg,.png,.jpeg" required="">
          		</td>
          		<td>
          			<label >Tax/GST</label >
          		</td>
          		<td>
          			<input type="text" name="tax_gst" required="" >
          		</td>
          		
          	</tr>
          	<tr>
          		<td>
          			<label >Invoice&nbsp;Prefix</label >
          		</td>
          		<td>
          			<input type="text" name="invoice_prefix" required="">
          		</td>
          		<td>
          			<label >Currency</label >
          		</td>
          		<td>
          			<input type="text" name="currency" required="">
          		</td>
          	</tr>
          </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-danger" value="save" name="invoice_setting">
        </div>
        
      </div>
    </div>
  </div>
  
</div>
</form>

<form method="post" >
<div class="container">
<div class="modal" id="myModal11">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: #f15025;color: white;">
      	<button type="button"  class="btn   " data-toggle="modal" data-target="#myModal1" data-dismiss="modal"><i  class="fas fa-arrow-circle-left fa-2x"></i>
      	</button>
        <h4 class="modal-title mx-auto">Change Room</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       	<input type="checkbox" name="unassign_room" class="unassign_room">
       	<label>Unassign Room</label><br><br>
       	
       	<center>
       		<div class="col-md-12" style="background: tomato;">
       	<label ><b>Rooms Available</b></label>
       	</div>
       	</center>
       	<br>
       	<?php
       	$sql="SELECT room_sub_id FROM rooms_inventory WHERE status='Available'";
       	$res=mysqli_query($con,$sql);
       	
       	while($row=mysqli_fetch_assoc($res))
       	{
       		echo"<input type='radio' name='assign'>";
       		echo $row['room_sub_id'].str_repeat('&emsp;', 5);
       		
       	}
       	?>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="button" class="btn btn-danger" value="close" data-dismiss="modal">
      </div>

    </div>
  </div>
</div>
</div>
</form>



<form action="registration_cards_be.php" method="post">
<div class="container">
<div class="modal" id="myModal12">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: #f15025;color: white;">
      	<button type="button"  class="btn   " data-toggle="modal" data-target="#myModal1" data-dismiss="modal"><i  class="fas fa-arrow-circle-left fa-2x"></i>
      	</button>
        <h4 class="modal-title mx-auto">Modify Reservation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       	<table class="table table-responsive table-borderless">
       		<tr>
       			<td>
       				<label>Hotel&nbsp;Id</label>
       			</td>
       			<td>
       				<input type="text" name="hotelid" value="<?php echo $_SESSION['hotel_id'] ?>">
       			</td>
       			<td>
       				<label>Room&nbsp;Id</label>

       			</td>
       			<td>
       				<input type="text" name="roomid" value="<?php echo $_SESSION['room_id'] ?>">
       			</td>
       			<td>
       				<label>Room&nbsp;Sub&nbsp;Id</label>
       			</td>
       			<td>
       				<input type="text" name="room_sub_id" value="<?php echo $_SESSION['room_sub_id'] ?>">
       			</td>
       		</tr>
       			<tr>
       			<td>
       				<label>Guest&nbsp;Name</label>
       			</td>
       			<td>
       				<input type="text" name="guest_name" value="<?php echo $_SESSION['guestName'] ?>">
       			</td>
       			<td>
       				<label>Email</label>
       			</td>
       			<td>
       				<input type="email" name="email" value="<?php echo $_SESSION['email'] ?>">
       			</td>
       			<td>
       				<label>Phone&nbsp;No</label>
       			</td>
       			<td>
       				<input type="number" name="phone" value="<?php echo $_SESSION['phoneNo'] ?>">
       			</td>
       			</tr>
       			<tr>
       				<td>
       					<label>Number&nbsp;Of&nbsp;Adults</label>
       				</td>
       				<td>
       					<input type="text" name="adults" value="<?php echo $_SESSION['noOfAdults'] ?>">
       				</td>
       				<td>
       					<label>Number&nbsp;Of&nbsp;Children</label>
       				</td>
       				<td>
       					<input type="text" name="children" value="<?php echo $_SESSION['noOfChildren'] ?>">
       				</td>
       				<!-- <td>
       					<label>Number&nbsp;of&nbsp;Rooms</label>
       				</td> -->
       			<!-- 	<td>
       					<input type="text" name="rooms" value="<?php echo $_SESSION['noOfRoom'] ?>">
       				</td> -->
       			</tr>
       			<tr>
       				<td>
       					<label>Price</label>
       				</td>
       				<td>
       					<input type="text" name="price" value="<?php echo $_SESSION['price'] ?>">
       				</td>
       				<td>
       					<label>Total</label>
       				</td>
       				<td>
       					<input type="text" name="total" value="<?php echo $_SESSION['total'] ?>">
       				</td>
       				<td>
       					<label>Nights</label>
       				</td>
       				<td>
       					<input type="text" name="nights" value="<?php echo $_SESSION['nights'] ?>">
       				</td>
       			</tr>
       			<tr>
       				<td>
       					<label>Channel</label>
       				</td>
       				<td>
       					<input type="text" name="channel" value="<?php echo $_SESSION['channel'] ?>">
       				</td>
       				<td>
       					<label>Status</label>
       				</td>
       				<td>
       					<input type="text" name="status" value="<?php echo $_SESSION['status'] ?>">
       				</td>
       			</tr>

       		
       	</table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" class="btn btn-warning" value="modify" name="modify">
      </div>

    </div>
  </div>
</div>
</div>

</form>	


<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal13" style="margin-left: 210px;margin-top: 50px;">
  Email Setting
</button>
 -->
<!-- The Modal -->
<div class="modal" id="myModal13">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background: tomato;color: white;">
        <h4 class="modal-title">Email Setting</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form action="auto_mail.php" method="post">
      <div class="modal-body">
        <input type="checkbox" name="email_checkbox[]" value="reservation_confirmation" >
        <label class="mx-auto">Reservation&nbsp;Confirmation</label>
        <input type="button" name="create_template" class="btn btn-success btn-sm float-right" data-dismiss="modal "data-toggle="modal" data-target="#myModal14" value="show email content" ><br>
        <input type="checkbox" name="email_checkbox[]" value="reservation_cancelation" >
        <label class="mx-auto">Reservation&nbsp;Cancellation</label>
         <input type="button" name="create_template" class="btn btn-success btn-sm float-right" data-dismiss="modal "data-toggle="modal" data-target="#myModal14" value="show email content" >
         <br>
        <input type="checkbox" name="email_checkbox[]" value="reservation_modification">
        <label class="mx-auto">Reservation&nbsp;Modification</label>
         <input type="button" name="create_template" class="btn btn-success btn-sm float-right" data-dismiss="modal "data-toggle="modal" data-target="#myModal14" value="show email content" >
         <br>
        <input type="checkbox" name="email_checkbox[]" value="pre_arrival">
        <label class="mx-auto">Pre&nbsp;Arrival</label>
         <input type="button" name="create_template" class="btn btn-success btn-sm float-right" data-dismiss="modal "data-toggle="modal" data-target="#myModal14" value="show email content" >
         <br>
        <input type="checkbox" name="email_checkbox[]" value="arrival">
        <label class="mx-auto">Arrival</label>
        <input type="button" name="create_template" class="btn btn-success btn-sm float-right" data-dismiss="modal "data-toggle="modal" data-target="#myModal14" value="show email content" >
         <br>
        <input type="checkbox" name="email_checkbox[]" value="departure">
        <label class="mx-auto">Departure</label>
        <input type="button" name="create_template" class="btn btn-success btn-sm float-right" data-dismiss="modal "data-toggle="modal" data-target="#myModal14" value="show email content" >
         <br>
        <input type="checkbox" name="email_checkbox[]" value="feedback">
        <label class="mx-auto">Feedback</label>
        <input type="button" name="create_template" class="btn btn-success btn-sm float-right" data-dismiss="modal "data-toggle="modal" data-target="#myModal14" value="show email content" >
         <br>

        
      </div>
  </form>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<form>
	<div class="container">
<div class="modal" id="myModal14">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background: tomato;color:white;">
        <h4 class="modal-title">SET TEMPLATE</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <input type="text" name="from" placeholder="from" class="col-lg-12">
<br><br>
       <input type="text" name="to" placeholder="cc" class="col-lg-12">

       <br><br>
       <input type="text" name="subject" placeholder="subject" class="col-lg-12">
       <br><br>
        <input type="text" name="body" placeholder="email body" class="col-lg-12" style="height: 150px;">
      </div>
      


      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
</form>


</body>
</html>