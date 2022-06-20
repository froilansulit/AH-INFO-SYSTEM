  <!-- partial:../../partials/_navbar.html -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" >
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color:#414242;">
        <a class="navbar-brand brand-logo" href="../dashboard/">
          <!-- <span class="brand-text logo-" style="color:#d4d4d4;"><b>Transaction Information</b></span>  -->
          <p style="color:#d4d4d4;font-size:1.2rem;"><b>Transaction Information<br> System</b></p>
          <!-- <span class="brand-text logo-" ></span>  -->
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color:#414242;">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right" >
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
             
              <!-- <span class="ti-settings"></span> -->
              <img src="../../images/setting.png" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item text-muted">
                <?php echo $acc_name; ?>  
              </a>
              <!-- <form method="post"> -->
              <a class="dropdown-item" href="../logout.php">
                <i class="ti-power-off text-danger"></i>
                <button class="btn font-weight-medium auth-form-btn">Logout</button>
              </a>
              <!-- </form> -->
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->