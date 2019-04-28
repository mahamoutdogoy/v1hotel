<?php
session_start();
 include_once("../dbConnect.php");

$query12=mysqli_query($conn,"select * from rooms_tariff where  property_id='".$_SESSION['user']['hotelid']."' and room_id=$_GET[roomid] and meal_plan='$_GET[mealplan]'") or die(mysqli_error($conn));
if(mysqli_num_rows($query12)>0)
{
	
		$index=4+$_GET['adults'];
		
		$row12=mysqli_fetch_array($query12);
		if($_GET['child'])
		{
			
			echo "<input type='hidden' value='".$row12['extrachildprice'] * $_GET['child'] ."' id='11child' >";		
		}
		if($_GET['experson'])
		{
			echo "<input type='hidden' value='".$row12['extrapersonprice'] * $_GET['experson'] ."' id='11extra' >";		
		}

		    echo "<input type='hidden' value='".$row12[$index]."' id='11price' >";
		    
		    
}
$query12=mysqli_query($conn,"select * from rooms_tax where  property_id='".$_SESSION['user']['hotelid']."' and room_id=$_GET[roomid] and meal_plan='$_GET[mealplan]'") or die(mysqli_error($conn));
if(mysqli_num_rows($query12)>0)
{
	
		$index=4+$_GET['adults'];
		
		$row12=mysqli_fetch_array($query12);
		
		    echo "<input type='hidden' value='".$row12[$index]."' id='tax' > ";
}
?>
<script type="text/javascript">
	
	function getprice_adults()
      {
        var pr=$('#11price').val();
        var ch_pr=$('#11child').val();
        var ex_pr=$('#11extra').val();
        if(ch_pr)
        {
        	pr=parseInt(pr)+parseInt(ch_pr);
        	
        }
        if(ex_pr)
        {
        	pr=parseInt(pr)+parseInt(ex_pr);
        	
        }
       return(pr);
        
      }
      function gettax_adults()
      {
        var t=$('#tax').val();
       return(t);
        
      }

       
</script>