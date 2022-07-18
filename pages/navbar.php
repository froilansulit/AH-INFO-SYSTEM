<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" >
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color:#414242;">
        <a class="navbar-brand brand-logo" href="../dashboard/">
          <p style="color:#d4d4d4;font-size:1.2rem;"><i class="ti-money menu-icon"></i><b>Financial Transaction</b></p>
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color:#414242;">
        <ul class="navbar-nav navbar-nav-right" >
          <li class="nav-item">
          <a class="nav-link bg-muted  text-dark mb-3">
                      <span class="menu-title text-capitalize font-weight-bold"><?php echo $acc_name; ?></span><span class="badge badge-pill badge- text-capitalize float-right ml-1"><?php echo $user_type; ?></span>
                  </a>
          </li>
           <li class="nav-item nav-profile dropdown">
           <a href="../logout.php">
                <button class="btn btn-danger font-weight-medium text-light ">Logout</button>
              </a>
          </li> 
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>