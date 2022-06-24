<!DOCTYPE html>
<html lang="en">

<?php
include '../head.php';
include '../session.php';
include '../connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['Add_OR_image'])) {

    $OR_Number = $_POST['OR_number_verify'];
    $image = $_FILES["or_image"]['name'];

    if (empty($OR_Number)) {

      $_SESSION['error'] = "All fields are required !";
    } else {

      $OR_query = "select * from financial_record where or_number='$OR_Number'";
      $OR_query_run = mysqli_query($conn, $OR_query);

      while ($row = mysqli_fetch_assoc($OR_query_run)) {

        $escape_cname = mysqli_real_escape_string($conn, $row['cname']);
        $escape_dateSet = mysqli_real_escape_string($conn, $row['date_set']);
        $escape_purpose = mysqli_real_escape_string($conn, $row['purpose']);

        $escape_amount = mysqli_real_escape_string($conn, $row['amount']);
        $escape_mdate = mysqli_real_escape_string($conn, $row['month_date']);
        $escape_ydate = mysqli_real_escape_string($conn, $row['year_date']);
        $escape_encoded = mysqli_real_escape_string($conn, $row['encoded_by']);



        if ($image == NULL) {
          // update with existing image
          $image_data = $row['images'];
        } else {
          # update with new image and delete the old
          if (file_exists("upload/" . $_FILES["or_image"]['name'])) {

            $store =  $_FILES["or_image"]['name'];
            $_SESSION['error'] = "Image already exist. <b>$store</b>, Try Another Image ";
            header('location: ../financial_record/');
            mysqli_close($conn);
          } else {
            if ($row['images'] == "NP") {
              if ($img_path = "upload/" . $row['images']) {

                // unlink($img_path);

                $image_data = $_FILES["or_image"]['name'];
              }
            } else {
              if ($img_path = "upload/" . $row['images']) {

                unlink($img_path);

                $image_data = $_FILES["or_image"]['name'];
              }
            }
          }
        }
      }



      $escape_OR = mysqli_real_escape_string($conn, $OR_Number);


      $sql = "update financial_record set cname='$escape_cname',date_set='$escape_dateSet', purpose='$escape_purpose', or_number='$escape_OR', images='$image_data' ,amount='$escape_amount', month_date='$escape_mdate', year_date='$escape_ydate',encoded_by='$escape_encoded' where or_number='$escape_OR'";
      $result = mysqli_query($conn, $sql);

      if ($result) {

        if ($image == NULL) {
          // update with existing image
          $_SESSION['status'] = "Updated Successfully with current data !";
          echo "
          <script>
          
          setTimeout (() => {
            location.href = '../financial_record/';
          }, 3000);
          </script>
          ";
        } else {
          # update with new image and delete the old
          move_uploaded_file($_FILES["or_image"]['tmp_name'], "upload/" . $_FILES["or_image"]['name']);
          $_SESSION['status'] = "Updated Successfully !";
          echo "
          <script>
          
          setTimeout (() => {
            location.href = '../financial_record/';
          }, 3000);
        
          </script>
          ";
        }
      }
    }
  }
}

$month_now = date('F');
$year_now = date('Y');
$inc_rec = 0;
$out_rec = 0;


$sql = "select * from financial_record where purpose='Incoming'"; // select all the data in DB

$result = mysqli_query($conn, $sql); // query to get the data

while ($row = mysqli_fetch_assoc($result)) {
  $inc_rec += $row['amount'];
}

$sql = "select * from financial_record where purpose='Outgoing'"; // select all the data in DB

$result = mysqli_query($conn, $sql); // query to get the data

while ($row = mysqli_fetch_assoc($result)) {
  $out_rec += $row['amount'];
}

$total = $inc_rec - $out_rec;


$sql = "select * from financial_record"; // select all the data in DB

$result = mysqli_query($conn, $sql); // query to get the data

// while($row=mysqli_fetch_assoc($result)) {
//   if ($id == $row['id']) {

//     $_SESSION['amount'] = $row['amount'];
//     $money = $_SESSION['amount'];

//     $total = $money + 500;
//     $dstotal = "P " .$total;

//   }
// }



?>

<!-- for session -->

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
          <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Financial</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo '₱ ' . number_format($total); ?></h3>
                    
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"></span></p>
                </div>
              </div>
            </div>
              <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total of Incoming</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo '₱ ' . number_format($inc_rec); ?></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"></span></p>
                </div>
              </div>
            </div>
              <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total of Outgoing</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo '₱ ' . number_format($out_rec); ?></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"></span></p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Financial Record <span class="text-danger">(All)</span></p>
                  <div class="dropdown">
                  <a class="btn btn-primary btn-sm float-right dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                    Display
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="../financial_record/">Home</a>
                    <a class="dropdown-item" href="year_details.php">This Year</a>
                    <a class="dropdown-item" href="custom_details.php">Custom</a>
                    <!-- <a class="dropdown-item" href="#">All</a> -->
                  </div>
                </div>
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    
                    <?php
                    if (isset($_SESSION['status'])) {
                    ?>
                      <div class="alert alert-success border border-muted alert-dismissible fade show" role="alert">
                        <!-- <strong>Holy guacamole!</strong> -->
                        <?php echo $_SESSION['status']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                    <?php
                      unset($_SESSION['status']);
                    }


                    ?>

                    <?php
                    if (isset($_SESSION['error'])) {
                    ?>
                      <div class="alert alert-danger border border-muted alert-dismissible fade show" role="alert">
                        <!-- <strong>Holy guacamole!</strong> -->
                        <?php echo $_SESSION['error']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                    <?php
                      unset($_SESSION['error']);
                    }


                    ?>



                    <table id="example1" class="table table-hover" style="width:100%">
                      <thead style="font-size:10px" class="text-center">
                        <tr>
                          <th>ID</th>
                          <th>Remarks</th>
                          <th>Date</th>
                          <th>Purpose</th>
                          <th>OR Number</th>
                          <th>Image</th>
                          <th>Amount</th>
                          <th>Encoded by</th>
                          <th>Operation</th>

                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <tr>
                          <?php
                          $number = 1;
                          while ($row = mysqli_fetch_assoc($result)) {

                            $id = $row['id'];
                          ?>

                            <td><b><?php echo $number; ?></b></td>
                            <td><?php echo $row['cname']; ?></td>
                            <td><?php echo $row['date_set']; ?></td>

                            <td><span class=" <?php if ($row['purpose'] == "Outgoing") {
                                                echo 'badge badge-pill badge-danger';
                                              } else {
                                                echo 'badge badge-pill badge-primary';
                                              } ?>"><?php echo $row['purpose']; ?></span></td>
                            <td><?php echo $row['or_number']; ?></td>
                           
                            <td>
                              <?php if ($row['images'] == "NP") {
                                ?>
                                  <button type="button" class="btn btn-danger btn-icon-text btn-rounded btn-sm" data-toggle="modal" data-target="#Add_OR_Image" onclick="GetORNUMBER(<?php echo $id; ?>)">
                                Add Image
                              </button>

                              
                                <?php
                                
                              } 
                              else {
                                ?>
                                  
                                   <button id="viewOR_image" class="btn btn-sm btn-rounded btn-dark" data-id="<?php echo $id ?>">View</button>
                                <?php
                                
                              }
                              ?>
                               
                              
                            </td>

                            <td><?php echo '₱ ' . number_format($row['amount']); ?></td>

                            <td><?php echo $row['encoded_by']; ?></td>

                            <td>

                              <a href="#" data-toggle="tooltip" title="Edit">
                                <button class="btn btn-outline-primary btn-sm btn-rounded" data-toggle="modal" data-target="#UpdateFinancial" onclick="GetData(<?php echo $id; ?>)"><i class="ti-pencil-alt btn-icon-prepend"></i></button>
                              </a>
                              <a href="#" data-toggle="tooltip" title="Remove">
                                <button type="button" class="btn btn-outline-danger btn-sm btn-rounded" onclick="DeleteRecord(<?php echo $id; ?>)"><i class="ti-trash btn-icon-prepend"></i></button>
                              </a>
                              <a href="#" data-toggle="tooltip" title="View">
                                <button type="button" class="btn btn-outline-dark btn-sm btn-rounded" data-toggle="modal" data-target="#ViewFinancial" onclick="ViewData(<?php echo $id; ?>)"><i class="ti-info btn-icon-prepend"></i></button>
                              </a>
                            </td>


                        </tr>

                      <?php
                            $number++;
                          }

                      ?>


                      </tbody>


                    </table>

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