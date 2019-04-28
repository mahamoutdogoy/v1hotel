<?php
session_start();
require_once('phpmailer/sendemail.php');
include'registration_cards_database.php';
$email=$_SESSION['email'];

	if(isset($_POST['send_email_dom']))
{

	$reg_num=$_SESSION['d_dom_reg'];
	$reg_date=$_SESSION['d_reg_date'];
	$guest_name=$_SESSION['d_guest_name'];
	$designation=$_SESSION['d_designation'];
	$birthday=$_SESSION['d_birthday'];
	$anniversary=$_SESSION['d_anniversary'];
	$com_org=$_SESSION['d_com_org'];
	$tax_gst=$_SESSION['d_tax_gst'];
	$street=$_SESSION['d_street'];
	$city=$_SESSION['d_city'];
	$state=$_SESSION['d_state'];
	$country=$_SESSION['d_country'];
	$zipcode=$_SESSION['d_zipcode'];


	$arrived_from=$_SESSION['d_arrived_from'];
	$proceeding_to=$_SESSION['d_proceeding_to'];
	$arr_date=$_SESSION['d_arr_date'];
	$arr_time=$_SESSION['d_arr_time'];
	$dep_date=$_SESSION['d_dep_date'];
	$dep_time=$_SESSION['d_dep_time'];
	$visit_purpose=$_SESSION['d_visit_purpose'];


	$occup_name=$_SESSION['d_occup_name'];
	$occup_relation=$_SESSION['d_occup_relation'];
	$occup_email=$_SESSION['d_occup_email'];
	$occup_mobile=$_SESSION['d_occup_mobile'];
	$nation=$_SESSION['d_nation'];
	$identification=$_SESSION['d_identification'];


	$room_no=$_SESSION['d_room_no'];
	$room_type=$_SESSION['d_room_type'];
	$room_rate=$_SESSION['d_room_rate'];
	$adults=$_SESSION['d_adults'];
	$children=$_SESSION['d_children'];
	$extra_bed=$_SESSION['d_extra_bed'];
	$address_billing=$_SESSION['d_address_billing'];
	$front_desk=$_SESSION['d_front_desk'];
	$duty_manager=$_SESSION['d_duty_manager'];





	$sub='Registration Details';	
	$query="SELECT * FROM setting_invoice";
	$result=mysqli_query($con,$query) or die(mysqli_error($con));
	$final_row=mysqli_fetch_assoc($result);

$body="<html><body>";
$body.="<div >";
$body.="<img src='data:image/jpeg;base64,".base64_encode($final_row['logo'])."' style='width:200px;height:100px;margin-top: -20px;' class='img'/>"; 	
$body.= "</div>";
$body.="<div style='margin-left:40px;'>";
$body.= $final_row['property_name'];
$body.="<br>";
$body.= $final_row['property_address'];
$body.="</br>";
$body.= $final_row['tax_gst'];
$body.= "</div>";

$body.="<div align='center'><label>Registration Card</label><br>";
$body.="<label>international Guest</label></div>";
$body.="<div>

<label>Registration Date:$reg_date</label>
<label style='float:right;'>Registration Number:$reg_num</label>
</div>";
$body.="
<div style='border:1px solid;'>
<table cellspacing='8' cellpadding='3'>
<tr>
<th>Guest&nbsp;Details</th>
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
<table cellspacing='8' cellpadding='3'>
<tr>
<th>
Address&nbsp;Details
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
<table cellspacing='8' cellpadding='3'>

  <tr>
  <th>Arrival&nbsp;Details</th>
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
 <table cellspacing='8' cellpadding='3'>
 
  <tr>
<th>
	Departure&nbsp;Details
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
 <table cellspacing='8' cellpadding='3'>
 <tr>
 <th>
 Occupant&nbsp;Details
 </th>
 </tr>
 <tr>
 <td>Occupant&nbsp;Name:</td>
  <td>$occup_name</td>
  
 
  <td>Occupant&nbsp;Relation:</td>
 
  <td>$occup_relation</td></tr>
  <tr>
  <td>Occupant&nbsp;Email:</td>
  <td>$occup_email<td>
  </tr>
  <tr>
  <td>Occupant&nbsp;Mobile:</td>
  <td>$occup_mobile</td>
  <td>Occupant&nbsp;Nationality:</td>
  <td>$nation</td></tr>
  <tr>
  <td>Occupant&nbsp;Identification:</td>
  <td>$identification</td>
  </tr>
  
  </table>
  </div>


   <div style='border:1px solid;' >
 <table cellspacing='8' cellpadding='3'>
 <tr>
 <th>Room&nbsp;Details</th>
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
  </tr>
  <tr>
  <td>Children:</td>
  <td>$children</td>
  <td>Extra&nbsp;Bed:</td>
  <td>$extra_bed</td>
  <td>Address&nbsp;Billing:</td>
  <td>$address_billing</td>
  </tr>
  <tr>
  <td>Front&nbsp;Desk:</td>
  <td>$front_desk</td>
  <td>Duty&nbsp;Manager:</td>
  <td>$duty_manager</td>




  </tr>
  </table>
  </div>

  <div style='border:1px solid;' >
 <table cellspacing='8' cellpadding='3'>

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
 </div>
  <div class='mt-3'>
  <center>
  <label >powered by</label>
  <a href='www.mytravaly.com'>myTravaly.com</a>
  <label>| Join our Travellers community to connect millions of travellers like you |</label>
  </center>
  </div></div>
  ";
	

		if(send_mail($email,$sub,$body))
		{
			echo "mail sent successfully";
		}
}	


if(isset($_POST['send_email_int']))
{

$reg_no=$_SESSION['reg_no'];
$reg_date=$_SESSION['reg_date'];
$gst_name=$_SESSION['gst_name'];
$nationality=$_SESSION['nationality'];
$birthday=$_SESSION['birthday'];
$anniversary=$_SESSION['anniversary'];
$com_org=$_SESSION['com_org'];
$tax_gst=$_SESSION['tax_gst'];
$passport_no=$_SESSION['passport_no'];
$passport_expiry=$_SESSION['passport_expiry'];
$visa_no=$_SESSION['visa_no'];
$visa_expiry=$_SESSION['visa_expiry'];
$doa=$_SESSION['doa'];
$duration=$_SESSION['duration'];
$immigration=$_SESSION['immigration'];
$employed=$_SESSION['employed'];
$street=$_SESSION['street'];
$city=$_SESSION['city'];
$state=$_SESSION['state'];
$country=$_SESSION['country'];
$zipcode=$_SESSION['zipcode'];

$arrived_from=$_SESSION['arrived_from'];
$proceeding_to=$_SESSION['proceeding_to'];
$arr_date=$_SESSION['arr_date'];
$arr_time=$_SESSION['arr_time'];
$dep_date=$_SESSION['dep_date'];
$dep_time=$_SESSION['dep_time'];
$visit_purpose=$_SESSION['visit_purpose'];


$occup_name=$_SESSION['occup_name'];
$occup_relation=$_SESSION['occup_relation'];
$occup_email=$_SESSION['occup_email'];
$occup_mobile=$_SESSION['occup_mobile'];
$nation=$_SESSION['nation'];
$identification=$_SESSION['identification'];


$room_no=$_SESSION['room_no'];
$room_type=$_SESSION['room_type'];
$room_rate=$_SESSION['room_rate'];
$adults=$_SESSION['adults'];
$children=$_SESSION['children'];
$extra_bed=$_SESSION['extra_bed'];
$address_billing=$_SESSION['address_billing'];
$front_desk=$_SESSION['front_desk'];
$duty_manager=$_SESSION['duty_manager'];


$sub='Registration Details';	
	$query="SELECT * FROM setting_invoice";
	$result=mysqli_query($con,$query) or die(mysqli_error($con));
	$final_row=mysqli_fetch_assoc($result);

$body="<html><body>";
$body.="<div >";
$body.="<img src='data:image/jpeg;base64,".base64_encode($final_row['logo'])."' style='width:200px;height:100px;margin-top: -20px;' class='img'/>"; 	
$body.= "</div>";
$body.="<div style='margin-left:40px;'>";
$body.= $final_row['property_name'];
$body.="<br>";
$body.= $final_row['property_address'];
$body.="</br>";
$body.= $final_row['tax_gst'];
$body.= "</div>";

$body.="<div >";
$body.="<img src='data:image/jpeg;base64,".base64_encode($final_row['logo'])."' style='width:200px;height:100px;margin-top: -20px;' class='img'/>"; 	
$body.= "</div>";
$body.="<div style='margin-left:40px;'>";
$body.= $final_row['property_name'];
$body.="<br>";
$body.= $final_row['property_address'];
$body.="</br>";
$body.= $final_row['tax_gst'];
$body.= "</div>";

$body.="<div align='center'><label>Registration Card</label><br>";
$body.="<label>international Guest</label></div>";
$body.="<div>

<label>Registration Date:$reg_date</label>
<label style='float:right;'>Registration Number:$reg_no</label>
</div>";
$body.="<div >";
$body.= "
<div style='border:1px solid;'>
<table cellspacing='8' cellpadding='3'>
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
<table cellspacing='8' cellpadding='3'>
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
<table cellspacing='8' cellpadding='3'>

  <tr>
  <th>Arrival&nbsp;Details</th>
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
 <table cellspacing='8' cellpadding='3'>
 
  <tr>
<th>
	Departure&nbsp;Details
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
 <table cellspacing='8' cellpadding='3'>
 <tr>
 <th>
 Occupant7nbsp;Details
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
 <table cellspacing='8' cellpadding='3'>
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
 <table cellspacing='8' cellpadding='3'>

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

  <div class='mt-3'>
  <center>
  <label>powered by</label>
  <a href='www.MyTravaly.com'>myTravaly.com</a>
  <label>| Join our Travellers community to connect millions of travellers like you |</label>
  </center>
  </div>
  </div>";


if(send_mail($email,$sub,$body))
		{
			echo "mail sent successfully";
		}

}	

?>