

    <?php
   require_once('Property_DB.php');
//echo $_REQUEST['p'];
$query=mysqli_query($con,"select * from documents where property_id='$_REQUEST[p]'");
$row=mysqli_fetch_array($query);
 
 	if($row['property_id']=='')
 	{
 		?>
 		<table align="center" width="100%" cellpadding="10" class="table-striped" cellspacing="15" style="opacity: 0.8;">
	<tr style="background:#f15025;font-size: 20px;">
		<td colspan="2" align="center" style="padding-top:.9em;padding-bottom:.9em;"><b>Documents</b></td>
	</tr>
	
	<tr>
		<td align="center">Incorporation Certificats/Trade </td>
		<td style="padding-top:.9em;padding-bottom:.9em;"><input type="File" id="in_certificate" name="in_certificate"   accept=".pdf,.jpg,.jpeg,.png">
			
		</td>
		
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
		<tr>
		<td align="right"  style="padding: 30">
			<input type="submit" class="btn btn-secondary" onClick="return validate()" name="submit" value="Upload"/></td>
			
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
	</tr>
	
	</table>
 	
	<?php }
	else
	{
		echo "<script>alert('You already uploaded the documents')</script>";
		?>
		<table align="center" width="100%" cellpadding="10" class="table-striped" cellspacing="15" style="opacity: 0.8;">
	<tr style="background:#f15025;font-size: 20px;">
		<td colspan="2" align="center" style="padding-top:.9em;padding-bottom:.9em;"><b>Documents</b></td>
	</tr>
	
	<tr>
		<td align="center">Incorporation Certificats/Trade </td>
		<td style="padding-top:.9em;padding-bottom:.9em;"><input type="File" name="in_certificate"   accept=".pdf,.jpg,.jpeg,.png">
			<a href="documents/<?php echo $row['in_certificate'] ?>" target="_blank">view file</a>
		</td>
		
	</tr>
	<tr>
		<td align="center">Tax/GST Certificate</td>
		<td style="padding-top:.9em;padding-bottom:.9em;"><input type="file" name="tax_certificate"  accept=".pdf,.jpg,.jpeg,.png">	
		<a href="documents/<?php echo $row['tax_certificate'] ?>" target="_blank">view file</a>	
		</td>

	</tr>
 
	<tr>
		<td align="center">Pan/Tax Identification No</td>
		<td style="padding-top:.9em;padding-bottom:.9em;"><input type="file" name="pan_identifcation" accept=".pdf,.jpg,.jpeg,.png">
		<a href="documents/<?php echo $row['pan_identifcation'] ?>" target="_blank">view file</a>
		</td>
	</tr>
	
	<tr>
		<td align="center">Cancel Cheque</td>
		<td style="padding-top:.9em;padding-bottom:.9em;"><input type="file" name="cancel_cheque"  accept=".pdf,.jpg,.jpeg,.png">
		<a href="documents/<?php echo $row['cancel_cheque'] ?>" target="_blank">view file</a>
		</td>
	</tr>
	<tr>
		
		<td>
		</td>	
		<td colspan="2" style="color: red">
			<?php echo "You already uploaded the documents If you wish to change the bank details please drop a mail to <a href='mailto:support@mytravaly.com'>support@mytravaly.com</a>"; ?>
			</td>
	
	</table>
	<?php   }?>
