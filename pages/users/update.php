<?php
    include '../connect.php';

    if (isset($_POST['hiddenUserData'])) {

        $ES_unique_ID =  htmlspecialchars($_POST['hiddenUserData']);
        $ES_U_name =  htmlspecialchars($_POST['UpName']);
        $ES_UserName =  htmlspecialchars($_POST['NewUname']);
        $ES_UPass =  htmlspecialchars($_POST['UPass1']);
        
        if (isset($_POST['hiddenUserData'])) {

            $unique_ID = mysqli_real_escape_string($conn, $ES_unique_ID);
            $U_name = mysqli_real_escape_string($conn, $ES_U_name);
            $U_USer = mysqli_real_escape_string($conn, $ES_UserName);
            $U_Pwd = mysqli_real_escape_string($conn, $ES_UPass);
        
            $sql = "UPDATE users SET name='$U_name',username='$U_USer', password='$U_Pwd', type='user' WHERE id='$unique_ID'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                # keep it blank ajax will do the success message
            } 
            else {
                die(mysqli_error($conn));
            }
        }
    }
?>