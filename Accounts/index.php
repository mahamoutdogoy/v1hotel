<?php 
session_start();
    include_once("../dbConnect.php");
   global $rese_ref;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Accounts</title>
	
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    
    
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
			$(document).ready( function () {

			    $('#myTable').DataTable();

			} );

    </script>
    <style type="text/css">
      
          .pointer {cursor: pointer;}
    </style>

</head>
<body>
    <?php include_once("myheader.php"); 
    include_once("mtsidebar.php");
    ?>
    <div class="col-md-9 col-lg-10" >
	<form method="post" action="">
       <?php 

      /* SELECT res_Reference, guestName,  reservation_date, check_in, check_out,sum(price) as price,sum(tax) as tax, sum(total) as total, sum(received_amount) as received, payment_mode  FROM `reservation` WHERE status=1  and channel REGEXP '^my *travaly$' and res_Reference in (select res_reference from invoice where status not like 'Paid') GROUP BY res_Reference*/
//old query
        /*$query=mysqli_query($conn,"SELECT res_Reference,property_id, guestName,phoneNo,  reservation_date, check_in, check_out,sum(price) as price,sum(tax) as tax, sum(total) as total, sum(received_amount) as received, payment_mode ,status FROM `reservation` WHERE  channel  REGEXP '^my *travaly$' and res_Reference in (select res_reference from invoice) GROUP BY res_Reference") or die(mysqli_error($conn));*/

        $query=mysqli_query($conn,"SELECT res_Reference,property_id, guestName,phoneNo,  reservation_date, check_in, check_out,sum(price) as price,sum(tax) as tax, sum(total) as total, sum(received_amount) as received, payment_mode ,status FROM `reservation` WHERE  channel  REGEXP '^my *travaly$'  GROUP BY res_Reference") or die(mysqli_error($conn));
        ?>

	<table id="myTable" class="display table table-striped " style="font-size: 10px" width="100%" data-page-length="10" data-order="[[ 0, &quot;asc&quot; ]]">
        <thead>
           <tr style="background-color: #ff6f56;">
                
                <th style="border-radius: 10px 0px 0px 10px">Booking Reference</th>
                <th>Hotel Name</th>
                <th>Guest Name</th>
                <th>Date of Booking</th>
                <th>Check in</th>
                <th>Check out</th>
               
                <th >Room Price</th>
                <th>Room Tax</th>
                <th>Total</th>
                
                <th>Reservation Fees</th>
                <th>Reservation Tax</th>
                <th>Total</th>
                <th>Donation For Talaash</th>
                <th>Booking Status</th>               
                <th>Payment Status</th>
                <th style="border-radius: 0px 10px 10px 0px">Action</th>
            </tr>
        </thead>
         <tbody>
            <?php 
                if(mysqli_num_rows($query)>0)
                {
                    while($row=mysqli_fetch_array($query))
                    { ?>
                        <tr>
                            <td><?php echo $row['res_Reference']; ?></td>
                        <?php
                         $query1=mysqli_query($conn,"select property_name from propertydetails where property_id=".$row['property_id']) or die(mysqli_error($conn));
                        
                        
                         if(mysqli_num_rows($query1)==1)  
                         {
                            $row1=mysqli_fetch_array($query1);
                         }
                        ?>
                           <td><span class=" pointer" data-toggle="modal" data-target="#hotelModal" onclick="get_prop_id(this)" data-resresf='<?php echo $row['property_id']; ?>'>
                                <?php 
                                    echo $row1['property_name'];
                                   
                                 ?>
                                  </span>  
                            </td>
                            <td>
                              <span class=" pointer" data-toggle="modal" data-target="#guestModal" onclick="get_res_ref(this)" data-resresf='<?php echo $row['res_Reference']; ?>'><?php echo $row['guestName']; ?></span>
                            </td>
                           
                            <td><?php echo $row['reservation_date']; ?></td>
                            <td><?php echo $row['check_in']; ?></td>
                            <td><?php echo $row['check_out']; ?></td>
                            <td>
                            <?php echo $row['price']; ?>
                            </td>
                            <td>
                            <?php echo $row['tax']; ?>
                            </td>
                            <td>
                            <?php echo $row['total']; ?>
                            </td>
                            <td>
                             <?php echo $row['price']; ?>
                            </td>
                            <td>
                            <?php echo $row['tax']; ?>
                            </td>
                            <td>
                            <?php echo $row['total']; ?>
                            </td>
                             <td>
                            <?php echo "1"; ?>
                            </td>
                            <td><?php  if($row['status']==3){
                              echo "Canceled";
                            }
                            else if($row['status']==2){
                              echo "Pending";
                            }
                            else
                              {
                                echo "Confirmed";
                              }?></td>
                             <td><?php echo "abc"; ?></td>
                             <td>
                               <input type="button" name="" class="btn btn-danger btn-sm" style="font-size: 10px" data-toggle="modal" data-target="#Action" value="Update" onclick="set_res_ref(this)" data-resref='<?php echo $row['res_Reference'];?>'>
                             </td>
                             
                        </tr> 
                  <?php  }
                }
            ?>
            
        </tbody> 
        
    </table>
    <input type="hidden" name="res_ref" id="123">

    <!-- Modal for action button -->
<div class="modal" tabindex="-1" role="dialog" id="Action">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
  <input type="submit" name="hotelInvoice" class="form-control mt-2" onclick="javascript: form.action='process_invoice.php'" value="Hotel Invoice" style="border:0px">
 <input type="submit" name="" value="Guest Invoice" class="form-control  mt-2" style="border:0px" onclick="javascript: form.action='guest_invoice.php'">
   <input type="submit" name="" value="Edit Booking" class="form-control  mt-2" style="border:0px" onclick="javascript: form.action='mt_edit_reservation.php'">
  <input type="submit" name="" value="Refund To Customer" class="form-control  mt-2" style="border:0px" onclick="javascript: form.action='guest_invoice.php'">
   <input type="submit" name="" value="Donation Receipt" class="form-control mt-2" style="border:0px" onclick="javascript: form.action='donationReceipt.php'">


      </div>
     <!--  <div class="modal-footer">
       
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>

</form>
</div>
</body>



<!-- guest profile-->
<div class="modal" tabindex="-1" role="dialog" id="guestModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title">Guest Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div id="guestInfo">
        </div>
        </div>

     <!--  <div class="modal-footer">
       
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Hotel profile-->
<div class="modal" tabindex="-1" role="dialog" id="hotelModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hotel Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div id="propertyInfo">
        </div>
        </div>

     <!--  <div class="modal-footer">
       
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>


</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

   
   
    <script >
     
        function get_res_ref(btn){
              /* $("input[name='res_ref']").val( $(btn).attr('data-resresf'));*/
              
               var path='showInfo.php?resref='+$(btn).attr('data-resresf');

            $("#guestInfo").load(path);
            
             
        }    
          function get_prop_id(btn){
              
               var path='showInfo.php?prop='+$(btn).attr('data-resresf');

            $("#propertyInfo").load(path);
            
             
        }    
        function set_res_ref(ref) {
          $("input[name='res_ref']").val( $(ref).attr('data-resref'));
          //alert($(ref).attr('data-resref'));
         
        }
        function submit()
        {
          $("#form").attr('action','process_invoice.php');
           $("#form").submit();

        }
        
    </script>
<?php
/*if(isset($_POST['update']))
{
  echo "hajsk";
}*/
?>
<script>
  
 function show_info(a)
 {
    if($(a).attr('class')=='fas fa-chevron-down m-1')
    {
      $(a).attr('class',"fas fa-chevron-up m-1");
        $(a).closest("tr").find("div").css('display',"block");
       
    }
    else
    {
      $(a).attr('class',"fas fa-chevron-down m-1");
        $(a).closest("tr").find("div").css('display',"none");
    }
 }
</script>