<?php

include 'config.php';

$admin = new Admin();

if (!isset($_SESSION['user_id'])) {
    header("location:user/login_front.php");
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

    <title>cart</title>

    <link rel="icon" type="image/png" href="index_assets/assets/img/favicon.png">
</head>

<body>

    <?php include 'index_header.php' ?>

    <!-- ----------------------- 🟡 MAIN CONTENT AREA STARTS-------------------------------- -->
    <!-- Start Page Title Area -->
    <div style="  padding-top: 30px;
  background-color: black;
  background-image: url(temp_images/fertilizer.jpg);
  background-position: left bottom;
  background-repeat: no-repeat;
  background-size: cover; 
  height:200px;">
        <div class="container">
            <div class="page-title-content">
                <h1 style="color:white;">Cart</h1>
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

                                <th scope="col">Product </th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- single product starts -->
                            <?php $query = $admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON cart.product_id = product.product_Id where `user_idc`='$s_variable' ");
                            while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>


                                    <td class="product-thumbnail">
                                        <a href="products-details.html">
                                            <img src="retailer/uploads/<?php echo $row['product_imagedb'] ?>" height="800px" width="800px">
                                            <h3><?php echo $row['product_name'] ?></h3>
                                        </a>
                                    </td>

                                    <td><?php echo $row['product_price'] ?></td>

                                    <td class="product-quantity">
                                        <div class="input-counter">
                                            <?php if ($row['quantity'] > 1) { ?>
                                                <span class="minus-btn" onclick="decrement(<?php echo $row['cart_id']; ?>)"><i class='bx bx-minus'></i></span>
                                            <?php } ?>
                                            <input type="text" readonly value="<?php echo $row['quantity'] ?>">
                                            <span class="plus-btn" onclick="increment(<?php echo $row['cart_id'] ?>)"><i class='bx bx-plus'></i></span>
                                        </div>
                                    </td>

                                    <td><?php echo $row['cart_total'] ?></td>

                                    <td><a href="user\controller\cart_controller.php?delete_cart_product=<?php echo $row['cart_id'] ?>" class="remove"><i class='bx bx-trash'></i></a></td>
                                </tr>
                            <?php } ?>
                            <!-- single product ends -->

                        </tbody>
                    </table>
                </div>

                <!--🔴calculating cart total -->
                <?php $total_loop = 0;
                $query = $admin->ret("SELECT `cart_total` FROM `cart` WHERE `user_idc`=$s_variable");
                while ($row_total = $query->fetch(PDO::FETCH_ASSOC)) {
                    $total_loop = $total_loop + $row_total['cart_total'];
                } ?>


                <?php $query = $admin->ret("SELECT * FROM `cart` where `user_idc`=$s_variable ");
                $row = $query->fetch(PDO::FETCH_ASSOC);

                if ($query->rowCount() > 0) { ?>
                    <div class="cart-totals">
                        <ul>
                            <li>Subtotal <span><?php echo $total_loop ?> RS</span></li>
                            <li>Shipping <span>Free</span></li>
                            <li>Grand Total <span><?php echo $total_loop ?> RS</span></li>
                        </ul>
                        <a href="checkout.php" class="default-btn"><span>Proceed to Checkout</span></a>
                    </div>
                <?php } else { ?>
                    <p style="color:red;  text-align: center;">cart is empty</p>
                <?php } ?>
            </form>
        </div>
    </div>
    <!-- End Cart Area -->


    <!-- ----------------------- 🟡 MAIN CONTENT AREA ENDS-------------------------------- -->


    <?php include 'index_footer.php' ?>


    <!-- ajax 🔵---------------- -->

    <!--ajax increment -->
    <script>
        function increment(vcart_id) { //getting from onclick function -can use any variable
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //table id
                    document.getElementById("ajax_cart_table").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "cart_quantity_ajax.php ? cart_id_increment=" + vcart_id, true);
            xmlhttp.send();
        }
    </script>

    <!--ajax decrement -->
    <script>
        function decrement(vcart_id) { //getting from onclick function -can use any variable

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //table id
                    document.getElementById("ajax_cart_table").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "cart_quantity_ajax.php ? cart_id_decrement=" + vcart_id, true);
            xmlhttp.send();
        }
    </script>

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