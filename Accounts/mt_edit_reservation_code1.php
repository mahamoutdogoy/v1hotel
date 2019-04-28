<?php
session_start();
	include_once('../phpmailer/sendemail.php');
include_once("../dbConnect.php");
//$reservation_date=date("Y-m-d");

// hotel booking
if(isset($_POST['update']))
{

	mysqli_query($conn,"DELETE FROM reservation where res_Reference='".$_POST['rReference']."'") or die(mysqli_error($conn));


	$reservation_date=$_POST['DOR'];
$no_of_rooms=0;
$no_of_adults=0;
$no_of_childs=0;
$room_type=array();
$meal_plan=array();
$price_per_room=array();
$tax_per_room=array();
$total_per_room=array();
$grand_price=0;
$grand_tax=0;
$grand_total=0;

$k=0; 

$folio_id=$_POST['rFolio'];
$res_Reference=$_POST['rReference'];
	       
	      
		
	

	 $received_amount=$_POST['received_amount'];
	$str="select * from rooms_details where  property_id=".$_POST['propId']."  group by room_id";
                   $query=mysqli_query($conn,$str) or die(mysqli_error($conn));
                  
                  if(mysqli_num_rows($query)>0)
                  {     
                    while ($row=mysqli_fetch_array($query))
                    {       
                      $str="select *  from rooms_inventory where property_id=".$_POST['propId']." and room_id='$row[room_id]' and room_sub_id not in (select inventory_id from reservation where property_id=".$_POST['propId']." and room_id='$row[room_id]' and (check_in <= '$_POST[cout]') and (check_out >= '$_POST[cin]') and( status=1 or status=0 ) ) limit ".$_POST[$row['room_id']] ; 
                     
                      $query1=mysqli_query($conn,$str)or die(mysqli_error($conn));
                      $i=0;
                      $j=0;
                      if(mysqli_num_rows($query1)>0)
                      {
	                      while($row2=mysqli_fetch_array($query1))
	                      {
	                      	$adults='adults'.$row['room_id'];
		                  $childs='child'.$row['room_id'];
		                  $mealplan='meal'.$row['room_id'];
		                  $extra='extra'.$row['room_id'];
		                  $price='price'.$row['room_id'];
		                  $tax='tax'.$row['room_id'];
		                  $total='total'.$row['room_id'];
		                  
		                  /*if(isset($_POST[$extra]))*/
	                      
	                      	if($_POST[$row['room_id']]!=0)
	                      	{
	                      		$no_of_rooms++;
	                      		$no_of_adults+=$_POST[$adults][$i]  ;
	                      		$no_of_childs+=$_POST[$childs][$i] ;
	                      		$room_type[$k]=$row['roomType'];
	                      		$meal_plan[$k]=$_POST[$mealplan][$i];
	                      		$price_per_room[$k]=$_POST[$price][$i];
	                      		$tax_per_room[$k]=$_POST[$tax][$i];
	                      		$total_per_room[$k]=$_POST[$total][$i];

	                      		
	                      		
	                      			
	                      		 	if($_POST[$adults][$i]==$row['max_occupancy'])
	                      		
		                  			{
		                  				$no_of_adults+=$_POST[$extra][$j];
	                      				$insert="INSERT INTO reservation (res_Reference, property_id, room_id, inventory_id, folio_id, guestName, email, phoneNo, reservation_date, check_in, check_out, meal_plan, noOfAdults, noOfChildren,noOfExtraperson,received_amount, price, tax, total, status,channel, payment_status, payment_mode, payment_type, payment_reference, internal_note, createdBy ) VALUES ('".$res_Reference."',".$_POST['propId'].",".$row2['room_id'].",'".$row2['room_sub_id']."','".$folio_id."','".$_POST['gName']."','".$_POST['gEmail']."','".$_POST['gPhone']."','".$reservation_date."','".$_POST['cin']."','".$_POST['cout']."','".$_POST[$mealplan][$i]."','".$_POST[$adults][$i]."','".$_POST[$childs][$i]."','".$_POST[$extra][$j]."','".$total_per_room[$k]."','".$_POST[$price][$i]."','".$_POST[$tax][$i]."','".$_POST[$total][$i]."','1','MyTravaly','".$_POST['payment_status']."','".$_POST['payment_mode']."','Full Amount','".$_POST['reference']."','This Reservation Is Created By MyTravaly','".$_SESSION['user']['name']."')";
	                      			$j++;
	                      			}
	                      				else // pending  reservation
	                      				{
	                      				
	                      				$insert="INSERT INTO reservation (res_Reference,property_id, room_id, inventory_id, folio_id, guestName, email, phoneNo, reservation_date, check_in, check_out, meal_plan, noOfAdults, noOfChildren,noOfExtraperson,received_amount, price, tax, total, status,channel, payment_status, payment_mode, payment_type, payment_reference, internal_note, createdBy ) VALUES ('".$res_Reference."',".$_POST['propId'].",".$row2['room_id'].",'".$row2['room_sub_id']."','".$folio_id."','".$_POST['gName']."','".$_POST['gEmail']."','".$_POST['gPhone']."','".$reservation_date."','".$_POST['cin']."','".$_POST['cout']."','".$_POST[$mealplan][$i]."','".$_POST[$adults][$i]."','".$_POST[$childs][$i]."','0','".$total_per_room[$k]."','".$_POST[$price][$i]."','".$_POST[$tax][$i]."','".$_POST[$total][$i]."','1','MyTravaly','".$_POST['payment_status']."','".$_POST['payment_mode']."','Full Amount','".$_POST['reference']."','This Reservation Is Created By MyTravaly','".$_SESSION['user']['name']."')";
	                      			}
		                      	
		                      	
		                      	mysqli_query($conn,$insert) or die(mysqli_error($conn)."insert fail");

		                      
		                      	$i++; 
							}
	                      $k++;
	                      }
	                }
	            }
	        }

                  //echo $no_of_rooms;
                  
                   /* $start_date = strtotime($_POST['cin']); 
					$end_date = strtotime($_POST['cout']); 
					$no_of_nights=(($end_date - $start_date)/60/60/24 )-2;


                  $query3=mysqli_query($conn, "select * from propertydetails where property_id=".$_POST['propId'])or die(mysqli_error($conn));
	
			        $row3=mysqli_fetch_array($query3);
					$subject="Confirmed Reservation for ".$row3['property_name'];
					$message='<!DOCTYPE html>
					<html>
					<head>
						<title></title>
						<style>
						body{
							 font-family:"Times new roman";
							 font-size:18px;
							
							 
						}
						td,th{
							 padding: 10px;
							 border-top:2px solid #ccf;
							
						}

						table{
							width:100%;
							cellspacing:0px;
							 border-collapse: collapse;
							 font-family:Helvetica Neue;
							 font-size:16px;
							  padding:10;
						}
							thead{
								border-color:solid #007cff;
							}
							.band{
								//border-radius:40% ; 
								//background-color:#007dff;
								color:#000;
								padding:5px;
								font-weight:bold;
							}
							.header img{
								float:left;
							}
							.header span {
							 position: relative;
							  top: 20px;
							 	
							}
						</style>
						
					</head>
					<body>
					<div style="max-width: 70%;margin: auto;">
					<div style="border-radius:10px;margin:10px;border:solid  #f15025;height:70px" class="header" >
					
					<img src="./img/logo.png" style="width:150px;height:70px;">
					<span style="font-family:Monotype Corsiva;font-size:38px;margin-left:10%;margin-top:10%;">Booking Confirmation
					</span>
					</div><br>
					';

					i11)
					{
							$message.='<div style="margin:15px"><strong>Dear '.strtoupper($_POST['gName']).',</strong><br>We are pleased to inform you that your reservation has been <b>confirmed.</b> The details are as follows:</div>';
					}
					else
					{
						$message.='<div style="margin:15px"><strong>Dear '.strtoupper($_POST['gName']).',</strong><br>We are pleased to inform you that your <span style="background-color:yellow;border-radius:10px"><b>&nbsp; reservation  has not been confirmed. &nbsp;</b></span> The details are as follows:</div>';
					}
					
					$message.='<div style="margin: auto;">
					<table style="margin:auto"><tr style="background-color:#007bff;border:0px" ><td style="border-radius:10px 0px 0px 10px">
					   <strong>Reservation reference number </strong> 
					   </td>
					   <td style="border-radius:0px 10px 10px 0px">
					   <span class="band" style="background-color:yellow;border-radius:20px;">'.$res_Reference.'</span></td></tr>
					   
					 <tr><td>
					    Reservation date
					    </td><td><span class="band">'.$reservation_date.'</span></td></tr>
					 <tr><td>Property name
					  </td><td><span class="band">'.$row3['property_name'].'</span></td></tr>
					  <tr><td>Guest name
					    </td><td><span class="band">'.$_POST['gName'].'</span></td></tr>
					    <tr><td>Arrival date and time
					    </td><td><span class="band">'.$_POST['cin'].'</span></td></tr>
					  <tr><td> Departure date and time
					    </td><td><span class="band">'.$_POST['cout'].'</span></td></tr>
					  <tr><td>Number of adult(s)
					   </td><td><span class="band">'.$no_of_adults.'</span></td></tr>
					  <tr><td>Number of children
					   </td><td><span class="band">'.$no_of_childs.'</span></td></tr>
					 <tr><td>Number of room(s)
					    </td><td><span class="band">'.$no_of_rooms.'</span></td></tr>
					  </table></div>';
					
					$message.='<div  style="margin:30px"><h4>Room Details</h4><table style="margin: auto;"><thead><tr style="background-color:#0010ff;border:0px"><th style="border-radius: 10px 0px 0px 10px"></th><th>Room Nmae</th><th>Meal Plan</th><th>No Nights</th><th>Per night charge</th><th>GST/Tax (per night)</th><th style="border-radius: 0px 10px  10px 0px">Total room charge</th></tr></thead><tbody>';
					for($i=0; $i<$no_of_rooms; $i++)
					{
						$message.="<tr><td><b>".($i+1)."</b></td><td>".$room_type[$i]." </td>
						<td>".$meal_plan[$i]." </td>
						<td>".$no_of_nights."</td>
						<td>".$price_per_room[$i]."</td>
						<td>".$tax_per_room[$i]."</td>
						<td>".$total_per_room[$i]."</td></tr> ";
						$grand_price+=$price_per_room[$i];
						$grand_tax+=$tax_per_room[$i];
						
					}
					$grand_total+=($grand_price + $grand_tax);
						//$message.="<tr></tr>";	
						$message.="<tr><td colspan='5'></td><td><b>Price </b></td><td><b>".$grand_price."</b></td></tr>
						<tr><td colspan='5'></td><td><b>GST/Tax</b> </td><td><b>".$grand_tax."</b></td></tr>
						<tr><td colspan='5' ></td><td><b>Total   </b></td><td><b>".$grand_total."</b></td></tr></tbody></table> </div>";
						

					$message.="<div style='margin:10px'><strong>Amount prepaid during reservation : ".$_POST['received_amount']."</strong></div>";
					$message.="<div  style='margin:10px'><strong>Amount to be paid while checking in/out : ".($grand_total - $_POST['received_amount'])."</strong></div>";

					$message.="<br>For any queries regarding your booking, contact reservation@mytravaly.com. 
					<br>Please use your reservation reference number during all the interactions.<br>You may modify or cancel your reservation (see Reservation Policy and Refund Policy).<br><b>Thank you for choosing mytravaly.com. </b> <br>Please join our community of millions of travellers and share your experiences. Reach out to us at support@mytravaly.com if you have any issues. Customer feedback is invaluable to us.<br>MyTravaly wishes you a pleasant stay.<br>Regards,<br>MyTravaly Team </div> </div></body> </html>";
					echo $message;
					//send_mail($_POST['gEmail'],$subject,$message);
echo "<br/>reservation succfully placed...";*/


echo "data added successfully...";
}




//edit booking
else if(isset($_POST['update_con1']))
{
	$r_price=$_POST['rPrice'];
	$r_tax=$_POST['rTax'];
	$r_total=$_POST['rTotal'];
	$mtfee=$_POST['mtFees'];
	$mtTax=$_POST['mtFeeTax'];
	$donation=$_POST['talaash'];
	
}
else
{
	echo "Something Go's wrong with this please try again... ";
}
?>