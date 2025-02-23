<!--sidebar starts-->
<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:black !important; color:white !important;">
  <ul class="nav">
    <li class="nav-item">
      <a style="color:white;" class="nav-link" href="index.php">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <!-- manage owners -->
    <li class="nav-item">
      <a style="color:white;" class="nav-link" href="product_manage.php">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Manage Product</span>
      </a>
    </li>

    <li class="nav-item">
      <a  style="color:white;" class="nav-link" href="orders_manage.php">
        <i class="icon-grid-2 menu-icon"></i>
        <span class="menu-title">Manage orders</span>
      </a>
    </li>


    <!-- feedbacks -->
    <li class="nav-item">
      <a  style="color:white;" class="nav-link" href="view_feedback.php">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">view feedbacks</span>
      </a>
    </li>

    <!-- orders manage -->
    <li class="nav-item">
      <a style="color:white;" class="nav-link" href="order_report.php">
        <i class="icon-grid-2 menu-icon"></i>
        <span class="menu-title">Order report</span>
      </a>
    </li>


    <!-- petowner payment details -->
    <li class="nav-item">
      <a style="color:white;" class="nav-link collapsed" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">view payments</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic1">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link active" href="payment_upi.php">UPI payments</a></li>
          <li class="nav-item"> <a class="nav-link" href="payment_card.php">Card payments</a></li>
          <li class="nav-item"> <a class="nav-link" href="payment_cash.php">Cash on delivery</a></li>
        </ul>
      </div>
    </li>



  </ul>
</nav>
<!--side bar ends-->