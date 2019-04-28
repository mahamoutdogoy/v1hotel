<?php
session_start();
include_once("../dbConnect.php");

if(isset($_POST['raise_req']));
{

				/*$query=mysqli_query($conn,"SELECT res_Reference,property_id, guestName,   check_in  FROM `reservation` WHERE res_Reference=".$_POST['res_r']." and property_id='".$_SESSION['user']['hotelid']."' GROUP BY  res_Reference")or die(mysqli_error($conn));
				if(mysqli_num_rows($query))
				{*/
					//$row=mysqli_fetch_array($query);	
								
					 $insert_query="insert into invoice (InvoiceId,res_reference,PropertyId,HotelName,BillTo,Tax_Gst,GuestName,Checkin,Amount,Charges,date_of_request,Status) values ('".$_POST['inv_id']."',".$_POST['res_ref'].",'".$_SESSION['user']['hotelid']."','".$_POST['hotel_name']."','Mytravaly World Wide Travel Technology Private Limited','abc123','".$_POST['g_name']."','".$_POST['cin']."',".$_POST['total'].",0000,'".date("Y-m-d")."','Initiated')";
					
					 if(mysqli_query($conn,$insert_query)or die(mysqli_error($conn)))
					 {
					 	echo "successfully inserted";

					 } /*or die(mysqli_error($conn))*/
					 else
					 {
					 	echo "insert fail";
					 }


			/*	}*/

}

?>