<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Travely Travel</title>


	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="style.css">


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
 <link rel="stylesheet" href="css/bootstrap-datepicker.css">
 <link rel="stylesheet" type="text/css" href="../mt-documentation/css/documentation-style-sheet.css">
 <script type="text/javascript" src="../mt-documentation/js/documentation-script.js"></script>
<style>

  #search_box{
            box-shadow: 10px 10px 15px #F4A460;
            background-color:  #ff6f56;
            border-radius: 20px;
        } 

        
        #title{
            text-shadow: 2px 2px 2px #4B0082;
            animation-name: title_anim;
            animation-duration: 20s;
        }

        .textboxstyle{
            box-shadow: 10px 10px 10px #FF1111;
            text-align: center;
        }

        @keyframes title_anim {
          0%   {left:0px; top:0px;}
          5%  {left:10px; top:0px;}
          10%  {left:0px; top:0px;}
          15%  {left:10px; top:0px;}
          20% {left:0px; top:0px;}
            25% {left:10px; top:0px;}
          30%  {left:0px; top:0px;}
          35%  {left:10px; top:0px;}
          40%  {left:0px; top:0px;}
          45% {left:10px; top:0px;}
           50%   {left:0px; top:0px;}
          55%  {left:10px; top:0px;}
          60%  {left:0px; top:0px;}
          65%  {left:10px; top:0px;}
          70% {left:0px; top:0px;}
           75%   {left:10px; top:0px;}
          80%  {left:0px; top:0px;}
          85%  {left:10px; top:0px;}
          90%  {left:0px; top:0px;}
          95% {left:10px; top:0px;}
          100% {left:0px; top:0px;}
        }

        .map1
        {
             margin-top: 2px;
            position: absolute;


        }
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

body {

	padding:0px;
}



.row {
	text-align: justify;
}


img[src="images/logo.png"] {
	padding-top:-20px;
	height:75px;

}
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
    line-height:20px;
} 

/* .hotels {

    padding: 0px;

}
.top_container {
    margin-top:20px;
} */
#top_menu {
    position: right;
   /*  left: 873px; */
   /* float: right; */
    background-color: #ff6f56;

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



.login-modal-header {
    background-color: #f15025;
}
.Remember_checkbox{
    padding-left: 5px;

}

#modaltitle{
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


collapse 


input[name="subscribe_email"] {
    border-radius: 15px 0px 0px 15px;
    width: 80%;
}


form>div.col-3 {
    
    padding:5px;
    border-radius: 5px;
    font-size: 20px;
    margin: 4px

    } {
        padding-right: 
    }










    /* .modal-footer div p a {
        text-decoration: none;
        text-decoration: none;
        font-family:"Times New Roman", Times, serif;
        font-style:italic;
        font-size: 15px; 
    }
    .modal-footer div p a:hover { 
        color:#FF6F56;
        text-decoration: none;
        font-family:"Times New Roman", Times, serif;
        font-style:italic;
        font-size: 15px;
    }
     */

#second1{
    display: none;
}
.modal-header{
    background-color: #f15025;
}
.modal-footer{
    background-color: #f15025;
}
</style>
</head>
<body>




	<!--top menu-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 mt-0 mb-2 ">
				<a href="../market/index.php"><img src="images/logo_mytravaly.png" width="100" height="100" class="float-left mt-1" alt="" style="border-radius: 50%; "></a>
				<div id="top_menu" class="mt-3" style="float: right;">
					<ul class="nav list-unstyled float-right">
						<li class="nav-item"><a class="nav-link" href="#"><span><i class="fa fa-globe"></i></span>&nbsp;Language</a></li>
						<li><a href="#" class="nav-link"><span><i class="fa fa-money"></i></span>&nbsp;Currency</a></li>
						<li><a href="../market/add_property.php" class="nav-link"><span><i class="fa fa-plus"></i></span>&nbsp;Add your property</a></li>
                        <?php if (isset($_SESSION['user_id'])) : ?>
						<li><a href="user/index.php" class="nav-link"><span><i class="fa fa-sign-in"></i></span>&nbsp;Dashboard</a></li><?php else : ?>
                        <li><a href="../market/user/login.php" class="nav-link"><span><i class="fa fa-sign-in"></i></span>&nbsp;Login</a></li><?php endif; ?>
					</ul>
				</div>

			</div>
		</div>
	</div>

	<div class="container">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script>
			$(document).ready(function() {

                        //On click signup, hide login and show registration form
                        $("#signup").click(function() {
                        	$("#first1").slideUp("slow", function(){
                        		$("#second1").slideDown("slow");
                        	});
                        });

                        //On click signup, hide registration and show login form
                        $("#signin").click(function() {
                        	$("#second1").slideUp("slow", function(){
                        		$("#first1").slideDown("slow");
                        	});
                        });


                    });
                </script>


                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="box-shadow: 0 10px 9px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">
                	<div class="modal-dialog" role="document">
                		<div class="modal-content">
                			<div class="modal-header text-center">

                				<h4 class="modal-title text-center mb-2 h5" id="modaltitle"> Login & Sign Up</h4> 
                					<button type="button"  class=" border border-light close" data-dismiss="modal" aria-label="Close">
                						<span aria-hidden="true">&times;</span>
                					</button>
                				


                			</div>

                			<div class="modal-body">
                				<div id="first1">
                					<form action="" method="POST">
                						<div class="input-group">
                                            <div class="row">
                							<div class="input-group-prepend col-md-1">
                								<div class="input-group-text">
                									<i class="fa fa-envelope my-2"></i>
                								</div>
                							</div>

                							<input type="text" name="emailid" class="form-control col-md-11" placeholder="Email Id" required></div>
                						</div>
                						<div class="input-group">
                                            <div class="row">
                							<div class="input-group-prepend col-md-1">
                								<div class="input-group-text">
                									<i class="fa fa-lock my-2"></i>
                								</div>
                							</div>

                							<input type="password" name="password" class="form-control col-md-11" placeholder="Password" required></div>
                						</div>

                						<div class="form-group">
                							<div class="input-group mb2">

                								<input type="submit" name="sign_in" class="btn btn-success ribbon  btn-block" value="Login" class="form-control">
                							</div>
                						</div>
                						<p><i>Dont have account ?</i>&nbsp;&nbsp;&nbsp; <a href="#" class="signup" id="signup">sign-up</a></p>
                					</form>
                				</div>
                				<div id="second1">
                					<form action="" method="POST">
                						<div class="input-group">
                							<div class="input-group-prepend">
                								<div class="input-group-text">
                									<i class="fa fa-user"></i>
                								</div>
                							</div>

                							<input type="text" name="fname" class="form-control" placeholder="First Name" required>
                						</div>
                						<div class="input-group">
                							<div class="input-group-prepend">
                								<div class="input-group-text">
                									<i class="fa fa-user"></i>
                								</div>
                							</div>

                							<input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                						</div>
                						<div class="input-group">
                							<div class="input-group-prepend">
                								<div class="input-group-text">
                									<i class="fa fa-envelope"></i>
                								</div>
                							</div>

                							<input type="email" name="email" class="form-control" placeholder="Email" required>
                						</div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                            </div>

                                            <input type="text" name="phone" class="form-control" placeholder="Pohne no" required>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-male"></i>
                                                </div>
                                            </div>

                                            <input type="text" name="gender" class="form-control" placeholder="gender" required>
                                        </div>
                						<div class="input-group">
                							<div class="input-group-prepend">
                								<div class="input-group-text">
                									<i class="fa fa-lock"></i>
                								</div>
                							</div>

                							<input type="password" name="password" class="form-control" placeholder="password" required>
                						</div>
                						<div class="input-group">
                							<div class="input-group-prepend">
                								<div class="input-group-text">
                									<i class="fa fa-lock"></i>
                								</div>
                							</div>

                							<input type="password" name="conf_pass" class="form-control" placeholder="confirm password" required>
                						</div>
                						<div class="form-group">
                							<div class="input-group mb2">

                								<input type="submit"  name="sign_up" value="Signup" class="btn-success form-control">
                							</div>
                						</div>
                						<p><i> have account ?</i>&nbsp;&nbsp;&nbsp; <a href="#" class="signin" id="signin">sign-in</a></p>
                					</form>
                				</div>
                			</div>


                			<div class="modal-footer">
                				<div class="col-4">
                					<p class="i float-left " ><a href="" class="btn-link text-white">Forgot password</a></p>
                				</div>
                				<div class="col-8">


                				</div>
                			</div>

                		</div>
                	</div>
                </div>
            </div>







           