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
<!DOCTYPE html>
<html lang="en">

<?php include '../head.php'; ?>
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
                      <button type="button" class="btn btn-primary btn-icon-text btn-rounded btn-sm" data-toggle="modal" data-target="#add-Users">
                          <i class="ti-plus btn-icon-prepend"></i>Add User
                      </button> 
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
                  <p class="card-title text-md-center text-xl-left">Users</p>
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <table id="example1" class="table table-hover" style="width:100%">
                      <thead style="font-size:10px" class="text-center">
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Operations</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                      <tr>
                          <?php
                          $number = 1;
                          while ($row = mysqli_fetch_assoc($result)) {

                            $id = $row['id'];
                          ?>
                        <tr>
                          
                            <td><b><?php echo $number; ?></b></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            
                            <td>

                            <a href="#" data-toggle="tooltip" title="Edit">
                              <button class="btn btn-outline-primary btn-sm btn-rounded" data-toggle="modal" data-target="#UpdateFinancial" onclick="GetData(<?php #echo $id; ?>)"><i class="ti-pencil-alt btn-icon-prepend"></i></button>
                            </a>
                              <a href="#" data-toggle="tooltip" title="Remove">
                                <button type="button" class="btn btn-outline-danger btn-sm btn-rounded" onclick="DeleteRecord(<?php #echo $id; ?>)"><i class="ti-trash btn-icon-prepend"></i></button>
                              </a>
                              <a href="#" data-toggle="tooltip" title="View">
                                <button type="button" class="btn btn-outline-dark btn-sm btn-rounded" data-toggle="modal" data-target="#ViewFinancial" onclick="ViewData(<?php #echo $id; ?>)"><i class="ti-eye btn-icon-prepend"></i></button>
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
          <?php include '../modals.php'; ?>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
          <?php include '../footer.php'; ?>
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

