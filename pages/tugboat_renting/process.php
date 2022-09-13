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

// // for getting data

// if (isset($_POST['updateID'])) {
//     $user_id = $_POST['updateID'];

//     $sql = "select * from tugboat_record where id=$user_id";
//     $result = mysqli_query($conn,$sql);
//     $response = array();
//     while ($row = mysqli_fetch_assoc($result)) {
//        $response = $row;
//     }
//     echo json_encode($response);
// }
// else {
//     $response['status'] = 200;
//     $response['message'] = "Invalid or Data not found";
// }

// // for updating data

// if(isset($_POST['hiddenRentData'])) {
    
    
//     $unique_ID = htmlspecialchars($_POST['hiddenRentData']);
//     $name = htmlspecialchars($_POST['Uname']);
//     $U_dor1 = htmlspecialchars($_POST['U_dor1']);
//     $U_dor2 = htmlspecialchars($_POST['U_dor2']);
   

//     $sql = "update tugboat_record set name='$name',dateofRent='$U_dor1', dateofReturn='$U_dor2' where id='$unique_ID'";

//     $result = mysqli_query($conn, $sql);
    
//     if ($result) {
//         $_SESSION['status'] = "Updated Successfully!";
//         echo "
//         <script>
        
//         setTimeout (() => {
//           location.href = '../tugboat_renting/';
//         }, 3000);
       
//         </script>
//         ";
//     }
//     else {
//         die(mysqli_error($conn));
//     }
// }

?>