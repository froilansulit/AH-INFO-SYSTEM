<?php

include '../connect.php';

if (isset($_POST['save_faculty'])) {
    $name = $_POST['name'];
    $designation = $_POST['faculty_designation'];
    $description = $_POST['faculty_description'];
    $image = $_FILES["faculty_image"]['name'];

    $validate_img_extension =
        $_FILES["faculty_image"]['type'] == "image/jpg" ||
        $_FILES["faculty_image"]['type'] == "image/png" ||
        $_FILES["faculty_image"]['type'] == "image/jpeg";

    if ($validate_img_extension) {
        # code...
        
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
    } 
    else {
        echo "
        <script>
        alert('Only PNG, JPG and JPEG Images are allowed !');
        window.location.href = '../image_tuts/';
        </script>
        ";
    }
}


if (isset($_POST['update_faculty'])) {
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $designation = $_POST['edit_faculty_designation'];
    $description = $_POST['edit_faculty_description'];
    $image = $_FILES["faculty_image"]['name'];

    $validate_img_extension =
        $_FILES["faculty_image"]['type'] == "image/jpg" ||
        $_FILES["faculty_image"]['type'] == "image/png" ||
        $_FILES["faculty_image"]['type'] == "image/jpeg";

    if ($validate_img_extension) {
        # code...
    
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

        $facul_query = "select * from faculty where id='$id'";
        $facul_query_run = mysqli_query($conn, $facul_query);
    
        while ($row = mysqli_fetch_assoc($facul_query_run)) {
    
            if ($image == NULL) {
                // update with existing image
                $image_data = $row['images'];
            } else {
                # update with new image and delete the old
                if ($img_path = "upload/" . $row['images']) {
                    unlink($img_path);
                    $image_data = $_FILES["faculty_image"]['name'];
                }
            }
        }
    

    $sql = "update faculty set name='$name',designation='$designation', descript='$description' , images='$image_data' where id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {

        if ($image == NULL) {
            // update with existing image
            echo "
            <script>
            window.location.href = '../image_tuts/';
            alert('Updated Successfully with existing image!');
            </script>
            ";
        } else {
            # update with new image and delete the old

            move_uploaded_file($_FILES["faculty_image"]['tmp_name'], "upload/" . $_FILES["faculty_image"]['name']);
            echo "
            <script>
          
            window.location.href = '../image_tuts/';
            alert('Updated Successfully!');
            </script>
            ";
        }
        // $_SESSION['status'] = "Updated Successfully!";

    } else {
        echo "
        <script>
       alert('Failed to Update!');
        window.location.href = '../image_tuts/';
        </script>
        ";
        die(mysqli_error($conn));
    }
}
} 
else {
    echo "
    <script>
    alert('Only PNG, JPG and JPEG Images are allowed !');
    window.location.href = '../image_tuts/';
    </script>
    ";
}
}

// for deleting

if (isset($_POST['deleteSend'])) {
    $unique = mysqli_real_escape_string($conn, $_POST['deleteSend']);

    $facul_query = "select * from faculty where id='$unique'";
    $facul_query_run = mysqli_query($conn, $facul_query);

    while ($row = mysqli_fetch_assoc($facul_query_run)) {

        echo $row['images'];
        if ($img_path = "upload/" . $row['images']) {
            $sql = "delete from faculty where id=$unique";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                unlink($img_path);
                # keep it blank ajax will do the success message
            } else {
                die(mysqli_error($conn));
            }
        }
    }
}
