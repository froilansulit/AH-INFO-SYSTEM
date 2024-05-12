<!DOCTYPE html>
<html lang="en">
<?php
include '../head.php';
include '../session.php';
include '../connect.php';
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
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dob">Date of Rent</label>
                                <input type="date" name="dateofRent" min="<?= $PDT; ?>" max="<?= $FDT; ?>" class="form-control" value="<?= $CDT ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dob">Date of Return</label>
                                <input type="date" name="dateofReturn" min="<?= $PDT; ?>" max="<?= $FDT; ?>" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" name="save_date" class="btn btn-primary btn-rounded">Save</button>
                        <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end of view modal  -->

<div class="container-scroller">
    <?php include '../navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
        <?php include '../sidebar.php'; ?>
        <div class="main-panel">
            <div class="content-wrapper" style="background-color:#bddcff;">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <button type="button" class="btn btn-primary btn-icon-text btn-rounded btn-md" data-toggle="modal" data-target="#AddRentBoat">
                                    <i class="ti-plus btn-icon-prepend"></i>Rent Boat
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
                                <p class="card-title text-md-center text-xl-left">Employee Profile</p>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="alert alert-secondary" role="alert">
                                            David Blame
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?cs=srgb&dl=pexels-pixabay-220453.jpg&fm=jpg" alt="" srcset="" class="img-fluid h-50 w-100">
                                            </div>
                                            <div class="col">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">First</th>
                                                        <th scope="col">Last</th>
                                                        <th scope="col">Handle</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td colspan="2">Larry the Bird</td>
                                                        <td>@twitter</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-4">
                                        <h3>Details</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui possimus, laboriosam, accusantium vitae et eveniet quod quibusdam dolorem, ea illum dolore dicta reprehenderit? Eum ipsum, voluptas doloribus a velit earum!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include '../footer.php'; ?>
        </div>
    </div>
</div>
<?php
include '../scripts.php';
include '../modals.php';
?>
<script src="../app.js"></script>
</body>
</html>