<?php
session_start();
include_once("Property_DB.php");

if(isset($_POST['Book']))
{
	

	if($_POST['guestid']=="")
	{
		$query=mysqli_query($con,"select max(folio_id) as max from reservation");
		if(mysqli_num_rows($query)>0)
		{
	         $row=mysqli_fetch_array($query);
	         $folio_id=$row['max']+1;
		}
		else
		{
			// for first time insertion to reservation
			 $folio_id=1;
		}
	}
	else
	{
		 $folio_id=$_POST['guestid'];
	}

	 if($_POST['payment_status']=="Pay At Hotel")
	 {
	 	$_POST['payment_mode']="Not Paid";
	 	$_POST['payment_type']="Not Paid";
	 	$_POST['received_amount']=0;
	 }

	 if($_POST['BookingStatus']=='Confirm Reservation')
	 {
	 	$bookingstatus=1;
	 	$is_pending=1;
	 }
	 else
	 {
	 	$bookingstatus=2;
	 	$is_pending=0;
	 	echo $is_pending."<br>";
	 }

	$str="select * from rooms_detail where  property_id=".$_SESSION['user']['hotelid']."  group by room_id";
                   $query=mysqli_query($con,$str) or die(mysqli_error($con));
                  
                  if(mysqli_num_rows($query)>0)
                  {     
                    while ($row=mysqli_fetch_array($query))
                    {       
                      $str="select *  from rooms_inventory where property_id=".$_SESSION['user']['hotelid']." and room_id='$row[room_id]' and room_sub_id not in (select inventory_id from reservation where property_id=".$_SESSION['user']['hotelid']." and room_id='$row[room_id]' and (check_in <= '$_POST[check_out]') and (check_out >= '$_POST[check_in]') and( status=1 or status=0 ) ) limit ".$_POST[$row['room_id']] ; 
                     
                      $query1=mysqli_query($con,$str)or die(mysqli_error($con));
                      $i=0;
                      $j=0;
                      while($row2=mysqli_fetch_array($query1))
                      {
                      	$p_r_id=$_SESSION['user']['hotelid'].$row2['room_id'].$row2['room_sub_id'];
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
                      		if($is_pending==1) // confirm reservation
                      		{
                      		 	if($_POST[$adults][$i]==$row['max_occupancy'])
                      		
	                  			{
	                  				
                      				$insert="INSERT INTO reservation (p_r_id,property_id, room_id, inventory_id, folio_id, guestName, email, phoneNo, check_in, check_out, meal_plan, noOfAdults, noOfChildren,noOfExtraperson,received_amount, price, tax, total, status, payment_status, payment_mode, payment_type, payment_reference, internal_note, createdBy ) VALUES ('".$p_r_id."',".$_SESSION['user']['hotelid'].",".$row2['room_id'].",'".$row2['room_sub_id']."','".$folio_id."','".$_POST['G_name']."','".$_POST['G_email']."','".$_POST['G_pno']."','".$_POST['check_in']."','".$_POST['check_out']."','".$_POST[$mealplan][$i]."','".$_POST[$adults][$i]."','".$_POST[$childs][$i]."','".$_POST[$extra][$j]."','".$_POST['received_amount']."','".$_POST[$price][$i]."','".$_POST[$tax][$i]."','".$_POST[$total][$i]."','".$bookingstatus."','".$_POST['payment_status']."','".$_POST['payment_mode']."','".$_POST['payment_type']."','".$_POST['reference']."','".$_POST['internal_note']."','".$_POST['booking_created_by']."')";
                      			$j++;
                      			}
                      			else // pending  reservation
                      			{
                      				
                      				$insert="INSERT INTO reservation (p_r_id,property_id, room_id, inventory_id, folio_id, guestName, email, phoneNo, check_in, check_out, meal_plan, noOfAdults, noOfChildren,noOfExtraperson,received_amount, price, tax, total, status, payment_status, payment_mode, payment_type, payment_reference, internal_note, createdBy ) VALUES ('".$p_r_id."',".$_SESSION['user']['hotelid'].",".$row2['room_id'].",'".$row2['room_sub_id']."','".$folio_id."','".$_POST['G_name']."','".$_POST['G_email']."','".$_POST['G_pno']."','".$_POST['check_in']."','".$_POST['check_out']."','".$_POST[$mealplan][$i]."','".$_POST[$adults][$i]."','".$_POST[$childs][$i]."','0','".$_POST['received_amount']."','".$_POST[$price][$i]."','".$_POST[$tax][$i]."','".$_POST[$total][$i]."','".$bookingstatus."','".$_POST['payment_status']."','".$_POST['payment_mode']."','".$_POST['payment_type']."','".$_POST['reference']."','".$_POST['internal_note']."','".$_POST['booking_created_by']."')";
                      		}
	                      	}

	                      	else
	                      	{
	                      		if($_POST[$adults][$i]==$row['max_occupancy'])
                      		
	                  			{
	                  				
                      			$insert="INSERT INTO reservation (p_r_id,property_id, room_id, inventory_id, folio_id, guestName, email, phoneNo, check_in, check_out, meal_plan, noOfAdults, noOfChildren,noOfExtraperson,received_amount, price, tax, total, status, payment_status, payment_mode, payment_type, payment_reference, internal_note, createdBy, pending_upto ) VALUES ('".$p_r_id."',".$_SESSION['user']['hotelid'].",".$row2['room_id'].",'".$row2['room_sub_id']."','".$folio_id."','".$_POST['G_name']."','".$_POST['G_email']."','".$_POST['G_pno']."','".$_POST['check_in']."','".$_POST['check_out']."','".$_POST[$mealplan][$i]."','".$_POST[$adults][$i]."','".$_POST[$childs][$i]."','".$_POST[$extra][$j]."','".$_POST['received_amount']."','".$_POST[$price][$i]."','".$_POST[$tax][$i]."','".$_POST[$total][$i]."','".$bookingstatus."','".$_POST['payment_status']."','".$_POST['payment_mode']."','".$_POST['payment_type']."','".$_POST['reference']."','".$_POST['internal_note']."','".$_POST['booking_created_by']."','".$_POST['internal_note']."','".$_POST['pending_date']."')";
                      			$j++;
                      			}
                      			else
                      			{
                      				
                      			$insert="INSERT INTO reservation (p_r_id,property_id, room_id, inventory_id, folio_id, guestName, email, phoneNo, check_in, check_out, meal_plan, noOfAdults, noOfChildren,noOfExtraperson,received_amount, price, tax, total, status, payment_status, payment_mode, payment_type, payment_reference, internal_note, createdBy, pending_upto ) VALUES ('".$p_r_id."',".$_SESSION['user']['hotelid'].",".$row2['room_id'].",'".$row2['room_sub_id']."','".$folio_id."','".$_POST['G_name']."','".$_POST['G_email']."','".$_POST['G_pno']."','".$_POST['check_in']."','".$_POST['check_out']."','".$_POST[$mealplan][$i]."','".$_POST[$adults][$i]."','".$_POST[$childs][$i]."','0','".$_POST['received_amount']."','".$_POST[$price][$i]."','".$_POST[$tax][$i]."','".$_POST[$total][$i]."','".$bookingstatus."','".$_POST['payment_status']."','".$_POST['payment_mode']."','".$_POST['payment_type']."','".$_POST['reference']."','".$_POST['internal_note']."','".$_POST['booking_created_by']."','".$_POST['pending_date']."')";
                      			}
	                      	}

	                      	mysqli_query($con,$insert) or die(mysqli_error($con)."insert fail");

	                      
	                      	$i++; 
						}
                      
                      }
                      
                  }
              }

echo "<script>alert('Reservation Successfully Completed...');
window.location.href = 'index.php';</script>";
}


?>