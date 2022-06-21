<!DOCTYPE html>
<html lang="en">

<?php
include '../head.php';
include '../session.php';
include '../connect.php';




?>



<body>

  <!-- start of add rent modal -->


  <div class="modal fade" id="AddImageTuts">
    <!-- <div class="modal-dialog modal-lg"> -->
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- <form method="post"> -->
          <form action="" method="post">
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-12">
                  <label>Name:</label>
                  <input type="text" name="" class="form-control" autocomplete="off" required>  
                </div>

                <div class="form-group col-md-12">
                  <label>Designation:</label>
                  <input type="text" name="" class="form-control" autocomplete="off" required>  
                </div>
                <div class="form-group col-md-12">
                  <label >Description:</label>
                  <input type="text" name="" class="form-control" autocomplete="off" required>  
                </div>

                <div class="form-group col-md-12">
                  <label for="name">Upload Image:</label>
                  <input type="file" name="faculty_image" id="faculty_image" class="form-control" autocomplete="off" required>  
                </div>
              </div>

              <div class="modal-footer">
              <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
              <button type="submit" name="" class="btn btn-primary btn-rounded">Save</button>
              </div>
              
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
                  <button type="button" class="btn btn-primary btn-icon-text btn-rounded btn-md" data-toggle="modal" data-target="#AddImageTuts">
                    <i class="ti-plus btn-icon-prepend"></i>Add New
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
              <div class="card shadow">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Image Upload</p>
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <table id="example1" class="table table-hover" style="width:100%">
                      <thead style="font-size:10px" class="text-center">
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Designation</th>
                          <th>Description</th>
                          <th>Image</th>
                          <th>Operation</th>

                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <tr>
                        
                            <td><b>1</b></td>
                            <td>Froilan Sulit</td>
                            <td>BSCS</td>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>IMAGE</td>
                              <td>
                                <a href="#" data-toggle="tooltip" title="Edit">
                                  <button type="submit" class="btn btn-outline-primary btn-sm btn-rounded"><i class="ti-pencil-alt btn-icon-prepend"></i></button>
                                </a>

                                <input type="hidden" name="rentID" value="<?php echo $id; ?>">
                            </form>

                            </a>
                            <a href="#" data-toggle="tooltip" title="Remove">
                              <button type="button" class="btn btn-outline-danger btn-sm btn-rounded" onclick="DeleteRecord(<?php echo $id; ?>)"><i class="ti-trash btn-icon-prepend"></i></button>
                            </a>
                            <a href="#" data-toggle="tooltip" title="View">
                              <button type="button" class="btn btn-outline-dark btn-sm btn-rounded" data-toggle="modal" data-target="#ViewRent" onclick="ViewData(<?php echo $id; ?>)"><i class="ti-info btn-icon-prepend"></i></button>
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
       
       
        <!-- content-wrapper ends -->
        <?php include '../footer.php'; ?>
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

  <script>

  </script>
  
</body>

</html>