<?php
include('connect.php');
include 'phpmailer/sendemail.php';
	
	if(isset($_POST['input'])){
		$input = $_POST['input'];
		if(filter_var($input, FILTER_VALIDATE_EMAIL)){
			$sqls = "SELECT password, name FROM users WHERE email = '$input'";
			$runs = mysqli_query($con, $sqls);
			if($rows = mysqli_fetch_assoc($runs)){
		
	
		$mail_body = "<p>You wanted to reinitialized;your password for <b>mytravaly</b> account. If that is the case click below to change it</p>
		        <a href='http://localhost/v1hotel/passreintial.php?fgpass=$rows[password]&fgpassu=s' target='_blank'>Choose a new password</a>
		        <p>If you have not required any password change or if you are not whilling to change anymore, please ignore it.</p>";
		$mail = send_mail($input,"mytravaly",$mail_body);
		if($mail == 1){
			echo '<div class="alert alert-success">
				  <h3>Success!</h3>
				  <p>Your Email Has been sent. Please check your inbox!</p>
				</div>';
		}else{
			echo '<div class="alert alert-danger">
				  <h3>Failed!</h3>
				  <p>Try Again!<p>
				</div>';
		}
	}
	else
	{
		echo '<div class="alert alert-danger">
		<h3>email not found </h3></div>';
	}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forgot password</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<style>
body{
}
#passr {
	background: #f15025;
	width: 400px;
	height: 200px;
	margin: 200px auto;
	padding: 10px;
	text-align: center;
	border-radius: 10px;
	display: none;
}

#passf {
	background: #f15025;
	width: 400px;
	height: 300px;
	margin: 200px auto 0;
	padding: 10px;
	text-align: center;
	border-radius: 10px;
}
#passc {
	background: #f15025;
	width: 400px;
	height: 350px;
	margin: 200px auto;
	padding: 10px;
	text-align: center;
	border-radius: 10px;
	display: none;
}
input[type=submit] {
	margin-top: 10px;
	font-weight: bold;
	font-size: 1.3em;
	padding-bottom: 25px;
}

h1 i {
	color: green;
}
</style>

<body>
	<div id="passf">
		<h1>Password reinitialization</h1>
		<p>To reinitialize your password, type the email address you use to login to <b>mytravaly</b></p>
		<form action="" method="post">
			<input type="email" name="input" id="inputEmail" class="form-control" placeholder="email address" required>
			<input type="submit"  name="pfsubmit" class=" btn btn-info form-control" value="Get reinitialization link">
		</form>
	</div>
	<div id="passc">
		<h1>Reinitialize your password</h1>
		<p>Your wanted to reinitialized your password for <b>mytravaly</b> account. If that is the case click below to change it</p>
		<form action="" method="post" target="_blank">
			<input type="submit" name="prsubmit" class="btn btn-info form-control mb-2" value="Choose a new password">
		</form>
		<p>If you've not required any password change or if you're not whilling to change anymore, please ignore it.</p>
	</div>

	<div id="passr">
		<h1>Email has been sent<i class="far fa-check-circle"></i></h1>
		<p>Check your inbox to get instructions on your password reinitialization</p>
	</div>
	
</body>
</html>

<!-- <?php
	// if (isset($_POST['pfsubmit'])) {
	// 	$email = mysqli_real_escape_string($con, strip_tags($_POST['pfemail']));

	// 	echo "<script>
	// 		document.getElementById('passf').style.display = 'none';
	// 		document.getElementById('passr').style.display = 'block';
	// 		</script>";
	// }
?> -->


 