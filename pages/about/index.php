<!DOCTYPE html>
<html lang="en">
	<style>
		.company_name{ 
			font-size: 1.5rem; 
			font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
		}
		.icon { font-size: 1.7rem; }
		.mapouter{position:relative;
			text-align:right;
			height:500px;
			width:600px;
		}
		.gmap_canvas {
			overflow:hidden;
			background:none!important;
			height:500px;
			width:600px;
		}
	</style>
<?php 
	include '../session.php';
	include '../head.php'; 
?>
<body>

   <div class="container-scroller">
<?php include '../navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
<?php include '../sidebar.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper" style="background: rgb(9,41,66);
background: linear-gradient(61deg, rgba(9,41,66,1) 23%, rgba(118,168,208,1) 92%);">
          <div class="row">
            <!-- <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
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
            </div> -->
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Map of AH Araullo Shipment</p>
                  <div class="text-center">
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=A.H%20Araullo%20&%20Sons%20Rizal%20Slipways%20Inc&t=k&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2piratebay.org"></a><br><a href="https://www.embedgooglemap.net"></a></div></div>
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
</body>
</html>