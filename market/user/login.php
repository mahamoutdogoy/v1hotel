<?php
include 'connect.php';

function flash($name = '', $message = '', $class = 'alert alert-success')
{
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

  if (isset($_SESSION['user_id'])) {
  	header("location: index.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Mt.css">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="993704781519-qsl29ksm0q07ofifhbjtsbqkesks67ni.apps.googleusercontent.com" >
	<title>Mytraval Login</title>

	<style>
		#login_box{
            box-shadow: 10px 10px 15px #F4A460;
            background-color:  #ff5757;
           
            padding: 3%;

        } 

       
       .kl
        {
        	
        	width: 2850px;
        	height: 980px;
        	margin-left: 470px;



        }
        .backLeft {
  position: absolute;
  left: 0;
  width: 30%;
  height: 70%;
  background:none;
}

.good
{
  width: 950px;
  height: 980px;
}
.jj
{
	padding-top: 180px;

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
        
	</style>
</head>
<body>
	<div class="backLeft">
    <img src="good.png" class="good">
  </div>
	<div class="container-fluid ">
		<div class="row ">
		<div class="col-xs-12 col-sm-10 col-md-6  mx-auto">
			<div id="login_box" class="mt-0 w-100 kl">
				<h1 class="text-center text-uppercase text-white jj">LOGIN</h1>
				<h6><?php echo flash("login_failed");?></h6>
				<form action ="" method ="post" class="w-75 mx-auto">
					<label for="email">EMAIL ID</label>
					<input type="email" name="email" class="form-control " required><br>
					<label for="password">PASSWORD</label>
					<input type="password" name="password" class="form-control" required><br>
					<input type="submit" name="login" value="Login" class="btn btn-success btn-block text-uppercase font-weight-bold"><br>
					  <center> <p>OR</p></center><br>
            <?php include 'google/index.php'; ?>  

					  <!--  <center><div class="g-signin2 glo" data-onsuccess="onSignIn" data-longtitle="true" style="width: 620px;height: 40px;"></div>
					  </center><br> --> 
					  

					  
					<a href="passforget.php" class="text-light">Forgot password?</a><br>
					New User? Proceed to <a href="signup.php" class="text-light">Create Account</a>
				</form>
			</div>
		</div></div>
	</div>
	
<script type="text/javascript">
	function onSignIn(googleUser) {
	  var profile = googleUser.getBasicProfile();


      if(profile){
          $.ajax({
                type: 'POST',
                url: 'google/login_pro.php',
                data: {id:profile.getId(), name:profile.getName(), email:profile.getEmail()}
            }).done(function(data){
                console.log(data);
                window.location.href = 'google/home.php';
            }).fail(function() { 
                alert( "Posting failed." );
            });
      }


    }
</script>


</body>
</html>

<?php
    if(isset($_POST['login']))
        {
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $password = mysqli_real_escape_string($con,$_POST['password']);
            $query = "SELECT * FROM customer WHERE email='$email'";
            $Results = mysqli_query($con,$query) or die (mysql_error());
            if($rows = mysqli_fetch_assoc($Results)){
                $hashedPassword = $rows['password'];
                if (password_verify($password, $hashedPassword)){
                    $_SESSION['user_id']  = $rows['id'];
                    $_SESSION['user_name']  = $rows['first_name'];
                    $_SESSION['user_email']  = $rows['email'];
                    echo "<script> window.location.href = '/v1hotel/market/index.php' </script>";
                    //header ('location:/v1hotel/market/index.php');
                }else{
                    echo "<script> window.location.href = '/v1hotel/market/user/login.php' </script>";
                    flash("login_failed", "Wrong credentials, please fill in the correct ones", "alert alert-danger");
                }
            }else{
                echo "<script> window.location.href = '/v1hotel/market/user/index.php' </script>";
                flash("login_failed", "Wrong credentials, please fill in the correct ones", "alert alert-danger");
            }
    }
?>

