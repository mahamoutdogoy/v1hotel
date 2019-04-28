<?php

$amet=$_POST['amet'];
$pid=$_POST['pid'];
include 'property_DB.php';

mysqli_query($con,"delete from amenities where property_id='$pid' and amenities='$amet'") or die(mysqli_error());

?>