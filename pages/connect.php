<?php 


$conn = new mysqli('localhost', 'root', '', 'ah_info_system'); // for connection

if (!$conn) {
    die(mysqli_error($conn));
}

?>
