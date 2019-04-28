<?php
//index.php
require_once 'config.php';
$keyword = 'culture';
function make_query_culture($connect)
{
 /*$query = "SELECT id,name,title,description FROM culture";*/
 $query = "SELECT * FROM propertydetails WHERE keyword='culture'";
 $result = mysqli_query($connect, $query);
 return $result;
}

function make_slide_indicators_culture($connect)
{
 $output = ''; 
 $count = 0;
 $result = make_query_culture($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show_culture" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show_culture" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides_culture($connect)
{
 $output = '';
 $count = 0;
 $result = make_query_culture($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active mr-0 ml-0 pr-1 pl-1" >';
  }
  else
  {
   $output .= '<div class="item mr-0 ml-0 pr-1 pl-1"> ';
  }
  $output .='
   <img src="data:image/jpeg;base64,'.base64_encode($row["property_image"]).'"  class="img-responsive" width="450px" height="200px" style="position:center;" />
   <div class="carousel-caption">
    <h3>'.$row["property_name"].'</h3>
    <h3 style="background-color:red;border-radius:50%">'.$row["property_price"].'<h3>
   </div>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
}

?>
  <br />
  <div class="container w-100 " style="" >
   
   <div id="dynamic_slide_show_culture" class="carousel slide" data-ride="carousel" style="position: center;min-width: 100%">
    <ol class="carousel-indicators">
    <?php echo make_slide_indicators_culture($con); ?>
    </ol>

    <div class="carousel-inner">
     <?php echo make_slides_culture($con); ?>
     <form method="post" action="s_search.php?all_key=<?php echo $keyword; ?>" style="margin-left: 40%">
       <input type="submit" name="culture" class="btn-success" value="Book Now">
     </form>
    </div>
    <a class="left carousel-control" href="#dynamic_slide_show_culture" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#dynamic_slide_show_culture" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>

   </div>
  </div>
