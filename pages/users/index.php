<!DOCTYPE html>
<html lang="en">

<?php
include '../head.php';
include '../session.php';
include '../connect.php';



if ($user_type == "user") {
  header('location: ../dashboard/');
}

$sql = "select * from users where type='user'"; // select all the data in DB

$result = mysqli_query($conn, $sql); // query to get the data

?>

<body>

  <!-- start of add rent modal -->


  <div class="modal fade " id="AddUserDetails">
    <!-- <div class="modal-dialog modal-lg"> -->
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
          <!-- <form id="addUserForm"> -->
          <div class="card-body">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="name">Name:</label> <label for="" id="lblA_name" class="text-danger"></label>
                <input type="text" name="name" id="A_name" class="form-control" autocomplete="off">

                <?php if (isset($name_error) && !empty($name_error)) {
                  echo "<p class='alert alert-danger text-center font-weight-bold'>" . $name_error . "</p>";
                } ?>
              </div>
              <div class="form-group col-md-6">
                <label for="dob">Username:</label> <label for="" id="lblUsername" class="text-danger"></label>
                <input type="text" name="username" id="Uname" class="form-control" autocomplete="off">
              </div>
              <div class="form-group col-md-6">
                <label for="dob">Password:</label>  
                <label for="" id="lblpwd" class="text-danger"></label>

                <input type="password" name="pwd" id="Upass" class="form-control">
              </div>

              <div class="form-group col-md-6">
                <label for="dob">Repeat-Password:</label> <label for="" id="lblpwd2" class="text-danger"></label>
                <input type="password" name="pwd2" id="Upass2" class="form-control">
                
              </div>

              <div class="form-check ml-3 mb-4">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="showPassUser" id="showPassUser" value="">
                  Show Password
                </label>
              </div>



            </div>
            <!-- <button type="submit" name="addUser" id="AddVal" class="btn btn-primary btn-rounded">Save</button> -->

            <button type="submit" id="addUser" class="btn btn-primary btn-rounded">Save</button>

            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
          </div>
          <!-- /.card-body -->

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
                  <button type="button" class="btn btn-primary btn-icon-text btn-rounded btn-md" data-toggle="modal" data-target="#AddUserDetails">
                    <i class="ti-plus btn-icon-prepend"></i>Add New User
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
                  <p class="card-title text-md-center text-xl-left">List of Users</p>

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
                          <th>Username</th>
                          <th>Password</th>
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
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['password']; ?></td>

                            <form action="update.php?unixcode=<?php echo $id; ?>" method="post">
                              <td>
                                <a href="#" data-toggle="tooltip" title="Edit">
                                  <button type="submit" class="btn btn-outline-primary btn-sm btn-rounded"><i class="ti-pencil-alt btn-icon-prepend"></i></button>
                                </a>

                                <input type="hidden" name="rentID" value="<?php echo $id; ?>">
                            </form>

                            </a>
                            <a href="#" data-toggle="tooltip" title="Remove">
                              <button type="button" class="btn btn-outline-danger btn-sm btn-rounded" onclick="DeleteUser(<?php echo $id; ?>)"><i class="ti-trash btn-icon-prepend"></i></button>
                            </a>
                            <a href="#" data-toggle="tooltip" title="View">
                              <button type="button" class="btn btn-outline-dark btn-sm btn-rounded" data-toggle="modal" data-target="#ViewRent" onclick="ViewUser(<?php echo $id; ?>)"><i class="ti-info btn-icon-prepend"></i></button>
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