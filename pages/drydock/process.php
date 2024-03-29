<?php 
    include '../connect.php';

    // for deleting specific drydock data
    if (isset($_POST['deleteSend'])) {
        
        $unique = mysqli_real_escape_string($conn, $_POST['deleteSend']);
        $dry_query = "SELECT * FROM drydock_record WHERE id='$unique'";
        $dry_query_run = mysqli_query($conn, $dry_query);
    
        while ($row = mysqli_fetch_assoc($dry_query_run)) {
            if ($img_path = "upload/" . $row['images']) {
                $sql = "DELETE FROM drydock_record WHERE id=$unique";
                $result = mysqli_query($conn, $sql);
    
                if ($result) {
                    unlink($img_path);
                    // * keep it blank ajax will do the success message
                } else {
                    die(mysqli_error($conn));
                }
            }
        }
    }

    //   for drydock image preview
    if (isset($_POST['userID'])) {

        $id = $_POST['userID'];
        $sql = "SELECT * FROM drydock_record WHERE id='$id'"; // select all the data in DB
        $result = mysqli_query($conn, $sql); // query to get the data

        while ($row = mysqli_fetch_assoc($result)) { ?>
        <img src="upload/<?= $row['images']; ?>" class="img-fluid" alt="">
        <?php
        }
    }

    // for drydock viewing details
    if (isset($_POST['viewID'])) {
        $user_id = $_POST['viewID'];

        $sql = "SELECT * FROM drydock_record WHERE id=$user_id";
        $result = mysqli_query($conn,$sql);
        $response = array();
        while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
        }
        echo json_encode($response);
    }
    else {
        $response['status'] = 200;
        $response['message'] = "Invalid or Data not found";
    }
?>