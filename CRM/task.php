<?php
	session_start();

	if(isset($_SESSION['cid']))
	{
		unset($_SESSION['cid']);
	}
	
	$_SESSION['cid']=$_REQUEST['cid'];
	include_once("../dbConnect.php");
?>
<!DOCTYPE html>
<html>


<head>
	<title>Tasks</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	
 
	<script type="text/javascript">
     function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
    <style type="text/css">
		
		select,input[type=text] {
			width:200px;
			border-radius: 5px;
			height: 30px;
			border: solid 1px;
		}
		td{
			font-weight: bold;
			font-family: times;
		}
		

	</style>

</head>
<body>


	


    <?php include_once("../myheader.php"); 
    include_once("../mtsidebar.php");
    ?>
    <div class="col-md-9 col-lg-10" >
    	<div class="row">
    		<div class="col-md-8">
		<?php 
			$task_list=mysqli_query($conn,"select TaskId,Task,DueDate,AssignTo,Priority,Status from task_details where ClientId='".$_REQUEST['cid']."' and Status NOT LIKE '%Completed%' and Status NOT LIKE '%Closed%' order by DueDate")or die(mysqli_error($conn)); ?>
		<div>
				
				<i class="fas fa-chevron-circle-left  fa-2x" style="color: #5bc0de" onclick="window.location='index.php'" ></i>
				
			</div>
		<!--top click here to section-->
			<div class='alert alert-info alert-dismissible'>
	  			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	 		 	<strong><a href="completed_task.php?cid=<?php echo $_REQUEST['cid'] ; ?>" >Click Here</a> To View Completed Task</strong>
			</div>
		<form action="edit_task.php" method="post">
			<input type="hidden" name="cid" id="h-cid" value='<?php echo $_REQUEST['cid']; ?>'>
					<input type="hidden" id="h-tid" name="tid" value=''>
			<table style='width:500px'>
	
			<?php 
				while($row2=mysqli_fetch_assoc($task_list))
				{ ?>
				<tr>
					<td style='width:30%'>Task</td>
					<td style='width:70%'><?php echo $row2['Task']; ?></td>
				</tr>
				<tr>
					<td>Due Date</td>
					<td><?php echo $row2['DueDate'] ?></td>
				</tr>
				<tr>
					<td>Assign To</td>
					<td><?php echo $row2['AssignTo'] ?></td>
				</tr>
				<tr>
					<td>Priority</td>
					<td><?php echo $row2['Priority']; ?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td><?php echo $row2['Status']; ?></td>
				</tr>
				<tr>	
					<td colspan='2' align='right'>
					<br>
					<?php $path="product_demo.php?cid=".$_REQUEST['cid']; ?>
					
						<img src='img/Post Card (1).png' onclick="window.location='<?php echo $path;?>'" height='40px' width='40px' title='Product Demo'/>
					
					
						
						<input type='submit' class='btn btn-warning' data-tid='<?php echo $row2['TaskId']; ?>' onclick="return setTaskid(this)" value='Edit'  title='Edit Task'/>
						
			
						<input type='button' class='btn btn-danger id' text='<?php echo $row2['TaskId']; ?>' value='Close Task' onclick='d_task();' title='Close Task'/>
						</td>
					</tr>
			<?php } ?>

				</table>
				</form>
						
		</div>


		<div class="col-md-4">
			<?php include("Client_profile.php"); ?>
		</div>
		</div>
	</div>
</div>
</div>

</body>
</html>
<script>
	$(document).ready(function(){
    $('.id').click(function(){
        var tid=$(this).attr("text");
		var r=confirm("Are You Sure! \n You Will Not Be Able TO Recover This Task!");
		
	if (r == true) {
	  $.post('jquery_called_function.php', { tid:tid}, function(data){
						
						alert('Task Closed Successfully...');
						location.reload();
	                    //do after submission operation in DOM
	                });
	}
	 
		
	});
});

	function setTaskid(btn)
	{
		$('#h-tid').val($(btn).attr('data-tid'));
	}
	</script>
	