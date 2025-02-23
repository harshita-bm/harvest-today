<!--navbar starts-->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="box-shadow: none;">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color:black !important;">
      <a class="navbar-brand brand-logo mr-5" href="shopownerindex.php"><h4 style="text-align:center; color:white"><b>Retailer</b></h4></a>
      <!-- <a class="navbar-brand brand-logo-mini" href="shopownerindex.php"><img src="assets/images/logo-mini.svg" alt="logo"/></a> -->
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color:black !important;">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
      </button>

      <ul class="navbar-nav navbar-nav-right">

        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="assets/images/faces/admin2.png" alt="profile"/>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a href="account_settings.php" class="dropdown-item">
              <i class="ti-settings text-primary"></i>
              Settings
            </a>
            <a href="logout.php" class="dropdown-item">
              <i class="ti-power-off text-primary"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
    </div>
  </nav>
<!--navbar ends-->