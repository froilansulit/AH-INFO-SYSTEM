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
    if (isset($_POST['save_drydock'])) {

      $company_name = htmlspecialchars($_POST['company_name']);
      $ship_name = htmlspecialchars($_POST['ship_name']);
      $lot_number = htmlspecialchars($_POST['lot_number']);
      $dryDDate = date('Y-m-d', strtotime($_POST['dryDDate']));
      $Exp_Depar = date('Y-m-d', strtotime($_POST['Exp_Depar']));
      $image = $_FILES["drydock_image"]['name'];

      $validate_img_extension =
          $_FILES["drydock_image"]['type'] == "image/jpg" ||
          $_FILES["drydock_image"]['type'] == "image/png" ||
          $_FILES["drydock_image"]['type'] == "image/jpeg";
      
      if($validate_img_extension){

        if (empty($company_name)) {
        
          $_SESSION['error'] = "All fields are required !";
          echo "
            <script>
          
            setTimeout (() => {
              window.location.href = '../drydock/';
            }, 3000);
          
            </script>
            ";
          
        }
        else if(file_exists("upload/" . $_FILES["drydock_image"]['name'])){
          $_SESSION['error'] = "Image already exist !";
          echo "
            <script>
              setTimeout (() => {
                window.location.href = '../drydock/';
              }, 3000);
            </script>
            ";
        }
        else if(empty($ship_name)){
          $_SESSION['error'] = "All fields are required !";
          echo "
            <script>
              setTimeout (() => {
                window.location.href = '../drydock/';
              }, 3000);
            </script>
            ";
        }
        else if(empty($lot_number)){
          $_SESSION['error'] = "All fields are required !";
          echo "
            <script>
              setTimeout (() => {
                window.location.href = '../drydock/';
              }, 3000);
            </script>
            ";
        } 
        else {
          $escape_cname = mysqli_real_escape_string($conn, $company_name);
          $escape_shipname = mysqli_real_escape_string($conn, $ship_name);
          $escape_lotnum = mysqli_real_escape_string($conn, $lot_number);
          
          $month = date('F');
          $year = date('Y');
  
          $sql = "insert into drydock_record (Company_Name,Ship_Name,Lot_Num,Drydock_date,Exp_Departure,images,month,year) values ('$escape_cname','$escape_shipname','$escape_lotnum','$dryDDate','$Exp_Depar','$image','$month','$year')";
          $result = mysqli_query($conn, $sql);
    
          if ($result) {
            move_uploaded_file($_FILES["drydock_image"]['tmp_name'], "upload/" . $_FILES["drydock_image"]['name']);
            $_SESSION['status'] = "Successfully Added!";
            echo "
            <script>
          
              setTimeout (() => {
                location.href = '../drydock/';
              }, 3000);
          
            </script>
            ";
    
            
          } else {
            $_SESSION['error'] = "Failed to Insert !";
          echo "
            <script>
          
            setTimeout (() => {
              window.location.href = '../drydock/';
            }, 3000);
          
            </script>
            ";
            die(mysqli_error($conn));
          }
        }
      }
      else {
        $_SESSION['error'] = "Only PNG, JPG and JPEG Images are allowed !";
          echo "
            <script>
          
            setTimeout (() => {
              window.location.href = '../drydock/';
            }, 3000);
          
            </script>
            ";
      }
      }
      

      
  }


  $sql = "select * from drydock_record"; // select all the data in DB

  $result = mysqli_query($conn, $sql); // query to get the data

?>

<body>


  <!-- end of view modal  -->

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
                  <button type="button" class="btn btn-primary btn-icon-text btn-rounded btn-md" data-toggle="modal" data-target="#AddDryDock">
                    <i class="ti-plus btn-icon-prepend"></i>Add Dry Dock
                  </button>
                  <!-- <a href="../tugboat_renting/rent_boat.php" class="btn btn-primary btn-icon-text btn-rounded btn-md"><i class="ti-plus btn-icon-prepend"></i>Rent Boat</a> -->
                </div>
                <div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Dry Dock</p>
                  <a href="pdfDownload.php" class="btn btn-dark btn-sm float-right btn-icon-text ml-3" ><i class="ti-printer btn-icon-prepend"></i>Print</a>
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
                          <th>Company Name</th>
                          <th>Ship Name</th>
                          <th>Lot Number</th>
                          <th>Drydock Date</th>
                          <th>Expected Departure</th>
                          <th>Image</th>
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
                            <td><?php echo $row['Company_Name']; ?></td>
                            <td><?php echo $row['Ship_Name']; ?></td>
                            <td><?php echo $row['Lot_Num']; ?></td>
                            <td><?php echo $row['Drydock_date']; ?></td>
                            <td><?php echo $row['Exp_Departure']; ?></td>
                            <!-- <td> <?php echo '<img src="upload/'.$row['images'].'" alt="image"> ' ?></td> -->
                            <td> <button id="view_drydock_image" class="btn btn-sm btn-dark" data-id="<?php echo $id; ?>">View</button></td>
                           

                            <form action="update.php" method="post">
                            <td>

                            <a href="#" data-toggle="tooltip" title="Edit">
                              <input type="hidden" name="update_id" value="<?php echo $id ?>">
                              <button type="submit" name="data_btn" class="btn btn-outline-primary btn-sm btn-rounded"><i class="ti-pencil-alt btn-icon-prepend"></i></button>
                              </a>
                               
                              
                              </form>

                              
                              <a href="#" data-toggle="tooltip" title="Remove">
                                <button type="button" class="btn btn-outline-danger btn-sm btn-rounded" onclick="DeleteDryDock(<?php echo $id; ?>)"><i class="ti-trash btn-icon-prepend"></i></button>
                              </a>
                              <a href="#" data-toggle="tooltip" title="View">
                                <button type="button" class="btn btn-outline-dark btn-sm btn-rounded" onclick="ViewDrydock(<?php echo $id; ?>)"><i class="ti-info btn-icon-prepend"></i></button>
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
  <?php include '../modals.php'; ?>
  <script src="../app.js"></script>

  
  
</body>

</html>