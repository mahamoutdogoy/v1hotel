<?php
require_once('Property_DB.php');
//echo $_REQUEST['p'];
$query=mysqli_query($con,"select * from bankdetails where property_id='$_REQUEST[p]'");
$row=mysqli_fetch_array($query);

if($row['bankname']=='')
	{
echo '<table align="center" width="100%" id="bid" cellpadding="5" class="table-striped" cellspacing="10" style="opacity: 0.8;">	
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
	</table>';

}
else
{

echo '<table align="center" width="100%" id="bid" cellpadding="5" class="table-striped" cellspacing="10" style="opacity: 0.8;">	
	<tr><td align="center">Bank name</td>
		<td><input list="bankname" name="bankname" readonly required="" value="'.$row['bankname'].'"  autocomplete="off" class="col-sm-6 custom-select custom-select-sm">
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
		<td><input type="text" name="beneficiaryname" readonly id="beneficiaryname"  value="'.$row['beneficiaryname'].'" required class="col-sm-6 form-control form-control-lg-5" required="" autocomplete="off" ></td>

	</tr>

	<tr>
		<td align="center">Account Type</td>
		<td><input list="accounttype" name="accounttype" readonly value="'.$row['accounttype'].'"required="" autocomplete="off" class="col-sm-6 custom-select custom-select-sm">
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
		<td><input type="text" name="accnumber" readonly value="'.$row['accnumber'].'"id="accnumber"  class="col-sm-6 form-control form-control-lg-5" required="" autocomplete="off" ></td>
	</tr>
	<tr>
		<td align="center">IFSC Code</td>
		<td><input type="text" name="ifsc" id="ifsc" readonly value="'.$row['ifsc'].'" class="col-sm-61 form-control form-control-lg-5" required="" autocomplete="off" ></td>
	</tr>
	<tr>
		<td  align="center">Swift Code</td>
		<td><input type="text" name="swiftcode" id="swiftcode" readonly value="'.$row['swiftcode'].'" class="col-sm-6 form-control form-control-lg-5" required="" autocomplete="off"/></td>
	</tr>
	<tr>
		<td align="center">Branch</td>
		<td><input type="text" name="branch" id ="branch" readonly value="'.$row['branch'].'" class="col-sm-6 form-control form-control-lg-5" required="" autocomplete="off" ></td>
	</tr>
	
	
	<tr>
		<td colspan="2" align="center" style="padding-top:1.9em;padding-bottom:1.9em;"><a href="Change_bankdetails.php" class="btn" style="border-radius: 2em;width:250px;background: #ff6f61"  name="save" id="save">Change bankdetails</a>  

		</td>
	</tr>';
}

	echo'</table>';
	?>