<?php 
	$host = 'localhost';
    $user = 'root';                    
    $pass ='';                                  
    $db = 'my_travaly';                                  
    $port = 3306;
    $con = mysqli_connect($host, $user, $pass, $db, $port)or die(mysqli_error());


?>