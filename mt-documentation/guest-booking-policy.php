<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Guest Booking Policy</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/documentation-style-sheet.css">
	<script type="text/javascript" src="js/documentation-script.js"></script>
</head>
<body>
	<?php include'../market/header.php';?>
	<h1 id="docEntittles" class="text-center jumbotron">Guest Booking Policy</h1>
	<script type="text/javascript" src="search-bar.txt"></script>
	<div class="text-justify mb-5 container">
		<div class="row">
			<div class="col-xl-6 col-lg-7 col-md-8 col-sm-10 col-11 mx-auto">
				<button class="accordion">General</button>
				<div class="panel">
					<p>
						It is mandatory for guests to present valid photo identification at the time of check-in. According to government regulations, a valid Photo ID should be carried by every person above the age of 18 staying at a hotel. The identification proofs accepted are Aadhar Card, Driving License, Voter ID Card, and Passport. Without valid ID the guests will not be allowed to check-in. PAN cards are NOT accepted as a valid ID card.
					</p>
				</div>

				<button class="accordion">Reservation Cancellation, Modification & Refund</button>
				<div class="panel">
					<p>
						Our cancellation policy changes depending upon the respective accommodation where you have chosen to book your stay. We do not have any control over it. We request you to check the cancellation and refund policy before making any reservations at the accommodation of your choice.
					</p>
				</div>

				<button class="accordion">Payment Security</button>
				<div class="panel">
					<p>
						Payments processed via the website URL <a href="www.mytravaly.com">www.mytravaly.com</a> containing personally identifiable information, debit card, credit card, and wallet details, and internet banking payment information are protected using Secure Socket Layer (SSL) encryption. This encryption is to help protect your information while it is being transmitted. Once we receive it, we strive to maintain the physical and electronic security of your personal information using commercially reasonable efforts.
					</p>
				</div> 

				<button class="accordion">Complaint</button>
				<div class="panel">
					<p>
						If you have any complaints or queries, please don’t hesitate to contact us on <a href="mailto:support@mytravaly.com">support@mytravaly.com</a>. We promise to get back to you within 24 hours.
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
	<div class="container bot-nav">
		<div class="row">
			<div class="col-xl-6 col-lg-7 col-md-8 col-sm-10 col-11 mx-auto">
				<a href="eu-privacy-policy.php"><i class="fa fa-chevron-left"></i> EU Privacy Policy</a>
				<span class="float-right"><a href="disclaimer.php">Disclaimer <i class="fa fa-chevron-right"></i></a></span>
			</div>
		</div>
	</div> 
	
	<script type="text/javascript" src="footer.txt"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>