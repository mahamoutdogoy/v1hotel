<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/.10.2/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.cookie/1.4.0/jquery.cookie.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<?php
  session_start();
  $session_user=$_SESSION['user']['userid'];
include 'property_DB.php';
?>

<!DOCTYPE html>

<html>

<head>
   

<title>Images</title>
<!-- using jqery request to change the image type in imgtypeupdate.php page -->


   <!--  <script>

           $(document).ready(function(){

           $('.type').change(function(){
            //alert("hii");

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
 -->

   <!-- <script>
  function showUser(str1) {

  var property=document.getElementById('property').value;
  //alert(property);
  var room=document.getElementById('room').value;
  //document.getElementById('t2').style.display = 'none';
  var str= str1.options[str1.selectedIndex].innerHTML;
  var room=document.getElementById('room').value;
  //alert(room);
  //var arr1=room.split("-");
  //var room_id=arr1[0];
var meal_plan="hii";
  //alert(room_id);
    if (str == "") {
        document.getElementById("room_div").innerHTML = "";
        return;
    } 
    else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("room_div").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","load_photos.php?q="+room+"&p="+meal_plan+"&r="+property,true);
        xmlhttp.send();
    }
}
</script> -->

<?php include '../mytravalyAdmin/myheader.php' ?>
</head>


  
    <?php include '../mytravalyAdmin/mtsidebar.php' ?>
  
<div class="col-md-9">

<body>
 
  <?php include 'propertymenus.php';?>
    <form action="" method="post" enctype="multipart/form-data">
           
        <div class="mt-2" >
            
           &emsp; <table cellspacing="10" cellpadding="10" >
              <tr>
                <td>
                Select Property
                </td>
                <td>
                  <select name="property" id="property" onchange="this.form.submit()" style="width:270px;border-radius: 1rem;text-align: center;height: 35px" required>
                      <option value="0" selected disabled>--Select--</option>
                          <?php
                          $mt_property_id='';
                          if(isset($_GET['pid']))
                          {
                            $mt_property_id=$_GET['pid'];
                          }
                          if($mt_property_id!='')
                          {
                            $query = "SELECT * FROM propertydetails where property_id='$mt_property_id'";

                          }
                          else
                          {
                              $query = "SELECT * FROM propertydetails where user_id='$session_user' group by property_id";
                            }
                              $result = mysqli_query($con,$query);
                              while($row=mysqli_fetch_array($result)){                                                 
                                echo "<option value=".$row['property_id'].">".$row['property_name']."</option>";
                              }
                          ?>

                    </select>
                </td>
              </tr>

                <tr>
              <td style="text-align: left;">
              Select Room
            </td>
            
            <td>
              <select name="room" id="room" onchange="" class="room"  style="width:270px;border-radius: 1rem;text-align: center;height: 35px" required>
                <option value="0" >--Select--</option>
                <?php
                if(isset($_POST['property']))
                {
                        $p=$_POST['property'];
                        echo $p;
                          $query = "SELECT * FROM rooms_detail where property_id='$p' group by room_id";
                            $result = mysqli_query($con,$query);
                            while($row=mysqli_fetch_array($result)){                                
                            echo "<option value=".$row['room_id'].">".$row['room_name']."</option>";
                            }
                        
                      }
                  ?>
                      
                
              </select>
              
              </td>
            </tr>

              <tr>
                <td align="center" colspan="2">
                  <input type="file" name="pimage" id="pimage"  class="btn btn-success" required accept=".jpeg,.png,.jpg">
                </td>
              </tr>
              <tr>
                <td align="center" colspan="2">
                  <input type="submit" name="upload" id="s1" class="btn btn-success" onClick="return validate()" value="Upload" style="border-radius:2rem">
                </td>
              </tr>
            </table>
           
             <span class="text-black">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;  <b>Jpeg,Png Recommended<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Please Keep Size Less Than 1 MB</b></span><br>
        
        </div>

       
    

<?php
echo "Please Select your property and room for displaying pictures";
    if(isset($_POST['upload']))

    {
      $property_id=$_POST['property'];
        $room_id=$_POST['room'];
        if($room_id==0)
        {
          echo "<script>alert('Please select the room')</script>";
        }
        else
        {

        $image=addslashes(file_get_contents($_FILES['pimage']['tmp_name']));
        
        $r=mysqli_query($con,"insert into images(image,image_type) values ('$image','--Select--')");
        $rowSQL = mysqli_query($con, "SELECT MAX( image_id) AS image_id FROM `images`;" );
        $row = mysqli_fetch_array( $rowSQL );
        $image_id = $row['image_id'];
        
         $p=mysqli_query($con,"insert into mapping_images(property_id,room_id,image_id) values ('$property_id','$room_id','$image_id')");

        require_once('Property_DB.php');
      }
    }
    if(isset($_POST['upload']))

    {

         $query=mysqli_query($con,"SELECT * FROM images join mapping_images on mapping_images.image_id=images.image_id  where property_id='$property_id' and room_id='$room_id'");

        echo "<table  cellspacing='15px' id='t1'>";   
        start:
            echo "<tr>";  
            $i=1;
            while($row=mysqli_fetch_array($query))
            {    
                if($i <= 2)
                {
                    $i=$i+1;
                    echo "<td style='padding-top: 1.9em;padding-bottom: 1.9em;padding-right:1.9em;padding-left:1.9em;'><img src='data:image/jpeg;base64,".base64_encode($row['image'])."' style='width:270px;height:270px;'/>

                     <br>
                     <hr>";

                            if($row['image_type'] == "--Select--"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom'>Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }


                          if($row['image_type'] == "Guestroom"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' selected>Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                            if($row['image_type'] == "Bathroom"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom' selected>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['image_type'] == "Living Area"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area' selected>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  if($row['image_type'] == "Hotel Front"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front' selected>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                  if($row['image_type'] == "Exterior"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' selected>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  
                                  if($row['image_type'] == "In Room Kitchen"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' selected>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  if($row['image_type'] == "Terrace"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace' selected>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['image_type'] == "Restaurant"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant' selected>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['image_type'] == "Reception"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception' selected>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                   if($row['image_type'] == "In Room Kitchen Dining"){
                            echo "<select name='type' onchange='change_type(this)' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'  selected>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                    /*<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
                        <option selected disabled"

                        "<option value='".$row['image_id']."/Guestroom'>Guestroom</option>
                        <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                        <option value='".$row['image_id']."/Living Area'>Living Area</option>
                         <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                        <option value='".$row['image_id']."/Exterior'>Exterior</option>
                        <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen Kitchen</option>
                        <option value='".$row['image_id']."/Terrace'>Terrace/Patio</option>
                        <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                        <option value='".$row['image_id']."/Reception'>Reception</option>
                        <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                    </select></td>";*/

             }   

            else
            {
                echo "<td style='padding-top: 1.9em;padding-bottom: 1.9em;padding-right:1.9em;padding-left:1.9em;'><img src='data:image/jpeg;base64,".base64_encode($row['image'])."' style='width:270px;height:270px;'/>
               
                <br>
                <hr>";
                

                     if($row['image_type'] == "--Select--"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom'>Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }


                          if($row['image_type'] == "Guestroom"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' selected>Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                            if($row['image_type'] == "Bathroom"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom' selected>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['image_type'] == "Living Area"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area' selected>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  if($row['image_type'] == "Hotel Front"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front' selected>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                  if($row['image_type'] == "Exterior"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' selected>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  
                                  if($row['image_type'] == "In Room Kitchen"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' selected>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  if($row['image_type'] == "Terrace"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace' selected>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['image_type'] == "Restaurant"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant' selected>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['image_type'] == "Reception"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception' selected>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                   if($row['image_type'] == "In Room Kitchen Dining"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' onchange='change_type(this)' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'  selected>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }



                goto start;
            }


        }

        echo "</tr>";
        echo "</table>";
}
        
?>

<div id="room_div">
 
 </div>
</div>


        </form>

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>    

   <script>
 //alert('hii gowda');
$(document).ready(function(){
  
    $('#room').change(function()
    {
      
      var room_id=$(this).val();
      var property_id=$('#property').val();
      //alert(property_id); 


        var path="load_photos.php?p="+property_id+"&q="+room_id;
        $('#room_div').load(path);

    });

});    
</script>     
<script type="text/javascript">
 
  document.getElementById('property').value = "<?php echo $_POST['property'];?>";
 // document.getElementById('room').value = "<?php echo $_POST['room'];?>";

</script>


<!--<script type="text/javascript">
  
var uploadField = document.getElementById("pimage");

uploadField.onchange = function() {
    if(this.files[0].size > 500){
       alert("File is too big!");
       this.value = "";
    };
};

</script>-->

  <script type="text/javascript">

  function change_type(check)
  {

     //alert("hii");

               //Selected value

               var inputValue = $(check).val();

               var string1=inputValue.split("/");

               var imageid=string1[0];

               var imagetype=string1[1];
               

              // var ename=string1[2];
              alert("You request to change the image type to: "+imagetype);
               $.post('imgtypeupdate.php', {imgid:imageid,imgtype:imagetype}, function(data){
  
                // alert('Image type Updated Successfully');

                 //  location.reload();

              });


               

  }
</script> 


<script>
function validate(){
  //alert("hii");
var size=512000;
var file_size1=document.getElementById('pimage').files[0].size;

if(file_size1>=size){
    alert('Photo size is too large');
    return false;
}

/*var type='image/jpeg';
var file_type=document.getElementById('in_certificate').files[0].type;
if(file_type!=type){
    alert('Format not supported,Only .jpeg images are accepted');
    return false;
}*/
}
</script>