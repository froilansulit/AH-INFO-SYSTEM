<!DOCTYPE html>
<html lang="en">

<?php
include '../head.php';
include '../session.php';
include '../connect.php';



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
                                <!-- <div>
                  <a href="../tugboat_renting/" class="btn btn-danger btn-icon-text btn-rounded btn-md"><i class="ti-angle-double-left btn-icon-prepend"></i>Cancel</a>
                </div> -->
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card mx-auto">
                            <div class="card">

                                <?php

                                if (isset($_POST['edit_data_btn'])) {
                                    $id = $_POST['edit_id'];

                                    $sql = "select * from faculty where id='$id'"; // select all the data in DB

                                    $result = mysqli_query($conn, $sql); // query to get the data

                                    $update_row = mysqli_fetch_assoc($result);
                                    $update_name = $update_row['name'];
                                    $update_designation = $update_row['designation'];
                                    $update_descript = $update_row['descript'];
                                    $update_image = $update_row['images'];
                                }

                                ?>
                                <div class="card-body">
                                    <p class="card-title text-md-center text-xl-left">Update Data</p>
                                    <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                        <form action="code.php" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                                                <div class="form-group col-md-12">
                                                    <label>Name:</label>
                                                    <input type="text" name="edit_name" class="form-control" value="<?php echo $update_name; ?>" autocomplete="off" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Designation:</label>
                                                    <input type="text" name="edit_faculty_designation" class="form-control" autocomplete="off" value="<?php echo $update_designation; ?>" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Description:</label>
                                                    <input type="text" name="edit_faculty_description" class="form-control" autocomplete="off" value="<?php echo $update_descript; ?>" required>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="name">Upload Image:</label>
                                                    <input type="file" name="edit_faculty_image" id="edit_faculty_image" class="form-control" value="<?php echo $update_image; ?>" required>
                                                </div>
                                            </div>
                                       
                                    </div>
                                </div>

                                <div class="card-footer ">

                                    <!-- <button type="button" class="btn btn-default btn-rounded float-right" data-dismiss="modal">Cancel</button> -->
                                    
                                    <button type="submit" name="update_faculty" class="btn btn-primary btn-rounded btn-md float-right ml-3">Save</button>
                                    <a href="../image_tuts/" class="btn btn-danger btn-icon-text btn-rounded btn-md float-right ">Cancel</a>
                                </div>
                                </form>
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