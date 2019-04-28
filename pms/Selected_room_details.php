<?php
	session_start();
	include_once("Property_DB.php");
	$query11=mysqli_query($con,"select * from rooms_detail where property_id='".$_SESSION['user']['hotelid']."' and room_id=$_GET[rid]") or die(mysqli_error($con));
	 if(mysqli_num_rows($query11)>0)
     {     
     	$query13=mysqli_query($con,"select * from rooms_tax where  property_id='".$_SESSION['user']['hotelid']."' and room_id=$_GET[rid] and meal_plan='EP'") or die(mysqli_error($con));
		if(mysqli_num_rows($query13)>0)
		{
			
				$row13=mysqli_fetch_array($query13);
				$taxprice=$row13['singletax'];
				  
		}
     	$query12=mysqli_query($con,"select * from rooms_tariff where  property_id='".$_SESSION['user']['hotelid']."' and room_id=$_GET[rid] and meal_plan='EP' ") or die(mysqli_error($con));
     	
		if(mysqli_num_rows($query12)>0)
		{
			
			$row12=mysqli_fetch_assoc($query12);
			$price_p1=$row12['singleprice'];
		}

        $row11=mysqli_fetch_array($query11);/*<h4>".$row11['roomType']."</h4>*/

        echo "<div class='col-md-6 roomtype'><caption>".$row11['room_name']."</caption>";   
        echo "<table class='table ' id='roomid' data-roomid='$_GET[rid]'>
		        <tr><th></th><th>Adults</th><th>Child</th><th>Extra Person</th><th>Meal Plan</th><th>Price</th><th>Tax</th><th>Total</th></tr>" ;         
	 for($i=0;$i<$_GET['noroom'];$i++)
              {
               
                $htmlstr='<tr><td ><input type="button" class="btn mr-1 close_div" value=&times; onclick="closediv(this)" ></td><td> <select name="adults'.$_GET["rid"].'[]" data-max="'.$row11['max_occupancy'].'" class="adults" onchange="AdultsChange(this)">
                <option value="1">1';
                
                
                	for($j=2;$j<=$row11['max_occupancy'];$j++)
                	{
                		$htmlstr.='<option value="'.$j.'">'.$j.'</option>';
                	}
               
               
                  
                $htmlstr.='</select></td><td><select name="child'.$_GET['rid'].'[]" class="child" onchange="ChildChange(this)">
                <option value="0">0</option>';
                 for($j=1;$j<=$row11['max_occupancy_child'];$j++)
                {
                  $htmlstr.='<option value="'.$j.'">'.$j.'</option>';
                }
                $htmlstr.='</select></td><td><select name="extra'.$_GET['rid'].'[]" class="extra" disabled onchange="ExtraChange(this)">
                <option value="0">0</option>';
                 for($j=1;$j<=3/*$row11['max_child']*/;$j++)
                {
                  $htmlstr.='<option value="'.$j.'">'.$j.'</option>';
                }
                $htmlstr.='</select></td><td><select name="meal'.$_GET['rid'].'[]" class="meal" onchange="MealChange(this)">
	                <option value="EP">EP</option>
	                <option value="AP">AP</option>
	                <option value="CP">CP</option>
	                <option value="MAP">MAP</option>
                </select></td>
                <td><input type="text" name="price'.$_GET['rid'].'[]" class="price" style="width:60px;height:21px;font-size:14px" value="'.$price_p1.'" readonly></td>
                <td><input type="text" name="tax'.$_GET['rid'].'[]" class="tax" value="'.$taxprice.'" style="width:60px;height:21px;font-size:14px" readonly></td>
                <td><input type="text" name="total'.$_GET['rid'].'[]" class="total" value="'.($price_p1+$taxprice).'" style="width:60px;height:21px;font-size:14px" readonly></td></tr>';
                 echo $htmlstr;
                   

              }
              echo '</table><div id="hiddendiv"></div>';
          }
      ?>
<script >
	$(document).ready(function(){
		 cal_total_price();		
	});
</script>
