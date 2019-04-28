
<?php
session_start();
include_once("../dbConnect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Web Charges</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>
<?php include_once("myheader.php"); 
    include_once("mtsidebar.php");
   

    ?>
    <div class="col-md-9 col-lg-10 p-5" >
    	<form class="form-horizontal" action="" method="post">
		<?php
		global $mtcharge;
		global $talaash;
		$mtcharge=8;
		$talaash=10;
		$num_rows=1;
		 $query=mysqli_query($conn,"select * from mt_webcharges")or die(mysqli_error($conn));
		 if(mysqli_num_rows($query)==1)
		 {
		 	$row=mysqli_fetch_array($query);
		 	$mtcharge=$row['MT_WebCharge'];
		 	$talaash=$row['Talaash_Donation'];
		 	
		 }
		 else
		 {
		 	$num_rows=0;
		 }
		?>
		<div class="form-group">
			<input type="hidden" name="num_rows">
			<div class="row">
	  		<label class="control-label col-sm-3" >Web Reservation Charge </label>
		    <div class="col-sm-3">
		      <input type="number"  class="form-control" value='<?php echo $mtcharge; ?>'  name="mt" placeholder="Enter Reservation Charge" required>
	    	</div>
  		</div>
  	</div>
  		<div class="form-group">
  		<div class="row">
	  		<label class="control-label col-sm-3" >Talaash Donation </label>
		    <div class="col-sm-3">
		      <input type="number"  class="form-control" value='<?php echo $talaash; ?>'  name="talaash" placeholder="Enter Talaash Donation"  required>
	    	</div>
  		</div>
  	</div>
  	<div class=" row form-group">
  		<div class="col-md-6">
  			<input type="submit" name="update_charges" class="btn btn-success float-right" value="Update">
  		</div>
  	</div>
    	
    </div>
    </div>
    </div>


</body>
</html>

<?php
if(isset($_POST['update_charges']))
{
	$num="";
	if($_POST['num_rows']==1)
	{
		if($query=mysqli_query($conn,"UPDATE `mt_webcharges` SET `MT_WebCharge`='$_POST[mt]',`Talaash_Donation`='$_POST[talaash]' ") )
		{
			$_POST['update_charges']=null;
			echo "<script>alert('Data Updated Successfully...'); window.location='MT_webCharges.php';</script>";
		}
		else
		{
			echo "<script>alert('Fail To Update The Data Please Try Again...'); location.reload();</script>";
		}
	}
	else if($_POST['num_rows']==0)
	{
		mysqli_query($conn,"TRUNCATE `mt_webcharges`") or die(mysqli_error($conn));

		mysqli_query($conn,"INSERT INTO `mt_webcharges`  VALUES ('$_POST[mt]', '$_POST[talaash]')") or die(mysqli_error($conn));
		echo "<script>alert('Data Updated Successfully...'); window.location='MT_webCharges.php';</script>";
	}
	else
		{
			echo "<script>alert('Fail To Update The Data Please Try Again...'); location.reload();</script>";
		}

}
?>