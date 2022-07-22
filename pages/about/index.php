<!DOCTYPE html>
<html lang="en">
<style>
.company_name{ font-size: 1.5rem; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; }
.icon { font-size: 1.7rem; }
</style>
<?php 
include '../session.php';
include '../head.php'; ?>
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
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">About</p>
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                   <div class="text-center my-5">
                      <span class="company_name alert-dark p-4  rounded-pill">A.H Araullo & Sons Rizal Slipways Inc.</span>
                      <p>Shipyard in Navotas</p>
                   </div>
                <div class="row">
                <div class="align-self-center mt-5">
                    <p class="lead mb-3">
                    <i class="ti-location-pin icon"></i>
                      <span class="lead">940 M Naval St. San Jose Navotas City</span>
                    </p>
                    <p class="lead mb-3">
                    <i class="ti-mobile icon"></i>
                      <span class="lead">282 8940</span>
                    </p>
                    <p class="lead mb-3">
                    <i class="ti-anchor icon"></i>
                      <span class="lead">Services - Drydocking</span>
                    </p>
                </div>
                </div>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Map</p>
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                      <img src="../../images/AH_Map.jpg" class="img-fluid" alt="" srcset="">
                  </div>  
                </div>
              </div>
            </div>
          </div>
        </div>
          <?php //require '../modals.php'; ?>
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
<?php //include '../scripts.php'; ?>
</body>
</html>