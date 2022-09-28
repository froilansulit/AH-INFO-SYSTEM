<?php 
$server = 'localhost';
$username = 'root';
$password = '';
$db_name = 'ah_info_system';

$conn = new mysqli($server,$username, $password, $db_name); // for connection
if (!$conn) {  die(mysqli_error($conn)); }
?>
