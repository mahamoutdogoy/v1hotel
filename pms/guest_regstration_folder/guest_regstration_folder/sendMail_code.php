
<?php
session_start();

	require_once('phpmailer/sendemail.php');

	require_once("registration_cards_database.php");
	$folio= $_SESSION['folio']; 
	$sql="SELECT * FROM reservation WHERE folioId='$folio'";
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($res);
		$email=$row['email'];
		

	
	//sending mail for multiple selected clients in crm lead page
	if(isset($_POST['send_mul_mail']))
	{
		$sub=$_POST['subject'];
		$body=$_POST['body'];
		sendMulMail($con,$email,$sub,$body);
	}
	//add mail template and send mail 
	if(isset($_POST['add_send_mail']))
	{
		$sub=$_POST['subject'];
		$body=$_POST['body'];

		$query="insert into mail_template (HotelId,Subject,Body) values (0,'$sub','$body');";
		mysqli_query($con,$query) or die(mysqli_error($con));

		sendMulMail($con,$email,$sub,$body);
	}

	function sendMulMail($con,$email,$sub,$body)
	{
		if(send_mail($email,$sub,$body))
				{
					echo "<script>
					alert('Mail sent Successfully....');
					document.location='registration_cards.php'
					</script>";
				}
	}
			
			
		

	
?>