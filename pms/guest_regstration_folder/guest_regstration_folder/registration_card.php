

<?php
	include 'propertymenu.php';

			

			
?>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

	
</head>
<body>
	
		
	<div class="container" >
		
		
		
		<div class="border bg-info" id="div1" >
			<div class="col-md-12" >
			<label style="margin-left: 450px;font-family: Britannic Bold;font-size:20;background-color:#ff6f61;">COZY Ambience</label> <!-- hotel name will be taken from session -->
			<br><br><br>
			<label style="margin-left: 100px;">PanduRangaNagar Arkere</label> <!-- address will be taken from session-->
			<input style="margin-left:20px;" type="text" name="address" required="">
			<br>
			<label style="margin-left: 100px;">RC no:</label>
			<input style="margin-left:28px;" type="text" name="rc_no">
			<label style="margin-left:330px; ">Date</label>
			<input style="margin-left:20px;width:175px;" type="date" name="to-date" required="">

		</div>
	</div>
		<div class="col-md-12" id="div2" >
		<table  class="table mt-5  table-borderless bg-info" style="width: 100%">
			<tr>
			<th class="text-center" colspan="4">Registration Card</th>
			</tr>
			<tr>
				<td>
					<label>Guest Name</label>
				</td>
				<td><input type="text" name="guest-name" required=""></td>
			
				<td>
					<label>Designation</label>
				</td>
				<td>
					<input type="text" name="designation" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Com/Org</label>
				</td>
				<td>
					<input type="text" name="com_org" required="">
				</td>
				<td>
					
					<label>Tax./GST </label>
				</td>
				<td><input type="text" name="tax_gst" required=""></td>
			</tr>
			<tr>
				<td>
					<label>Address</label>
				</td>
				<td colspan="3">
					<textarea name="address_reg" style="width:80%" rows="3"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label>Birth Day</label>
				</td>
				<td>
					<input type="date" name="birthday" required="" style="width:175px;">
				</td>
				<td>
					<label>Anniversary</label>
				</td>
				<td>
					<input type="text" name="anniversary" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Arrived From</label>
				</td>
				<td>
					<input type="text" name="arrived_from">
				</td>
				<td>
					<label>Proceeding To</label>
				</td>
				<td>
					<input type="text" name="proceeding_to">
				</td>
			</tr>
			<tr>
				<td>
					<label>Arrived Date</label>
				</td>
				<td>
					<input type="date" name="arr-date" required="" style="width:175px;">
				</td>
				<td>
					<label>Time</label>
				</td>
				<td>
					<input type="time" name="arr_time" required="" style="width: 175px;">
				</td>

			</tr>
			<tr>
				<td>
					<label>Departure Date</label>
				</td>
				<td>
					<input type="date" name="dep-date" required="" style="width:175px;">
				</td>
				<td>
					<label>Time</label>
				</td>
				<td>
					<input type="time" name="dep_time" required="" style="width: 175px;">
				</td>
			</tr>
			<tr>
				<td>
				<label>Purpose Of Visit</label>
				</td>
				<td>
					
					<input type="radio" name="visit_purpose">
					<label>Tourist/Holiday</label>
				</td>
				<td>

					
					<input type="radio" name="visit_purpose">
					<label>Conference</label>
				</td>
				<td>
					
					<input type="radio" name="visit_purpose">
					<label>Group</label>
					<input type="radio" name="visit_purpose">
					<label>Business</label>
				</td>
			</tr>
			<tr>
				<td>
					<label>Mode Of Payment</label>
				</td>
				<td>
					<input type="radio" name="payment">
					<label>Cash</label>
				</td>
				<td>
					<input type="radio" name="payment">
					<label>Company</label>
				</td>
				<td>
					<input type="radio" name="payment">
					<label>Credit Card</label>
				</td>
			</tr>
			<tr>
				<td>
					<label>Credit Card No.</label>
				</td>
				<td>
					<input type="text" name="credit_no" required="">
				</td>
				<td>
					<label>Expiry Date</label>
				</td>
				<td>
					<input type="date" name="exp_date" required="" style="width:175px;">
				</td>
			</tr>
			<tr>
				
					<th class="text-center" colspan="4">Sharer Occupants</th>
				
			</tr>
			<tr>
				<td>
					<label>Name</label>
				</td>
				<td>
				<input type="text" name="occup_name"> 
				</td>
				<td>
					<label>Relationship</label>
				</td>

				<td>
				<input type="text" name="occup_relation" >
				</td>
				<tr>
					<td>
						<label>Email</label>
					</td>
				<td>
				<input type="text" name="occup_email" >
				</td>
				<td>
					<label>Mobile</label>
				</td>
				<td>
				<input type="text" name="occup_mobile" >
				</td>
			</tr>
			<tr>
				<td>
					<label>Identification/Passport</label>
				</td>
				<td>
				<input type="text" name="identification" >
				</td>
			</tr>
		</table>

		<center>
		<table style="margin-bottom: 40px;">
			<tr>
				<td>
					 <input type="button"  name="nxt1" id="nxt1" value="next" onclick="next1()"  style='width:150px;border-radius:20px;' class="btn btn-success "/>
				</td>
			</tr>
		</table >
		</center>
		</div>
		
		<div class="col-md-12" id="div3" style="display: none;">
		<table class="table mt-5  table-borderless bg-info" style="width: 100%">
			<tr>
			<th class="text-center" colspan="4">FOR FOREIGNERS ONLY</th>
			</tr>
			<tr>
				<td>
					<label>Nationality</label>
				</td>
				<td>
					<input type="text" name="nationality" required="">
				</td>
				<td>
					<label>Passport No./ Reg. Cert. No. :</label>
				</td>
				<td>
					<input type="text" name="passport_no" required="">
				</td>
			</tr>

			<tr>
				<td>
					<label>Date Of Issue  / Expiry  Date:</label>
				</td>
				<td>
					<input type="text" name="passport_ie" required="">
				</td>
				<td>
					<label>Date Of Arrival In India: </label>
				</td>
				<td>
					<input type="text" name="doa" required="">
				</td>

			</tr>
			<tr>
				<td>
					<label>Visa No.</label>
				</td>
				<td>
					<input type="text" name="visa_no" required="">
				</td>
				<td>
					<label>Date Of Issue  / Expiry  Date:</label>
				</td>
				<td>
					<input type="text" name="visa_ie" required="">
				</td>
			</tr>

			<tr>
				<td>
					<label>Whether Employed In India</label>
				</td>
				<td>
					<input type="radio" name="employed" >
					<label>Yes</label>
				</td>
				<td>
					<input type="radio" name="employed" >
					<label>No</label>
				</td>

			</tr>
			<tr>
				<td>
				<label>Proposed Duration of Stay In India</label>
				</td>
				<td>
					<input type="text" name="duration" required="">
				</td>
			</tr>
			<tr>
				<th class="text-center" colspan="4">
					FOR HOTEL USE	:
				</th>
			</tr>
			<tr>
				<td>
					<label>Room No.</label>
				</td>
				<td>
					<input type="text" name="room_no" required="">
				</td>
				<td>
					<label>Room Type</label>
				</td>
				<td>
					<input type="text" name="room_type " required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Room Rate</label>
				</td>
				<td>
					<input type="text" name="room_rate " required="">
				</td>
				<td>
					<label>Adults</label>
				</td>
				<td>
					<input type="text" name="adults" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Children</label>
				</td>
				<td>
					<input type="text" name="children " required="">
				</td>
				<td>
					<label>Extra Bed</label>
				</td>
				<td>
					<input type="text" name="extra_bed " required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Newspaper</label>
				</td>
				<td>
					<input type="radio" name="newspaper">
					<label>Yes</label>
				</td>
				<td>
					<input type="radio" name="newspaper">
					<label>No</label>
				</td>
			</tr>
			<tr>
				<td>
				<label>Booked By</label>
				</td>
				<td>
					<input type="text" name="booked_by" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Billing Instructions/Address</label>
				</td>
				<td colspan="3">
					<textarea name="address_billing" style="width:60%" rows="3"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label>Front Desk Name</label>
				</td>
				<td>
					<input type="text" name="front_desk" required="">
				</td>
				<td>
					<label>Duty Manager</label>
				</td>
				<td>
					<input type="text" name="duty_maanger" required="">
				</td>
			</tr>
		</table>




		<center>
		<table style="margin-bottom: 40px;">
		<tr>
                           <td>
                            <input type="button"  name="pre1" value="previous" onclick="prev1()" style='width:150px;border-radius:20px;' class="btn btn-warning "/>
                               
                           </td>
                           <td>
                               <input type="button"  name="nxt2" value="next" onclick="next2()" style='width:150px;border-radius:20px;margin-left: 30px;' 
                               class="btn btn-success "/>

                           </td>
        </tr>
    </table>
</center>



	</div>


	<div class="col-md-12" id="div4" style="display: none;">
		<table class="table mt-5  table-borderless bg-info" id="table4" style="width: 100%">
			<tr>
			<th class="text-center" colspan="4">Add On Services</th>
			</tr>
			<tr>
				<th>
					Services
				</th>
				<th>
					Charge
				</th>
				<th>
					Tax/GST
				</th>
				<th>
					Total
				</th>
				<th>
					Action
				</th>
				<td>
					<form method="POST">
					<input type="button" name="addrow" id="addrow" class="btn btn-dark" onclick="addRow();" value="Add New">
				</form>
				</td>
			</tr>
			<script >
				function addRow()
				{
				 
					  var table = document.getElementById("table4");
					  var row = table.insertRow(2);
					  var cell1 = row.insertCell(0);
					  var cell2 = row.insertCell(1)
					  var cell2 = row.insertCell(2);
					  var cell2 = row.insertCell(3);
					  var cell2 = row.insertCell(4);					  
					  cell1.innerHTML = "NEW CELL1";
					  cell2.innerHTML = "NEW CELL2";

				}
			</script>

		</table>

		<center>
		<table style="margin-bottom: 40px;">
		<tr>
                           <td>
                            <input type="button"  name="pre2" value="previous" onclick="prev1()" style='width:150px;border-radius:20px;' class="btn btn-warning "/>
                               
                           </td>
                           <td>
                               <input type="button"  name="nxt3" value="next" onclick="next2()" style='width:150px;border-radius:20px;margin-left: 30px;' 
                               class="btn btn-success "/>

                           </td>
        </tr>
    </table>
</center>

	</div>
		


	<div class="col-md-12" id="div5" style="display: none;">
		<table class="table mt-5  table-borderless bg-info" id="table5" style="width: 100%">

			<tr>
			<th class="text-center" colspan="4">Departure-Payment & Invoice</th>
			</tr>
		
			<tr>
				<td>
				<label>Total Billed Amount</label>
				</td>
				<td>
					<input type="text" name="total_bill" required="">
				</td>
				<td>
					<label>Paid Bill</label>
				</td>
				<td>
					<input type="text" name="paid_bill" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Balance</label>
				</td>
				<td>
					<input type="text" name="balance" required="">
				</td>
			</tr>
		</table>
	</div>




	<div class="col-md-12" id="div6" style="display: none;">
		<table class="table mt-5  table-borderless bg-info" id="table6" style="width: 100%">

			<tr>
			<th class="text-center" colspan="4">Record Payment</th>
			</tr>
			
			<tr>
				<td>
				<label>Mode&nbsp;Of&nbsp;Payment</label>
				</td>
				<td>
					<input type="radio" name="payment_mode">
					<label><b>Cash</b></label>
					&emsp;
					<input type="radio" name="payment_mode">
					<label><b>Card</b></label>
					&emsp;
					<input type="radio" name="payment_mode">
					<label><b>bank Transfer</b></label>
					&emsp;
					<input type="radio" name="payment_mode">
					<label><b>POS</b></label>
					
					
					
				</td>
				<td>
					<input type="radio" name="payment_mode">
					<label><b>Wallet payment</b></label>
					<input type="radio" name="payment_mode">
					<label><b>Voucher payment</b></label>

				</td>
			</tr>
				<tr>
					<td>
						<label>Amount</label>
					</td>
					<td>
						<input type="text" name="amount" required="">
					</td>
				
					<td>
						<label>Date&nbsp;Of&nbsp;Payment</label>
					</td>
					<td>
						<input type="text" name="date_of_payment" required="">
					</td>
				</tr>
				<tr>
					<td>
						<label>Transaction ref</label>
					</td>
					<td>
						<input type="text" name="transaction_ref" required="">
					</td>
				</tr>
				<tr>
					<td>
						<label>Note</label>
					</td>
					<td>
						<textarea style="width: 100%;" rows="5"></textarea>
					</td>
				</tr>
			</table>
		</div>

		<div class="col-md-12" id="div7" style="display: none;">
		<table class="table mt-5  table-borderless bg-info" id="table6" style="width: 100%">

			<tr>
			<th class="text-center" colspan="4">Departure Information</th>
			</tr>
			<tr>
				<td>
					<label>Guest Check Out</label>
				</td>
				<td>
					<input type="date" name="out_date">
					<input type="time" name="out_time" style="width: 150px;">
				</td>
			</tr>
			<tr>
				<td>
				<label>Duty Manager</label>
				</td>
				<td>
					<select name="duty_manager" required="" style="width: 170px;height: 30px;">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					</select>
				</td>
				<td>
					<label>Room Checked By</label>
				</td>
				<td>
					<input type="text" name="room_checked" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Room Key Recieved</label>
				</td>
				<td>
					<input type="radio" name="room_key">
					<label>Yes</label>
					&emsp;&emsp;
					<input type="radio" name="room_key">
					<label>No</label>
				</td>
			</tr>
			<tr>
				<td>
					<label>Room Status</label>
				</td>
				<td>
					<input type="radio" name="room_status">
					<label>Clean</label>
					&emsp;
					<input type="radio" name="room_status">
					<label>Dirty</label>
				</td>
			</tr>

			<tr>
				<td>
					<label>Bill To</label>
				</td>
				<td>
					<input type="radio" name="bill_to">
					<label>Guest</label>
					&emsp;
					<input type="radio" name="bill_to">
					<label>Company</label>
				</td>
			</tr>
		</table>
	

	<center>
		<table style="margin-bottom: 40px;">
		<tr>
                           <td>
                            <input type="button"  name="pre1" value="previous" onclick="prev()" style='width:150px;border-radius:20px;' class="btn btn-warning "/>
                               
                           </td>
                           <td>
                               <input type="button"  name="nxt2" value="Save" onclick="next()" style='width:150px;border-radius:20px;margin-left: 30px;' 
                               class="btn btn-success "/>

                           </td>
        </tr>
    </table>
</center>
</div>



</div>


 
	
</body>
</html>