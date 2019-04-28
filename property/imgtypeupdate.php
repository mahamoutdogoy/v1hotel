
<?php

include 'property_DB.php';
    $query=mysqli_query($con,"update images set image_type='$_POST[imgtype]' where image_id='$_POST[imgid]'") or die (mysqli_error($con));
    
 ?>