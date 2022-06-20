      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:#bddcff;">
          <ul class="nav">
              <li class="nav-item">
                  <a class="nav-link" href="../dashboard/">
                      <i class="ti-shield menu-icon"></i>
                      <span class="menu-title">Dashboard</span>
                  </a>
              </li>
              <!-- <li class="nav-item">
                  <a class="nav-link" href="../company/company.php">
                      <i class="ti-flag menu-icon"></i>
                      <span class="menu-title">Company Setup</span>
                  </a>
              </li> -->
              <li class="nav-item">
                  <a class="nav-link" href="../financial_record/">
                      <i class="ti-money menu-icon"></i>
                      <span class="menu-title">Financial Record</span>
                  </a>
              </li>
              <!-- <li class="nav-item">
                  <a class="nav-link" href="../productset/productset.php">
                      <i class="ti-shopping-cart menu-icon"></i>
                      <span class="menu-title">Product Sets</span>
                  </a>
              </li> -->
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
              <!-- <li class="nav-item">
                  <a class="nav-link" href="../unit/unit.php">
                      <i class="ti-layers menu-icon"></i>
                      <span class="menu-title">Units</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../category/category.php">
                      <i class="ti-layers-alt menu-icon"></i>
                      <span class="menu-title">Categories</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../ItemRawMaterial/ItemRawMaterial.php">
                      <i class="ti-file menu-icon"></i>
                      <span class="menu-title">Item Raw Material</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../invoice/invoice.php">
                      <i class="ti-shopping-cart-full menu-icon"></i>
                      <span class="menu-title">Invoice</span>
                  </a>
              </li> -->
              <!-- <li class="nav-item">
                  <a class="nav-link" href="../sales/sales.php">
                      <i class="ti-bar-chart-alt menu-icon"></i>
                      <span class="menu-title">Sales</span>
                  </a>
              </li> -->
                
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



              <li class="nav-item fixed-bottom col-md-2 pb-3 pr-4">
              <a class="nav-link bg-muted btn btn-default text-dark mb-3" >
                     
                     <span class="menu-title text-capitalize"><?php echo $acc_name; ?></span><span class="badge badge-pill badge-dark text-capitalize"><?php echo $user_type; ?></span>
                 </a>

                  <a class="nav-link btn btn-danger text-dark bg-danger border border-none " href="../logout.php">
                     
                      <span class="menu-title">LOGOUT</span>
                  </a>
              </li>
              <!--
              <li class="nav-item">
                  <a class="nav-link" href="../auditlog/auditlog.php">
                      <i class="ti-time menu-icon"></i>
                      <span class="menu-title">Audit Log</span>
                  </a>
              </li> -->
          </ul>
      </nav>


      <!-- partial -->