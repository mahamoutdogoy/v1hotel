<?php
	include_once("../dbConnect.php");

	$list=mysqli_query($conn,"select folio_id,guestName,email from reservation where phoneNo='".$_GET['phoneno']."' limit 1") or die(mysqli_error($conn));
	if(mysqli_num_rows($list)>0)
	{
		$val=mysqli_fetch_array($list);
		echo '<input type="hidden" id="f_name" value="'.$val['guestName'].'" >
				<input type="hidden" id="f_email" value="'.$val['email'].'" >
				<input type="hidden" id="f_guestid" value="'.$val['folio_id'].'">';
	}
	else
	{
		echo '<label style="color: red">Sorry no record found... Create New Record </label>';
	}
	?>