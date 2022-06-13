<?php
include '../connect.php';

if(!empty($_POST["username"])) {
  $query = "SELECT * FROM users WHERE username='" . $_POST["username"] . "'";
  $result = mysqli_query($conn,$query);
  $count = mysqli_num_rows($result);
  if($count > 0) {
    echo "<span style='color:red'> * Sorry username already used.</span>";
    echo "<script>$('#addUser').prop('disabled',true);</script>";
  }else{
    echo "<span style='color:green'> username available for user .</span>";
    // echo "<script>$('#addUser').prop('disabled',false);</script>";
  }
} 


?>