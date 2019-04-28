<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Contact</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/documentation-style-sheet.css">
	<script type="text/javascript" src="js/documentation-script.js"></script>
</head>
<body>
	<?php include'../market/header.php';?>
	<h1 id="docEntittles" class="text-center jumbotron">Contact</h1>
	<script type="text/javascript" src="search-bar.txt"></script>
	<div class="text-justify mb-5 container">
		<div class="row">
			<div class="col-xl-6 col-lg-7 col-md-8 col-sm-10 col-11 mx-auto">
				<p>
					For any queries please go through our <a href="faq.php">FAQs</a> or <a href="knowledge-base.php">Knowledge Base</a>. If you have any additional queries or problems feel free to contact us using any of the following channels:
				</p>
				<i class="fa fa-envelope-o" aria-hidden="true"></i> 
				&nbsp;
				<a href="mailto:support@mytravaly.com">support@mytravaly.com</a>
				<br>
				<br>
				<i class="fa fa-phone" aria-hidden="true"></i>
				&nbsp;
				(+91) 888-444-8941
				<br>
				<br>
				<i class="fa fa-map-marker" aria-hidden="true"></i>
				&nbsp;
				171, 1st Cross Road, Panduranga Nagar,
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bengaluru, Karnataka
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;India
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;560076
				<br>
				<br>
				<div class="text-center font-weight-bold mt-5 mb-3">
					Contact Form
				</div>
				<form method="POST" action="">
					<label for="name">* Name:</label>
					<br>
					<input type="text" name="name" id="name" class="form-control" required>
					<br>
					<label for="email">* Email:</label>
					<br>
					<input type="email" name="email" id="email" class="form-control" required>
					<br>
					<label for="subject">Subject:</label>
					<br>
					<input type="text" name="subject" id="subject" class="form-control">
					<br>
					<label for="message">* Message:</label>
					<br>
					<textarea rows="7" required="" id="message" class="form-control"></textarea>
					<br>
					<div class="text-center">
						<input type="submit" value="send message" class="btn text-uppercase text-white font-weight-bold" id="submit-btn">
					</div>	
				</form>
			</div>
		</div>
	</div>
	<button onclick="topFunction()" id="myBtn" title="Back to Top" class="rounded-circle text-white">
		<i class="fas fa-angle-double-up fa-2x"></i>
	</button>
	<div class="container bot-nav">
		<div class="row">
			<div class="col-xl-6 col-lg-7 col-md-8 col-sm-10 col-11 mx-auto">
				<span class="float-right"><a href="help-center.php">Help Center <i class="fa fa-chevron-right"></i></a></span>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="footer.txt"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>