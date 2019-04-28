<?php 
require_once 'config.php';
if (isset($_POST['checkout'])) {

  $_SESSION['location']=$_POST['location'];
  $_SESSION['check_in'] = $_POST['check_in'];
  $_SESSION['check_out']= $_POST['check_out'];
  $_SESSION['people'] = $_POST['people'];
  $_SESSION['rooms'] = $_POST['rooms'];
  $_SESSION['children'] = $_POST['children'];


  header('Location: search.php');

}
$_SEESION['username']="";
$user_id = 'username';

?>


        <?php include 'header.php'; ?>


            <!--top menu-->
            <!-- <div class="container  mw-100">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <a href=""><img src="images/logo.png" class="float-left" alt="" style=" "></a>
            
                        <div id="top_menu" class=" mt-3" style="float: right;">
                            <ul class="nav list-unstyled float-right">
                                <li class="nav-item">
                                    <a href="#"><i class="fa fa-user"></i><?php   // echo $_SEESION['username']; ?></a>
                                </li>
                                
                                <li class="nav-item"><a class="nav-link" href="#"><span><i class="fa fa-globe"></i></span>&nbsp;Language</a></li>
                                <li><a href="#" class="nav-link"><span><i class="fa fa-money"></i></span>&nbsp;Currency</a></li>
                                <li><a href="../MTProject/index.php" class="nav-link"><span><i class="fa fa-plus"></i></span>&nbsp;Add your property</a></li>
                                <li><a href="#exampleModal" data-toggle="modal" data-target="#exampleModal" class="nav-link"><span><i class="fa fa-sign-in"></i></span>&nbsp;Login</a></li>
                            </ul>
                        </div>
            
                    </div>
                </div>
            </div> -->

            <div class="container   pb-5 mt-5 text-center" id="search_box">
                <div class="row" >
                    <div class="col-sm-8 mx-auto" id="title">
                       <center> <h2 class="text-light">Find Your Epic Stay<hr class="bg-white w-25">  </h2></center>
                        </div>
                    </div>
                    <div class="row mt-5">

                        <div class="col-sm-10 mx-auto">              


                            <form method="POST" action="">
                                <div class="row row_service" >
                                    <div class="mr_style col-sm-4">
                                        <i class="fa fa-map-marker fa-2x  text-danger map1  ml-1"  ></i>
                                        <input type="text" name="location" class="form-control textboxstyle" placeholder=" Location/search accomodation" required="true" alert="City name" style="border-radius: 5px; margin-bottom: 10px">
                                    </div>

                                    <div class="mr_style col-sm-4">
                                        <i class="fa fa-calendar text-danger fa-2x map1 ml-1" aria-hidden="true" ></i>
                                        <input type="text" name="check_in" class="form-control textboxstyle"  id="checkin_date" placeholder="Check in" autocomplete="off" style="border-radius: 5px; margin-bottom: 10px;">
                                    </div>
                                    <div class="mr_style  col-sm-4">
                                        <i class="fa fa-calendar text-danger fa-2x map1  ml-1" aria-hidden="true"></i>
                                        <input type="text" name="check_out" class="form-control textboxstyle" id="checkout_date" placeholder="Check out" autocomplete="off" style="border-radius: 5px">
                                    </div>
                                </div>

                                <div class="row row_service">
                                    <div class="mr_style col-sm-3">
                                        <select name="people" id="" class="browser-default  mt-3 w-100 textboxstyle" style="padding:10px 0 5px 50px; border-radius: 5px">
                                            <option selected="0">Adults</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7+</option>

                                        </select>

                                    </div>

                                     <div class="mr_style col-sm-3 ">
                                        <select name="children"   class="browser-default mt-3  w-100 textboxstyle" style="padding:10px 0 5px 50px;border-radius: 5px;">
                                            <option value="">Children</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6+</option>

                                        </select>
                                    </div>

                                    <div class="mr_style col-sm-3 ">
                                        <select name="rooms" id=""  class="browser-default mt-3  w-100  textboxstyle" style="padding:10px 0 5px 50px;border-radius: 5px;">
                                            <option selected>Rooms</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>

                                        </select>
                                    </div>
                                    

                                    <div class="col-sm-3 ">
                                        <input type="submit" onclick="return Validate();" style="border-radius: 5px; font-weight: bold; font-size: 1.25em;" class="form-control textboxstyle btn btn-success mt-3 textboxstyle"  value="Search" name="checkout">
                                    </div>
                                </div>

                        </form>

                    </div>
                </div>
                

            </div>




            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h2 style="text-align: center; color: rgb(255,99,71);">What's trending</h2>
                                <?php require 'trends.php'; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h2 style="text-align: center ;color: rgb(255,99,71)">Explore the world</h2>
                                <?php require 'world.php'; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h2 style="text-align: center ;color: rgb(255,99,71)">Explore city life</h2>
                                <?php require 'city.php'; ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h2 style="text-align: center; color: rgb(255,99,71);">Meet The night life</h2>
                                <?php require 'night.php'; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h2 style="text-align: center ;color: rgb(255,99,71)">Heritage & Culture</h2>
                                <?php require 'culture.php'; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h2 style="text-align: center; color: rgb(255,99,71);">Destination Weeding</h2>
                                <?php require 'wedding.php'; ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <?php  ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h2 style="text-align: center; color: rgb(255,99,71);">Food</h2>
                                <?php require 'food.php'; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <?php  ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div onclick="topFunction()" id="myBtn" title="Back to Top" class="rounded-circle text-white">
                <i class="fas fa-angle-double-up fa-2x"></i>
            </div>

            <!-----end model-->



           <!--  <div class="container">
                <div class="row mx-auto">
                    <div class="col-sm-6 col-md-3 col-lg-3 mb-3">
                        <ul class="nav"><a href="" class=" col-12 btn btn-success nav-link">Join the community</a>
                            <li class="nav-item"></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 mb-3">
                        <ul class="nav"><a href="" class=" col-12 btn btn-primary nav-link">Travel Stories </a>
                            <li class="nav-item"></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 mb-3">
                        <ul class="nav"><a href="" class=" col-12 btn btn-danger nav-link">Start a conversation</a>
                            <li class="nav-item"></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 mb-3">
                        <ul class="nav"><a href="" class=" col-12 btn btn-info nav-link">Fun club</a>
                            <li class="nav-item"></li>
                        </ul>
                    </div>
            </div>
            </div>
 -->
           <!--  <div class="container-fluid">
                <div class="row">

                    <div class="col-sm-12" style="background-color: #f15025;">
                        <h3 class="text-light">Subscribe for more information from myTravaly</h3>
                        <ul class="list-inline col-sm-6" style="float: right;">
                            <li class="list-inline-item col-sm-7">
                                <input type="text" name="input" size="" class="form-control">
                            </li>
                            <li class="list-inline-item col-sm-4">
                                <input type="button" value="subscribe" class="bg-success text-light form-control">
                            </li>
                        </ul>

                    </div>
                    

                    </div>

                </div> -->



<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/radialIndicator/1.3.1/radialIndicator.js"></script>  
-->
<script type="text/javascript" src="../mt-documentation/footer.txt"></script>
    <?php 
    //include("footer.php");
    ?>

        <!-- Compiled and minified JavaScript 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    -->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
-->
<!--    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

--> 
<script src="js/bootstrap-datepicker.js"></script>
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
        var date = new Date();

        date.setDate(date.getDate());
        $('#checkout_date').datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            'todayhighlight':true,
            startDate: date



        });


    });


    
// $('#checkout_date').datepicker('setStartDate',document.getElementById('#checkin_date').value);


$('#checkin_date').on('changeDate', function(even) {
    document.getElementById('checkout_date').focus();
    var date = document.getElementById('checkin_date').value;
    date = new Date(date);
   
    $('#checkout_date').val('').datepicker('setStartDate', date);


    $('#checkout_date').datepicker('getFormattedDate');

});

$('#datepicker').datepicker('setStartDate', "01-01-1900");
</script>


<?php
    if (isset($_POST['sign_up'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $conf_pass = mysqli_real_escape_string($con, $_POST['conf_pass']);
  if ($password !== $conf_pass) {
      echo "<script>alert('Passwords do no match')</script>";
    }else{

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM customer WHERE email='$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $signup = mysqli_fetch_assoc($result);

 
  if ($signup) { // if user exists
    if ($signup['email'] === $email) {
      echo "<script>alert('Email already exists')</script>";
    }
  }else{
    $password = md5($password);//encrypt the password before saving in the database


    $query = "INSERT INTO customer (first_name, last_name, email, gender, phone, password) VALUES('$fname', '$lname', '$email', '$gender', '$phone', '$password')";
   if(mysqli_query($con, $query)){
    header('location: Login.php'); 
  } else die("Somthing when wrong");
    

    
  }}
  
}
  
if(isset($_POST['sign_in']))
        {
            $email = mysqli_real_escape_string($con,$_POST['emailid']);
            $password = mysqli_real_escape_string($con,$_POST['password']);
            $query = "SELECT * FROM customer WHERE email='$email' AND password='".md5($password)."'";
            $Results = mysqli_query($con,$query) or die (mysql_error());
            if($rows = mysqli_fetch_assoc($Results)){
                $_SESSION['user_id']  = $rows['id'];
                $_SESSION['user_name']  = $rows['first_name']; 
                $_SESSION['user_email']  = $rows['email']; 
            }else{
                die("wrong credentials");
            }
    }

?>