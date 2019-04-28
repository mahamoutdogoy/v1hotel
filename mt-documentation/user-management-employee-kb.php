<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>User Management (Employee) | Knowledge Base</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/documentation-style-sheet.css">
	<script type="text/javascript" src="js/documentation-script.js"></script>
</head>
<body>
	<?php include'../market/header.php';?>
	<h1 id="docEntittles" class="text-center jumbotron">User Management (Employee) | Knowledge Base</h1>
	<script type="text/javascript" src="search-bar.txt"></script>
	<div class="text-justify mb-5 container">
		<div class="row">
			<div class="col-xl-6 col-lg-7 col-md-8 col-sm-10 col-11 mx-auto">
				<button class="accordion">Where can I punch in and punch out in order to record my attendance?</button>
				<div class="panel">
					<p>
						Once your account has been created and activated by your employer, you will be able to log into your account via the <a href="../hotellogin.php">Login</a> page. In the user management section, click on the ‘Attendance’ button in the navbar located at the top of the page. Here, you will be able to punch in and punch out, and the attendance will automatically be recorded in the system.
					</p>
				</div>

				<button class="accordion">Where can I see my attendance report/time sheet?</button>
				<div class="panel">
					<p>
						In the user management section, click on the ‘Attendance’ button in the navbar located at the top of the page. Under ‘timesheet’, select the appropriate date range for which you would like to see the report and click on submit query. Your entire attendance report for the selected date range will be displayed on the screen.
					</p>
				</div>

				<button class="accordion">Where can I apply for leave?</button>
				<div class="panel">
					<p>
						In the user management section, click on the ‘Apply for Leave’ button in the navbar located at the top of the page. Fill in all the required details pertaining to the leave that you’re applying for and click ‘save’. Now, wait for your employer to grant/reject your leave application.
					</p>
				</div> 

				<button class="accordion">Where can I see a list of all my leaves?</button>
				<div class="panel">
					<p>
						In the user management section, click on the ‘All My Leaves’ button in the navbar located at the top of the page. Here, you’ll be able to see a list of all the leaves that you have applied for.
					</p>
				</div> 

				<button class="accordion">How do I check if my leave application has been granted/rejected?</button>
				<div class="panel">
					<p>
						In the user management section, click on the ‘All My Leaves’ button in the navbar located at the top of the page. Here, you’ll be able to see a list of all the leaves that you have applied for. Beside each leave is a status column. Initially, when you apply for a leave, the status will be set to pending. Then depending on whether your employer approves or rejects your leave, you’ll be able to see the updated status.
					</p>
				</div> 
				<button class="accordion">How do I change the password for my account?</button>
				<div class="panel">
					<p>
						In the user management section, click on the ‘Change Password’ button in the navbar located at the top of the page. Input your current password along with the new password that you would like to set and click on change. Now you’ll be able to log in using your new password. 
					</p>
				</div> 
				<button class="accordion">Where can I see a list of all the holidays?</button>
				<div class="panel">
					<p>
						In the user management section, click on the ‘All holidays’ button in the navbar located at the top of the page. Here, you’ll be able to see all the holidays approved by your employer.   
					</p>
				</div> 
				<button class="accordion">Where can I see a list of all the notices?</button>
				<div class="panel">
					<p>
						In the user management section, click on the ‘Notices’ button in the navbar located at the top of the page. Here, you’ll be able to see all the notices published by your employer. 
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