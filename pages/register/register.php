<!DOCTYPE html>
<html lang="en">

<?php include '../head.php'; ?>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <h4>INVENTORY SYSTEM</h4>
              <h6 class="font-weight-light">Please fill out the spaces below.</h6>
              <form class="pt-3">
                  <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="id" placeholder="ID">
                </div>
                  <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="First Name" placeholder="First Name">
                </div>
                  <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="Middle Name" placeholder="Middle Name">
                </div>
                  <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="Last Name" placeholder="Last Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                  <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="User Type" placeholder="User Type">
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../dashboard/dashboard.php">Register</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="../login/login.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
