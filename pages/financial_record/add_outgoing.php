<?php 

include '../connect.php';

extract($_POST);

// for outgoing variables
$FRO_nameSend = htmlspecialchars($_POST['FRO_nameSend']);
$FRO_dateSend = htmlspecialchars($_POST['FRO_dateSend']);
$FRO_purposeSend = htmlspecialchars($_POST['FRO_purposeSend']);
$FRO_ORSend = htmlspecialchars($_POST['FRO_ORSend']);

$FRO_amountSend = htmlspecialchars($_POST['FRO_amountSend']);
$FRO_monthSend = htmlspecialchars($_POST['FRO_monthSend']);
$FRO_encodedSend = htmlspecialchars($_POST['FRO_encodedSend']);
$FRO_yearSend = htmlspecialchars($_POST['FRO_yearSend']);

if (isset($FRO_nameSend) && isset($FRO_dateSend) && isset($FRO_purposeSend) && isset($FRO_ORSend) && isset($FRO_amountSend) && isset($FRO_monthSend) && isset($FRO_encodedSend)) {

    $ES_FRO_nameSend = mysqli_real_escape_string($conn, $FRO_nameSend);
    $ES_FRO_dateSend = mysqli_real_escape_string($conn, $FRO_dateSend);
    $ES_FRO_purposeSend = mysqli_real_escape_string($conn, $FRO_purposeSend);
    $ES_FRO_ORSend = mysqli_real_escape_string($conn, $FRO_ORSend);
    $ES_FRO_amountSend = mysqli_real_escape_string($conn, $FRO_amountSend);
    $ES_FRO_monthSend = mysqli_real_escape_string($conn, $FRO_monthSend);
    $ES_FRO_yearSend = mysqli_real_escape_string($conn, $FRO_yearSend);
    $ES_FRO_encodedSend = mysqli_real_escape_string($conn, $FRO_encodedSend);
    
    $sql1 = "INSERT into financial_record (cname,date_set,purpose,or_number,images,amount,month_date,year_date,encoded_by) values ('$ES_FRO_nameSend', '$ES_FRO_dateSend', '$ES_FRO_purposeSend','$ES_FRO_ORSend', 'NP','$ES_FRO_amountSend', '$ES_FRO_monthSend','$ES_FRO_yearSend','$ES_FRO_encodedSend')";
    
    $result1 = mysqli_query($conn, $sql1);

    if ($result) {
        # keep it blank ajax will do the success message
    }
    else {
        die(mysqli_error($conn));
    }

}

?>