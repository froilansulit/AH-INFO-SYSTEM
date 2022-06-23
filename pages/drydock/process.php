<?php 
include '../connect.php';

if (isset($_POST['userID'])) {
    $id = $_POST['userID'];
    // echo $id;

    
    $sql = "select * from drydock_record where id='$id'"; // select all the data in DB

    $result = mysqli_query($conn, $sql); // query to get the data

    while ($row = mysqli_fetch_assoc($result)) {

      ?>
      <img src="upload/<?php echo $row['images']; ?>" class="img-fluid" alt="">
      <?php
    }

}

?>