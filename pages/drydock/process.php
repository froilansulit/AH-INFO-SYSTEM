<?php 
include '../connect.php';

// for deleting

if (isset($_POST['deleteSend'])) {
  $unique = mysqli_real_escape_string($conn, $_POST['deleteSend']);

  $dry_query = "select * from drydock_record where id='$unique'";
  $dry_query_run = mysqli_query($conn, $dry_query);

  while ($row = mysqli_fetch_assoc($dry_query_run)) {

      // echo $row['images'];
      if ($img_path = "upload/" . $row['images']) {
          $sql = "delete from drydock_record where id=$unique";
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

?>