<?php
//include'myheader.php';
//include'mtsidebar.php';
include'property_DB.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>list property details</title>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );

    </script>
   
</head>
<body>
	<div class="container mt-2 mb-2" align="center">
        		<a class='btn btn-primary ' href="propertydetail.php" >Create New Property</a>
        </div>
        
	<table id="myTable" class="display" style="width:100%">
        <thead>
        	
            <tr >
                <th style="background: tomato; color:white;">SR_no</th>
                <th style="background: tomato; color:white;">Property_Id</th>
                <th style="background: tomato; color:white;">Location</th>
                <th style="background: tomato; color:white;">Contacts</th>
                <th style="background: tomato; color:white;">Room&nbsp;&&nbsp;Rate</th>
                <th style="background: tomato; color:white;">Campaign</th>
                <th style="background: tomato; color:white;">View&nbsp;Listing</th>
                <th style="background: tomato; color:white;">Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
        	
        	

        	$var=1;
        	$sql="SELECT * FROM propertydetails";
        	$res=mysqli_query($con,$sql);


        	
        	 while($row=mysqli_fetch_assoc($res))
        	 {
           		echo" <tr>
           		<td>$var</td>
           		
           		<td>$row[property_id]</td>";
           	
           		$sql2="SELECT * FROM address WHERE property_id='$row[property_id]'";
           		$res1=mysqli_query($con,$sql2);

           		$sql3="SELECT * FROM owner WHERE property_id='$row[property_id]'";
           		$res2=mysqli_query($con,$sql3);

           		$sql4="SELECT * FROM manager WHERE property_id='$row[property_id]'";
           		$res3=mysqli_query($con,$sql4);

           		$sql5="SELECT * FROM reservationmanager WHERE property_id='$row[property_id]'";
           		$res4=mysqli_query($con,$sql5);
	while($row1=mysqli_fetch_assoc($res1))
	{
	echo"
           		<td>$row1[street],$row1[city],$row1[state],$row1[country],$row1[zipcode]</td>
           		<td>";

     }
   
     while($row2=mysqli_fetch_assoc($res2))
     {

     	echo"

     	<div>
           		<b>OWNER</b>&nbsp;$row2[owneremail],$row2[ownerphone]
           		</div>
           		";
      }

      while($row3=mysqli_fetch_assoc($res3))
     {

     	echo"

     	<div>
           		<b>Manager</b>&nbsp;$row3[manageremail],$row3[managerphone]
           		</div>
           		";
      }
      while($row4=mysqli_fetch_assoc($res4))
     {

     	echo"

     	<div>
           		<b>Reservation Manager</b>&nbsp;$row4[resemail],$row4[resphone]
           		</div>
           		</td>
           		";

      }


      echo "<td> <a href='rooms_dashboard_new.php'>Room&nbsp;&&nbsp;Rate</a> </td>
      <td>....</td>
      <td> <a href='link to hamid page'> View</a> </td>
      <td> <a href='link to edit property page'> Edit&nbsp;Property</a> </td>
      ";

           	$var++;	
            }
        
        		
            ?>
        </tbody>
</body>
</html>