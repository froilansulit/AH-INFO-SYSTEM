<?php 

include '../connect.php';

if(isset($_POST['deleteSend'])) {
    $unique = mysqli_real_escape_string($conn, $_POST['deleteSend']);

    $sql = "delete from financial_record where id=$unique";
    $result = mysqli_query($conn, $sql);
}

?>