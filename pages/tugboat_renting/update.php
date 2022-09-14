<!DOCTYPE html>
<html lang="en">

<?php
include '../head.php';
include '../session.php';
include '../connect.php';

// input type date support date format
$Format = 'Y-m-d';

// this for past setting 
$PD = 28;
$PM = 0;
$PY = 0;

// this is for future setting

$FD = 0;
$FM = 0;
$FY = 1;

$PDT = date($Format, strtotime("-$PD days -$PM months -$PY years"));
$CDT = date($Format);
$FDT = date($Format, strtotime("+$FD days +$FM months +$FY years"));

$UpdateID = $_GET['unixcode'];  // for security of the link
$rentID = $_POST['rentID']; // for security of the link

if (empty($rentID)) {
  header('location: ../tugboat_renting/');
}
$sql_update = "select * from tugboat_record where id=$UpdateID"; // select all the data in DB

$update_result = mysqli_query($conn, $sql_update); // query to get the data
$update_row = mysqli_fetch_assoc($update_result);
$name_row = $update_row['name'];
$DOR1_row = $update_row['dateofRent'];
$DOR2_row = $update_row['dateofReturn'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['update_rent'])) {

    $Uname = htmlspecialchars($_POST['Uname']);
    $UdateofRent = date('Y-m-d', strtotime($_POST['UdateofRent']));
    $UdateofReturn = date('Y-m-d', strtotime($_POST['UdateofReturn']));

    if (empty($Uname)) {
      $name_error = "Name is Required ! <br>";
    } else {

      $escape_Uname = mysqli_real_escape_string($conn, $Uname);

      $sql = "update tugboat_record set name='$escape_Uname',dateofRent='$UdateofRent', dateofReturn='$UdateofReturn' where id='$UpdateID'";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        $_SESSION['status'] = "Updated Successfully!";
        
      } else {
        die(mysqli_error($conn));
      }
    }
  }
}

?>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include '../navbar.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include '../sidebar.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper" style="background-color:#bddcff;">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                </div>
                <div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card mx-auto">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Update Data</p>
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <form method="post">
                      <div class="form-group mb-3">
                        <label for="name">Name:</label>
                        <input type="text" name="Uname" class="form-control" autocomplete="off" value="<?php echo $name_row; ?>" required>
                        <?php if (isset($name_error) && !empty($name_error)) {
                          echo "<p class='alert alert-danger text-center font-weight-bold'>" . $name_error . "</p>";
                        } ?>
                      </div>
                      <div class="form-group mb-3">
                        <label for="dob">Date of Rent</label>
                        <input type="date" name="UdateofRent" min="<?php echo $PDT; ?>" max="<?php echo $FDT; ?>" class="form-control" value="<?php echo $DOR1_row ?>" required>
                      </div>
                      <div class="form-group mb-3">
                        <label for="dob">Date of Return</label>
                        <input type="date" name="UdateofReturn" min="<?php echo $PDT; ?>" max="<?php echo $FDT; ?>" class="form-control" value="<?php echo $DOR2_row ?>" required>
                      </div>
                      <div class="form-group mb-3 float-right">
                        <button type="submit" name="update_rent" class="btn btn-primary">Save Data</button>
                        <a href="../tugboat_renting/" class="btn btn-danger btn-icon-text  btn-md">Cancel</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include '../footer.php'; ?>
        <?php include '../modals.php'; ?>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php include '../scripts.php'; ?>
</body>

</html>