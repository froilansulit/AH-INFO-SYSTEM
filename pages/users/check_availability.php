<?php
include '../connect.php';

if(!empty($_POST["firstName"])) {
  $query = "SELECT * FROM users WHERE firstname='" . $_POST["firstName"] . "'";
  $result = mysqli_query($connect,$query);
  $count = mysqli_num_rows($result);
  if($count > 0) {
    echo "<span style='color:red'> Sorry User already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  }else{
    echo "<span style='color:green'> User available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}
?>