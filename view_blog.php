<?php

include 'config.php';

$admin = new Admin();


?>



<!doctype html>
<html lang="zxx">

<!-- Mirrored from templates.envytheme.com/patoi/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 May 2022 10:51:27 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link of CSS files -->
    <link rel="stylesheet" href="index_assets/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="index_assets/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="index_assets/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="index_assets/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="index_assets/assets/css/animate.min.css">
    <link rel="stylesheet" href="index_assets/assets/css/rangeSlider.min.css">
    <link rel="stylesheet" href="index_assets/assets/css/odometer.min.css">
    <link rel="stylesheet" href="index_assets/assets/css/boxicons.min.css">
    <link rel="stylesheet" href="index_assets/assets/css/slick.min.css">
    <link rel="stylesheet" href="index_assets/assets/css/countrySelect.min.css">
    <link rel="stylesheet" href="index_assets/assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="index_assets/assets/css/style.css">
    <link rel="stylesheet" href="index_assets/assets/css/responsive.css">

    <title>view blog</title>

    <link rel="icon" type="image/png" href="index_assets/assets/img/favicon.png">
</head>

<body>

    <?php include 'index_header.php' ?>

    <!-- ----------------------- 🟡 MAIN CONTENT AREA STARTS-------------------------------- -->

    <div style="  padding-top: 30px;
  background-color: black;
  background-image: url(temp_images/tractor.jpg);
  background-position: left bottom;
  background-repeat: no-repeat;
  background-size: cover; 
  height:400px;">
        <div class="container">
            <div class="page-title-content">
                <h1 style="color:black;">Short blogs</h1>
                <ul>
                </ul>
            </div>
        </div>
    </div>


    <div class="blog-area ptb-100">
            <div class="container">
                <div class="row">
                    
                <?php $query = $admin->ret("SELECT * FROM `blog` ");
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-lg-4 col-md-6">
                        <div class="single-blog-post">
                            <div class="image">
                                <a class="d-block">
                                <td><img src="admin/uploads/<?php echo $row['blog_image'] ?>"></td>
                                </a>
                            </div>
                            <div class="content">
                                <span class="date">
                                    <!-- <span>10 Aug</span> 2021 -->
                                </span>
                                <!-- <a href="blog-grid.html" class="category">Training</a> -->
                                <h3><a href="blog-details.html"><?php echo $row['blog_heading'] ?></a></h3>
                                <p style="height: 190px; overflow:hidden;"><?php echo $row['blog_content'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    <!-- ----------------------- 🟡 MAIN CONTENT AREA ENDS-------------------------------- -->


    <?php //include 'index_footer.php' ?>


    <!-- Link of JS files -->
    <script data-cfasync="false" src="index_assets/../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="index_assets/assets/js/jquery.min.js"></script>
    <script src="index_assets/assets/js/bootstrap.bundle.min.js"></script>
    <script src="index_assets/assets/js/magnific-popup.min.js"></script>
    <script src="index_assets/assets/js/meanmenu.min.js"></script>
    <script src="index_assets/assets/js/appear.min.js"></script>
    <script src="index_assets/assets/js/countrySelect.min.js"></script>
    <script src="index_assets/assets/js/odometer.min.js"></script>
    <script src="index_assets/assets/js/loopcounter.js"></script>
    <script src="index_assets/assets/js/owl.carousel.min.js"></script>
    <script src="index_assets/assets/js/rangeSlider.min.js"></script>
    <script src="index_assets/assets/js/slick.min.js"></script>
    <script src="index_assets/assets/js/form-validator.min.js"></script>
    <script src="index_assets/assets/js/contact-form-script.js"></script>
    <script src="index_assets/assets/js/ajaxchimp.min.js"></script>
    <script src="index_assets/assets/js/main.js"></script>
</body>

<!-- Mirrored from templates.envytheme.com/patoi/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 May 2022 10:51:36 GMT -->

</html>