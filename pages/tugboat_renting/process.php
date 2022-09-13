<?php 
include '../connect.php';

// for deleting
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

// for data viewing 
if (isset($_POST['viewID'])) {
    $user_id = $_POST['viewID'];

    $sql = "select * from tugboat_record where id=$user_id";
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