<?php 
session_start();



$username = $_SESSION['username'];
$acc_name = $_SESSION['acc_name'];
$user_type = $_SESSION['user_type'];



if (!isset($_SESSION['username'])) {
    header('location: ../login/');
	
}


// if(isset($_POST['logout_btn'])) {

//     session_destroy();
//     header('location: ../login/');
	
// }

?>