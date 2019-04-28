<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.cookie/1.4.0/jquery.cookie.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<?php 
	session_start();
	$session_user=$_SESSION['user']['userid'];
	include 'property_DB.php';
?>

<!--Uploading the Policies to Database-->
<?php
$couple_friendly="";
$bachulars_allowed="";
$pets_allowed="";
$suitable_for_children="";
if(isset($_POST['submit']))
{
	$property_id=$_POST['property'];
	$count=mysqli_query($con,"select count(property_id) as a from policies  where property_id='$property_id'");
	$r=mysqli_fetch_array($count);
	$cancel_policy=$_POST['cancel_policy'];
	$refund_policy=$_POST['refund_policy'];
	$child_policy=$_POST['child_policy'];
	$damage_policy=$_POST['damage_policy'];
	$property_restriction=$_POST['property_restriction'];
	if(isset($_POST['pets']))
	$pets_allowed=$_POST['pets'];
	if(isset($_POST['couple']))
	$couple_friendly=$_POST['couple'];
	if(isset($_POST['children']))
	$suitable_for_children=$_POST['children'];
	if(isset($_POST['bachulars']))
	$bachulars_allowed=$_POST['bachulars'];
	if($r['a']==0)
	{
	mysqli_query($con,"insert into policies(property_id,cancel_policy,refund_policy,child_policy,damage_policy,property_restriction,pets_allowed,couple_friendly,suitable_for_children,bachulars_allowed) values('$property_id','$cancel_policy','$refund_policy','$child_policy','$damage_policy','$property_restriction','$pets_allowed','$couple_friendly','$suitable_for_children','$bachulars_allowed');") or die(mysqli_error());
	
	}
	else
	{
		mysqli_query($con,"update policies set property_id='$property_id', cancel_policy='$cancel_policy', refund_policy='$refund_policy',child_policy='$child_policy',damage_policy='$damage_policy',property_restriction='$property_restriction',pets_allowed='$pets_allowed',couple_friendly='$couple_friendly',suitable_for_children='$suitable_for_children',bachulars_allowed='$bachulars_allowed' where property_id='$property_id'")or die(mysql_error());
		
	}
	echo "<script>
	var property_id=$property_id;
	$.post('property_score.php', {property_id:property_id}, function(data){
 	});</script>";

	//require_once('property_score.php');


echo '<script>
alert("Congatulation you have sucessfully created the policies!..\nYou can upload the bank details now ");
window.location.href = "bankdetails.php";
</script>';

    

}
?>


<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<title>Policies</title>
		<?php include '../mytravalyAdmin/myheader.php' ?>
		
	</head>
	<body>
		
			
				
				<?php include '../mytravalyAdmin/mtsidebar.php' ?>
			
			<div class="col-md-9 ">

				
				<?php include 'propertymenus.php'; ?>
				
				<form action="" method="post"> 
					<table align="center" width="100%"  cellpadding="5" class="table-striped" cellspacing="10" style="opacity: 0.8;" >
						<tr>
							<td align="center" colspan="2" width="25%">
								Select Property
							</td>
							<td colspan="4" align="center">
								<select name="property" id="property" onchange="" class="col-sm-4" style="border-radius: 1rem;text-align: center;height: 35px" required>
				                      <option selected disabled>--Select--</option>
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

				               <img src="Mytravaly images/note.png" height="20px" width="20px">  If you have more property then select one by one to update
							</td>
						</tr>
						</table>
						<div id="MyDiv" width="100%" >
								<table align="center" width="100%"  cellpadding="5" class="table-striped" cellspacing="10" style="opacity: 0.8;" >
						<tr>
							<td align="center" colspan="2" style="background:#f15025;padding-top: .4em;padding-bottom: .4em;font-size: 20px;"><b>Policies Information<b>
							</td>
						</tr>
						<tr>
							<td align="center">Cancellation Policy</td>
							<td><textarea name="cancel_policy" required="" style="border-radius: 1rem;" cols="55" rows="3"> <?php if(isset($_POST['cancel_policy'])){echo htmlentities($_POST['cancel_policy']);} ?></textarea>
							</td>

						</tr>
						<tr>
							<td align="center">Refund Policy</td>
							<td><textarea name="refund_policy" required="" style="border-radius: 1rem;" cols="55" rows="3"><?php if(isset($_POST['refund_policy'])){echo htmlentities($_POST['refund_policy']);} ?></textarea></td>
						</tr>
						<tr>
							<td align="center">Child Policy</td>
							<td><textarea name="child_policy" required="" style="border-radius: 1rem;" cols="55" rows="3"><?php if(isset($_POST['child_policy'])){echo htmlentities($_POST['child_policy']);} ?></textarea></td>
						</tr>
						<tr>
							<td align="center">Damage Policy</td>
							<td><textarea name="damage_policy" required="" style="border-radius: 1rem;" cols="55" rows="3"><?php if(isset($_POST['damage_policy'])){echo htmlentities($_POST['damage_policy']);} ?></textarea></td>
						</tr>
						<tr>
							<td align="center">Property Restriction</td>
							<td><textarea name="property_restriction" required="" style="border-radius: 1rem;" cols="55" rows="3"><?php if(isset($_POST['property_restriction'])){echo htmlentities($_POST['property_restriction']);} ?></textarea></td>
						</tr>
						<tr>
							<td align="center" >
								Pets Allowed 
							</td>
							<td >
								<input type="radio" name="pets" value="yes" <?php if(isset($_POST['pets']) && $_POST['pets']=='yes') echo 'checked';?>>yes&emsp;<input type="radio" name="pets" value="no" <?php if(isset($_POST['pets']) && $_POST['pets']=='no') echo 'checked';?>>no
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td align="center" >
								Couple Friendly
							</td>
							<td >
								<input type="radio" name="couple" value="yes" <?php if(isset($_POST['couple']) && $_POST['couple']=='yes') echo 'checked';?>>yes&emsp;<input type="radio" name="couple" value="no" <?php if(isset($_POST['couple']) && $_POST['couple']=='no') echo 'checked';?>>no
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td align="center" >
								Suitable for Children
							</td>
							<td >
								<input type="radio" name="children" value="yes" <?php if(isset($_POST['children']) && $_POST['children']=='yes') echo 'checked';?>>yes&emsp;<input type="radio" name="children" value="no" <?php if(isset($_POST['children']) && $_POST['children']=='no') echo 'checked';?>>no
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td align="center" >
								Bachelors Allowed 
							</td>
							<td >
								<input type="radio" name="bachulars" value="yes" <?php if(isset($_POST['bachulars']) && $_POST['bachulars']=='yes') echo 'checked';?>>yes&emsp;<input type="radio" name="bachulars" value="no" <?php if(isset($_POST['bachulars']) && $_POST['bachulars']=='no') echo 'checked';?>>no
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center" style="padding-top: .5em;padding-bottom: .4em;"><input type="Submit" name="submit" class="btn btn-success" value="Save" style="border-radius: 1rem;width:150px"></td>
						</tr>
						</table>
					</div>
					
				</form>	

			</div>

		
	</body>
</html>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>    
<script>
$(document).ready(function(){
	
    $('#property').change(function()
    {
		var id=$(this).val();
    	var path="get_policies.php?p="+id;
        $('#MyDiv').load(path);              

    });

});    
</script>

<script type="text/javascript">

	document.getElementById('property').value=<?php echo $_POST['property']; ?>
	
</script>
<style type="text/css">
	.policy{
		background: red;
	}
</style>