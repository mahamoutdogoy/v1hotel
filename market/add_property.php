<?php
	session_start();
	require_once 'connect.php';

	function flash($name = '', $message = '', $class = 'alert alert-success'){
	if (!empty($name)) {
		if (!empty($message) && empty($_SESSION[$name])) {
			if (!empty($_SESSION[$name])) {
				unset($_SESSION[$name]);
			}
			if (!empty($_SESSION[$name. '_class'])) {
				unset($_SESSION[$name. '_class']);
			}
			$_SESSION[$name] = $message;
			$_SESSION[$name  . '_class'] = $class;
		}elseif (empty($message) && !empty($_SESSION[$name])) {
			$class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
			echo "<div class = '$class' id= 'msg-flash'>". $_SESSION[$name]."</div>";
			unset($_SESSION[$name]);
			unset($_SESSION[$name. '_class']);
		}
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Travely Travel</title>

 	<link rel="stylesheet" href="css/bootstrap.css">
	 <link rel="stylesheet" href="style.css"> 

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-datepicker.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>


<style>
body {

	padding:0px;
}
#first2{
	display: none;
}



.row {
	text-align: justify;
}
img[src="images/logo.png"] {
	padding-top:-20px;
	height:75px;

}
img[src="images/logo.png"]:hover
ul.nav li {
	padding-top:8px;
}
ul.nav li a {
	color: #f15025;
	padding: 5px;
	margin-right: 8px;
}
.hotels a:hover,ul.nav li a:hover {
	padding: 5px;
	background-color:#20b2aa;
	border-radius: 5px;
	color: black;

} 

.hotels {

	padding: 0px;

}
.top_container {
	margin-top:20px;
}
#top_menu {
	background-color: #f15025;

	border-radius: 5px;

}






#top_menu ul li a {
	color: white;
	padding: 2px;
	padding-top: 1px;
	margin-top: -5px;
	border-right: 0px solid white;
}

#top_menu ul li a:hover {
	background-color: #f15025;
}
.user_login {

	background-color: #ff6f56;
	left:5px;
	padding-top:10px;
	left: 147px;
	border-radius: 15px;
	box-shadow: 0 10px 9px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);




}


.login_form {
	padding-top: 30px;
	width: 60%;

}


.modal-header {
	background-color:#FF6F71;

}

.modal-header h4{
	text-align: center;
}
}
.Remember_checkbox{
	padding-left: 5px;

}

.modal-title{
	color: white;
	padding: 20PX;
}
#modaltitle {
	margin-left: 160px;
	padding: 10px;
	color: white;
	font-family: Arial, Helvetica, sans-serif;

}
.hotels_link {
	border: 1px solid red;

	border-radius: 5px;
}


/*   collapse */ 
	/*.col-12 #demo .row div.col-3 p {
		color: white;
	}
	*/
	/*    */
	/*input[name="subscribe_email"] {
		border-radius: 15px 0px 0px 15px;
		width: 80%;
		}*/
		.subscribe {
			left: 450px;


		}


		form>div.col-3 {

			padding:5px;
			border-radius: 5px;
			font-size: 20px;
			margin: 4px

			} {
				padding-right: 
			}
 

		.box{
			padding:60px 0px;
		}

		.box-part{

			border-radius:0;
			padding:20px 10px;
			margin:30px 0px;
		}
		.text{
			margin:20px 0px;

		}

		.back-to-top {
			cursor: pointer;
			font-size: 1.2em;
			font-weight: bold;
			position: fixed;
			bottom: 20px;
			right: 20px;
			margin-bottom:50px;
			padding: 10px;
			display:none;
			background-color: #f15025;
			z-index: 9999999;
		}
		 


		/*Testiomial*/

		.card {
			margin: 0 auto;
		}
		.card .carousel-item {
			height:250px;
		}
		.card .carousel-caption {
			padding: 0;
			right: 0;
			left: 0;
			color: #3d3d3d;
		}
		.card .carousel-caption h3 {
			color: #3d3d3d;
		}
		.card .carousel-caption p {
			line-height: 30px;
		}
		.card .carousel-caption .col-sm-3 {
			display: flex;
			align-items: center;
		}
		.card .carousel-caption .col-sm-9 {
			text-align: left;
		}
		.navi a {
			text-decoration:none;
		}
		a > .ico {
			background-color: grey;
			padding: 10px;

		}
		a:hover > .ico {
			background-color: #666;
		}

		 
		 
		.navi a {
			text-decoration:none;
		}
		a > .ico {
			background-color: grey;
			padding: 10px;
			padding-top: 20px;

		}
		a:hover > .ico {
			background-color: #666;
		}


		#subscribe  {
			color: white;
			font-size: 20px;
			font-style: bold;
			font-family: Arial,Helvetica;


		}
		.carouselindicators div a span {
			border-radius: 40%;
			padding: 10px;

		}
		.carouselindicators div a:hover {
			border-radius: 60%;

		}

	 
			.modal {
				box-shadow: 0 10px 9px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);

			}
			.counter
			{
				text-align: center;
			}
			.employees,.live_Properties,.Community,.support
			{
				margin-top: 70px;
				margin-bottom: 70px;

			}
 
				.counter {
					background-color: #f15025;
					padding: 20px 0;
					border-radius: 5px;
				}

				.count-title {
					font-size: 40px;
					font-weight: normal;
					margin-top: 10px;
					margin-bottom: 0;
					text-align: center;
				}

				.count-text {
					font-size: 13px;
					font-weight: normal;
					margin-top: 10px;
					margin-bottom: 0;
					text-align: center;
				}

				.fa-3x {
					margin: 0 auto;
					float: none;
					display: table;
					color: #4ad1e5;
				}

				/*end conuter*/

				.countries-p,.live_Properties-p,.support-p,.Community-p
				{
					font-size: 24px;
					color: #000000;
					line-height: 34px;
				}



				.user_login  div div i span  {
					color: white;
					line-height: 20px;
					font-family: :"Times New Roman", Times, serif;
					font-size: 16px;
					font-style: italic;


				}
				.user_login  div div i span a {
					text-decoration: none;
				}
				.user_login  div div  i a:hover {
					color:black;
					text-decoration: none;

				}

				.box-part .fa-instagram,.fa-dashboard{
					transform: rotate(160deg);
				}



				/*new collaps*/
				.common-style {
					position:fixed;
					left: 0px;
					right: 0px;
					bottom: 50px;
					padding: 20px;
					z-index: 999;
					top:150px;


				}


				.modal{
					width: 100%;
				}
				.res_section {
					width: 100%;
					float: left;
					margin-top: 10px;
					padding: 15px
				}
				.mr_style .custom-select , .res_section .textboxstyle {
					width: 100%;

					color: black;
					padding: 8px 10px 8px 35px;
					border: 1px solid  #ff6f71;
					border-radius: 3px;

					font-size: 14px;
					line-height: 20px;
				}
				.mr_style .custom-select {
					color: black;
					border: 1px solid #ff6f71;
					padding: 8px 10px 8px 35px;
				}
				.mr_style {
					width: 19%;
					float: left;
					margin-right: 1%;
					position: relative;
					margin-bottom: 10px;
				}
				.mr_style i {
					position: absolute;
					left: 10px;
					top: 10px;
					color: #191919;
					font-size: 18px;
				}
				.mr_style.field_section {
					width: 16%;
					float: left;
					margin-right: 1%;
				}
				.mr_style.less-btn {
					width: 10%;
					float: left;
					margin-right: 1%;
				}
				.mr_style.less-btn .cst-btn {
					width: 85px;
					height: 85px;
					border-radius: 100%;
					position: absolute;
					top: -32px;

				}


				.qty .count {
					color: #000;
					display: inline-block;
					vertical-align: top;
					font-size: 25px;
					font-weight: 700;
					line-height: 30px;
					padding: 0 2px
					;min-width: 35px;
					text-align: center;
				}
				.qty .plus {
					cursor: pointer;
					display: inline-block;
					vertical-align: top;
					color: white;
					width: 30px;
					height: 30px;
					font: 30px/1 Arial,sans-serif;
					text-align: center;
					border-radius: 50%;
				}
				.qty .minus {
					cursor: pointer;
					display: inline-block;
					vertical-align: top;
					color: white;
					width: 30px;
					height: 30px;
					font: 30px/1 Arial,sans-serif;
					text-align: center;
					border-radius: 50%;
					background-clip: padding-box;
				}
				div {
					text-align: center;
				}
				.minus:hover{
					background-color: #717fe0 !important;
				}
				.plus:hover{
					background-color: #717fe0 !important;
				}
				/*Prevent text selection*/
				span{
					-webkit-user-select: none;
					-moz-user-select: none;
					-ms-user-select: none;
				}
				
				nput::-webkit-outer-spin-button,
				input::-webkit-inner-spin-button {
					-webkit-appearance: none;
					margin: 0;
				}
				input:disabled{
					background-color:white;
				}


 				/*============ Service Features style ============*/
				.service-heading-block{
					display:block;
					margin-bottom:30px;
				}
				.title {
					display: block;
					font-size: 30px;
					font-weight: 200;
					margin-bottom: 10px;
				}
				.sub-title {
					font-size: 18px;
					font-weight: 100;
					line-height: 24px;
				}
				.feature-block {
					background-color: #fff;
					border-radius: 2px;
					padding: 15px;
					box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
					margin-bottom: 15px;
					transition:all ease .5s
				}
				.ms-feature:hover, 
				.ms-feature:focus {
					background-color: #fafafa;
					box-shadow: 0 3px 4px 3px rgba(0, 0, 0, 0.14), 0 3px 3px -2px rgba(0, 0, 0, 0.2), 0 1px 8px 3px rgba(0, 0, 0, 0.12);
				}
				.fb-icon {
					border-radius: 50%;
					display: block;
					font-size: 36px;
					height: 80px;
					line-height: 80px;
					text-align:center;
					margin:1rem auto;
					width: 80px;
					transition: all 0.5s ease 0s;
				}
				.feature-block:hover .fb-icon,
				.feature-block:focus .fb-icon {
					box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.2);
					transform: rotate(360deg);
				}
				.fb-icon.color-info {
					background-color: #5bc0de;
					color: #fff;
				}
				.fb-icon.color-warning {
					background-color: #eea236;
					color: #fff;
				}
				.fb-icon.color-success {
					background-color: #5cb85c;
					color: #fff;
				}
				.fb-icon.color-danger {
					background-color: #d9534f;
					color: #fff;
				}
				.feature-block h4 {
					font-size: 16px;
					font-weight: 500;
					margin: 3rem 0 1rem;
				}
				.color-info {
					color: #46b8da;
				}
				.color-warning {
					color: #f0ad4e;
				}
				.color-success {
					color: #4cae4c;
				}
				.color-danger {
					color: #d43f3a;
				}
				.btn-custom{
					border: medium none;
					border-radius: 2px;
					cursor: pointer;
					font-size: 14px;
					font-weight: 500;
					letter-spacing: 0;
					margin: 10px 1px;
					outline: 0 none;
					padding: 8px 30px;
					position: relative;
					text-decoration: none;
					text-transform: uppercase;
				}


				.ResMail {
					color: #4cae4c;
				}
				.fb-icon.ResMail {
					background-color:  #f15025;
				}
				.Our_strengths {
					color: #FF6F71;
				}
			</style>

 
		</head>
		<body>




			<!--top menu-->
			<?php include'header.php';?>
					<!--top menu-->


					<!-- start search collapse -->




					<!-- start search collapse -->



					<!-----start login section-->
					
					<div class="container fixed top_container mt-5">
						<div class="row">
							<div class="col-sm-12 col-lg-6">
								<h4 class="text-center"><i>World's first OTA which connects you to other OTAs</i></h4>
								<img  src="images/map.png" class="mt-5 mb-5 responsive">
								<div>
									<h4 class="text-center">Why add your property? Faqs</h4>
								</div>
							</div>


							<div class="-col-sm-12 col-lg-5 user_login">
								<h6><?php echo flash("registered");?></h6>
								
								<div class="col-4 float-left text-center h3" style="color: white;opacity: 100%;">
									<p style="margin-top: 70px;">  
										<i class="animated bounce faster">
											Add your properties
											And
											Go live now
										</i>
									</p>
								</div>

								<div>
										<p class="pl-5 text-center pt-3 h3 "><i>Sign Up</i> </p>
										
									<form action="" method="post" class="login_form float-right">

										
										<div class="form-group">
											<div class="input-group mb-2">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fa fa-user text-info"></i> </div>     
												</div>
												<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group mb-2">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fa fa-user text-info"></i> </div>     
												</div>
												<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group mb-2">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fa fa-envelope text-info"></i> </div>     
												</div>
												<input type="email" class="form-control" id="email" name="email" placeholder="Email id" required>
											</div>
										</div>
										
										<div class="form-group">
											<div class="input-group mb-2">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fa fa-phone text-info"></i> </div>     
												</div>
												<input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile no" required>
											</div>
										</div>

										<div class="form-group">
											<div class="input-group mb-2">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fa fa-lock text-info"></i></div>
												</div>
												<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter your password" required>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group mb-2">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fa fa-lock text-info"></i></div>
												</div>
												<input type="password" class="form-control" id="cpwd" name="cpwd" placeholder="Confirm your password" required>
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="form-control btn btn-block btn btn-success" name="register" value="Register">
										</div>
									
										
										<div class="mb-2">
											<i><span>have an account ?</span> <a href="../hotellogin.php" class="signin text-dark" id="signin22222" target="_blank"> Sign In</a></i>
										</div>
									

									</form>

									

								</div> 	                
							</div>


						</div>


					</div>
					<!-----end login section-->






					<!-- start of counter-->

					<div class="container mt-2 mb-5	">
						<div class="row">
							<br/>
							<div class="col-md-3 text-center mb-5">
								<h2 >Our strengths <hr style="background-color:red;"></h2>
							</div>



						</div>
						<div class="row text-center">
							<div class="col">
								<div class="counter">
									<i class="Our_strengths fa fa-users fa-3x"></i>
									<h2 class="timer count-title count-number" data-to="100" data-speed="1500"></h2>
									<p class="count-text ">Our Customers</p>
								</div>
							</div>
							<div class="col">
								<div class="counter">
									<i class="Our_strengths fa fa-user fa-3x"></i>
									<h2 class="timer count-title count-number" data-to="200" data-speed="1500"></h2>
									<p class="count-text ">Community</p>
								</div>
							</div>
							<div class="col">
								<div class="counter">
									<i class="Our_strengths fa fa-map-marker fa-3x"></i>
									<h2 class="timer count-title count-number" data-to="700" data-speed="1500"></h2>
									<p class="count-text ">Countries</p>
								</div></div>
								<div class="col">
									<div class="counter">
										<i class="Our_strengths fa fa-support fa-3x"></i>
										<h2 class="timer count-title count-number" data-to="24" data-speed="1600"></h2>
										<p class="count-text ">Live support</p>
									</div>
								</div>
							</div>
						</div>

				 
                 <!-- end of counter -->
			
			<!-- services -->
				 <div class="container text-center">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12"> 
						<div class="service-heading-block">
							<h2 class="text-center  mb-5  mt-5 title">Our amazing Service features</h2>
						</div>             
					</div> 
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="text-center feature-block">
							<span class="fb-icon color-info">
								<i class="fa fa-shopping-bag" aria-hidden="true"></i>
							</span>
							<h4 class="color-info">Market Place</h4>
							<p class="">L  error.</p>
							<a href="javascript:void(0)" class="btn btn-info btn-custom">More</a>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="text-center feature-block">
							<span class="fb-icon color-danger">
								<i class="fa fa-desktop" aria-hidden="true"></i>
							</span>
							<h4 class=" color-danger">CRM</h4>
							<p class="">Lorem ipsum dolor ror.</p>
							<a href="javascript:void(0)" class="btn btn-danger btn-custom">More</a>
						</div>
					</div>


					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="text-center feature-block">
							<span class="fb-icon color-warning">
								<i class="fa fa-money" aria-hidden="true"></i>
							</span>
							<h4 class="color-warning">Profit Maker</h4>
							<p class="">Lorem ipsum dolor ror.</p>
							<a href="javascript:void(0)" class="btn btn-warning btn-custom">More</a>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="text-center feature-block">
							<span class="fb-icon color-warning">
								<i class="fa fa-money" aria-hidden="true"></i>
							</span>
							<h4 class="color-warning">Profit Maker</h4>
							<p class="">Lorem ipsum dolor ror.</p>
							<a href="javascript:void(0)" class="btn btn-warning btn-custom">More</a>
						</div>
					</div>



					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="text-center feature-block">
							<span class="fb-icon color-success">
								<i class="fa fa-desktop" aria-hidden="true"></i>
							</span>
							<h4 class="color-success">PMS</h4>
							<p class="">Lorem ipsum dolor ror.</p>
							<a href="javascript:void(0)" class="btn btn-success btn-custom">More</a>
						</div>
					</div>



					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="text-center feature-block">
							<span class="fb-icon ResMail">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
							<h4 class=" ResMail">Res Mail</h4>
							<p class="ResMail">Lorem ipsum dolor ror.</p>
							<a href="javascript:void(0)" class="btn btn-warning btn-custom">More</a>
						</div>
					</div>


					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="text-center feature-block">
							<span class="fb-icon color-warning">
								<i class="fa fa-desktop" aria-hidden="true"></i>
							</span>
							<h4 class="color-warning">Social Media</h4>
							<p class="">Lorem ipsum dolor ror.</p>
							<a href="javascript:void(0)" class="btn btn-warning btn-custom">More</a>
						</div>
					</div>


					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="text-center feature-block">
							<span class="fb-icon color-danger">
								<i class="fa fa-dashboard" aria-hidden="true"></i>
							</span>
							<h4 class="color-danger">Dashboard</h4>
							<p class="">Lorem ipsum dolor ror.</p>
							<a href="javascript:void(0)" class="btn btn-warning btn-custom">More</a>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="text-center feature-block">
							<span class="fb-icon color-danger">
								<i class="fa fa-dashboard" aria-hidden="true"></i>
							</span>
							<h4 class="color-danger">Dashboard</h4>
							<p class="">Lorem ipsum dolor ror.</p>
							<a href="javascript:void(0)" class="btn btn-warning btn-custom">More</a>
						</div>
					</div>


					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="text-center feature-block">
							<span class="fb-icon color-success">
								<i class="fa fa-bar-chart" aria-hidden="true"></i>
							</span>
							<h4 class="color-warning">Reports</h4>
							<p class="color-success">Lorem ipsum dolor ror.</p>
							<a href="javascript:void(0)" class="btn btn-warning btn-custom">More</a>
						</div>
					</div>



					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="text-center feature-block">
							<span class="fb-icon color-warning">
								<i class="fa fa-users" aria-hidden="true"></i>
							</span>
							<h4 class="color-warning">User  management</h4>
							<p class="">Lorem ipsum dolor ror.</p>
							<a href="javascript:void(0)" class="btn btn-warning btn-custom">More</a>
						</div>
					</div>



					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="text-center feature-block">
							<span class="fb-icon color-info">
								<i class="fa fa-home" aria-hidden="true"></i>
							</span>
							<h4 class="color-info">Property</h4>
							<p class="">Lorem ipsum dolor ror.</p>
							<a href="javascript:void(0)" class="btn btn-warning btn-custom">More</a>
						</div>
					</div>
			<!-- end of services -->




				</div>  

			</div>

				<div onclick="topFunction()" id="myBtn" title="Back to Top" class="rounded-circle text-white">
					<i class="fas fa-angle-double-up fa-2x"></i>
				</div>


			<div class="card col-md-12 mt-5 mb-5" style="background-color: #ff6f71;">
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="5000">
					<div class="w-100 carousel-inner" role="listbox">
						<div class="carousel-item active">
							<div class="carousel-caption">
								<div class="row">
									<div class="col-sm-3">
										<img src="image/hotel1.jpg" alt="" class="rounded-circle img-fluid">
									</div>
									<div class="col-sm-9">
										<h3>Gives me hope</h3>
										<small>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</small>
										<small class="smallest mute">-Hassan</small>
									</div>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<div class="carousel-caption">
								<div class="row">
									<div class="col-sm-3">
										<img src="image/hotel2.jpg" alt="" class="rounded-circle img-fluid">
									</div>
									<div class="col-sm-9">
										<h3>You will love it.</h3>
										<small>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolorpibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolorpibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolorpibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</small>
										<small class="smallest mute">- mht</small>
									</div>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<div class="carousel-caption">
								<div class="row">
									<div class="col-sm-3">
										<img src="image/hotel3.jpg" alt="" class="rounded-circle img-fluid">
									</div>
									<div class="col-sm-9">
										<h3>Velvet pouch!</h3>
										<small>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</small>
										<small class="smallest mute">- Hamit</small>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class=" navi">
						<a class="float-left" href="#carouselExampleControls" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon ico"  style="border-radius: 5px;" aria-hidden="true"></span>
							<span class="sr-only" >Previous</span>
						</a>
						<a class="float-right" href="#carouselExampleControls" role="button" data-slide="next">
							<span class="carousel-control-next-icon ico"   style="border-radius: 5px;" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>


 		<!-- <div class="container">
 			<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
				<div class="col-sm-6 col-xs-12 col-md-3 col-lg-3 mb-3">
					<ul class="nav"><a href="" class="col-12 btn btn-success nav-link">Join the community</a>
						<li class="nav-item"></li>
					</ul>
				</div>
				<div class="col-sm-6 col-xs-12 col-md-3 col-lg-3 mb-3">
					<ul class="nav"><a href="" class="col-12 btn btn-primary nav-link">Travel Stories </a>
						<li class="nav-item"></li>
					</ul>
				</div>
				<div class="col-sm-6 col-xs-12 col-md-3 col-lg-3 mb-3">
					<ul class="nav"><a href="" class="col-12 btn btn-danger nav-link">Start a conversation</a>
						<li class="nav-item"></li>
					</ul>
				</div>
				<div class="col-sm-6 col-xs-12 col-md-3 col-lg-3 mb-3">
					<ul class="nav"><a href="" class="col-12 btn btn-info nav-link">Fun club</a>
						<li class="nav-item"></li>
					</ul>
				</div>
			</div>
			<div class="container col-12 pb-5  mb-3" style="border-radius: 5px;background-color:#f15025;margin: 0px;width: 100%;">
				<div class="row">
					<div class="col-sm-12">
						<div class="content">
							<div class="col-sm-12 col-md-4 float-left mt-3 pb-0 pt-2">
								<h6 id="subscribe">Subscribe to our site and get more discount on booking</h6>
							</div>

							<form action="<?php //echo $_SERVER['PHP_SELF']; ?>" method="POST">
							<div class="input-group col-sm-12 col-md-8 mt-3 pt-2 pb-0 float-right">

								<input type="email" class="form-control" id="sub_email" name = "sub_email" placeholder="Enter your email">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-lg btn-success">Subscribe Now</button>
								</span>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			</div>
 		</div> -->




<?php



if (isset($_POST['register'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $password = mysqli_real_escape_string($con, $_POST['pwd']);
  $conf_pass = mysqli_real_escape_string($con, $_POST['cpwd']);
  if ($password !== $conf_pass) {
      echo "<script>alert('Passwords do no match')</script>";
    }else{

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $hresult = mysqli_query($con, $user_check_query);
  $signup = mysqli_fetch_assoc($hresult);

 
  if ($signup) { // if user exists
    if ($signup['email'] === $email) {
      echo "<script>alert('Email already exists')</script>";
    }
  }else{
  	$password = password_hash($password, PASSWORD_DEFAULT);//encrypt the password before saving in the database


  	$query = "INSERT INTO users (name, username, email, mobile, password, role) VALUES('$fname', '$lname', '$email', '$phone', '$password', 'superadmin' )";
   if(mysqli_query($con, $query)){?>
		<script>window.location = "add_property.php";</script>
   	<?php
    	flash("registered", "Congrats you have registered, please contact mytravaly to get your account activated");
  } else die("Somthing when wrong");
  }}
  
}
?>

			
	<script src="js/autoComplete.js"></script>
	<script type="text/javascript" src="../mt-documentation/footer.txt"></script>
 
	 <?php// include'footer.php'?>

 
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.counterup.js"></script>

<script>
 var defaultBounds = new google.maps.LatLngBounds()
  
var input = document.getElementById('city');
var options = {
  bounds: defaultBounds,
  types: ['establishment']
};

autocomplete = new google.maps.places.Autocomplete(input, options);

 
</script>


<script type="text/javascript">

$(document).ready(function(){
		$('.count').prop('disabled', true);
		$(document).on('click','.plus',function(){
			$('.count').val(parseInt($('.count').val()) + 1 );
		});
		$(document).on('click','.minus',function(){
			$('.count').val(parseInt($('.count').val()) - 1 );
			if ($('.count').val() == 0) {
				$('.count').val(1);
			}
		});
	});
	$(document).ready(function(){
		$(window).scroll(function () {
			if ($(this).scrollTop() > 70) {
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});

		$('#back-to-top').click(function () {
			$('#back-to-top').tooltip('hide');
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});

		$('#back-to-top').tooltip('show');

	});




	$('.counter-count').each(function () {
		$(this).prop('Counter',0).animate({
			Counter: $(this).text()
		}, {
			duration: 5000,
			easing: 'swing',
			step: function (now) {
				$(this).text(Math.ceil(now));
			}
		});
	});


</script>



<script>

	$(function() {

		$('.trip_start_date').datepicker({
			'format': 'yyyy-mm-dd',
			'autoclose': true,
			'startDate' :  new Date()
		});


	});



	$(function() {
		var date = new Date();

		date.setDate(date.getDate());
		$('#checkin_date').datepicker({
			'format': 'yyyy-mm-dd',
			'autoclose': true,
			'todayhighlight':true,
			startDate: date



		});


	});


	$(function() {
		//var date = document.getElementById('checkin_date').value;
		var date = new Date();
		date.setDate(date.getDate());

		$('#checkout_date').datepicker({
			'format': 'yyyy-mm-dd',
			'autoclose': true,
			'todayhighlight':true,
			startDate: date

		});

	});

$('#checkout_date').datepicker('setStartDate',document.getElementById('#checkin_date').value);


$('#checkin_date').on('changeDate', function() {
	document.getElementById('checkout_date').focus();


	$('#checkout_date').datepicker('getFormattedDate');

});

$('#datepicker').datepicker('setStartDate', "01-01-1900");
</script>


<script>
	(function ($) {
		$.fn.countTo = function (options) {
			options = options || {};

			return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
 			var loops = Math.ceil(settings.speed / settings.refreshInterval),
			increment = (settings.to - settings.from) / loops;
			
 			var self = this,
			$self = $(this),
			loopCount = 0,
			value = settings.from,
			data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
 			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
 			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
 					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
		};

		$.fn.countTo.defaults = {
		from: 0,               
		to: 0,                  
		speed: 1000,            
		refreshInterval: 100,   
		decimals: 0,            
		formatter: formatter,   
		onUpdate: null,         
		onComplete: null        
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

	jQuery(function ($) {
   $('.count-number').data('countToOptions', {
  	formatter: function (value, options) {
  		return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
  	}
  });
  
   $('.timer').each(count);  
  
  function count(options) {
  	var $this = $(this);
  	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
  	$this.countTo(options);
  }
});


$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
 
</script>
</body>
</html>