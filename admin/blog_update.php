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
    <title>blog udpate</title>
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
                    <?php
                    $blog_id = $_GET['update_blog'];  //this is from update button hyperlink
                    $query = $admin->ret("SELECT * FROM `blog` where `blog_id`= '$blog_id' ");
                    $row = $query->fetch(PDO::FETCH_ASSOC);
                    ?>



                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Update blog</h4>
                                <p class="card-description">
                                    <!-- Basic form elements -->
                                </p>
                                <form action="admin_controller\blog_controller.php" method="POST" class="forms-sample" enctype="multipart/form-data" autocomplete="off">

                                    <!-- sending location_id as hidden -->
                                    <input type="hidden" name="blog_id" value="<?php echo $row['blog_id'] ?>">

                                    <div class="form-group">
                                        <label for="exampleInputName1">Blog heading</label>
                                        <input type="text" name="blog_heading" value="<?php echo $row['blog_heading'] ?>" class="form-control" id="exampleInputName1" placeholder="Blog Heading" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea1">Blog Content</label>
                                        <textarea name="blog_content" class="form-control" id="exampleTextarea1" rows="4" placeholder="write blog..." required><?php echo $row['blog_content'] ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Image</label>
                                        <input type="file" name="image" class="form-control" id="exampleInputName1" >
                                    </div>

                                    <!--sending old image as hidden-->
                                    <input type="hidden" value="<?php echo $row['blog_image'] ?>" name="img">


                                    <input type="submit" name="update_blog" value="Submit" class="btn btn-primary mr-2">
                                    <a href="blog_manage.php" class="btn btn-light">Cancel</a>
                                </form>
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