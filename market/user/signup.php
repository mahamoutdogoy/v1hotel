<!--Connection to database-->
<?php
 include 'Connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="my-travaly-admin-login.css">
		<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
	  <link href="pidie-0.0.8.css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="Mt.css">

	<title>Mytravaly Signup</title>

	<style>
		#signup_box{
            box-shadow: 10px 10px 15px #F4A460;
            background-color:  #ff5757;
           
            padding: 3%;

        } 

        .kl
        {
        	
        	width: 960px;
        	height: 980px;
        	margin-left: 412px;

        }
  .backLeft {
  position: absolute;
  left: 0;
  width: 40%;
  height: 100%;
  background:none;
}

.good
{
  width: 890px;
  height: 980px;
}
.jj
{
	padding-top: 180px;
}
	</style>


</head>
<body class="bg-light">
	<div class="backLeft">
    <img src="good1.png" class="good">
  </div>
	<div class="container-fluid" >
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-md-6  mx-auto">
				<div class="mt-0 kl" id="signup_box">
					<h4 class="text-center text-uppercase jj text-white">Sign Up</h4>

					<form method="post" action="signup.php" class="w-100 mx-auto text-white">

						<label for="name">First Name</label>
						<input type="text" name="fname" class="form-control" required>	
						<label for="name">Last Name</label>
						<input type="text" name="lname" class="form-control" required>
						<label for="email">Email</label>
						<input type= "email" id="email" name="email" class="form-control" required >
						<label for="gender">Gender</label>
						<select type="text" name="gender" class="form-control" required >
							<option value="">Select Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Other</option>
						</select> 
						<!-- <div class="input-default-wrapper mt-3">Upload Profile Picture <input type="file" id="file-with-current" class="input-default-js" name="picture" value ="picture">
					  	<label class="label-for-default-js rounded-right mb-3" for="file-with-current"><span class="span-choose-file"></span> </label>
						</div> -->
						<label for="phone">Phone no</label><input type= "text" id="phone" name="phone" class="form-control" required >
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" required>
						<label for="conf_pass">Confirm Password</label>
						<input type= "password" id="conf_pass" name="conf_pass"class="form-control" required ><br>

						<input type="submit" name="sign_up" value="Sign-up" class="btn btn-success btn-block text-uppercase font-weight-bold"><br>
						<center>have Account ? <a href="login.php" class="text-light"> Sign In</a></center>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php
	

	?> 

<body>
</html>
