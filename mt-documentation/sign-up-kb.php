<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Sign Up / Login | Knowledge Base</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/documentation-style-sheet.css">
	<script type="text/javascript" src="js/documentation-script.js"></script>
</head>
<body>
	<?php include'../market/header.php';?>
	<h1 id="docEntittles" class="text-center jumbotron">Sign Up / Login | Knowledge Base</h1>
	<script type="text/javascript" src="search-bar.txt"></script>
	<div class="text-justify mb-5 container">
		<div class="row">
			<div class="col-xl-6 col-lg-7 col-md-8 col-sm-10 col-11 mx-auto">
				<button class="accordion">How do I start using MyTravaly?</button>
				<div class="panel">
					<p>
						First, proceed to the <a href="../market/add_property.php">Sign Up</a> page. Fill in your company’s details and click the sign-up button. You will be redirected to a page which will ask you to verify your email id by entering the OTP which has been sent to your mail. Please proceed to do the same. Once your email id has been verified, your MyTravaly account will be activated. Please proceed to the <a href="../hotellogin.php">Login</a> page to log into your account.
					</p>
				</div>

				<button class="accordion">I forgot my password. How do I set a new one?</button>
				<div class="panel">
					<p>
						Go to the <a href="../hotellogin.php">Login</a> page. Under the login button, you will see the option of ‘Forgot password?’. Click on that and input your registered email id. A link will be sent to this id. Go to the link and you’ll get the option to reset your password. Once the new password has been successfully set, you will be able to log into your account using the new password. 
					</p>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
		  acc[i].addEventListener("click", function() {
		    /* Toggle between adding and removing the "active" class,
		    to highlight the button that controls the panel */
		    this.classList.toggle("active");

		    /* Toggle between hiding and showing the active panel */
		    var panel = this.nextElementSibling;
		    if (panel.style.display === "block") {
		      panel.style.display = "none";
		    } else {
		      panel.style.display = "block";
		    }
		  });
		} 
	</script>
	<button onclick="topFunction()" id="myBtn" title="Back to Top" class="rounded-circle text-white">
		<i class="fas fa-angle-double-up fa-2x"></i>
	</button>
	<div class="bot-nav-kb">
		<a href="knowledge-base.php">Back to the Knowledge Base</a>
	</div>
	
	<script type="text/javascript" src="footer.txt"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>