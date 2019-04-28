<?php 
//session_start();
    include_once("../dbConnect.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Accounts</title>
	
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 
  <script>
			$(document).ready( function () {

			    $('#myTable').DataTable();

			} );

    </script>

</head>
<body>
    <?php
     include "../mytravalyAdmin/myheader.php"; 
    include "../mytravalyAdmin/mtsidebar.php";
    ?>
    <div class="col-md-9 col-lg-10" >
	<form method="post" action="raiseInvoice.php">
       <?php 
        $query=mysqli_query($conn,"SELECT res_Reference, guestName,  channel, reservation_date, check_in, check_out,sum(price) as price,sum(tax) as tax, sum(total) as total, sum(received_amount) as received, payment_mode  FROM `reservation` WHERE status=1 GROUP BY res_Reference") or die(mysqli_error($conn));

        ?>

	<table id="myTable" class="display table table-striped " width="100%" data-page-length="10" data-order="[[ 0, &quot;asc&quot; ]]" style="font-size:10px;">
        <thead>
           <tr style="background-color: #f15025;">
                
                <th style="border-radius: 10px 0px 0px 10px">Booking ID</th>
                <th>Room Assign </th>
                <th>Guest Name</th>
                <th>Date of Booking</th>
                <th>Check in</th>
                <th>Check out</th>
                <th>Price</th>
                <th>Tax/(GST)</th>
                <th>Total</th>               
                <th>Received </th>
                <th>Balance</th>
                <th>Payment Mode</th>
                <th>Channel</th>
                <th style="border-radius: 0px 10px 10px 0px">Invoice</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(mysqli_num_rows($query)>0)
                {
                    while($row=mysqli_fetch_array($query))
                    { 
                         $query1=mysqli_query($conn,"select room_id from reservation where res_Reference=".$row['res_Reference']." group by room_id") or die(mysqli_error($conn));
                         $room_list=array();
                         $i=0;
                          $no_of_room=0;
                         while ($row1=mysqli_fetch_array($query1)) {
                             $room_list[$i]=$row1['room_id']."(";
                             $query2=mysqli_query($conn,"select inventory_id from reservation where res_Reference=".$row['res_Reference']." and room_id=".$row1['room_id']) or die(mysqli_error($conn));
                            while ( $row2=mysqli_fetch_array($query2)) {
                               
                               $room_list[$i].=$row2['inventory_id']." ";
                            }

                            $room_list[$i].=")";
                            $i++;
                         }
                        ?>
                       
                       <tr>
                            <td><?php echo $row['res_Reference']; ?></td>
                            <td>
                                <?php 
                                    for($j=0;$j<$i;$j++){
                                        echo "<div class='row'>".$room_list[$j]."</div>";
                                    }
                                 ?>
                                    
                            </td>
                            <td><?php echo $row['guestName']; ?></td>
                             <!--<td><?php //echo $row['']; ?></td>-->
                            <td><?php echo $row['reservation_date']; ?></td>
                            <td><?php echo $row['check_in']; ?></td>
                            <td><?php echo $row['check_out']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                             <td><?php echo $row['tax']; ?></td>
                            <td><?php echo $row['total']; ?></td>
                             <td><?php echo $row['received']; ?></td>
                             <td style="background-color: #F4ECF7"><?php echo($row['total']-$row['received']) ?></td>
                              <td><?php echo $row['payment_mode']; ?></td>
                              <td><?php echo $row['channel']; ?></td>
                              <td><?php if(preg_match( "/\bmy\ *travaly\b/i",$row['channel'])==1)
                              {
                                echo '<input type="submit" id="btn_invoice"  class="btn btn-primary btn-xs" style="font-size:10px" name="" value="Raise Invoice" onclick="return get_res_ref(this)" data-resresf="'.$row['res_Reference'].'">';
                               }
                                else {
                                    echo '----';
                                    } ?></td>
                        </tr> 
                  <?php  }
                }
            ?>
            
        </tbody>
       
    </table>
     <input type="hidden" name="res_ref">
</form>
</div>
</body>

</html>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 <script >
     
        function get_res_ref(btn){
               $("input[name='res_ref']").val( $(btn).attr('data-resresf'));
          
        }      
    </script>