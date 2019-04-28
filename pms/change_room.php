<?php
session_start();
include_once('registration_cards_database.php');
//$conn=mysqli_connect("localhost","root","","my_travaly") or die(mysqli_connect_error());

$query="UPDATE rooms_inventory SET status='Available' WHERE folio=$_SESSION[folio] ";
       	 	$q=mysqli_query($con,$query) or die(mysqli_error($con));
//print_r($q);
?>