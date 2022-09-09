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

        $name = htmlspecialchars($_POST['name']);
        $dateofRent = date('Y-m-d', strtotime($_POST['dateofRent']));
        $dateofReturn = date('Y-m-d', strtotime($_POST['dateofReturn']));

        if (empty($name)) {
        echo "<script>    
            alert('Name is required !');
            window.location.href = '../tugboat_renting/';
        </script>";
        } 
        
        else {
        
            $escape_name = mysqli_real_escape_string($conn, $name);
            $month = date('F');
            $year = date('Y');

            $sql = "insert into tugboat_record (name,dateofRent,dateofReturn,month,year) values ('$escape_name','$dateofRent','$dateofReturn','$month','$year')";
            $result = mysqli_query($conn, $sql);

            if ($result) {

                $_SESSION['status'] = "Successfully Added!";
                echo "
                <script>
                    setTimeout (() => {
                    location.href = '../tugboat_renting/';
                    }, 3000);
                </script>
                ";
            } 
            else {
                die(mysqli_error($conn));
            }
        }
    }
    }
    $sql = "select * from tugboat_record"; // select all the data in DB
    $result = mysqli_query($conn, $sql); // query to get the data
?>
<body>
  <!-- start of add rent modal -->
  <div class="modal fade" id="AddRentBoat">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Rent</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- <form method="post"> -->
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="card-body">
              <div class="row">

                <div class="form-group col-md-12">
                  <label for="name">Name:</label>
                  <input type="text" name="name" class="form-control" autocomplete="off" required>

                </div>
                <div class="form-group col-md-6">
                  <label for="dob">Date of Rent</label>
                  <input type="date" name="dateofRent" min="<?php echo $PDT; ?>" max="<?php echo $FDT; ?>" class="form-control" value="<?php echo $CDT ?>" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="dob">Date of Return</label>
                  <input type="date" name="dateofReturn" min="<?php echo $PDT; ?>" max="<?php echo $FDT; ?>" class="form-control" value="" required>
                </div>


              </div>



              <button type="submit" name="save_date" class="btn btn-primary btn-rounded">Save</button>

              <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
            </div>
            <!-- /.card-body -->
          </form>
          <!-- </form> -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <!-- end of rent modal  -->

  <!-- start of view modal  -->

  <div class="modal fade" id="ViewRent">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">View Rent Record</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="card-body">
            <div class="row">

              <div class="form-group col-md-12">
                <label for="U_name">Name:</label>
                <h4 class="font-weight-bold" id="view_Name"></h4>
              </div>

              <div class="form-group col-md-12">
                <label for="U_OR">Date of Rent:</label>
                <h4 class="font-weight-bold" id="view_DOR1"></h4>
              </div>

              <div class="form-group col-md-12">
                <label for="U_OR">Date of Return:</label>
                <h4 class="font-weight-bold" id="view_DOR2"></h4>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Close</button>

              <input type="hidden" id="hiddenViewData">

            </div>
            <!-- <button type="button" class="btn btn-primary btn-rounded" id="Up_Financial">Update</button> -->

            <!-- <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button> -->
          </div>
          <!-- /.card-body -->

          <!-- </form> -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

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
                  <button type="button" class="btn btn-primary btn-icon-text btn-rounded btn-md" data-toggle="modal" data-target="#AddRentBoat">
                    <i class="ti-plus btn-icon-prepend"></i>Rent Boat
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
                  <p class="card-title text-md-center text-xl-left">Tugboat Renting</p>
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

                    <table id="example1" class="table table-hover" style="width:100%">
                      <thead style="font-size:10px" class="text-center">
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Date of Rent</th>
                          <th>Date of Return</th>
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
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['dateofRent']; ?></td>
                            <td><?php echo $row['dateofReturn']; ?></td>

                            <form action="update.php?unixcode=<?php echo $id; ?>" method="post">
                            <td>
                              <a href="#" data-toggle="tooltip" title="Edit">
                                  <button type="submit" class="btn btn-outline-primary btn-sm btn-rounded"><i class="ti-pencil-alt btn-icon-prepend"></i></button>
                                </a>
                              <!-- <a href="#" data-toggle="tooltip" title="Edit">
                                <button onclick="Getdata(<?php echo $id; ?>)" class="btn btn-outline-primary btn-sm btn-rounded"><i class="ti-pencil-alt btn-icon-prepend"></i></button>
                              </a> -->
                              <input type="hidden" name="rentID" value="<?php echo $id; ?>">
                              </form>
                              </a>
                              <a href="#" data-toggle="tooltip" title="Remove">
                                <button type="button" class="btn btn-outline-danger btn-sm btn-rounded" onclick="DeleteRent(<?php echo $id; ?>)"><i class="ti-trash btn-icon-prepend"></i></button>
                              </a>
                              <a href="#" data-toggle="tooltip" title="View">
                                <button type="button" class="btn btn-outline-dark btn-sm btn-rounded" onclick="ViewRent(<?php echo $id; ?>)"><i class="ti-info btn-icon-prepend"></i></button>
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