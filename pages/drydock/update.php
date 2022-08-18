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
  $dry_image = $update_row['images'];
}

if (empty($drydock_ID)) {
  header('location: ../drydock/');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['update_drydock'])) {

    $id = $_POST['update_id'];

    $company_name = htmlspecialchars($_POST['update_company_name']);
    $ship_name = htmlspecialchars($_POST['update_ship_name']);
    $lot_number = htmlspecialchars($_POST['update_lot_number']);
    $dryDDate = date('Y-m-d', strtotime($_POST['update_dryDDate']));
    $Exp_Depar = date('Y-m-d', strtotime($_POST['update_Exp_Depar']));
    $image = $_FILES["drydock_image"]['name'];

    // $_SESSION['error'] = $image;
    
    // $validate_img_extension = $_FILES["drydock_image"]['type'] == "image/jpg" || $_FILES["drydock_image"]['type'] == "image/png" || $_FILES["drydock_image"]['type'] == "image/jpeg";

    // if ($validate_img_extension) {
      # code...
       
      if (empty($company_name)) {

        $_SESSION['error'] = "All fields are required !";
      } else if (empty($ship_name)) {
        $_SESSION['error'] = "All fields are required !";
      } else if (empty($lot_number)) {
        $_SESSION['error'] = "All fields are required !";
      }
      
      
      else {

        $drydock_query = "select * from drydock_record where id='$id'";
        $drydock_query_run = mysqli_query($conn, $drydock_query);

        while ($row = mysqli_fetch_assoc($drydock_query_run)) {

          
          if ($image == NULL) {
            // update with existing image
            $image_data = $row['images'];
          } else {
            # update with new image and delete the old
            if (file_exists("upload/" . $_FILES["drydock_image"]['name'])) {

              $store =  $_FILES["drydock_image"]['name'];
              $_SESSION['error'] = "Image already exist. <b>$store</b>, Try Another Image ";
              header('location: ../drydock/');
              mysqli_close($conn);
              
            }
            else{
              if ($img_path = "upload/" . $row['images']) {
                unlink($img_path);
  
                $image_data = $_FILES["drydock_image"]['name'];
  
              }
            }
            
          }
        }

        $escape_cname = mysqli_real_escape_string($conn, $company_name);
        $escape_shipname = mysqli_real_escape_string($conn, $ship_name);
        $escape_lotnum = mysqli_real_escape_string($conn, $lot_number);

        $sql = "update drydock_record set Company_Name='$escape_cname', Ship_Name='$escape_shipname', Lot_Num='$escape_lotnum' , Drydock_date='$dryDDate' , Exp_Departure='$Exp_Depar', images='$image_data' where id='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {

          if ($image == NULL) {
            // update with existing image


            $_SESSION['status'] = "Updated Successfully with existing image !";
          } else {
            # update with new image and delete the old

            move_uploaded_file($_FILES["drydock_image"]['tmp_name'], "upload/" . $_FILES["drydock_image"]['name']);
            $_SESSION['status'] = "Updated Successfully !";
          }
        }     
      }
    // } else {
    //   $_SESSION['error'] = "Only PNG, JPG and JPEG Images are allowed !";
    // }
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
              </div>
            </div>
          </div>

          <div class="col-md-12 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Update Dry Dock</p>
                <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">

                  <form method="post" enctype="multipart/form-data">
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
                        <input type="date" name="update_dryDDate" min="<?php echo $PDT; ?>" max="<?php echo $FDT; ?>" class="form-control" value="<?php echo $Get_DryDate ?>" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="dob">Expected Departure: </label>
                        <input type="date" name="update_Exp_Depar" min="<?php echo $PDT; ?>" max="<?php echo $FDT; ?>" class="form-control" value="<?php echo $Get_ExpDate ?>" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="name">Upload Image:</label>
                        <label for="name" class="text-muted">(Only JPG, PNG, JPEG allowed)</label>
                        <input type="file" name="drydock_image" id="drydock_image" class="form-control" accept="image/png, image/jpg, image/jpeg" value="<?php echo $dry_image; ?>" onchange="validateFileType()">
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
  <script src="../app.js"></script>

</body>

</html>