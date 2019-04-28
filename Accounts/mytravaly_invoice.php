<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	

   
 

</head>
<body>
<form>
	<div class="container">
		<div class="row" style="border: solid 1px;">

			<div class="col-md-6  p-3" style="border: solid 1px;">
				<div>
					Property ID
					<span class="float-right"><?php echo"123"; ?></span>
				</div>
				<div>
					Hotel Name 
					<span class="float-right"><?php echo"Cozy"; ?></span>
				</div>
				
				<div>
					Address 
					<span class="float-right"><?php echo"Cozy"; ?></span>
				</div>
				<div class="row">
					<div class="col-md-6">
						Email 
						<span class="float-right"><?php echo"Cozy@mytravaly.com"; ?></span>
					</div>
					<div class="col-md-6">
					Phone 
					<span class="float-right"><?php echo"Cozy"; ?></span>
				</div>
				</div>
								
				
			</div>
			<div class="col-md-6  p-3" style="border: solid 1px;">
				<div>
					Invoice Request No
					<span class="float-right"><?php echo"123"; ?></span>
				</div>
				<div>
					Bill to 
					<span class="float-right"><?php echo"Cozy"; ?></span>
				</div>
				<div>
					Tax/GST ID 
					<span class="float-right"><?php echo"Cozy"; ?></span>
				</div>
			</div>

		</div>
		<div>
			<table class="table table-striped" width="100%" data-page-length="10" data-order="[[ 3, &quot;asc&quot; ]]">
        <thead>
           <tr>                
                <th>Folio no</th>
                <th>Guest Name</th>
                <th>Room type</th>
                
                <th>Check in Date</th>
                <th>Amount Received</th>
                <th>Charges</th>               
                <th>Tax/GST</th>
                <th>Payable Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        
         <tbody>
            <?php 
            require_once('../dbConnect.php');
            $query=mysqli_query($conn,"select * from invoice");
            while($row=mysqli_fetch_array($query))
            {
         ?>
        	<tr>        		
        		<td><?php echo $row['FolioId']; ?></td>
        		<td><?php echo $row['GuestName']; ?></td>
        		<td><?php echo 'room type'; ?></td>
        		
        		<td><?php echo $row['Checkin']; ?></td>
        		<td><?php echo $row['Amount']; ?></td>
        		<td><?php echo $row['Charges']; ?></td>
        		<td><?php echo $row['Tax_Gst']; ?></td>
        		<td><?php echo ($row['Amount']-$row['Charges']); ?></td>
        		<td><select name='status'  class="bb" text=<?php echo $row['InvoiceId']; ?> >
                        <?php if(strcasecmp($row['Status'],'Not Yet Payed') == 0)
                                { ?>
                    
                        
                        <option value='Not Yet Payed' selected='selected' >Not Yet Payed</option>
                        <option value='Ongoing'>Ongoing</option>
                        <option value='Completed'>Completed</option>
                        
                    <?php   } else if(strcasecmp($row['Status'],'ongoing') == 0)
                            { ?> 
                    
                        <option value='Not Yet Payed' >Not Yet Payed</option>
                        <option value='Ongoing' selected='selected'>Ongoing</option>
                        <option value='Completed' >Completed</option>
                                    
                    <?php } else if(strcasecmp($row['Status'],'completed') == 0)
                        { ?>
                                
                        <option value='Not Yet Payed' >Not Yet Payed</option>
                        <option value='Ongoing' >Ongoing</option>
                        <option value='Completed' Selected='Selected'>Completed</option>
                    
                    <?php   } else  { ?>
                    
                        <option value='' disabled selected>--select--</option>
                        <option value='Not Yet Payed'>Not Yet Payed</option>
                        <option value='Ongoing' >Ongoing</option>
                        <option value='Completed'>Completed</option>
                        <?php } ?>
                    </select></td>
        		<td><input type="submit" class="btn btn-primary btn-sm" name="" value="Update"></td>
                
        	</tr>
            <?php } ?>
        	
        </tbody>
    </table>
      
		</div>

	</div>
</form>
</body>
</html>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
            $(document).ready(function(){
            $('.bb').change(function(){
                var i=$(this).val();
                var inv=$(this).attr('text');
               alert("hi.."+i+inv);
               $.post('jqueryfun.php',{taskid:inv,status:i},function(data){
                                 alert("hi.."+i);
                             });
            });
        });
    </script>
                       <!--       -->
