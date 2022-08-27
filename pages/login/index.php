<?php

    include '../head.php';
    include '../connect.php';
    session_start();

    // this is ternary operator
    (isset($_SESSION['username'])) ? header('location: ../dashboard/') : "";

    // for login function 
    if (isset($_POST["lgnLogin"])) {
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

    if (empty($username)) {
        $username_error = "<b>Username </b> is Required ! <br>";
    }
    if (empty($password)) {
        $password_error = "<b>Password</b> is Required ! <br>";
    } 
    else if (empty($username)) {
        $username_error = "<b>Username </b> is Required ! <br>";
    }
    else if (empty($password)) {
        $password_error = "<b>Password</b> is Required ! <br>";
    } 
    else {
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
            $_SESSION['username'] = $username;

            $sql = "select * from users"; // select all the data in DB
            $result = mysqli_query($conn, $sql); // query to get the data

            while ($row = mysqli_fetch_assoc($result)) {
                if ($username == $row['username']) {
                    $_SESSION['acc_name'] = $row['name'];
                    $_SESSION['user_type'] = $row['type'];
                } 
            }
            echo "<script>  
            loadinglgn();
            setTimeout(() => {
                window.location.href = '../dashboard/';
            }, 4000);
            </script>
            ";
            } 
            else {
            echo "<script>    
            lgnERROR();
            setTimeout(() => {
                window.location.href = '../login/';
            }, 2000);
            </script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<style>
  .icon {
    margin-right: 5px;
    display: none;
  }

  .loading {
    background: #014B94;
    color: #eee;
  }

  .loading .icon {
    display: inline-block;
    color: #eee;
    font-size: 1.5em;
    animation: spin 2s linear infinite;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }

  }

  .slide_in {
    animation: slideMe .5s ease-in;
  }

  @keyframes slideMe {
    0% {
      transform: skewX(53deg) translateX(-500px);
      opacity: 0.1;
    }

    100% {
      transform: skew(0deg);
    }
  }
</style>
🧹 Refracturing Code 👨🏽‍💻
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0" style="background-image: url('../../images/main-bg.png');background-position: center;background-size: cover; background-attachment: fixed;">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <form method="post">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <h3 class="text-center mb-3">Financial Transaction</h3>
                <h6 class="font-weight-light">Sign in to continue.</h6>
<?php if (isset($username_error) && !empty($username_error)) 
{
?> 
                <p class='alert alert-danger slide_in text-center mt-4'><?= $username_error; ?></p>;
<?php
} ?>
<?php if (isset($password_error) && !empty($password_error)) 
{
?>
                <p class='alert alert-danger slide_in text-center mt-4'><?= $password_error; ?></p>";
<?php
} 
?>
                <br>
                <form class="pt-3">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Username" autofocus value="<?php if (isset($_POST['username'])) {
                                                                                                                                                    echo $_POST['username'];
                                                                                                                                                  } ?>">


                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" value="<?php if (isset($_POST['password'])) {
                                                                                                                                              echo $_POST['password'];
                                                                                                                                            } ?>">

                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="showPasslgn" id="showPasslgn" value="">
                      Show Password
                    </label>
                  </div>
                  <div class="mt-5">
                    <button class="btn btn-block btn-primary rounded-pill btn-lg font-weight-medium auth-form-btn" id="lgnLogin" name="lgnLogin" type="submit">SIGN IN</button>
                    <?php if (isset($_SESSION['type'])) {
                      echo $_SESSION['type'];
                    }  ?>
                    <br>
                    <!-- <p>Note: <span style="color: red;font-weight: bold;">Please check your credentials carefully !</span></p> -->
                  </div>

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
  <?php
// for login function 
if (isset($_POST["lgnLogin"])) {
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  if (empty($username)) {
    $username_error = "<b>Username </b> is Required ! <br>";
  }
  if (empty($password)) {
    $password_error = "<b>Password</b> is Required ! <br>";
  } 
  else if (empty($username)) {
    $username_error = "<b>Username </b> is Required ! <br>";
  }
  else if (empty($password)) {
    $password_error = "<b>Password</b> is Required ! <br>";
  } else {
    $query = "select * from users WHERE username='$username' AND password='$password'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
      // valid
      $_SESSION['username'] = $username;

      $sql = "select * from users"; // select all the data in DB

      $result = mysqli_query($conn, $sql); // query to get the data

      while ($row = mysqli_fetch_assoc($result)) {
        if ($username == $row['username']) {
          $_SESSION['acc_name'] = $row['name'];
          $_SESSION['user_type'] = $row['type'];
        } 
      }
      echo "<script>  
      loadinglgn();
       $('#lgnLogin').prop('disabled', true);

      setTimeout(() => {

        window.location.href = '../dashboard/';
      }, 4000);
      
      </script>
    ";
      
      // header('location: ../dashboard/');

      //header('location: ../financial_record/');

      // echo "<script>alert('Welcome to my gg');</script>";

    } else {
      // invalid
      echo "<script>    
      lgnERROR();
      setTimeout(() => {
        window.location.href = '../login/';
      }, 2000);
      </script>";
    }
  }
}
  ?>
</body>

</html>