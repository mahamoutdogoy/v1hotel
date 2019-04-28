<?php
	 include_once("../dbConnect.php");
	 mysqli_query($con,"update invoice set Status='$_POST[status]' where InvoiceId='$_POST[taskid]';")or die(mysqli_error($con));
                            mysqli_close($con);
                            ?>