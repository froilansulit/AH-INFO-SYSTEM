<?php

include '../connect.php';

if (isset($_POST['save_faculty'])) {
    $name = $_POST['name'];
    $designation = $_POST['faculty_designation'];
    $description = $_POST['faculty_description'];
    $image = $_FILES["faculty_image"]['name'];

    if (file_exists("upload/" . $_FILES["faculty_image"]['name'])) {

        //$store =  $_FILES["faculty_image"]['name'];
        // $name_error = "Name is Required ! <br>";
        // $_SESSION['status'] = "Image already exist. '.$store.'";
        // header('location: ../image_tuts/');

        echo "
            <script>
           alert('Image already exist !');
            window.location.href = '../image_tuts/';
            </script>
            ";
    } else {
        $sql = "INSERT into faculty (name,designation,descript, images) values ('$name', '$designation', '$description', '$image')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            move_uploaded_file($_FILES["faculty_image"]['tmp_name'], "upload/" . $_FILES["faculty_image"]['name']);

            // $success_msg = "Faculty Added ! <br>";
            // $_SESSION['success'] = "Faculty Added";
            // header('location: ../image_tuts/');
            echo "
            <script>
           alert('Successfully Added!');
            window.location.href = '../image_tuts/';
            </script>
            ";
        } else {
            die(mysqli_error($conn));
        }
    }
} else {
    # code...
}
