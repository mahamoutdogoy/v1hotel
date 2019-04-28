<?php 
  session_start();
  include_once("Property_DB.php");?>
  <html>
  <head>
    
  </head>
  <body>
               <?php if(isset($_GET['cin']) && isset($_GET['cout']))
                {?>
                  
                   <div class="row bg-secondary  p-2 mt-2  ">
                    
                    <div class="col-md-3">
                    <i class="fas fa-angle-down fa-2x my-auto " id="my_iconavilableroomsection" onclick="showBooking('avilableroomsection')"></i>
                   
                   
                    <a  class="my-auto p-2" onclick="showBooking('avilableroomsection')"> <strong >Available Rooms</strong></a>
                  </div>
                  <div class="col-md-6 float-right my-auto">
                    <span id="amountDetails" style="display: none">
                    <strong>Price <label id="h_price"> </label></strong>
                    <strong>Tax <label id="h_tax"> </label></strong>
                    <strong>Total <label id="h_total"> </label></strong>
                    </span>
                  </div>
               
                  </div>
                  
                <div class="col-md-12 mt-3" id="avilableroomsection">
                  <div class="row" id="roomsection">
                  <div class="col-md-4" >
                  <div class="table-responsive">   
                              <table cellpadding="10">
                      <thead>
                  <tr><th> Room Type</th> <th>Available</th><th>Add Rooms</th></tr>
                </thead>
                  <tbody>
              <?php 
                  $str="select * from rooms_detail where  property_id=".$_SESSION['user']['hotelid']."  group by room_id";
                   $query=mysqli_query($con,$str) or die(mysqli_error($con));
                  global $div;
                  $div=array();
                  if(mysqli_num_rows($query)>0)
                  {     
                    while ($row=mysqli_fetch_array($query))
                    {       
                      $str="select count(*) AS count  from rooms_inventory where property_id=".$_SESSION['user']['hotelid']." and room_id='$row[room_id]' and room_sub_id not in (select inventory_id from reservation where property_id=".$_SESSION['user']['hotelid']." and room_id='$row[room_id]' and (check_in <= '$_GET[cout]') and (check_out >= '$_GET[cin]') and( status=1 or status=0 ) )" ; 
                     
                      $query1=mysqli_query($con,$str);
                      $row2=mysqli_fetch_array($query1);

                      // $div[$row['room_id']]['minocc']=$row['min_occupancy'];
                      //  $div[$row['room_id']]['maxocc']=$row['max_occupancy'];
                      //   $div[$row['room_id']]['children']=2;
                      //    $div[$row['room_id']]['price']=123;
                      //     $div[$row['room_id']]['tax']=12;

                      echo "<tr><td>".$row['room_name']."</td><td align='center'>".$row2['count']."</td>
                      <td><select id='idroom".$row['room_id']."' name='".$row['room_id']."' data-id='".$row['room_id']."' class='roomtype'><option value='0' >--select--</option>";
                      for($i=1;$i<=$row2['count'];$i++)
                        {
                          echo "<option value='$i'>$i</option>";
                        }
                        echo "</select> </td>
                      </tr>";
                  }
                  
                }

             }
                else
                {
                  echo "<div >";
                  include_once("index.php");
                  echo "</div>";
                  
                }

              ?>
            </tbody>
        </table>
      
   </div>
 </div>
 <!-- room details are added dynamically into this section -->
 <div class="col-md-6" id="addsection">
  <!-- <?php echo $i; ?> -->
 </div>
 <!--end of  room details  added dynamically  -->

 <!-- grand total section -->
  <div class="col-md-12"> 

  <div class=" float-right col-md-6 ">
  <div class="form-group">
    Price <input type="text" class="float-right" name="Price" style="width: 130px;" id="Price" readonly="" required>
   </div>
   <div class="form-group">
    Tax <input type="text"  class="float-right" name="Tax"  style="width: 130px;" id="Tax" readonly="" required>
    </div>
    <div class="form-group">
    Total <input type="text"  class="float-right" name="Total"  style="width: 130px;" id="Total" readonly="" required >
  </div>
   <div class="form-group">

   <input type="button" id="add_guest" class="btn btn-info btn-sm float-right " value="Add Guest Details">

 </div>

 </div>
</div>
</div>
<!-- end of grand total section -->

</div>
<!-- end of room section -->

<!-- guest details  -->
<div>
  
</div>
<!-- end of guest details  -->
</div>
</body>
</html>

    <script >
      $(document).ready(function(){
        if($("#Guestsection").css('display')=="block")

       {

         $("#add_guest").css('display','none');      
      }     
      $("#add_guest").click(function(){

         $("#Guestsection").css('display','block');
         $("input[name='Book']").focus();
         $(this).css('display','none');

       });
         $('.roomtype').change(function(){
         var no_room=$(this).val();
         var room_id=$(this).attr('data-id');
         /*var max;*/
         if($("div [ id='room"+room_id+"' ]").length){
          var path='Selected_room_details.php?noroom='+no_room+'&rid='+room_id;
              $('#room'+room_id).load(path);
          }
          else
          {
             var htmlstr='<div id="room'+room_id+'"></div><hr>';
             $('#addsection').append(htmlstr);
              var path='Selected_room_details.php?noroom='+no_room+'&rid='+room_id;
              $('#room'+room_id).load(path);
            
          }
        
         /* cal_total_price();*/

        
      
      });



      });
     
    </script>
    <script type="text/javascript">
      
      //calling according to no of adults change
      function AdultsChange(c)
      {
        var no_adults=$(c).val();
        var no_childs=$(c).closest('tr').find("select.child").val();
        var no_extraperson=$(c).closest('tr').find("select.extra").val();
        var mealplan=$(c).closest('tr').find("select.meal").val();
        var room=$(c).closest('table').attr('data-roomid');
        
        var room=$(c).closest('table').attr('data-roomid');
        
        if(no_adults==$(c).attr('data-max'))
         $(c).closest('tr').find("select.extra").prop('disabled', false);
        else
        {
          $(c).closest('tr').find("select.extra").val(0);
          no_extraperson=0;
          $(c).closest('tr').find("select.extra").prop('disabled', true);
        }
       /* var price;
        var tax;
        */
           
        var path="Get_price_details.php?roomid="+room+"&adults="+no_adults+"&child="+no_childs+"&experson="+no_extraperson+"&mealplan="+mealplan;
        calculateprice(c,path);
       
      }

      //calling according to no of Child change
      function ChildChange(c){
        var no_childs=$(c).val();
        var no_adults=$(c).closest('tr').find("select.adults").val();
        var no_extraperson=$(c).closest('tr').find("select.extra").val();
        var mealplan=$(c).closest('tr').find("select.meal").val();
        
        
        var room=$(c).closest('table').attr('data-roomid');

       
           
        var path="Get_price_details.php?roomid="+room+"&adults="+no_adults+"&child="+no_childs+"&experson="+no_extraperson+"&mealplan="+mealplan;
        calculateprice(c,path);
        /*alert(room);*/
      }

      //calling according to no of extra person change
      function ExtraChange(c)
      {
        var no_extraperson=$(c).val();
        var no_childs=$(c).closest('tr').find("select.child").val();
        var no_adults=$(c).closest('tr').find("select.adults").val();
        
        var mealplan=$(c).closest('tr').find("select.meal").val();
        
        
        var room=$(c).closest('table').attr('data-roomid');

       
           
        var path="Get_price_details.php?roomid="+room+"&adults="+no_adults+"&child="+no_childs+"&experson="+no_extraperson+"&mealplan="+mealplan;
        calculateprice(c,path);
      }
      function MealChange(c)
      {
        var mealplan=$(c).val();
        var no_extraperson=$(c).closest('tr').find("select.extra").val();
        var no_childs=$(c).closest('tr').find("select.child").val();
        var no_adults=$(c).closest('tr').find("select.adults").val();
        var room=$(c).closest('table').attr('data-roomid');

        var path="Get_price_details.php?roomid="+room+"&adults="+no_adults+"&child="+no_childs+"&experson="+no_extraperson+"&mealplan="+mealplan;
        calculateprice(c,path);
      }
      //calling according to no of adults change,Child change , extra person change and meal plan change
      function calculateprice(c,path)
      {
         
        
        $("#hiddendiv").load(path,function(response,status){ 
                    if(status == "success") 
                    {
                      
                       var price=getprice_adults();
                       
                      var tax=gettax_adults();
                     
                      $(c).closest("tr").find(".price").val(price);
                      $(c).closest("tr").find(".tax").val(tax);
                      var total=parseInt(price)+parseInt(tax);
                     
                      $(c).closest("tr").find(".total").val(total);
                      
                    }

                     cal_total_price();
             });
        
      }
       function closediv(btn)
      {
        $(btn).closest("tr").remove();
       /*var x=$(btn).closest("#roomid").attr('data-roomid');
        alert(x);*/
        cal_total_price();
      }
       function cal_total_price()
     {
       
        var g_total=0;
        var total_pri=0;
        var total_tax=0;
        $('.price').each(function() {
          total_pri+=parseInt($(this).val());
        });
        $('.tax').each(function() {
          total_tax+=parseInt($(this).val());
        });
        $('.total').each(function() {
          g_total+=parseInt($(this).val());
        });
        $("#Price").val(total_pri);
         $("#Tax").val(total_tax);
          $("#Total").val(g_total);
          $("#h_price").text(total_pri);
         $("#h_tax").text(total_tax);
          $("#h_total").text(g_total);
          $("#received_amount").val(g_total);
      }
      
    </script>
    