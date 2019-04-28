<?php
//index.php
require_once 'config.php';
$keyword = 'exploreworld';
function make_query($connect)
{
 $query = "SELECT * FROM propertydetails WHERE keyword='exploreworld'";
 $result = mysqli_query($connect, $query);
 return $result;
}

function make_slide_indicators($connect)
{
 $output = ''; 
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show_world" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show_world" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($connect)
{
 $output = '';
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active" >';
  }
  else
  {
   $output .= '<div class="item "> ';
  }
  $output .='
   <img src="data:image/jpeg;base64,'.base64_encode($row["property_image"]).'"  class="img-responsive" width="450" height="100" style="position:center;" />
   <div class="carousel-caption">
    <h3>'.$row["property_price"].'</h3>
    <h3 style="background-color:red;border-radius:50%" >'.$row["property_name"].'<h3>
   </div>
   
  </div>
  ';
  $count = $count + 1;  
 }

 return $output;
}



?>
  <br />
  <div class="container w-100" >
   
   <div id="dynamic_slide_show_world" class="carousel slide" data-ride="carousel" style="position: center;min-width: 100%;">
    <ol class="carousel-indicators">
    <?php echo make_slide_indicators($con); ?>

    </ol>

    <div class="carousel-inner">
     <?php echo make_slides($con); ?>
     <form method="post" action="s_search.php?all_key=<?php echo $keyword; ?>">
       <input type="submit" class="btn-success" style="border-radius:;margin-left:40%"  name="world" value="Book now">
     </form>
     
    </div>
    <a class="left carousel-control" href="#dynamic_slide_show_world" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#dynamic_slide_show_world" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>

   </div>
  </div>
  