<?php 

include '../connect.php';

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