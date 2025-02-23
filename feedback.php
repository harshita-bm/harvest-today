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

    <title>give your feedback</title>

    <link rel="icon" type="image/png" href="index_assets/assets/img/favicon.png">
</head>

<body>

    <?php include 'index_header.php' ?>

    <!-- ----------------------- 🟡 MAIN CONTENT AREA STARTS-------------------------------- -->

    <div class="contact-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="contact-form">
                        <h3>Give your feedback</h3>
                        <form  action="user\controller\feedback_controller.php" method="POST">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Your Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Message...</label>
                                        <textarea name="message" id="message" placeholder="Write your feedback" class="form-control" cols="30" rows="4" required ></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" name="send_feedback" class="default-btn"><span>Send</span></button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="contact-info">
                        <h3>Contact Information</h3>
                        <ul>
                            <li><span>Hotline:</span> <a href="tel:12855">Admin</a></li>
                            <li><span>Tech support:</span> <a href="tel:+1514312-5678">+9900303090</a></li>
                            <li><span>Email:</span>admin@gmail.com</li>
                            <li><span>Address:</span> Mangalore</li>
                            <!-- <li><span>Available:</span> Monday - Friday 8:00am - 8:00pm</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="feedback-area pb-100">
        <div class="container">
            <div class="section-title">
                <h2>What Our Customers Says</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="feedback-slides owl-carousel owl-theme">

                        <!-- single feedback starts -->
                        <?php  $query=$admin->ret("SELECT * FROM `feedback` INNER JOIN `user` ON feedback.user_idf = user.user_id ");
                    while($row=$query->fetch(PDO::FETCH_ASSOC) ) { ?>
                        <div class="single-feedback-box">
                            <p><?php echo $row['message'] ?></p>
                            <div class="client-info">

                                <h3><?php echo $row['user_name'] ?></h3>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- single feedback ends-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h6>Thanks for your feedbacks - admin</h6>

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