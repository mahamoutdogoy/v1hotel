<!DOCTYPE html>
<html>
<head>
	<title>Accounts</title>
	
	
	  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
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
	<form>
	<table id="myTable" class="display"  width="100%" data-page-length="10" data-order="[[ 1, &quot;asc&quot; ]]">
        <thead>
           <tr >
                
                <th>Booking ID</th>
                <th>Room Assign </th>
                <th>Guest Name</th>
                <th>Channel</th>
                <th>Date of Booking</th>
                <th>Check in</th>
                <th>Check out</th>
                
                <th>Total Amount</th>               
                <th>Received </th>
                <th>Due Amount</th>
                <th>Payment Mode</th>
                
                <th>Action</th>
            </tr>
        </thead>
      
        <tbody>
        	<tr>
        		<td>xxx</td>
        		<td>xxx</td>
        		<td>xxx</td>
        		<td>xxx</td>
        		<td>xxx</td>
        		<td>xxx</td>
                <td>xxx</td>
        		<td>10000</td>
        		<td>8000</td>
        		<td>2000</td>
        		<td>****</td>
        		
        		<td>****</td>		

        	</tr>
        	<tr>
        		<td>xxx</td>
        		<td>xxx</td>
        		<td>xxx</td>
                <td>MyTravaly</td>
        		<td>xxx</td>
        		<td>xxx</td>
        		<td>xxx</td>
        		<td>10000</td>
        		<td>8000</td>
        		<td>2000</td>
        		<td>****</td>
        		<td><input type="button" id="btn_invoice"  class="btn btn-info btn-sm btn_invoice" text='1' name="" value="Raise Invoice"></td>		

        	</tr>
        	<tr>
        		<td>xxx</td>
        		<td>xxx</td>
        		<td>xxx</td>
        		<td>xxx</td>
        		<td>xxx</td>
                             
        		<td>xxx</td>
                <td>xxx</td>
        		<td>10000</td>
        		<td>8000</td>
        		<td>2000</td>
        		<td>****</td> 
        		<td>****</td>		

        	</tr>
        	<tr>
        		<td>xxx</td>
        		<td>xxx</td>
        		<td>xxx</td>
                <td>MyTravaly</td>
        		<td>xxx</td>
        		<td>xxx</td>
        		<td>xxx</td>
        		<td>10000</td>
        		<td>8000</td>
        		<td>2000</td>
        		<td>****</td>
        		<td><input type="button" class="btn btn-info btn-sm btn_invoice" name="" text='2'  value="Raise Invoice"></td>		

        	</tr>
        </tbody>
    </table>
    <div id="div1"></div>
</form>
</body>
</html>
<script >
     $(document).ready(function(){
            $('.btn_invoice').click(function(){
                alert("hoaskj");
                $.redirectPost('create_invoice.php', {x: $(tish).attr('text')});
               /* $.ajax({
                    url: 'create_invoice.php',
                    type: 'POST',
                    data: {
                        BookingId:$(tish).attr('text')
                    }, success: function(result){
      $("#div1").html(result);
    }
                     
                 });*/
             });
        });
</script>
