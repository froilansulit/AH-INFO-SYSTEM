<?php 
include '../head.php';
include '../connect.php';
session_start();
if (isset($_SESSION['username'])) {
  header('location: ../dashboard/');

}

 
if (isset($_POST["lgnLogin"])) {
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);
  // $acc_name = $_POST["acc_name"];

  if(empty($username)){
    $username_error = "Username is Required ! <br>";
    // echo "<script>alert('username is required');</script>";
  }
  else if(empty($password)) {
    $password_error = "Password is Required ! <br>";
  }
  

  else {
    $query = "select * from users WHERE username='$username' AND password='$password'";

    $query_run = mysqli_query($conn, $query);

     if(mysqli_num_rows($query_run) > 0) {
      // valid
      $_SESSION['username'] = $username;

      $sql = "select * from users"; // select all the data in DB

      $result = mysqli_query($conn, $sql); // query to get the data

      while($row=mysqli_fetch_assoc($result)) {
        if ($username == $row['username']) {
          $_SESSION['acc_name'] = $row['name'];
          $_SESSION['user_type'] = $row['type'];
          
        }
      }

      
      header('location: ../dashboard/');
      //header('location: ../financial_record/');

      // header('location: ../product/product.php');
      
      
      // echo "<script>alert('Welcome to my gg');</script>";
  }
  else {
      // invalid
      echo "<script>alert('Invalid Credentials ! ! !');</script>";
      echo "<script>location.href = '../login/';</script>";
      
  }
  }
  }

?>

<!DOCTYPE html>
<html lang="en">

<body>
  <div class="container-scroller" >
    <div class="container-fluid page-body-wrapper full-page-wrapper" >
      <div class="content-wrapper d-flex align-items-center auth px-0" style="background-color:#bddcff;">
        <div class="row w-100 mx-0">
          
          <div class="col-lg-4 mx-auto">
          <form method="post">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <h3 class="text-center mb-3">TRANSACTION INFORMATION SYSTEM</h3>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Username" autofocus value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>">
                  
                  <?php if(isset($username_error) && !empty($username_error)) { echo "<p class='alert alert-danger text-center'>". $username_error ."</p>";} ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>">
                  <?php if(isset($password_error) && !empty($password_error)) { echo "<p class='alert alert-danger text-center'>". $password_error ."</p>";} ?>
                </div>

                <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="showPasslgn" id="showPasslgn" value="">
                  Show Password
                </label>
              </div>

                <div class="mt-3">
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../product/product.php" id="SignInVerify">SIGN IN</a> -->

                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="lgnLogin" type="submit">SIGN IN</button>
                  
                  <?php if(isset($_SESSION['type'])) { echo $_SESSION['type']; }  ?>
                  <br>
                  <p>Note: <span style="color: red;font-weight: bold;">Please check your credentials carefully !</span></p> 
                </div>
                <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div> -->
                <!-- <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="#" class="text-primary">Contact Administrator</a>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    
    <!-- page-body-wrapper ends -->
  </div>

  <!-- this is for the js plugin and scripts -->
  <?php
   include '../scripts.php'; 
  ?>

  <script src="../app.js"></script>

  
</body>

</html>
