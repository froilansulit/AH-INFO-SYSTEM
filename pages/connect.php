<?php 
    $server = 'localhost:30000';
    $username = 'root';
    $password = 'froilan17';
    $db_name = 'ah_info_system';

    $conn = new mysqli($server,$username, $password, $db_name); // for connection
    if (!$conn) {  die(mysqli_error($conn)); }
?>
