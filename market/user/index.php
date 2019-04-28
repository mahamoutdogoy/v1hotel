<?php
   include 'connect.php';
   if(!isset($_SESSION['user_id'])){
        header("location: login.php");
    }
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mytravaly</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
   <!--  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

               
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <!-- <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a> -->
                    <div class="header-left">
                       <a href="../index.php"><img src="../images/logo_mytravaly.png" width="80" height="80" class="float-left mt-1" alt="" style="border-radius: 50%; "></a>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="profile.php"><i class="fa fa-user"></i> My Profile</a>
                            <a class="nav-link" data-toggle="modal" data-target="#gPassChange"><i class="fa fa-user-cog"></i> Change&nbsp;passwrd</a>
                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>


                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
<!-- 
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div> -->


            <div class="col-sm-6 col-lg-4 ">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body p-4">
                        <!-- <h4 class="mb-0">
                            <span class="count"></span>
                        </h4> -->
                        <a class="text-light" href="profile.php">Edit profile</a>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-4">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body p-4">
                        <!-- <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4> -->
                        <a class="text-light" href="reservation.php">My Reservations</a>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-4">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body p-4">
                            <!-- <span class="count">10468</span>
                        </h4>-->
                      <a class="text-light">Members online <strong class="text-success"><?php echo (rand(50, 100))?> </strong></a> 

                    </div>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart3"></canvas>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-lg-4">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body p-4">
                    <a href="https://support.mytravaly.com/portal/community">

                        <!-- <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4> -->
                        <p class="text-light">Join our community</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>
                    </a>
                    </div>
                </div>
            </div>

           

            <div class="col-sm-6 col-lg-4">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body p-4">

                        <!-- <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4> -->
                        <p class="text-light">Review</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>     

                    </div>
                </div>
            </div>

           


            <div class="col-sm-6 col-lg-4">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body p-4">
                        <a href="https://support.mytravaly.com/portal/home">
                        
                        <p class="text-light">Support</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->


    <div id="gPassChange" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="far fa-list-alt"></i> Password Change</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          <div class="modal-body">
            <div class="card" style="margin-left: 40px;" >  
                <div class="card-body">
                    <form action="" method="post">
                            <table class="table">

                            <tr><td><label for="">Current Password </label></td>
                            <td><input type="password" id="curpassid" name="curpass" class="form-control"  required placeholder="Current"></td><td><i class="fas fa-eye-slash" style="margin-left: -40px;margin-top: 10px;" onclick="return showhide1();"></i></td></tr>
                            <tr>
                            <td><label for="">New Password </label></td>
                            <td><input id="newpassid" type="password" name="newpass" class="form-control" required placeholder="New"></td><td><i class="fas fa-eye-slash" style="margin-left: -40px;margin-top: 10px;" onclick="return showhide2();"></i></td></tr>
                            <tr><td><label for="">Confirme Password</label></td>
                            <td><input id="confpassid" type="password" name="confpass" class="form-control" required placeholder="Confirme"></td><td><i class="fas fa-eye-slash" style="margin-left: -40px;margin-top: 10px;" onclick="return showhide3();"></i></td></tr>
                        </table>
                        <input type="submit" name="chgPass" value="Change" class="btn btn-success" style="margin: 20px 0 0 150px;">
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>

  </div>
</div>


    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>

<?php
    if (isset($_POST['chgPass'])) {
        
       
        $curpass = mysqli_real_escape_string($con, strip_tags($_POST['curpass']));
        $newpass = mysqli_real_escape_string($con, strip_tags($_POST['newpass']));
        $confpass = mysqli_real_escape_string($con, strip_tags($_POST['confpass']));
        $pw_sql = "SELECT password from customers WHERE id=".$_SESSION['user']['user_id'];
        $pw_run = mysqli_query($con, $pw_sql);
        $pw_row = mysqli_fetch_assoc($pw_run);
        if ($newpass!==$confpass) {
            echo "<script>alert('Your new and confirmation passwords do not match, please try again!!!')</script>";
        }else{
            $hashedPass = $pw_row['password']; 
            if(password_verify($curpass, $hashedPass)) {
                $newpass = password_hash($newpass, PASSWORD_DEFAULT);
                $pw_sql = "UPDATE customers SET password='$newpass' WHERE id=".$_SESSION['user']['user_id'];
                if(mysqli_query($con, $pw_sql)){
                echo "<script>alert('Yes you success changed your password!!!')</script>";
                }else echo "<script>alert('Ooops something went wrong please try again')</script>";
            }else{
            echo "<script>alert('The entered password does not match with your current password, please check again!!!')</script>";
        }}
    
    }


?>



<script>
    function showhide1() {
        var pass1 = document.getElementById('curpassid').type;
        if (pass1=='password') {
            document.getElementById('curpassid').type='text';
        }else{
            document.getElementById('curpassid').type='password';
        }
    }
    function showhide2() {
        var pass1 = document.getElementById('newpassid').type;
        if (pass1=='password') {
            document.getElementById('newpassid').type='text';
        }else{
            document.getElementById('newpassid').type='password';
        }
    }
    function showhide3() {
        var pass1 = document.getElementById('confpassid').type;
        if (pass1=='password') {
            document.getElementById('confpassid').type='text';
        }else{
            document.getElementById('confpassid').type='password';
        }
    }
</script>