<?php
include("../connect.php");
//include"red.php";


//session_start();
$users = 0;



$sql = "SELECT * FROM users where  hotelid=".$_SESSION['user']['userid'];
$result = mysqli_query($con,$sql);
if ($rowcount=mysqli_num_rows($result) > 0)
 {
   
    while($row = mysqli_fetch_assoc($result)) {
     $users++;
    }
} else {

}

$totalbooking = 0;


$sql1 = "SELECT * FROM reservation where property_id=".$_SESSION['user']['userid'];
$result1 = mysqli_query($con,$sql1);
if ($rowcount=mysqli_num_rows($result1) > 0)
 {
   
    while($row1 = mysqli_fetch_assoc($result1)) {
     $totalbooking++;
    }
} else {

}

$totalleads = 0;


$c =$_SESSION['user']['userid'];
$sql2 = "SELECT * FROM task_details where ClientId IN (SELECT ClientId from client_details where hotelid='$c')";
$result2 = mysqli_query($con,$sql2);
if ($rowcount=mysqli_num_rows($result2) > 0)
 {
   
    while($row2 = mysqli_fetch_assoc($result2)) {
     $totalleads++;
    }
} else {

}

$vusers = 0;

$sql3 = "SELECT * FROM users where status= 1 and hotelid =".$_SESSION['user']['userid'];;
$result3 = mysqli_query($con,$sql3);
if ($rowcount=mysqli_num_rows($result3) > 0)
 {
   
    while($row = mysqli_fetch_assoc($result3)) {
     $vusers++;
    }
} else {

}


$checkin = 0;

$sql4 = "SELECT * FROM reservation where check_in = CURDATE() and property_id =".$_SESSION['user']['userid'];
$result4 = mysqli_query($con,$sql4);
if ($rowcount=mysqli_num_rows($result4) > 0)
 {
   
    while($row = mysqli_fetch_assoc($result4)) {
     $checkin++;
    }
} else {

}



$checkout = 0;

$sql4 = "SELECT * FROM reservation where check_out = CURDATE() and property_id =".$_SESSION['user']['userid'];
$result4 = mysqli_query($con,$sql4);
if ($rowcount=mysqli_num_rows($result4) > 0)
 {
   
    while($row = mysqli_fetch_assoc($result4)) {
     $checkout++;
    }
} else {

}

$dep = 0;

$sql5 = "SELECT * FROM departments WHERE dpuserid =".$_SESSION['user']['userid'];
$result5 = mysqli_query($con,$sql5);
if ($rowcount=mysqli_num_rows($result5) > 0)
 {
   
    while($row = mysqli_fetch_assoc($result5)) {
     $dep++;
    }
} else {

}								


$inactiveusers = 0;


$sql6 = "SELECT * FROM users where status= 0 and hotelid =".$_SESSION['user']['userid'];;
$result6 = mysqli_query($con,$sql6);
if ($rowcount=mysqli_num_rows($result6) > 0)
 {
   
    while($row = mysqli_fetch_assoc($result6)) {
     $inactiveusers++;
    }
} else {

}

$notcompleted = 0;



$d =$_SESSION['user']['userid'];
$sql7 = "SELECT * FROM task_details where ClientId  IN (SELECT ClientId from client_details where hotelid='$d') and Status='not yet started'";
$result7 = mysqli_query($con,$sql7);
if ($rowcount=mysqli_num_rows($result7) > 0)
 {
   
    while($row7 = mysqli_fetch_assoc($result7)) {
     $notcompleted++;
    }
} else {

}



?>