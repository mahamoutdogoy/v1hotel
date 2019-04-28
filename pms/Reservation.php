<?php 
session_start();
  include_once("Property_DB.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reservation</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
   
   <!--  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css"> -->

    
  </head>
<body>
  
    <div class="container-fluid " >
      <?php include("header.php"); ?>
      <br/><br/>
      <div class="row">

        <!-- Sidebar section -->
        <div class="col-xl-2"  >
            <?php include("sidebar.php"); ?>
        </div>
        <!-- end of Sidebar section -->

        <!--Check in check out date selection section  -->
        <div class="col-md-10">
      <form method="POST" action="Confirm_reservation.php">

      <div class="row ">
      <div class="col-md-3" id="top_dateselector"><b>Check-In date</b><br>
          <input type="date"  class="form-control" width="300" id="c_in" value="" name="check_in" min="<?php echo  date('Y-m-d'); ?>"   required />
        </div>
        <div class="col-md-3"><b>Check-Out date</b><br>
          <input type="date"  class="form-control" width="300" id="c_out" value='' name="check_out" min="<?php echo date('Y-m-d'); ?>"  required />
        </div>
      <div class="col-md-3"><br><input type="button" id="Show_rooms" class="btn btn-info " name="" value="Show Available Rooms"></div>
    </div>
    <!--end of Check in check out date selection section  -->

    <!--Available room details section  -->
      <div  id="section2" >
        <div class="col-md-11" id="avl_room">
       <!--  /*include_once("index.php"); data for this section is loaded automatically based on check in check out date (code for this section is available in "avl_room.php" page) */ --> 
      </div>
     </div>

     <!--Guest details section -->
     <div  class="row bg-secondary p-2  mt-2" id="section3" >
      <div class="col-md-4">
     <i class="fas fa-angle-down fa-2x my-auto " id="my_iconGuestsection" onclick="showBooking('Guestsection')"></i>
    
    <a class="my-auto p-2" onclick="showBooking('Guestsection')"> <strong>Guest Details</strong></a>
   </div>
  </div>
       
        
            <div id="Guestsection" class="mt-3" style="display: none;">
              <div class="row">
                <div class="col-md-2 ">
                  <label class="">Phone Number</label>
                </div>
                <div class="col-md-2">
                <input type="text"  class="form-control" id="pno_to_find" placeholder="Phone Number">
                <input type="hidden" name="guestid">
              </div>
              <div class="col-md-2">
                <input type="button" id="recordByPhone" class="btn btn-secondary" name="" value="Find"    data-toggle="modal" data-target="#GuestModal">
              </div>
              <div class="col-md-12" id="no_record" style="display: none;">
                <label style="color: red">Sorry no record found... Create New Record </label>
              </div>
             
            </div>
              <div class="row mt-5">
              <div class="col-md-3">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="G_name" class="form-control" placeholder="Name" required>
          </div></div>
             <div class="col-md-3">
          <div class="form-group">
              <label>Email</label>
              <input type="text" name="G_email" class="form-control"  placeholder="Email" required >
          </div>
        </div>
           <div class="col-md-3">
          <div class="form-group">
             <label >Phone No</label>
             <input type="text" class="form-control" name="G_pno" placeholder="Phone Number" required >
          </div>
        </div>
      </div>
      <hr style="border-top: solid #8c8b8b;">
              <div class="row mt-2">
                <div class="col-md-3">
                  <label>Reservation Status</label>
                </div>
                <div class="col-md-3">
                  <input type="radio" name="BookingStatus" class="mr-2" value="Confirm Reservation" checked><label >Confirm Reservation </label>
                </div>
                <div class="col-md-3">
                  <input type="radio" name="BookingStatus"  class="mr-2" value="Hold Reservation" ><label > Hold Reservation</label> 
                </div>
             </div>

             <div class="row mt-2">
              <div class="col-md-3">
                <label>Payment Status</label><br>
                <select class="form-control" name="payment_status">
                  <option>Prepaid</option>
                  <option>Pay At Hotel</option>
                </select>
              </div>
              <div class="col-md-3">
                <label>Payment Mode</label><br>
                <select class="form-control" name="payment_mode">
                  <option>Cash</option>
                  <option>Card Machine</option>
                  <option>Mobile Wallet</option>
                  <option>UPI</option>
                  <option>Bank Transfer</option>
                  <option>Cheque Deposit</option>
                  <option>Payment Gateway</option>
                </select>
              </div>
              <div class="col-md-3" >
                <label>Payment Type</label><br>
                <select class="form-control" id="payment_type" name="payment_type">
                  <option>Full Amount</option>
                  <option>Partial Amount</option>
                </select>
              </div>
              <div class="col-md-2">
                <label>Received Amount </label><br>
                <input type="text" id="received_amount" class="form-control" name="received_amount"  autocomplete="off" required="">

             </div>
             <div class="col-md-6 mt-2">
             <div claas="form-group">
               <label >Payment Reference</label>
               <textarea class="form-control" name="reference">
                 
               </textarea>
             </div> 
           </div>
            <div class="col-md-5 mt-2">
             <div claas="form-group">
               <label >Internal Note</label>
               <textarea class="form-control" name="internal_note">
                 
               </textarea>
             </div> 
              </div>
               <div class="col-md-6 mt-2 mb-2">
             <div claas="form-group">
               <label >Reservation Created By</label>
               <input type="text" name="booking_created_by" class="form-control" value='<?php echo $_SESSION['user']['name']; ?>' readonly >
             </div> 
          </div>
          <div class="col-md-3 mt-2 mb-2">
             <div claas="form-group">
               <label >Reservation Pending Up-to</label>
               <input type="date" name="pending_date" class="form-control" id="Cal_Pending" readonly="">
             </div> 
          </div>
          <div class="col-md-2 mt-3 mb-5 pt-4">
             <div claas="form-group  ">
              
                <input type="submit" name="Book" class="btn btn-danger form-control  my-auto" value="Confirm Reservation">
             </div> 
          </div>
      </div>
      </div>
     </div>
   </div>
 
  
</form> 
</div>
</div>
</div>
</body>
</html>
<script>
    $("#received_amount").keydown(function(e){
      if($('#payment_type').val()=="Full Amount")
      {

        e.preventDefault();
      }
    });
     $("#received_amount").on('keydown paste', function(e){
       if($('#payment_type').val()=="Full Amount")
      {
        e.preventDefault();
      }
    });
</script>
<script >
  $(document).ready(function(){

    $('#c_in').change(function(){
     
        $('#c_out').attr("min",$(this).val());
        /* $('#avl_room').load("index.php");*/
        
    });

     $('#c_out').change(function(){
        $('#c_in').attr("max",$(this).val());
        /* $('#avl_room').load("index.php");*/
     });

      $('#Show_rooms').click(function(){
        if($('#c_in').val()=="" )
        {
          alert("Please Select Check in Date ...");
          $('#c_in').focus();
        }
        else if($('#c_out').val()=="" )
        {
          alert("Please Select Check out Date ...");
          $('#c_out').focus();
        }
        else{
        var  c_in_date=$('#c_in').val();
         var  c_out_date=$('#c_out').val();
         $('#c_in').prop("readonly", true);
         $('#c_out').prop("readonly", true);
         $(this).prop('disabled',true);
         $('#top_dateselector').before('<div class="col-md-12 alert alert-warning"><span style="color:red">WARNING <b>!</b></span><br><br><input type="button" class="btn btn-info btn-sm" value="click" onclick="location.reload()"> click here to enable the date picker but you will lose the old data</div>');
        $('#section2').empty();
        
       
        var path="Available_rooms.php?cin="+c_in_date+"&cout="+c_out_date;
        $('#section2').load(path);
      }
        
        /*window.location=path;*/
        
     });
       $('input[type="radio"]').click(function(){
        if ($(this).is(':checked'))
          {
           
              if($(this).val()=="Confirm Reservation")
                $("#Cal_Pending").prop('readonly',true);
              else if($(this).val()=="Hold Reservation")
                $("#Cal_Pending").prop('readonly',false);

          }
       });
        $('#recordByPhone').click(function()
                  {
                    /*alert($(this).val());*/
                    var path="Find_record.php?phoneno="+ $('#pno_to_find').val();
                    $('#no_record').load(path,function(response,status){ 
                    if(status == "success") 
                    {
                      $("input[name='G_name']").val($("#f_name").val());
                      $("input[name='G_email']").val($("#f_email").val());
                      $("input[name='G_pno']").val($("#pno_to_find").val());
                       $("input[name='guestid']").val($("#f_guestid").val());
                      $('#no_record').css('display','block');
                    }
                    
                  });
            });
        $("select[name='payment_status']").change(function(){
         
          if($(this).val().trim()!="Prepaid")
          {

            $("select[name='payment_mode']").prop("disabled",true);
            $("select[name='payment_type']").prop("disabled",true);            
            $("input[name='received_amount']").prop("disabled",true);
          }
          else
          {
            $("select[name='payment_mode']").prop("disabled",false);
            $("select[name='payment_type']").prop("disabled",false);
             $("input[name='received_amount']").prop("disabled",false);
          }
        });

       /* $("#payment_type").change(function(){
          
          if($(this).val()!="Full Amount")
          {
           
            $("#received_amount").prop('readonly',false);
          }
          else
          {
            $("#received_amount").prop('readonly',true);
          }
        });*/

     
  
  });
  function showBooking(id)
  {
    var hidden=$('#'+id).css('display');
    if(hidden=='none')
    {
      $('#'+id).css('display','block');
       $("#my_icon"+id).removeClass("fa-angle-down");
       $("#my_icon"+id).addClass("fa-angle-up");
    }
    else
    {
      $('#'+id).css('display','none');
      $("#my_icon"+id).removeClass("fa-angle-up");
      $("#my_icon"+id).addClass("fa-angle-down");
    }
    if($('#avilableroomsection').css('display')=="none")
    {
      $('#amountDetails').css('display','block');
    }
    else
    {
      $('#amountDetails').css('display','none');
    }
    if($("#Guestsection").css('display')=="none")

   {

     $("#add_guest").css("display",'block');

   }

   else

   {

      $("#add_guest").css("display",'none');

   }
  }
  
</script>