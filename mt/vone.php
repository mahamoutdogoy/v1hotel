<?php
session_start();
 include("../connect.php");
     if($_SESSION['user']['role'] == 'user')
     {


 $sql = "select image from users where userid=".$_SESSION['user']['userid'];
 $result = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($result);

}
elseif ($_SESSION['user']['role'] == 'admin')
{
	$sql = "select image from user where userid=".$_SESSION['user']['userid'];
 $result = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($result);
}
else
{
	echo "error";
}

 $image = $row['image'];
$image_src = "images/".$image;

if (!isset($_SESSION['user']['userid'])) {
	header("location: ../hotellogin.php");
}
?>




