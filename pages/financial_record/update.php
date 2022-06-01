<?php 


include '../connect.php';

if (isset($_POST['updateID'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['updateID']);

    $sql = "select * from financial_record where id=$user_id";
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

if(isset($_POST['hiddenData'])) {
    
    
    $unique_ID = mysqli_real_escape_string($conn, $_POST['hiddenData']);
    $U_name = mysqli_real_escape_string($conn, $_POST['U_name']);
    $U_date = mysqli_real_escape_string($conn, $_POST['U_date']);
    $U_purpose = mysqli_real_escape_string($conn, $_POST['U_purpose']);
    $U_OR = mysqli_real_escape_string($conn, $_POST['U_OR']);

    $U_amount = mysqli_real_escape_string($conn, $_POST['U_amount']);
    $U_month = mysqli_real_escape_string($conn, $_POST['U_month']);
    $U_encoded = mysqli_real_escape_string($conn, $_POST['U_encoded']);
    
    $sql = "update financial_record set cname='$U_name',date_set='$U_date', purpose='$U_purpose', or_number='$U_OR' ,amount='$U_amount', month_date='$U_month', encoded_by='$U_encoded' where id='$unique_ID'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        # keep it blank ajax will do the success message
    }
    else {
        die(mysqli_error($conn));
    }
    
    

}
