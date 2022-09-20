<!DOCTYPE html>
<html lang="en">
<style>
  /* Change disabled Button color  */
  #addUser:disabled {
    background-color: black;
    opacity: 0.2;
  }
</style>
<?php
	include '../head.php';
	include '../session.php';
	include '../connect.php';

	if ($user_type == "user") {
		header('location: ../dashboard/');
	}

	$sql = "SELECT * FROM users WHERE type='user'"; // select all the data in DB
	$result = mysqli_query($conn, $sql); // query to get the data
?>
<body>
  <!-- start of add rent modal -->
  <div class="modal fade " id="AddUserDetails">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="name">Name:</label> <label for="" id="lblA_name" class="text-danger"></label>
                <input type="text" name="name" id="A_name" onInput="checkValidationUsers()" class="form-control" autocomplete="off">
              </div>
              <div class="form-group col-md-6">
                <label for="dob">Username:</label> <label for="" id="lblUsername" class="text-danger"></label>
                <span id="check-username"></span>
                <input type="text" style="text-transform: lowercase;" name="username" onInput="checkValidationUsers()" id="Uname" class="form-control" autocomplete="off">
              </div>
              <div class="form-group col-md-6">
                <label for="dob">Password:</label>
                <label for="" id="lblpwd" class="text-danger"></label>
                <input type="password" name="pwd" id="Upass" onInput="checkValidationUsers()" class="form-control">
                <label for="" id="lblpassnote" class="text-muted mt-2"></label>
              </div>
              <div class="form-group col-md-6">
                <label for="dob">Repeat-Password:</label> <label for="" id="lblpwd2" class="text-danger"></label>
                <input type="password" name="pwd2" id="Upass2" onInput="checkValidationUsers()" class="form-control">
                <label for="" id="lblpassnote2" class="text-muted mt-2"></label>
              </div>
              <div class="form-group mb-3 col-md-6">
                <div class="form-group-prepend">
                  <div class="form-group-text">
                    <input type="checkbox" name="showPassUser" id="showPassUser">
                    <span class="text-dark ml-3">Show Password</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">




              <button type="submit" id="addUser" class="btn btn-primary btn-rounded" disabled>Save</button>

              <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>

            </div>

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

  <div class="modal fade" id="VViewUser">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">View User</h4>
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
                <label for="U_OR">Username:</label>
                <h4 class="font-weight-bold" id="view_uname"></h4>
              </div>

              <div class="form-group col-md-12">
                <label for="U_OR">Password:</label>
                <h4 class="font-weight-bold" id="view_pass"></h4>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Close</button>

              <input type="hidden" id="hiddenUserData">

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

  <div class="modal fade" id="UpdateUsers">

    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="card-body">
            <div class="row">

              <div class="form-group col-md-6">
                <label for="name">Name:</label> <label for="" id="lblUpdateName" class="text-danger"></label>
                <input type="text" name="name" id="UpName" class="form-control" autocomplete="off">


              </div>
              <div class="form-group col-md-6">
                <label for="dob">Username:</label> <label for="" id="lblxUser" class="text-danger"></label>
                <input type="text" style="text-transform: lowercase;" name="username" id="UpUser" class="form-control" autocomplete="off">
              </div>
              <div class="form-group col-md-6">
                <label for="dob">Password:</label>
                <label for="" id="lblUpwd" class="text-danger"></label>

                <input type="password" name="pwd" id="UPass1" class="form-control">
              </div>

              <div class="form-group col-md-6">
                <label for="dob">Repeat-Password:</label> <label for="" id="lblUpwd2" class="text-danger"></label>
                <input type="password" name="pwd2" id="UPass2" class="form-control">

              </div>

              <!-- <div class="form-check ml-3 mb-4">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="UPshowPassUser" id="UPshowPassUser" value="">
                  Show Password
                </label>
              </div> -->

              <div class="form-group mb-3 col-md-6">
                <div class="form-group-prepend">
                  <div class="form-group-text">
                    <input type="checkbox" name="UPshowPassUser" id="UPshowPassUser">
                    <span class="text-dark ml-3">Show Password</span>
                  </div>
                </div>
                
              </div>

            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-primary btn-rounded" id="UpdateUserData">Update</button>

              <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>

              <input type="hidden" id="hiddenUserData">

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

  </div>


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
                            <td><?php echo '********'; ?></td>
                            <!-- <td><?php echo $row['username']; ?></td> -->
                            <td><?php echo '********'; ?></td>
                            <!-- <td><?php echo $row['password']; ?></td> -->


                            <td>
                              <a href="#" data-toggle="tooltip" title="Edit">
                                <button class="btn btn-outline-primary btn-sm btn-rounded" data-toggle="modal" data-target="#UpdateUsers" onclick="GetUser(<?php echo $id; ?>)"><i class="ti-pencil-alt btn-icon-prepend"></i></button>
                              </a>
                              <a href="#" data-toggle="tooltip" title="Remove">
                                <button type="button" class="btn btn-outline-danger btn-sm btn-rounded" onclick="DeleteUser(<?php echo $id; ?>)"><i class="ti-trash btn-icon-prepend"></i></button>
                              </a>
                              <a href="#" data-toggle="tooltip" title="View">
                                <button type="button" class="btn btn-outline-dark btn-sm btn-rounded" data-toggle="modal" data-target="#VViewUser" onclick="ViewUser(<?php echo $id; ?>)"><i class="ti-info btn-icon-prepend"></i></button>
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