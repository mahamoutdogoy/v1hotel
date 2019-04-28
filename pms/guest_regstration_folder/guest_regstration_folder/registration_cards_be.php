<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
 
  <div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background: tomato;">
        <h5 class="modal-title">Print And Mail</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="print&email_be.php" method="post">
       <input type="submit" name="print_int_reg_details" class="btn btn-info" value="print" style="width:150px;border-radius: 25px;margin-left: 50px;margin-bottom: 20px;" >
     </form>
     <form action="int_email_regst_details.php" method="post">
       <input type="submit" name="send_email_int" class="btn btn-info" value="Send-Email" style="width:150px;border-radius: 25px;margin-left: 50px;">
     </form>
      </div>

      <!-- Modal footer -->
      

    </div>
  </div>
</div>




  <div class="modal" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background: tomato;">
        <h5 class="modal-title" style="color:white;">Print And Mail</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="print&email_be.php" method="post">
       <input type="submit" name="print_reg_details_dom" class="btn btn-info" value="print" style="width:150px;border-radius: 25px;margin-left: 50px;margin-bottom: 30px;">
     </form>
     <form action="dom_email_registation_details.php" method="post">
       <input type="submit" name="send_email_dom" class="btn btn-info" value="Send-Email" style="width:150px;border-radius: 25px;margin-left: 50px;">
</form>
      </div>

      

    </div>
  </div>
</div>

</body>
</html>
<?php
session_start();
echo"<!DOCTYPE html>";
echo"<html>";
echo"<head>";
	echo"<title>registration card</title>

	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' integrity='sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS' crossorigin='anonymous'>

	<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js' integrity='sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k' crossorigin='anonymous'></script>

	<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>

   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js'></script>
   <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js'></script>

   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin=anonymous>";



$folio= $_SESSION['folio']; 
include 'registration_cards_database.php';
require_once('phpmailer/sendemail.php');
if(isset($_POST['cancel_reservation']))
{
	echo"<script>

$.post('cancel_reservation.php', {}, function(data){

                       
                      
                       
                   });



  </script>";
  echo"<script>alert('Cancellation charges apply')</script>";
  

}

 





if(isset($_POST['modify']))
{
	
	$hotel_id=$_POST['hotelid'];
	$room_id=$_POST['roomid'];
	$room_sub_id=$_POST['room_sub_id'];
	$guest_name=$_POST['guest_name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$adults=$_POST['adults'];
	$children=$_POST['children'];
	$rooms=$_POST['rooms'];
	$price=$_POST['price'];
	$total=$_POST['total'];
	$nights=$_POST['nights'];
	$channel=$_POST['channel'];
	$status=$_POST['status'];

/*,noOfRoom='$rooms'*/
	$sql="UPDATE reservation SET hotel_id='$hotel_id' ,room_id='$room_id',room_sub_id='$room_sub_id',guestName='$guest_name',email='$email',phoneNo='$phone',noOfAdults='$adults',noOfChildren='$children',price	='$price',total='$total',nights='$nights',channel='$channel',status='$status' ";
	if(mysqli_query($con,$sql))
		echo "records modified";
	else
		echo "records not modified";
}

if(isset($_POST['send_mail']))
{
	$recipients=$_POST['recipients'];
	$subject=$_POST['subject'];
	$body=$_POST['body'];

	send_mail($recipients,$subject,$body);
}



       	 if (isset($_POST['unassign_room'])) 
       	 {
       	 	/*echo $_SESSION[folio];*/
       	 	$query="UPDATE rooms_inventory SET status='Available' WHERE folio=$_SESSION[folio] ";
       	 	mysqli_query($con,$query);
       	 }





if(isset($_POST['international_reg']))
{
$reg_no=$_POST['reg_no'];
$reg_date=$_POST['reg_date'];
$gst_name=$_POST['gst_name'];
$nationality=$_POST['nationality'];
$birthday=$_POST['birthday'];
$anniversary=$_POST['anniversary'];
$com_org=$_POST['com_org'];
$tax_gst=$_POST['tax_gst'];
$passport_no=$_POST['passport_no'];
$passport_expiry=$_POST['passport_expiry'];
$visa_no=$_POST['visa_no'];
$visa_expiry=$_POST['visa_expiry'];
$doa=$_POST['doa'];
$duration=$_POST['duration'];
$immigration=$_POST['immigration'];
$employed=$_POST['employed'];
$street=$_POST['street'];
$city=$_POST['city'];
$state=$_POST['state'];
$country=$_POST['country'];
$zipcode=$_POST['zipcode'];



$arrived_from=$_POST['arrived_from'];
$proceeding_to=$_POST['proceeding_to'];
$arr_date=$_POST['arr_date'];
$arr_time=$_POST['arr_time'];
$dep_date=$_POST['dep_date'];
$dep_time=$_POST['dep_time'];
$visit_purpose=$_POST['visit_purpose'];


$occup_name=$_POST['occup_name'];
$occup_relation=$_POST['occup_relation'];
$occup_email=$_POST['occup_email'];
$occup_mobile=$_POST['occup_mobile'];
$nation=$_POST['nation'];
$identification=$_POST['identification'];


$room_no=$_POST['room_no'];
$room_type=$_POST['room_type'];
$room_rate=$_POST['room_rate'];
$adults=$_POST['adults'];
$children=$_POST['children'];
$extra_bed=$_POST['extra_bed'];
$address_billing=$_POST['address_billing'];
$front_desk=$_POST['front_desk'];
$duty_manager=$_POST['duty_manager'];


$_SESSION['reg_no']=$reg_no;
$_SESSION['reg_date']=$reg_date;
$_SESSION['gst_name']=$gst_name;
$_SESSION['nationality']=$nationality;
$_SESSION['birthday']=$birthday;
$_SESSION['anniversary']=$anniversary;
$_SESSION['com_org']=$com_org;
$_SESSION['tax_gst']=$tax_gst;
$_SESSION['passport_no']=$passport_no;
$_SESSION['passport_expiry']=$passport_expiry;
$_SESSION['visa_no']=$visa_no;
$_SESSION['visa_expiry']=$visa_expiry;
$_SESSION['doa']=$doa;
$_SESSION['duration']=$duration;
$_SESSION['immigration']=$immigration;
$_SESSION['employed']=$employed;
$_SESSION['street']=$street;
$_SESSION['city']=$city;
$_SESSION['state']=$state;
$_SESSION['country']=$country;
$_SESSION['zipcode']=$zipcode;



  $_SESSION['arrived_from']=$arrived_from;
  $_SESSION['proceeding_to']=$proceeding_to;
  $_SESSION['arr_date']=$arr_date;
  $_SESSION['arr_time']=$arr_time;
  $_SESSION['dep_date']= $dep_date;
  $_SESSION['dep_time']=$dep_time;
  $_SESSION['visit_purpose']=$visit_purpose;


  $_SESSION['occup_name']=$occup_name;
  $_SESSION['occup_relation']=$occup_relation;
  $_SESSION['occup_email']=$occup_email;
  $_SESSION['occup_mobile']=$occup_mobile;
  $_SESSION['nation']=$nation;
  $_SESSION['identification']=$identification;

  $_SESSION['room_no']=$room_no;
  $_SESSION['room_type']=$room_type;
  $_SESSION['room_rate']=$room_rate;
  $_SESSION['adults']=$adults;
  $_SESSION['children']=$children;
  $_SESSION['extra_bed']=$extra_bed;
  $_SESSION['address_billing']=$address_billing;
  $_SESSION['front_desk']=$front_desk;
  $_SESSION['duty_manager']=$duty_manager;




$current_date = date("Y-m-d H:i:s");
 
  
$sql1="INSERT INTO international_registration(folio,registration_date,guest_name,Nationality,birthday,anniversary,Company,Tax,passport_no,passport_expiry,visa_no,visa_expiry,arrival_date,stay_duartion,arrival_immigration,employed,street,city,state,country,zipcode) VALUES ('$folio','$current_date','$gst_name','$nationality','$birthday','$anniversary','$com_org','$tax_gst','$passport_no','$passport_expiry','$visa_no','$visa_expiry','$doa','$duration','$immigration','$employed','$street','$city','$state','$country','$zipcode')";


$international=$_POST['international'];
$sql2="INSERT INTO arrival_info (folio,guest_type,arrived_from,proceeding_to,arrived_date,arrived_time,departure_date,departure_time,visit_purpose) VALUES ('$folio','$international','$arrived_from','$proceeding_to','$arr_date','$arr_time','$dep_date','$dep_time','$visit_purpose')";

$int_reg=$_POST['reg_no'];


$sql3="INSERT INTO sharer_occupants (folio,guest_type,registration_reference,name,relationship,email,mobile,nationality,identification) VALUES ('$folio','$international','$int_reg','$occup_name','$occup_relation','$occup_email','$occup_mobile','$nation','$identification')";
error_reporting(0);
$loop=$_COOKIE['i'];

for($i=1;$i<=$loop;$i++)
{
	/*error_reporting(0);*/
	if(isset($_POST["occup_name".$i]) && isset($_POST["occup_rel".$i]) && isset($_POST["occup_email".$i]) && isset($_POST["occup_mobile".$i]) && isset($_POST["occup_nationality".$i]) && $_POST["occup_identification".$i])
	{
	$n_occup_name= $_POST["occup_name".$i];
	$n_occup_rel= $_POST["occup_rel".$i];
	$n_occup_email= $_POST["occup_email".$i];
	$n_occup_mobile= $_POST["occup_mobile".$i];
	$n_occup_nationality= $_POST["occup_nationality".$i];
	$n_occup_identification= $_POST["occup_identification".$i];

	$sqln="INSERT INTO sharer_occupants (folio,guest_type,registration_reference,name,relationship,email,mobile,nationality,identification) VALUES ('$folio','$international','$int_reg','$n_occup_name','$n_occup_rel','$n_occup_email','$n_occup_mobile','$n_occup_nationality','$n_occup_identification')";
	$resn=mysqli_query($con,$sqln);
}
}






$sql4="INSERT INTO for_hotel_use(folio,guest_type,room_no,room_type,room_rate,adults,children,extra_person,billing_instructions,front_desk,duty_manager)VALUES ('$folio','$international','$room_no','$room_type','$room_rate','$adults','$children','$extra_bed','$address_billing','$front_desk','$duty_manager')"  ;



$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
$res2=mysqli_query($con,$sql2) or die(mysqli_error($con));
$res3=mysqli_query($con,$sql3) or die(mysqli_error($con));
$res4=mysqli_query($con,$sql4) or die(mysqli_error($con));



echo"<script>
$('#myModal1').modal('show');
</script>
";


}

else if(isset($_POST['domestic_reg']))
{
	$reg_num=$_POST['dom_reg'];
	$reg_date=$_POST['reg_date'];
	$guest_name=$_POST['guest_name'];
	$designation=$_POST['designation'];
	$birthday=$_POST['birthday'];
	$anniversary=$_POST['anniversary'];
	$com_org=$_POST['com_org'];
	$tax_gst=$_POST['tax_gst'];
	$street=$_POST['street'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$country=$_POST['country'];
	$zipcode=$_POST['zipcode'];


	$arrived_from=$_POST['arrived_from'];
	$proceeding_to=$_POST['proceeding_to'];
	$arr_date=$_POST['arr_date'];
	$arr_time=$_POST['arr_time'];
	$dep_date=$_POST['dep_date'];
	$dep_time=$_POST['dep_time'];
	$visit_purpose=$_POST['visit_purpose'];


	$occup_name=$_POST['occup_name'];
	$occup_relation=$_POST['occup_relation'];
	$occup_email=$_POST['occup_email'];
	$occup_mobile=$_POST['occup_mobile'];
	$nation=$_POST['nation'];
	$identification=$_POST['identification'];


	$room_no=$_POST['room_no'];
	$room_type=$_POST['room_type'];
	$room_rate=$_POST['room_rate'];
	$adults=$_POST['adults'];
	$children=$_POST['children'];
	$extra_bed=$_POST['extra_bed'];
	$address_billing=$_POST['address_billing'];
	$front_desk=$_POST['front_desk'];
	$duty_manager=$_POST['duty_manager'];


  $_SESSION['d_dom_reg']=$reg_num;
  $_SESSION['d_reg_date']=$reg_date;
  $_SESSION['d_guest_name']=$guest_name;
  $_SESSION['d_designation']= $designation;
  $_SESSION['d_birthday']=$birthday;
  $_SESSION['d_anniversary']=$anniversary;
  $_SESSION['d_com_org']=$com_org;
  $_SESSION['d_tax_gst']=$tax_gst;
  $_SESSION['d_street']=$street;
  $_SESSION['d_city']=$city;
  $_SESSION['d_state']=$state;
  $_SESSION['d_country']=$country;
  $_SESSION['d_zipcode']=$zipcode;

  $_SESSION['d_arrived_from']=$arrived_from;
  $_SESSION['d_proceeding_to']=$proceeding_to;
  $_SESSION['d_arr_date']=$arr_date;
  $_SESSION['d_arr_time']=$arr_time;
  $_SESSION['d_dep_date']= $dep_date;
  $_SESSION['d_dep_time']=$dep_time;
  $_SESSION['d_visit_purpose']=$visit_purpose;


  $_SESSION['d_occup_name']=$occup_name;
  $_SESSION['d_occup_relation']=$occup_relation;
  $_SESSION['d_occup_email']=$occup_email;
  $_SESSION['d_occup_mobile']=$occup_mobile;
  $_SESSION['d_nation']=$nation;
  $_SESSION['d_identification']=$identification;

  $_SESSION['d_room_no']=$room_no;
  $_SESSION['d_room_type']=$room_type;
  $_SESSION['d_room_rate']=$room_rate;
  $_SESSION['d_adults']=$adults;
  $_SESSION['d_children']=$children;
  $_SESSION['d_extra_bed']=$extra_bed;
  $_SESSION['d_address_billing']=$address_billing;
  $_SESSION['d_front_desk']=$front_desk;
  $_SESSION['d_duty_manager']=$duty_manager;



$current_date = date("Y-m-d H:i:s");
$sql1="INSERT INTO domestic_registration(folio,registration_date,guest_name,designation,birthday,anniversary,company,tax_gst,street,city,state,country,zipcode) VALUES ('$folio','$current_date','$guest_name','$designation','$birthday','$anniversary','$com_org','$tax_gst','$street','$city','$state','$country','$zipcode')";

$domestic=$_POST['domestic'];

$sql2="INSERT INTO arrival_info (folio,guest_type,arrived_from,proceeding_to,arrived_date,arrived_time,departure_date,departure_time,visit_purpose) VALUES ('$folio','$domestic','$arrived_from','$proceeding_to','$arr_date','$arr_time','$dep_date','$dep_time','$visit_purpose')";


$dom_reg=$_POST['dom_reg'];

$sql3="INSERT INTO sharer_occupants (
folio,guest_type,registration_reference,name,relationship,email,mobile,nationality,identification) VALUES ('$folio','$domestic','$dom_reg','$occup_name','$occup_relation','$occup_email','$occup_mobile','$nation','$identification')";



$loop=$_COOKIE['i'];
for($i=1;$i<=$loop;$i++)
{
	/*error_reporting(0);*/
	if(isset($_POST["occup_name".$i]) && isset($_POST["occup_rel".$i]) && isset($_POST["occup_email".$i]) && isset($_POST["occup_mobile".$i]) && isset($_POST["occup_nationality".$i]) && $_POST["occup_identification".$i])
	{

	$n_occup_name= $_POST["occup_name".$i];
	$n_occup_rel= $_POST["occup_rel".$i];
	$n_occup_email= $_POST["occup_email".$i];
	$n_occup_mobile= $_POST["occup_mobile".$i];
	$n_occup_nationality= $_POST["occup_nationality".$i];
	$n_occup_identification= $_POST["occup_identification".$i];

	


	$sqln="INSERT INTO sharer_occupants (
	folio,guest_type,registration_reference,name,relationship,email,mobile,nationality,identification) VALUES ('$folio','$domestic','$dom_reg','$n_occup_name','$n_occup_rel','$n_occup_email','$n_occup_mobile','$n_occup_nationality','$n_occup_identification')";
	$resn=mysqli_query($con,$sqln);
}


}


$sql4="INSERT INTO for_hotel_use (
folio,guest_type,room_no,room_type,room_rate,adults,children,extra_person,billing_instructions,front_desk,duty_manager)VALUES ('$folio','$domestic','$room_no','$room_type','$room_rate','$adults','$children','$extra_bed','$address_billing','$front_desk','$duty_manager')"  ;

$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
$res2=mysqli_query($con,$sql2) or die(mysqli_error($con));
$res3=mysqli_query($con,$sql3) or die(mysqli_error($con));
$res4=mysqli_query($con,$sql4) or die(mysqli_error($con));

echo"<script>
$('#myModal2').modal('show');
</script>
";
}
	/*window.location.href='registration_cards.php';*/
else if (isset($_GET['add_on'])) 
{

	
$query="SELECT * FROM invoice";

	$index=$_COOKIE['i'];
	for($i=1;$i<=$index;$i++)
	
	{
	
	$dated= $_GET["dated".$i];

	$serv= $_GET["services".$i];
	
	$charge=$_GET["charge".$i];

	$tax=$_GET["tax".$i];

	$total=$_GET["total".$i];


	$sql1="INSERT INTO invoice (folioId,debit_Dated,description,Charge,tax_gst,debit) VALUES ('$folio','$dated','$serv','$charge','$tax','$total')";
	mysqli_query($con,$sql1) or die(mysqli_error($con));
	
	
	

}
}


else if(isset($_POST['credit']))
{
	$payment_mode=$_POST['payment_mode'];
	$date_of_payment=$_POST['date_of_payment'];
	$amount=$_POST['amount'];
	$note=$_POST['note'];

  if($_POST['pending_bills']=='safe deposit')
  {
    $que="INSERT INTO invoice (folioId,credit_date,Charge,tax_gst,debit_Dated,description,debit,note,credit,mode_of_payment) VALUES ('$folio','$date_of_payment','0','0',null,'','0','$note','$amount','$payment_mode')";
    mysqli_query($con,$que) or die(mysqli_error($con));
  }


  $temp=explode("/",$_POST['pending_bills']);
  $pending_bills=-1;
  if($temp[0]==1)
  {
    $pending_bills=$temp[2];
  }
  else if($temp[0]==2)
  {
    $pending_bills=$temp[1];
  }


  if($folio==$pending_bills)
  {
    
    $resv_upd="UPDATE reservation set internal_note='$note',payment_mode='$payment_mode',received_ammount= received_ammount + ".$amount." WHERE folio_id='$folio' ";
    $var=mysqli_query($con,$resv_upd) or die(mysqli_error($con));
    

  }
  
else
{
  $fetch_credit="SELECT credit FROM invoice WHERE folioId='$folio' AND invoice_no = '$pending_bills'";
  $res=mysqli_query($con,$fetch_credit) or die(mysqli_error($con));
  $row=mysqli_fetch_assoc($res);
  $credit=$row['credit']+$amount;
  



	$sql1="UPDATE invoice  SET credit_date='$date_of_payment',credit='$credit',note='$note', mode_of_payment='$payment_mode' WHERE folioId='$folio' AND invoice_no = '$pending_bills'";
	mysqli_query($con,$sql1) or die(mysqli_error($con));
}


}


else if (isset($_POST['invoice_setting'])) 
{		
		$property_name=$_POST['property_name'];


		$logo=$_FILES['logo']['tmp_name'];
      	$logo=addslashes(file_get_contents($logo));

      	$tax_gst=$_POST['tax_gst'];
      	$invoice_prefix=$_POST['invoice_prefix'];
      	$currency=$_POST['currency'];
      	$property_address=$_POST['property_address'];

      	$sql1="INSERT INTO setting_invoice (property_name,property_address,logo,tax_gst,invoice_prefix,currency) VALUES ('$property_name','$property_address','$logo','$tax_gst','$invoice_prefix','$currency')";
      	mysqli_query($con,$sql1) or die(mysqli_error($con));
}

else if(isset($_POST['generate_invoice']))
{
	$out_date=$_POST['out_date'];
	$out_time=$_POST['out_time'];
	$duty_manager=$_POST['duty_manager'];
	$room_checked=$_POST['room_checked'];
	$room_key=$_POST['room_key'];
	$room_status=$_POST['room_status'];
	$bill_to=$_POST['bill_to'];

	$sql1="INSERT INTO departure_info (
	folio,checkout_date,checkout_time,duty_manager,room_inspaected_by,key_recieved,room_status,bill_to) VALUES ('$folio','$out_date','$out_time','$duty_manager','$room_checked','$room_key','$room_status','$bill_to')";
	mysqli_query($con,$sql1) or die(mysqli_error($con));
	header('location:http://localhost:8080/internship/print_invoice.php');


}

 


?>
