      <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:#d9d6bd;">
          <ul class="nav">
              <li class="nav-item">
                  <a class="nav-link text-dark mb-3" href="../dashboard/">
                      <i class="ti-shield menu-icon"></i>
                      <span class="menu-title">Dashboard</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-dark mb-3" href="../financial_record/">
                      <i class="ti-money menu-icon"></i>
                      <span class="menu-title">Financial Record</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-dark mb-3" href="../Montly_Tally/">
                      <i class="ti-bar-chart menu-icon"></i>
                      <span class="menu-title">Monthly Tally</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-dark mb-3" href="../tugboat_renting/">
                      <i class="ti-flag-alt-2 menu-icon"></i>
                      <span class="menu-title">Tugboat Renting</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-dark mb-3" href="../drydock">
                      <i class="ti-bookmark-alt menu-icon"></i>
                      <span class="menu-title">Dry Dock</span>
                  </a>
              </li>
             <li class="nav-item">
                  <a class="nav-link text-dark mb-3" href="../employee_profile/">
                      <i class="ti-flag-alt-2 menu-icon"></i>
                      <span class="menu-title">Employee Profile</span>
                  </a>
              </li>
<?php if ($user_type == "admin") { ?>
                <?= '<li class="nav-item">
                  <a class="nav-link text-dark mb-3" href="../users/">
                      <i class="ti-user menu-icon"></i>
                      <span class="menu-title">Users</span>
                  </a>
              </li>' ?>
<?php } ?>
              <li class="nav-item">
                  <a class="nav-link text-dark mb-3"  href="../about/">
                      <i class="ti-info menu-icon"></i>
                      <span class="menu-title">About</span>
                  </a>
              </li>
              <li class="nav-item fixed-bottom col-md-2">
                  <a class="nav-link bg-muted  text-dark mb-3">
                      <span class="menu-title text-capitalize font-weight-bold"><?= $acc_name; ?></span><span class="badge badge-pill badge-dark text-capitalize float-right ml-1"><?= $user_type; ?></span>
                  </a>
              </li>
          </ul>
      </nav>
