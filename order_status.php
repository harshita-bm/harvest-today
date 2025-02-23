<?php

include 'config.php';

$admin = new Admin();

if (!isset($_SESSION['user_id'])) {
    header("location:petowner/login_front.php");
}


$s_variable = $_SESSION['user_id'];
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

    <title>order status</title>

    <link rel="icon" type="image/png" href="index_assets/assets/img/favicon.png">
</head>

<body>

    <?php include 'index_header.php' ?>

    <!-- ----------------------- 🟡 MAIN CONTENT AREA STARTS-------------------------------- -->
    <!-- Start Page Title Area -->

        <!-- class="page-title-area" -->
        <div style="  padding-top: 30px;
  background-color: black;
  background-image: url(temp_images/vegetables.jpg);
  background-position: left bottom;
  background-repeat: no-repeat;
  background-size: cover; 
  height:250px;">  
        <div class="container">
            <div class="page-title-content">
                <h1 style="color:white;">Order Status</h1>
                <ul>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Cart Area -->
    <div class="cart-area ptb-100" id="ajax_cart_table">
        <div class="container">
            <form>
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <!-- <th scope="col"></th> -->
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Cancel order</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- single product starts -->
                            <?php $query = $admin->ret("SELECT * FROM `orders` INNER JOIN `product` ON orders.product_id = product.product_Id where `user_ido`='$s_variable' ");
                            while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>
                                    <!-- <td><a href="petowner\controller\cart_controller.php?delete_cart_product=<?php echo $row['cart_id'] ?>" class="remove"><i class='bx bx-trash'></i></a></td> -->

                                    <td class="product-thumbnail">
                                        <a href="products-details.html">
                                            <img src="retailer/uploads/<?php echo $row['product_imagedb'] ?>" height="800px" width="800px">
                                            <h3><?php echo $row['product_name'] ?></h3>
                                        </a>
                                    </td>

                                    <td><?php echo $row['product_price'] ?></td>

                                    <td class="product-quantity">
                                        <div class="input-counter">
                                            <input type="text" readonly value="<?php echo $row['quantity'] ?>">
                                        </div>
                                    </td>

                                    <td><?php echo $row['cart_total'] ?></td>
                                    <!-- approve conditions -->
                                    <?php if ($row['order_status'] == 'pending') { ?>
                                        <td><a class="default-btn" style="background-color: #248AFD; color:white;"><span>Order placed</span></a></td>
                                        <td><a href="user\controller\order_controller.php?cancel_order_id=<?php echo $row['order_id'] ?>" class="default-btn" style="background-color: red;"><span>cancel</span></a></td>

                                    <?php } elseif ($row['order_status'] == 'order accepted') { ?>
                                        <td><a class="default-btn" style="background-color: #FFC100; color:black; "><span>Order accepted</span></a></td>
                                    <?php } elseif ($row['order_status'] == 'order shipped') { ?>
                                        <td><a class="default-btn" style="background-color: #4CAF50; "><span>Order shipped</span></a></td>
                                    <?php } elseif ($row['order_status'] == 'order cancelled') { ?>
                                        <td><a class="default-btn" style="background-color: red; "><span>Order cancelled</span></a></td>
                                    <?php } ?>




                                </tr>
                            <?php } ?>
                            <!-- single product ends -->

                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <!-- End Cart Area -->

<h6>thanks for ordering</h6>
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