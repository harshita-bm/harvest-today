<?php

include '../config.php';

$admin = new Admin();

if (!isset($_SESSION['admin_id'])) { //$_SESSION is from admin loginback.php page
  header("location:login_front.php");
}

$s_variable = $_SESSION['admin_id']; //assigning session to variable

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>blog manage</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- 1. container scroller starts -->

    <?php include 'header.php' ?>
    <!--  # navbar / header -->

    <div class="container-fluid page-body-wrapper">
      <!--2. body wrapper starts-->
      <?php include 'sidebar.php' ?>
      <!--  #  sidebar   # -->

      <div class="main-panel">
        <!--3. main panel starts-->
        <div class="content-wrapper">
          <!-- 4. content wrapper starts-->

          <!-------------🟦MAIN CONTENT STARTS------------>
          <div class="col-md-12 d-flex align-items-stretch">
            <div class="row">
              <a type="button" style="width: 200px; margin-top:10px;" class="btn btn-success btn-rounded btn-fw" href="blog_create.php">Add new Blog</a>
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card" style="width: 1000px;">



                  <?php $query = $admin->ret("SELECT * FROM `blog` ");
                  while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="card-body">
                      <!-- <img src="uploads/<?php echo $row['blog_image'] ?>" width="200px" height="200px"> <br> -->
                      <h4 class="card-title"><?php echo $row['blog_heading'] ?></h4>
                      <p class="card-description">
                      </p>
                      <p>
                        <?php echo $row['blog_content'] ?>
                    </div>

                    <td><a type="button" style="width: 200px; margin-top:10px;" class="btn btn-info btn-rounded btn-fw" href="blog_update.php?update_blog=<?php echo $row['blog_id'] ?>">Update</a> </td>
                    <td><a type="button" style="width: 200px; margin-top:10px;" class="btn btn-danger btn-rounded btn-fw" href="admin_controller\blog_controller.php?delete_blog=<?php echo $row['blog_id'] ?>" onclick="return confirm('Are you sure you want to delete?');">Delete</a></td>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>

          <!-----------🟦MAIN CONTENT ENDS------------------>

        </div>
        <!--content wrapper ends-->
        <?php include 'footer.php' ?>
        <!-- #   footer # -->

      </div>
      <!--main panel ends-->
    </div>
    <!--body wrapper ends-->
  </div>
  <!--container scroller ends-->

  <!-- javascript ------------------------------------------------------------->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="assets/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>