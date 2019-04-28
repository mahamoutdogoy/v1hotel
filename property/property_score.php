<?php
include 'property_DB.php';
$res=mysqli_query($con,"select * from property_score where property_id='$_POST[property_id]'");
$res1=mysqli_fetch_array($res);
if($res1['property_id']=='')
{
	mysqli_query($con,"insert into property_score(property_id,property_score) values ('$_POST[property_id]',1)");
}
else{
//echo $res1['property_score']."hi";
$status=$res1['property_score']+1;
mysqli_query($con,"update property_score set property_score='$status' where property_id='$_POST[property_id]'");
}
?>