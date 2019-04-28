<?php
session_start();
include'registration_cards_database.php';
$folio= $_SESSION['folio'];

$sql1="SELECT * FROM  international_registration where folio='$folio'";
$sql2="SELECT * FROM arrival_info where folio='$folio'";
$sql3="SELECT * FROM for_hotel_use where folio='$folio'";
$sql4="SELECT * FROM sharer_occupants where folio='$folio'";
$sql5="SELECT * FROM  domestic_registration where folio='$folio'";
$res1=(mysqli_query($con,$sql1));
$res5=(mysqli_query($con,$sql5));
if(mysqli_num_rows($res5)>0)
{
	$row5=mysqli_fetch_assoc($res5);
	$reg_num=$row5['registration_reference'];
	$reg_date=$row5['registration_date'];
	$guest_name=$row5['guest_name'];
	$designation=$row5['designation'];
	$birthday=$row5['birthday'];
	$anniversary=$row5['anniversary'];
	$com_org=$row5['company'];
	$tax_gst=$row5['tax_gst'];
	$street=$row5['street'];
	$city=$row5['city'];
	$state=$row5['state'];
	$country=$row5['country'];
	$zipcode=$row5['zipcode'];
	

	if($res2=(mysqli_query($con,$sql2)))
	{
		$row2=mysqli_fetch_assoc($res2);
		$arrived_from=$row2['arrived_from'];
		$proceeding_to=$row2['proceeding_to'];
		$arr_date=$row2['arrived_date'];
		$arr_time=$row2['arrived_time'];
		$dep_date=$row2['departure_date'];
		$dep_time=$row2['departure_time'];
		$visit_purpose=$row2['visit_purpose'];
		
	}

	if($res3=(mysqli_query($con,$sql3)))
	{
		$row3=mysqli_fetch_assoc($res3);
		$room_no=$row3['room_no'];
		$room_type=$row3['room_type'];
		$room_rate=$row3['room_rate'];
		$adults=$row3['adults'];
		$children=$row3['children'];
		$extra_bed=$row3['extra_person'];
		$address_billing=$row3['billing_instructions'];
		$front_desk=$row3['front_desk'];
		$duty_manager=$row3['duty_manager'];
		
	}
	if($res4=(mysqli_query($con,$sql4)))
	{
		$row4=mysqli_fetch_assoc($res4);
		$occup_name=$row4['name'];
		$occup_relation=$row4['relationship'];
		$occup_email=$row4['email'];
		$occup_mobile=$row4['mobile'];
		$nation=$row4['nationality'];
		$identification=$row4['identification'];
		
	}

	$query="SELECT * FROM setting_invoice";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
$final_row=mysqli_fetch_assoc($result);
echo"<div >";
echo"<img src='data:image/jpeg;base64,".base64_encode($final_row['logo'])."' style='width:200px;height:100px;margin-top: -20px;' class='img'>"; 	
echo "</div>";
echo"<div style='margin-left:40px;'>";
echo $final_row['property_name'];
echo"<br>";
echo $final_row['property_address'];
echo"<br>";
echo $final_row['tax_gst'];
echo "</div>";


echo"<div >
<div align='center'><label>Registration Card</label><br>
<label>Domestic Guest</label></div>
<div>

<label>Registration Date:$reg_date</label>
<label style='float:right;'>Registration Number:$reg_num</label>
</div>
<div style='border:1px solid;'>
<table cellspacing='10' cellpadding='5'>
<tr>
<th>Guest Details</th>
</tr>
 <tr>  
  
  <td>Guest&nbsp;Name:</td>
 
  <td>$guest_name</td>
 
  <td>Designation:</td>
 
  <td>$designation</td>
 
  <td>BirthDay:</td>
 
  <td>$birthday</td>

  
  <td>Anniversary:</td>
 
  <td>$anniversary</td>
 </tr>
  <tr>
  <td>Company:</td>
 
  <td>$com_org</td>
 
  <td>Tax/Gst:</td>
 
  <td>$tax_gst</td>
 
  </tr>
  </table>
  </div>

  <div style='border:1px solid;' >
<table cellspacing='10' cellpadding='5'>
<tr>
<th>
Address Details
</th>
</tr>
<tr>
<td>Street:</td>
<td>$street</td>
<td>City:</td>
<td>$city</td>
<td>State:</td>
<td>$state</td>
<td>Country:</td>
<td>$country</td>
<td>ZipCode:</td>
<td>$zipcode</td>
</tr>
</table>
</div>

 <div style='border:1px solid;' >
<table cellspacing='10' cellpadding='5'>

  <tr>
  <th>Arrival Details</th>
  </tr>
  <tr>
  <td>Arrived&nbsp;From:</td>
 
  <td>$arrived_from</td>
 
  <td>Proceeding&nbsp;To:</td>
 
  <td>$proceeding_to</td>
 
  <td>Arrival&nbsp;Date:</td>
 
  <td>$arr_date</td>
 
  <td>Arrival&nbsp;Time:</td>
 
  <td>$arr_time</td>
  </tr>
  </table>
  </div>

  <div style='border:1px solid;' >
 <table cellspacing='10' cellpadding='5'>
 
  <tr>
<th>
	Departure Details
</th>
</tr>
  <tr>
  <td>Departure&nbsp;Date:</td>
 
  <td>$dep_date</td>
 
  <td>Departure&nbsp;Time:</td>
 
  <td>$dep_time</td>
 
  <td>Purpose&nbsp;of&nbsp;visit:</td>

  <td>$visit_purpose</td>

  
 </tr>
 </table>
 </div>

  <div style='border:1px solid;'>
 <table cellspacing='10' cellpadding='5'>
 <tr>
 <th>
 Occupant Details
 </th>
 </tr>
 <tr>
 <td>Occupant&nbsp;Name:</td>
  <td>$occup_name</td>
  
 
  <td>Occupant&nbsp;Relation:</td>
 
  <td>$occup_relation</td>
  <td>Occupant&nbsp;Email:</td>
  <td>$occup_email<td>
  </tr>
  <tr>
  <td>Occupant&nbsp;Mobile:</td>
  <td>$occup_mobile</td>
  <td>Occupant&nbsp;Nationality:</td>
  <td>$nation</td>
  <td>Occupant&nbsp;Identification:</td>
  <td>$identification</td>
  </tr>
  
  </table>
  </div>


   <div style='border:1px solid;' >
 <table cellspacing='10' cellpadding='5'>
 <tr>
 <th>Room Details</th>
 </tr>
 <tr>
  <td>Room&nbsp;Number:</td>
  <td>$room_no</td>
  <td>Room&nbsp;Type:</td>
  <td>$room_type</td>
  <td>Room&nbsp;Rate:</td>
  <td>$room_rate</td>
  <td>Adults:</td>
  <td>$adults</td>
  <td>Children:</td>
  <td>$children</td>
  </tr>
  
  <tr>
  <td>Extra&nbsp;Bed:</td>
  <td>$extra_bed</td>
  <td>Address&nbsp;Billing:</td>
  <td>$address_billing</td>
  <td>Front&nbsp;Desk:</td>
  <td>$front_desk</td>
  <td>Duty&nbsp;Manager:</td>
  <td>$duty_manager</td>

  </tr>
  </table>
  </div>

  <div style='border:1px solid;' >
 <table cellspacing='10' cellpadding='5'>

 <tr>
 <th>Payment Info</th>
 </tr>
 <tr>
 <td>Total&nbsp;Billed&nbsp;Amount:</td>
 <td>$_SESSION[final_debit]</td>
 <td>Paid&nbsp;Bill:</td>
 <td>$_SESSION[final_credit]</td>
 <td>Balance:</td>
 <td>$_SESSION[final_balance]</td>

 </tr>
 </table>
<div style='padding-bottom:100px;border:1px solid'>
<center>
<label ><b>Signature</b></label>
</center>
<br>
<label>Guest</label>
<label style='float:right'>Front&nbsp;Office/Reception</label>
</div>
</div>
  <div class='mt-3'>
  <center>
  <label >powered by</label>
  <a href='www.mytravaly.com'>myTravaly.com</a>
  <label>| Join our Travellers community to connect millions of travellers like you |</label>
  </center>
  </div>";

echo"<script>window.print();</script>";
}
else if(mysqli_num_rows($res1)>0){
	$row1=mysqli_fetch_assoc($res1);
	$reg_no=$row1['registration_reference'];
	$reg_date=$row1['registration_date'];
	$gst_name=$row1['guest_name'];
	$nationality=$row1['Nationality'];
	$birthday=$row1['birthday'];
	$anniversary=$row1['anniversary'];
	$com_org=$row1['Company'];
	$tax_gst=$row1['Tax'];
	$passport_no=$row1['passport_no'];
	$passport_expiry=$row1['passport_expiry'];
	$visa_no=$row1['visa_no'];
	$visa_expiry=$row1['visa_expiry'];
	$doa=$row1['arrival_date'];
	$duration=$row1['stay_duartion'];
	$immigration=$row1['arrival_immigration'];
	$employed=$row1['employed'];
	$street=$row1['street'];
	$city=$row1['city'];
	$state=$row1['state'];
	$country=$row1['country'];
	$zipcode=$row1['zipcode'];

	if($res2=(mysqli_query($con,$sql2)))
	{
		$row2=mysqli_fetch_assoc($res2);
		$arrived_from=$row2['arrived_from'];
		$proceeding_to=$row2['proceeding_to'];
		$arr_date=$row2['arrived_date'];
		$arr_time=$row2['arrived_time'];
		$dep_date=$row2['departure_date'];
		$dep_time=$row2['departure_time'];
		$visit_purpose=$row2['visit_purpose'];
		
	}

	if($res3=(mysqli_query($con,$sql3)))
	{
		$row3=mysqli_fetch_assoc($res3);
		$room_no=$row3['room_no'];
		$room_type=$row3['room_type'];
		$room_rate=$row3['room_rate'];
		$adults=$row3['adults'];
		$children=$row3['children'];
		$extra_bed=$row3['extra_person'];
		$address_billing=$row3['billing_instructions'];
		$front_desk=$row3['front_desk'];
		$duty_manager=$row3['duty_manager'];
		
	}
	if($res4=(mysqli_query($con,$sql4)))
	{
		$row4=mysqli_fetch_assoc($res4);
		$occup_name=$row4['name'];
		$occup_relation=$row4['relationship'];
		$occup_email=$row4['email'];
		$occup_mobile=$row4['mobile'];
		$nation=$row4['nationality'];
		$identification=$row4['identification'];
		
	}


$query="SELECT * FROM setting_invoice";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
$final_row=mysqli_fetch_assoc($result);

echo"<div >";
echo"<img src='data:image/jpeg;base64,".base64_encode($final_row['logo'])."' style='width:200px;height:70px;margin-top: -20px;' class='img'/>"; 	
echo "</div>";
echo"<div style='margin-left:40px;'>";
echo $final_row['property_name'];
echo"<br>";
echo $final_row['property_address'];
echo"</br>";
echo $final_row['tax_gst'];
echo "</div>";

echo"<div align='center'><label>Registration Card</label><br>";
echo"<label>international Guest</label></div>";
echo"<div>

<label>Registration Date:$reg_date</label>
<label style='float:right;'>Registration Number:$row1[registration_reference]</label>
</div>";
echo"<div >";
echo "
<div style='border:1px solid;'>
<table cellspacing='4' cellpadding='3'>
<tr>
<th>Guest&nbsp;Details</th>
</tr>
 <tr>
  
  <td>Guest&nbsp;Name</td>
 
  <td>$gst_name</td>
  <td>Nationality</td>
  <td>$nationality</td>
 
  <td>BirthDay</td>
 
  <td>$birthday</td>

   <td>Tax/Gst</td>
 
  <td>$tax_gst</td>
	</tr>
  <tr>
   <td>Company</td>
 
  <td>$com_org</td>
 
 <td>Anniversary</td>
 
  <td>$anniversary</td>
  
  
  <td>Passport&nbsp;Number</td>
 
  <td>$passport_no</td>
  <td>Passport&nbsp;Expiry</td>
 
  <td>$passport_expiry</td>
 </tr>
  <tr>
  <td>Visa&nbspNumber</td>
  <td>$visa_no</td>
  <td>Visa&nbsp;Expiry</td>
  <td>$visa_expiry</td>
<td>Date&nbsp;Of&nbsp;Arrival</td>
<td>$doa</td>
<td>Stay&nbsp;Duration</td>
<td>$duration</td>
</tr>
  <tr>
<td>Immigration</td>
<td>$immigration</td>
<td>Employed</td>
<td>$employed</td>
 
  </tr>
  </table>
  </div>

 <div style='border:1px solid;' >
<table cellspacing='4' cellpadding='3'>
<tr>
<th>
Address Details
</th>
</tr>
<tr>
<td>Street:</td>
<td>$street</td>
<td>City:</td>
<td>$city</td>
<td>State:</td>
<td>$state</td>
<td>Country:</td>
<td>$country</td>
</tr>
<tr>
<td>ZipCode:</td>
<td>$zipcode</td>
</tr>
</table>
</div>

 <div style='border:1px solid;' >
<table cellspacing='4' cellpadding='3'>

  <tr>
  <th>Arrival Details</th>
  </tr>
  <tr>												
  <td>Arrived From</td>
 
  <td>$arrived_from</td>
 
  <td>Proceeding&nbsp;To</td>
 
  <td>$proceeding_to</td>
 
  <td>Arrival&nbsp;Date</td>
 
  <td>$arr_date</td>
 
  <td>Arrival&nbsp;Time</td>
 
  <td>$arr_time</td>
  </tr>
  </table>
  </div>

  <div style='border:1px solid;' >
 <table cellspacing='4' cellpadding='3'>
 
  <tr>
<th>
	Departure Details
</th>
</tr>
  <tr>
  <td>Departure&nbsp;Date</td>
 
  <td>$dep_date</td>
 
  <td>Departure&nbsp;Time</td>
 
  <td>$dep_time</td>
 
  <td>Purpose&nbsp;of&nbsp;visit</td>

  <td>$visit_purpose</td>

  
 </tr>
 </table>
 </div>

  <div style='border:1px solid;'>
 <table cellspacing='4' cellpadding='3'>
 <tr>
 <th>
 Occupant Details
 </th>
 </tr>
 <tr>
 <td>Occupant&nbsp;Name</td>
  <td>$occup_name</td>
  
 
  <td>Occupant&nbsp;Relation</td>
 
  <td>$occup_relation</td>
  <td>Occupant&nbsp;Email</td>
  <td>$occup_email<td>
  </tr>
  <tr>
  <td>Occupant&nbsp;Mobile</td>
  <td>$occup_mobile</td>
  <td>Occupant&nbsp;Nationality</td>
  <td>$nation</td>
  <td>Occupant&nbsp;Identification</td>
  <td>$identification</td>
  </tr>
  
  </table>
  </div>


   <div style='border:1px solid;' >
 <table cellspacing='4' cellpadding='3'>
 <tr>
 <th>Room Details</th>
 </tr>
 <tr>
  <td>Room&nbsp;Number</td>
  <td>$room_no</td>
  <td>Room&nbsp;Type</td>
  <td>$room_type</td>
  <td>Room&nbsp;Rate</td>
  <td>$room_rate</td>
  <td>Adults</td>
  <td>$adults</td>
  <td>Children</td>
  <td>$children</td>
  </tr>
  
  <tr>
  <td>Extra&nbsp;Bed</td>
  <td>$extra_bed</td>
  <td>Address&nbsp;Billing</td>
  <td>$address_billing</td>
  <td>Front&nbsp;Desk</td>
  <td>$front_desk</td>
  <td>Duty&nbsp;Manager</td>
  <td>$duty_manager</td>

  </tr>
  </table>
  </div>
  
  <div style='border:1px solid;' >
 <table cellspacing='4' cellpadding='3'>

 <tr>
 <th>Payment Info</th>
 </tr>
 <tr>
 <td>Total&nbsp;Billed&nbsp;Amount:</td>
 <td>$_SESSION[final_debit]</td>
 <td>Paid&nbsp;Bill:</td>
 <td>$_SESSION[final_credit]</td>
 <td>Balance:</td>
 <td>$_SESSION[final_balance]</td>

 </tr>
 </table>

<div style='padding-bottom:80px;border:1px solid'>
<center>
<label ><b>Signature</b></label>
</center>
<br>
<label>Guest</label>
<label style='float:right'>Front&nbsp;Office/Reception</label>
</div>
  <div class='mt-3'>
  <center>
  <label>powered by</label>
  <a href='www.mytravaly.com'>mytravaly.com</a>
  <label>| Join our Travellers community to connect millions of travellers like you |</label>
  </center>
  </div>
  ";



  echo"<script>window.print();</script>";



}
else
{
	echo "record not found";
}

?>