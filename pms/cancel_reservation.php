<?php
session_start();
include'registration_cards_database.php';
$folio=$_SESSION['folio'];
mysqli_query($con,"UPDATE reservation SET status='0' WHERE folio_id='$folio'") or die($con);

	

?>