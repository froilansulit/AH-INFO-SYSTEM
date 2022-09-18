<?php 
    include '../connect.php';

    $A_name = htmlspecialchars($_POST['A_name']);
    $Uname = htmlspecialchars($_POST['Uname']);
    $Upass = htmlspecialchars($_POST['Upass']);

    if (isset($A_name) && isset($Uname) && isset($Upass)) {
    
        $ES_A_name = mysqli_real_escape_string($conn, $A_name);
        $ES_Uname = mysqli_real_escape_string($conn, $Uname);
        $ES_Upass = mysqli_real_escape_string($conn, $Upass);

        $sql = "INSERT INTO users (name	,username,password, type) VALUES ('$ES_A_name', '$ES_Uname', '$ES_Upass', 'user')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            # keep it blank ajax will do the success message
        } 
        else {
            die(mysqli_error($conn));
        }
    }
?>