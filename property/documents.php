<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.cookie/1.4.0/jquery.cookie.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<?php //include 'propertymenus.php';
	session_start();
	$session_user=$_SESSION['user']['userid'];
	require_once('property_DB.php');

?>
	

<?php 


	if(isset($_POST['submit']))
	{
		
		$user_id=$session_user;
		$property_id=$_POST['property'];
		//echo "$property_id";
		$in_certificate=addslashes(file_get_contents($_FILES['in_certificate']['tmp_name']));
		$tax_certificate=addslashes(file_get_contents($_FILES['tax_certificate']['tmp_name']));
		//$pan_identifcation=addslashes(file_get_contents($_FILES['pan_identifcation']['name']));
		$cancel_cheque=addslashes(file_get_contents($_FILES['cancel_cheque']['tmp_name']));

		if(!empty($_FILES['pan_identifcation']['name']))
		{
			$pan_identifcation=addslashes(file_get_contents($_FILES['pan_identifcation']['tmp_name']));
		}
		else
		{
			$pan_identifcation="";
		}

		$count1=mysqli_query($con,"select * from documents where property_id='$property_id'");
		$rows = mysqli_num_rows($count1);
		//echo "mytravaly".$rows;

		

			$file1 = rand(1000,100000)."-".$_FILES['in_certificate']['name'];
			 $file_loc1 = $_FILES['in_certificate']['tmp_name'];

			$file2 = rand(1000,100000)."-".$_FILES['tax_certificate']['name'];
			 $file_loc2 = $_FILES['tax_certificate']['tmp_name'];

			 $file3 = rand(1000,100000)."-".$_FILES['cancel_cheque']['name'];
			 $file_loc3 = $_FILES['cancel_cheque']['tmp_name'];


			 $file4 = rand(1000,100000)."-".$_FILES['pan_identifcation']['name'];
			 $file_loc4 = $_FILES['pan_identifcation']['tmp_name'];
		
		if($rows==0)
		{



			 

/*
			 $file_size = $_FILES['in_certificate']['size'];
			 $file_type = $_FILES['in_certificate']['type'];*/
			
			 $folder="documents/";
			 
			 move_uploaded_file($file_loc1,$folder.$file1);
			 move_uploaded_file($file_loc2,$folder.$file2);
			 move_uploaded_file($file_loc3,$folder.$file3);
			 move_uploaded_file($file_loc4,$folder.$file4);

			/* $sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$file','$file_type','$file_size')";
			 mysqli_query($con,$sql) or die(mysqli_error($con)); 
*/



			mysqli_query($con,"insert into documents(user_id,property_id,in_certificate,tax_certificate,pan_identifcation,cancel_cheque) values('$user_id','$property_id','$file1','$file2','$file4','$file3');")or die(mysqli_error($con));
			//echo "hii abhi";
		}
		else
		{

			$folder="documents/";
			 
			 move_uploaded_file($file_loc1,$folder.$file1);
			 move_uploaded_file($file_loc2,$folder.$file2);
			 move_uploaded_file($file_loc3,$folder.$file3);
			 move_uploaded_file($file_loc4,$folder.$file4);

			mysqli_query($con,"update documents set in_certificate='$file1',tax_certificate='$file2', pan_identifcation='$file4', cancel_cheque='$file3' where property_id='$property_id'") or die(mysqli_error($con));
			echo "hii gowda";

		}

	//require_once('property_score.php');
		echo "<script>
			var property_id=$property_id;
			$.post('property_score.php', {property_id:property_id}, function(data){
		 	});</script>";
	echo "<script type='text/javascript'>

				alert('Documents uploaded successfully!!');
				 
				
				</script>";
			}
	?>









<!DOCTYPE html>
<html>
<head>
	<title>Documents</title>
	<?php include '../mytravalyAdmin/myheader.php' ?>
</head>
<body>


	
		<?php include '../mytravalyAdmin/mtsidebar.php' ?>
	
<div class="col-md-9">


	
	<?php include 'propertymenus.php'; ?>
	
<form action="" method="post" enctype="multipart/form-data"> 
<table align="center" width="100%" cellpadding="10" class="table-striped" cellspacing="15" style="opacity: 0.8;">
	<tr>
		<td align="right" colspan="2">
			Select Property
		
				<select name="property" id="property" onchange="caldocuments(this)" class="col-sm-3  property" style="border-radius: 1rem;text-align: center;height: 35px" required>
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
                              $query = "SELECT * FROM propertydetails where user_id='$session_user'";
                          }
                              $result = mysqli_query($con,$query);
                              while($row=mysqli_fetch_array($result)){                                                 
                                echo "<option value=".$row['property_id'].">".$row['property_name']."</option>";
                              }
                          ?>

                    </select>
                   <b><img src="Mytravaly images/note.png" height="20px" width="20px">Allows .pdf,.jpg,.jpeg,.png formats and size should be within 500kb</b>
			</td>
		</tr>
	</table>
	<div id="MyDiv" width="100%" >
		
	<table align="center" width="100%" cellpadding="10" class="table-striped" cellspacing="15" style="opacity: 0.8;">
		<tr style="background:#f15025;font-size: 20px;">
		<td colspan="2" align="center" style="padding-top:.9em;padding-bottom:.9em;"><b>Documents</b></td>
	</tr>
	
	<tr>
		<td align="center">Incorporation Certificats/Trade </td>
		<td style="padding-top:.9em;padding-bottom:.9em;"><input type="File" id="in_certificate" name="in_certificate"   accept=".pdf,.jpg,.jpeg,.png"></td>
		
	</tr>
	<tr>
		<td align="center">Tax/GST Certificate</td>
		<td style="padding-top:.9em;padding-bottom:.9em;"><input type="file" id="tax_certificate" name="tax_certificate"  accept=".pdf,.jpg,.jpeg,.png">		
		</td>

	</tr>
 
	<tr>
		<td align="center">Pan/Tax Identification No</td>
		<td style="padding-top:.9em;padding-bottom:.9em;"><input type="file" id="pan_identifcation" name="pan_identifcation" accept=".pdf,.jpg,.jpeg,.png">
			
		</td>
	</tr>
	
	<tr>
		<td align="center">Cancel Cheque</td>
		<td style="padding-top:.9em;padding-bottom:.9em;"><input type="file" id="cancel_cheque" name="cancel_cheque"  accept=".pdf,.jpg,.jpeg,.png">
		</td>
	</tr>
	<tr>
		<td align="right"  style="padding: 30">
			<input type="submit" onClick="return validate()" class="btn btn-secondary" name="submit" value="Upload"/></td>
			
		<td>
			<?php if(isset($_FILES['in_certificate']['name'] ) && isset($_FILES['cancel_cheque']['name'] ) && isset($_FILES['tax_certificate']['name'] ) || isset($_FILES['pan_identifcation']['name'] ) ) {

        		echo $_FILES['in_certificate']['name'].",&emsp;".$_FILES['tax_certificate']['name'].",&emsp;".$_FILES['pan_identifcation']['name'].",&emsp;".$_FILES['cancel_cheque']['name']. " &nbsp;was uploaded";

    		} 
    		else {
        		echo "No File Uploaded";
    		}
	?>
		</td>
	</tr>
	</table>
</div>

</form>
</div>

</body>
</html>

<script>
function validate(){
var size=512000;
var file_size1=document.getElementById('in_certificate').files[0].size;
var file_size2=document.getElementById('tax_certificate').files[0].size;
var file_size3=document.getElementById('pan_identifcation').files[0].size;
var file_size4=document.getElementById('cancel_cheque').files[0].size;
if(file_size1>=size){
    alert('Incorporation certificate too large');
    return false;
}
if(file_size2>=size){
    alert('Tax certificate too large');
    return false;
}
if(file_size3>=size){
    alert('Pan identification too large');
    return false;
}
if(file_size4>=size){
    alert('Cancel cheque too large');
    return false;
}
/*var type='image/jpeg';
var file_type=document.getElementById('in_certificate').files[0].type;
if(file_type!=type){
    alert('Format not supported,Only .jpeg images are accepted');
    return false;
}*/
}
</script>

<!--  <script>
$(document).ready(function(){
	
    $('#property').change(function
    {
    	
		var id=$(this).val();

    	var path="get_documents.php?p="+id;
        $('#MyDiv').load(path);              

    });

});    
</script>  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>    
<script type="text/javascript">
	
	function caldocuments(property)
	{

		var id=$(property).val();

    	var path="get_documents.php?p="+id;
        $('#MyDiv').load(path); 
	}
</script>
<script type="text/javascript">
 
  //document.getElementById('property').value = "<?php echo $_POST['property'];?>";
  

</script>