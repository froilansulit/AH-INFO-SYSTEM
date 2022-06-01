<?php

include '../connect.php';

extract($_POST);

// for incoming varibles

$FRI_nameSend = htmlspecialchars($_POST['FRI_nameSend']);
$FRI_dateSend = htmlspecialchars($_POST['FRI_dateSend']);
$FRI_purposeSend = htmlspecialchars($_POST['FRI_purposeSend']);
$FRI_ORSend = htmlspecialchars($_POST['FRI_ORSend']);

$FRI_amountSend = htmlspecialchars($_POST['FRI_amountSend']);
$FRI_monthSend = htmlspecialchars($_POST['FRI_monthSend']);
$FRI_encodedSend = htmlspecialchars($_POST['FRI_encodedSend']);


if (isset($FRI_nameSend) && isset($FRI_dateSend) && isset($FRI_purposeSend) && isset($FRI_ORSend) && isset($FRI_amountSend) && isset($FRI_monthSend) && isset($FRI_encodedSend)) {

    $ES_FRI_nameSend = mysqli_real_escape_string($conn, $FRI_nameSend);
    $ES_FRI_dateSend = mysqli_real_escape_string($conn, $FRI_dateSend);
    $ES_FRI_purposeSend = mysqli_real_escape_string($conn, $FRI_purposeSend);
    $ES_FRI_ORSend = mysqli_real_escape_string($conn, $FRI_ORSend);

    $ES_FRI_amountSend = mysqli_real_escape_string($conn, $FRI_amountSend);
    $ES_FRI_monthSend = mysqli_real_escape_string($conn, $FRI_monthSend);
    $ES_FRI_encodedSend = mysqli_real_escape_string($conn, $FRI_encodedSend);

    $sql = "INSERT into financial_record (cname,date_set,purpose,or_number,amount,month_date,encoded_by) values ('$ES_FRI_nameSend', '$ES_FRI_dateSend', '$ES_FRI_purposeSend','$ES_FRI_ORSend', '$ES_FRI_amountSend', '$ES_FRI_monthSend','$ES_FRI_encodedSend')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        # keep it blank ajax will do the success message
    } else {
        die(mysqli_error($conn));
    }
}




// if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
//     echo 'Hello';

//     $img_name = $_FILES['my_image']['name'];
//     $img_size = $_FILES['my_image']['size'];
//     $tmp_name = $_FILES['my_image']['tmp_name'];
//     $error = $_FILES['my_image']['error'];

//     if ($error === 0) {
//        if($img_size > 125000){
//         echo "<script>alert('Sorry, your file is too large !')</script>";
//         header('location: product.php');
//        }
//        else {
//         // echo "<script>alert('Not more than 1mb !')</script>";
//         $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
//         // echo $img_ex;

//         $img_ex_lc = strtolower($img_ex);

//         $allowed_ex = array("jpg", "jpeg", "png");

//         if (in_array($img_ex_lc, $allowed_ex)) {
//             $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
//             $img_upload_path = 'uploads/'.$new_img_name;
//             move_uploaded_file($tmp_name,$img_upload_path);

//             //insert into database
//             $sql = "INSERT into images(image_url) VALUES('$new_img_name')";
//             $result = mysqli_query($conn, $sql);
//             //header('location: product.php');
//         }
//         else {
//             echo "<script>alert('You can't upload files of this type !')</script>";
//             //header('location: product.php');
//         }

//        }
//     }
//     else {
//         echo "<script>alert('Unknown Error occuried !')</script>";
//         //header('location: product.php');
//     }

// }

// else {
//     echo "<script>alert('Error !')</script>";
//     header('location: product.php');
// }
