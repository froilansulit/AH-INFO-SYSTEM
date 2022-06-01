
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
      <div class="main-panel" >
        <div class="content-wrapper" style="background-color:#bddcff;">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                  <div>
                      <button type="button" class="btn btn-primary btn-icon-text btn-rounded btn-sm" data-toggle="modal" data-target="#add-Unit">
                          <i class="ti-plus btn-icon-prepend"></i>Add Unit
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
                  <p class="card-title text-md-center text-xl-left">Unit</p>
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                      <table id="example1" class="table table-hover" >
                          <thead style="font-size:10px">
                              <tr>
                                  <th>Name</th>
                                  <th>Description</th>
                                  <th>Encoded By</th>
                                  <th>Date Encoded</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  
                                  <td>Data</td>
                                  <td>Data</td>
                                  <td>Data</td>
                                  <td>Data</td>
                                  <td>
                                    <a href="#" data-toggle="tooltip" title="Edit">
                                      <button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="#edit-Unit"><i class="ti-pencil-alt btn-icon-prepend"></i></button>
                                    </a>
                                  </td>
                              </tr>
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

