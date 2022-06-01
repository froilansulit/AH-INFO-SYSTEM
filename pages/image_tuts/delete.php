<?php 

include '../connect.php';

if(isset($_POST['deleteSend'])) {
    $unique = mysqli_real_escape_string($conn, $_POST['deleteSend']);

    $sql = "delete from tugboat_record where id=$unique";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        # keep it blank ajax will do the success message
    }
    else {
        die(mysqli_error($conn));
    }

}

?>