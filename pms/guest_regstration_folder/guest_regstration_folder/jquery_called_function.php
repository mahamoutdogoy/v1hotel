<?php
 include'registration_cards_database.php';

 if($_POST['templateid'])
  {
   
    mysqli_query($con,"DELETE FROM mail_template WHERE TemplateId='$_POST[templateid]'") or die(mysqli_error($con));
    mysqli_close($con);
  }
 

?>