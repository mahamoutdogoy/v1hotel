<?php
	session_start();
  include('../dbConnect.php');
  include('../phpmailer/sendemail.php');
	
  	if(isset($_GET'submit']))
   	{
      $date=date("d/m/Y");
     // $name = mysqli_real_escape_string($_GET'firstname']);
		$fname=mysqli_real_escape_string($conn, strip_tags($_GET'firstname']));
		$lname=mysqli_real_escape_string($conn, strip_tags($_GET'lastname']));
		$cname=mysqli_real_escape_string($conn, strip_tags($_GET'companyname']));
		$lead=mysqli_real_escape_string($conn, strip_tags($_GET'lead']));
		$email=mysqli_real_escape_string($conn, strip_tags($_GET'email']));
		
		$dob=mysqli_real_escape_string($conn, strip_tags($_GET'dob']));
		
		//inserting to client_details table
	 
    	mysqli_query($conn,"insert into  client_details (hotelid,FirstName,LastName,CompanyName,LeadSource,
					Email,DOB,Phone,DateOpened) values ('".$_SESSION['user']['hotelid']."','$fname','$lname',
					'$cname','$lead','$email','$dob','$_GETphone]',
					'$date');") or die(mysqli_error($conn));
    	
		$list_id=mysqli_query($conn,"select max(ClientId) from client_details;");
    	$cid=mysqli_fetch_array($list_id);
    	
    	//inserting to Task Details
		$task=mysqli_real_escape_string($conn, strip_tags($_GET'task']));
		$priority=mysqli_real_escape_string($conn, strip_tags($_GET'priority']));
		$assignto=mysqli_real_escape_string($conn, strip_tags($_GET'assignto']));
		$description=mysqli_real_escape_string($conn, strip_tags($_GET'description']));
		$remarks=mysqli_real_escape_string($conn, strip_tags($_GET'remarks']));
		$duedate=$_GET'duedate'];
		
		
		
    	mysqli_query($conn,"insert into task_details (ClientId,Task,Priority,AssignTo,Status,Description,
		Remarks,DueDate) values ('$cid[0]','$task','$priority','$assignto',
		'Not Yet Started','$description','$remarks','$duedate')") or die(mysqli_error($conn));
		
		//inserting to task_details table
		
    	$sql = "SELECT email FROM users where name ='".$_GET'assignto']."' and hotelid='".$_SESSION['user']['hotelid']."';";
		$eid_list=mysqli_query($conn,$sql);
		$eid=mysqli_fetch_array($eid_list);
		
		//sending mail
		$temp=send_mail($eid['email'],"Mail to Assign Work","Assigned Work");
    	//echo "<script>alert('Data Saved Successful And Mail Sent Successfully');</script>";
    	//page redirection 
		header("Location:index.php");
   }
   else
   {
   	echo "error: data not added Try onceagain...";
   }
?>