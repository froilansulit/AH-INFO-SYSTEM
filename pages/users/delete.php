<?php 
    include '../connect.php';

    // for deleting
    if(isset($_POST['deleteSend'])) {
        $unique = mysqli_real_escape_string($conn, $_POST['deleteSend']);

        $sql = "delete from users where id=$unique";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            # keep it blank ajax will do the success message
        }
        else { 
            die(mysqli_error($conn)); 
        }
    }
?>