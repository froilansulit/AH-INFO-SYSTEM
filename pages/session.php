<?php 
    session_start();
    $username = $_SESSION['username'];
    $acc_name = $_SESSION['acc_name'];
    $user_type = $_SESSION['user_type'];

    if (!isset($_SESSION['username'])) {
        session_destroy();
        header('location: ../login/');	
    }
    
    if (!isset($_SESSION['user_type'])) {
        session_destroy();
        header('location: ../login/'); 
    }
?>