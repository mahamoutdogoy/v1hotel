<?php
    include 'connect.php';
    if(!isset($_SESSION['user_id'])){
        header("location: ../index.php");
    }
    if (isset($_SESSION['user_id'])) {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_fname']);
        unset($_SESSION['user_email']);
        session_destroy();
        header("location: ../index.php");
    }
?>