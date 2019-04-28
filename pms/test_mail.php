<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 	
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="form-group">
    				<label >Subject </label>
   					<input type="text" name="subject" id='subject' class="form-control" placeholder="Subject" required />
 				</div>
 				<div class="form-group">
    				<label >Content</label>
    				<textarea class="form-control" name="body" id='body' rows="5" placeholder="Body" required ></textarea>
  				</div>
  				<div class="">
  					<input type="submit" class="btn btn-success" style="width: 100px" name="send_mul_mail" value="Send" onclick="javascript: form.action='sendMail_code.php'" />

  					<input type="submit" class="btn btn-info float-right" style="" name="add_send_mail" value="Add & Send" onclick="javascript: form.action='sendMail_code.php'" />
  				</div>

				<div class="modal fade" id="TemplateModal">
    <div class="modal-dialog">
      <div class="modal-content">
      	
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Mail Template</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>



        <!-- Modal body -->
        <div class="modal-body" >
		<div class="container p-2">
			<div id="carouselExampleControls" class="carousel slide" >
				<div class="carousel-inner">
					<?php	$mailtemplate=mysqli_query($conn,"select * from mail_template where HotelId=0 or HotelId='".$_SESSION['user']['hotelid']."'") or die(mysqli_error($conn));
        				$no_temp=mysqli_num_rows($mailtemplate);
        			 $n=0;
        			while($template=mysqli_fetch_array($mailtemplate))
        			{

        				if($n==0)
        				{
        			?><div class="carousel-item active">
        				
        				<div class="numbertext mr-5 mt-2"><?php $n=$n+1; echo $n."/".$no_temp; 

        				 if($template['HotelId']!=0 ){ ?>
        						<input type="button" class="btn btn-Warning btn-sm float-right temp_delete" style="width: 90px" text='<?php echo $template['TemplateId']; ?>' value='Delete' >
        					<?php } ?>

        			</div><br/>
        				<div class="form-group">
        					<label >Subject</label>
        					<input type="text" class="form-control" name="Subject" id='<?php echo $template['TemplateId']; ?>sub'  value='<?php echo $template['Subject']; ?>' readonly> 
        				</div>
        				<div class="form-group">
        					<label >Body</label>
        					<textarea class="form-control" id='<?php echo $template['TemplateId']; ?>body' rows='4'readonly><?php echo $template['Body']; ?> </textarea> 
        					
        				</div>
        				<div class="form-group mr-5 ml-5">
	        					<br>
	        					
	        					<input type="button" class="btn btn-info btn-sm float-right temp_use"  style="width: 90px" text='<?php echo $template['TemplateId']; ?>' value='use' >
	        					<br>
	        					<hr>
	        			</div>
        			</div>
        				<?php  }
        				else
        				{
        					?>
        					<div class="carousel-item ">
        						<div class="numbertext mr-5 mt-2"><?php $n=$n+1; echo $n."/".$no_temp; 

        						if($template['HotelId']!=0 ){ ?>
        						<input type="button" class="btn btn-Warning btn-sm float-right temp_delete" style="width: 90px" text='<?php echo $template['TemplateId']; ?>' value='Delete' >
        					<?php } ?>
        					</div><br/>
	        				<div class="form-group">
	        					<label >Subject</label>
	        					<input type="text" class="form-control" name="Subject" id='<?php echo $template['TemplateId']; ?>sub'  value='<?php echo $template['Subject']; ?>' readonly> 
	        				</div>
	        				<div class="form-group">
	        					<label >Body</label>
	        					<textarea class="form-control" id='<?php echo $template['TemplateId']; ?>body' rows='4' readonly><?php echo $template['Body']; ?> </textarea> 
	        					
	        				</div>
	        				<div class="form-group mr-5 ml-5">
	        					<br>
	        					
	        					<input type="button" class="btn btn-info btn-sm float-right temp_use" style="width: 90px" text='<?php echo $template['TemplateId']; ?>' value='use' >
	        					<br>
	        					<hr>
	        				</div>
        			</div>
        			<?php
        				 }
        		} ?>
        		</div>
        		<a class="carousel-control-prev " style="width: 7%" href="#carouselExampleControls" role="button" data-slide="prev">
				   <i class="fas fa-angle-left fa-2x prev" aria-hidden="true" style="color: black"></i>
				    <span class="sr-only">Previous</span>
				</a>
				 <a class="carousel-control-next "  style="width: 7%" href="#carouselExampleControls" role="button" data-slide="next">
				   <i class="fas fa-angle-right fa-2x next" aria-hidden="true" style="color: black"></i>
				   <span class="sr-only">Next</span>
			  	</a>
			</div>
  			
		
  		</div>
        </div>
     </div>
   </div>
</div>

</body>
</html>