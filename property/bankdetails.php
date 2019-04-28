<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.cookie/1.4.0/jquery.cookie.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<?php // include 'propertymenus.php';
	session_start();
	$session_user=$_SESSION['user']['userid'];
	//echo $session_user;
	require_once('property_DB.php');
?>

<?php

		if (isset($_POST['save'])) {
			$user_id=$session_user;
		$property_id=$_POST['property'];
		$bankname=$_POST['bankname'];
		$beneficiaryname=$_POST['beneficiaryname'];
		$accounttype=$_POST['accounttype'];
		$accnumber=$_POST['accnumber'];
		$ifsc=$_POST['ifsc'];
		$swiftcode=$_POST['swiftcode'];
		$branch=$_POST['branch'];


	mysqli_query($con,"insert into bankdetails(user_id,property_id,bankname,beneficiaryname,accounttype,accnumber,ifsc,swiftcode,branch) values('$user_id','$property_id','$bankname','$beneficiaryname','$accounttype','$accnumber','$ifsc','$swiftcode','$branch');");

	//require_once('property_score.php');

			echo "<script>
			var property_id=$property_id;
			$.post('property_score.php', {property_id:property_id}, function(data){
		 	});</script>";
		echo '<script>

				alert("Congratulation bank details successfully saved\n You can take the agreement copy now");
				window.location.href = "agreement.php";
				document.getElementById("branch").disabled = true;
				</script>';

				
	}
	


?>



<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<title>Bank Details</title>

	<link rel="stylesheet" type="text/css" href="bank.css">

<head>	

<script>

/*function myFunction() {
  var bankname = document.getElementById('bankname').value;
   var beneficiaryname = document.getElementById('beneficiaryname').value;
    var accounttype = document.getElementById('accounttype').value;
 var accnumber = document.getElementById('accnumber').value;
  var ifsc = document.getElementById('ifsc').value;
   var swiftcode = document.getElementById('swiftcode').value;
    var branch = document.getElementById('branch').value;

  if (bankname== "") {
    alert("bankname must be filled out");
    return false;
  }
  else if (beneficiaryname== "") {
    alert("Beneficiary name must be filled out");
    return false;
  }
else if (accounttype== "") {
    alert("account type must be filled out");
    return false;
  }
else if (accnumber== "") {
    alert("account number must be filled out");
    return false;
  }
else if (ifsc== "") {
    alert("ifsc must be filled out");
    return false;
  }
  else if (swiftcode== "") {
    alert("swiftcode must be filled out");
    return false;
  }

  else if (branch== "") {
    alert("branch must be filled out");
    return false;
  }

}
*/

</script>
<?php include '../mytravalyAdmin/myheader.php' ?>
</head>

<body>



		<?php include '../mytravalyAdmin/mtsidebar.php' ?>
	
<div class="col-md-9">

	
	<?php include 'propertymenus.php'; ?>
	
<form action="" method="post"> 
<div>
	

	<div id="" width="100%" >

<table width="100%" id="bid1" class="table-striped" cellpadding="5"  cellspacing="10" style="opacity: 0.8;">
	<tr >
		<td align="center">
			&emsp;Select Property
		</td>
			<td>
				<select   name="property" id="property" onchange="" class="col-sm-6 custom-select custom-select-sm" style="border-radius: 1rem;text-align: center;height: 35px;" required>
                      <option value="0" selected disabled>--Select--</option>
                          <?php
                           $mt_property_id='';
                          if(isset($_GET['pid']))
                          {
                            $mt_property_id=$_GET['pid'];
                          }
                          if($mt_property_id!='')
                          {
                            $query = "SELECT * FROM propertydetails where property_id='$mt_property_id'";

                          }
                          else
                          {
                              $query = "SELECT * FROM propertydetails where user_id='$session_user' group by property_id";
                          }
                              $result = mysqli_query($con,$query);
                              while($row=mysqli_fetch_array($result)){                                                 
                                echo "<option value=".$row['property_id'].">".$row['property_name']."</option>";
                              }
                          ?>

                    </select>
			</td>
		</tr>
	
	</table>
</div>
	<div id="MyDiv" width="100%" >
	<table align="center"  width="100%" id="bid" cellpadding="5" class="table-striped" cellspacing="10" style="opacity: 0.8;">
	<tr id="fillhead" style="background:#f15025;;font-size: 20px;">
		<td colspan="2" align="center" style="padding-top:.9em;padding-bottom:.9em;"><b>Fill Bank Details</b></td>
	</tr>	
	<tr><td align="center">Bank name</td>
		<td><input list="bankname" name="bankname" required="" autocomplete="off" class="col-sm-6 custom-select custom-select-sm">
  			<datalist id="bankname">
    		<option value="SBI Bank"></option>
    		<option value="Canara Bank"></option>
    		<option value="HDFC Bank"></option>
    		<option value="Axix Bank"></option>
    		<option value="Karnataka Bank"></option>
  			</datalist></td>
  		
	</tr>
	<tr>
		<td align="center">Beneficiary Name</td>
		<td><input type="text" name="beneficiaryname" id="beneficiaryname" required class="col-sm-6 form-control form-control-lg-5" required="" autocomplete="off" ></td>

	</tr>

	<tr>
		<td align="center">Account Type</td>
		<td><input list="accounttype" name="accounttype" required="" autocomplete="off" class="col-sm-6 custom-select custom-select-sm">
  			<datalist id="accounttype">
    		<option value="Saving Account"></option>
    		<option value="Current Account"></option>
    		<option value="Recurring Deposit Account"></option>
    		<option value="Fixed Deposit Account"></option>
  			</datalist>
  		</td>
	</tr>
	<tr>
		<td align="center">Account Number</td>
		<td><input type="number" name="accnumber" id="accnumber" class="col-sm-6 form-control form-control-lg-5" required="" autocomplete="off" ></td>
	</tr>
	<tr>
		<td align="center">IFSC Code</td>
		<td><input type="text" name="ifsc" id="ifsc" class="col-sm-6 form-control form-control-lg-5" required="" autocomplete="off" ></td>
	</tr>
	<tr>
		<td  align="center">Swift Code</td>
		<td><input type="text" name="swiftcode" id="swiftcode" class="col-sm-6 form-control form-control-lg-5"  autocomplete="off"/></td>
	</tr>
	<tr>
		<td align="center">Branch</td>
		<td><input type="text" name="branch" id ="branch" class="col-sm-6 form-control form-control-lg-5" required="" autocomplete="off" ></td>
	</tr>
	<tr>
		<td colspan="2" align="center" style="padding-top:1.9em;padding-bottom:1.9em;"><input type="Submit" name="save" id="save" value="save" class="btn" style="border-radius: 2em;width:115px;background: #ff6f61" onclick="myFunction()" />

		</td>
	</tr>
	</table>
</div>
	<table align="center">
	<tr>
		<td colspan="2" align="center"><label><b><?php if(isset($_POST['save'])){ 
				$newstring = substr($accnumber, -4);
			echo "<label style='background: #ff6f61;border-radius: 2em;font-size:25px'>&emsp;Bank Details has been Successfully Saved with foollwing details &emsp;</label class='m-4'><br>".$bankname."<br>".$beneficiaryname."<br>".$accounttype."<br>XXXXXXX".$newstring."<br>".$ifsc."<br>".$swiftcode."<br>".$branch."<br>
			

					<a href='Change_bankdetails.php' class='btn' style='border-radius: 2em;width:315px;background: #ff6f61'>Change Banking Infrormation<a/>";

			echo "<script>
      			
  				document.getElementById('bid').style.display = 'none';
					

			</script>";

			} 
			?></b></label></td>
	</tr>
	</table>
</div>
</div>

</form>
</body>
</html>



<script>
$(document).ready(function(){
	
    $('#property').change(function()
    {

		var id=$(this).val();

    	var path="get_bankdetails.php?p="+id;
        $('#MyDiv').load(path);              

    });

});    
</script>

<script type="text/javascript">
 
  document.getElementById('property').value = "<?php echo $_POST['property'];?>";
  document.getElementById('room').value = "<?php echo $_POST['room'];?>";

</script>





