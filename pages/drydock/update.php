<!DOCTYPE html>
<html lang="en">

<?php
include '../head.php';
include '../session.php';
include '../connect.php';

// input type date support date format

$Format = 'Y-m-d';

// this for past setting 

$PD = 14;
$PM = 0;
$PY = 0;

// this is for future setting

$FD = 0;
$FM = 0;
$FY = 1;

$PDT = date($Format, strtotime("-$PD days -$PM months -$PY years"));
$CDT = date($Format);
$FDT = date($Format, strtotime("+$FD days +$FM months +$FY years"));

if (isset($_POST['data_btn'])) {

  $drydock_ID = $_POST['update_id'];
  
  $sql_update = "select * from drydock_record where id=$drydock_ID"; // select all the data in DB
  
  $update_result = mysqli_query($conn, $sql_update); // query to get the data
  $update_row = mysqli_fetch_assoc($update_result);
  
  $Get_Cname = $update_row['Company_Name'];
  $Get_ShipName = $update_row['Ship_Name'];
  $Get_LotNum = $update_row['Lot_Num'];
  
  $Get_DryDate = $update_row['Drydock_date'];
  $Get_ExpDate = $update_row['Exp_Departure'];
  $Get_Image = $update_row['images'];
  
  }

if (empty($drydock_ID)) {

  header('location: ../drydock/');
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
              </div>
            </div>
          </div>
          
            <div class="col-md-12 grid-margin stretch-card mx-auto">
              <div class="card">
                <div class="card-body">

                  <p class="card-title text-md-center text-xl-left">Update Dry Dock</p>
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <input type="hidden" name="update_id" value="<?php echo $drydock_ID; ?>">
                      <div class="form-group col-md-6">
                        <label for="name">Company Name:</label>
                        <input type="text" name="update_company_name" class="form-control" autocomplete="off" value="<?php echo $Get_Cname ?>" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="name">Ship Name:</label>
                        <input type="text" name="update_ship_name" class="form-control" autocomplete="off" value="<?php echo $Get_ShipName ?>" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="name">Lot Number:</label>
                        <input type="num" name="update_lot_number" class="form-control" autocomplete="off" value="<?php echo $Get_LotNum ?>" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="dob">Drydock Date: </label>
                        <input type="date" name="update_dryDDate" min="<?php echo $PDT; ?>" max="<?php echo $FDT; ?>" class="form-control"  value="<?php echo $Get_DryDate ?>" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="dob">Expected Departure: </label>
                        <input type="date" name="update_Exp_Depar" min="<?php echo $PDT; ?>" max="<?php echo $FDT; ?>" class="form-control"  value="<?php echo $Get_ExpDate ?>" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="name">Upload Image:</label>
                        <label for="name" class="text-muted">(Only JPG, PNG, JPEG allowed)</label>
                        <input type="file" name="update_drydock_image" id="update_drydock_image" class="form-control"  value="<?php echo $Get_Image ?>" required>
                      </div>

                  </div>

                  <a href="../drydock/" class="btn btn-default btn-rounded float-right">Cancel</a>
                  
                  <button type="submit" name="update_drydock" class="btn btn-primary btn-rounded float-right mb-3">Save</button>

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