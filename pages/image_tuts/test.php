<!DOCTYPE html>
<html lang="en">

<?php
include '../head.php';
include '../session.php';
include '../connect.php';


// input type date support date format

$Format = 'Y-m-d';

// this for past setting 

$PD = 0;
$PM = 0;
$PY = 0;

// this is for future setting

$FD = 0;
$FM = 0;
$FY = 1;


$PDT = date($Format, strtotime("-$PD days -$PM months -$PY years"));
$CDT = date($Format);
$FDT = date($Format, strtotime("+$FD days +$FM months +$FY years"));



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['save_date'])) {
        
        $name = $_POST['name'];
        $dateofRent = date('Y-m-d', strtotime($_POST['dateofRent']));
        $dateofReturn = date('Y-m-d', strtotime($_POST['dateofReturn']));
        
        if(empty($name)){
            $name_error = "Name is Required ! <br>";
          }
        else {
        $sql = "insert into tugboat_record (name,dateofRent,dateofReturn) values ('$name','$dateofRent','$dateofReturn')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "
            <script>
            alert('Successfully Added!');
            location.href = '../tugboat_renting/';
            </script>
            ";
        }
        else {
            echo "
            <script>
            alert('Record has not inserted!');
            location.href = '../tugboat_renting/';
            </script>
            ";
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
                  <a href="../tugboat_renting/" class="btn btn-danger btn-icon-text btn-rounded btn-md"><i class="ti-angle-double-left btn-icon-prepend"></i>Cancel</a> 
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
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                    <div class="form-group mb-3">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" autocomplete="off" required>

                        <?php if(isset($name_error) && !empty($name_error)) { echo "<p class='alert alert-danger text-center font-weight-bold'>". $name_error ."</p>";} ?>
                        
                    </div>
                    <div class="form-group mb-3">
                        <label for="dob">Date of Rent</label>
                        <input type="date" name="dateofRent" min="<?php echo $PDT; ?>" max="<?php echo $FDT; ?>" class="form-control" value="" required>
                        
                    </div>

                    <div class="form-group mb-3">
                        <label for="dob">Date of Return</label>
                        <input type="date" name="dateofReturn" min="<?php echo $PDT; ?>" max="<?php echo $FDT; ?>" class="form-control" value="" required>

                    </div>

                    <div class="form-group mb-3">
                        <button type="submit" name="save_date" class="btn btn-primary">Save Data</button>
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