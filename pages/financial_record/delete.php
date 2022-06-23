<?php 

include '../connect.php';

if(isset($_POST['deleteSend'])) {
    $unique = mysqli_real_escape_string($conn, $_POST['deleteSend']);

    $sql = "select * from financial_record where id='$unique'";
    $result_sql = mysqli_query($conn, $sql);

 

    while ($row = mysqli_fetch_assoc($result_sql)) {
  
        // echo $row['images'];
        if ($img_path = "upload/" . $row['images']) {
            $sql2 = "delete from financial_record where id=$unique";
            $result = mysqli_query($conn, $sql2);
  
            if ($result) {
                unlink($img_path);
                # keep it blank ajax will do the success message
            } else {
                die(mysqli_error($conn));
            }
        }
    }
}

?>