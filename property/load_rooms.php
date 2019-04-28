<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script>

           $(document).ready(function(){
           	alert("hii");
           $('.type').change(function(){
            alert("hii");

               //Selected value

               var inputValue = $(this).val();

               var string1=inputValue.split("/");

               var imageid=string1[0];

               var imagetype=string1[1];

              // var ename=string1[2];
              alert("You request to change the Image type to: "+imagetype);

               $.post('imgtypeupdate.php', {imgid:imageid,imgtype:imagetype}, function(data){
  
                 alert('Image type Updated Successfully');

                 //  location.reload();

              });

           });

       });

   </script>
<?php
require_once('property_DB.php');
if ($_REQUEST['s']) {
	# code...
$property_id=$_REQUEST['s'];

echo '<select name="room" id="room" onchange="showUser(this)" style="width:250px;border-radius: 1rem;text-align: center;height: 35px" required>
			<option value="0">--Select--</option>';
			
							
								$query = "SELECT * FROM rooms_details where property_id='$property_id'";
		    					$result = mysqli_query($con,$query);
		    					while($row=mysqli_fetch_array($result)){   
		    					echo $row['room_name'];                             
		    					echo "<option value=".$row['room_id']."-".$row['meal_plan'].">".$row['room_name']."-".$row['meal_plan']."</option>";
		    					}
							
    				
    	echo "</select>";
    				
			
		
}

?>
<!--<select name="room" id="room" style="width: 150px" required>
			<option value="0">--Select--</option>
			<?php
			if(isset($_POST['property']))
			{
							$p=$_POST['property'];
		    					$query = "SELECT * FROM rooms_details where property_id='$p'";
		    					$result = mysqli_query($con,$query);
		    					
		    					while($row=mysqli_fetch_array($result)){                                                 
		       					echo "<option value=".$row['room_id']."-".$row['meal_plan'].">".$row['room_name']."-".$row['meal_plan']."</option>";
		    					}
    				}
    				?>
    				
			
		</select>-->



	