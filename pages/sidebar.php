      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:#bddcff;">
          <ul class="nav">
              <li class="nav-item">
                  <a class="nav-link" href="../dashboard/">
                      <i class="ti-shield menu-icon"></i>
                      <span class="menu-title">Dashboard</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../financial_record/">
                      <i class="ti-money menu-icon"></i>
                      <span class="menu-title">Financial Record</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../Montly_Tally/">
                      <i class="ti-bar-chart menu-icon"></i>

                      <span class="menu-title">Monthly Tally</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../tugboat_renting/">
                      <i class="ti-flag-alt-2 menu-icon"></i>
                      <span class="menu-title">Tugboat Renting</span>
                  </a>
              </li>
         
              <li class="nav-item">
                  <a class="nav-link" href="../drydock">
                      <i class="ti-bookmark-alt menu-icon"></i>
                      <span class="menu-title">Dry Dock</span>
                  </a>
              </li>
              <?php if ($user_type == "admin") {
                  echo '<li class="nav-item">
                  <a class="nav-link" href="../users/">
                      <i class="ti-user menu-icon"></i>
                      <span class="menu-title">Users</span>
                  </a>
              </li>';
              } ?>
               <li class="nav-item">
                  <a class="nav-link" href="../about/">
                      <i class="ti-info menu-icon"></i>
                      <span class="menu-title">About</span>
                  </a>
              </li>
              <li class="nav-item fixed-bottom col-md-2 pb-3 pr-1">

                <a class="nav-link bg-muted  text-dark mb-3" >
                     
                     <span class="menu-title text-capitalize font-weight-bold"><?php echo $acc_name; ?></span><span class="badge badge-pill badge-dark text-capitalize float-right ml-1"><?php echo $user_type; ?></span>
                 </a>

                  <!-- <a class="nav-link btn btn-danger text-dark bg-danger rounded-pill border border-none " href="../logout.php">
                      <i class="ti-power-off text-dark"></i>
                      <span class="menu-title mx-auto">LOGOUT</span>
                  </a> -->
              </li>
          </ul>
      </nav>