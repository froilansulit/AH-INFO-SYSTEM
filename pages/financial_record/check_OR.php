<?php
include '../connect.php';

if(!empty($_POST["OR_number_verify"])) {
    // $id = $_POST["OR_number_verify"];
    // echo "
    // <script>
    // alert($id);
    // </script>
    // ";
    
  $OR_ID =  $_POST["OR_number_verify"];
  $query = "SELECT * FROM financial_record WHERE or_number='" . $OR_ID . "'";
  $result = mysqli_query($conn,$query);
  $count = mysqli_num_rows($result);
  if($count > 0) {
    echo "<span style='color:green' id='OR_msg'> * <b>OR NUMBER verified successfully.</b></span>";
    echo "<script>$('#Add_OR_image').prop('disabled',false);</script>";
  }else{
    echo "<span style='color:red' id='OR_msg'> * <b> OR NUMBER is not found. </b></span>";
    echo "<script>$('#Add_OR_image').prop('disabled',true);</script>";

    
    // echo "<script>$('#addUser').prop('disabled',false);</script>";
  }
} 

//   for drydock image preview

if (isset($_POST['userID'])) {
  $id = $_POST['userID'];
  // echo $id;

  
  $sql = "select * from financial_record where id='$id'"; // select all the data in DB

  $result = mysqli_query($conn, $sql); // query to get the data

  while ($row = mysqli_fetch_assoc($result)) {

    ?>
    <img src="upload/<?php echo $row['images']; ?>" class="img-fluid" alt="">
    <?php
  }

}





?>