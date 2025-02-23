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

    <title>Checkout page</title>

    <link rel="icon" type="image/png" href="index_assets/assets/img/favicon.png">

    <!-- 🟡payment head tag starts -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>
        .main {
            /* background-color: #673AB7; */
            padding-top: 100px;
            padding-bottom: 50px
        }

        .card {
            background-color: #fff;
            /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
            width: 500px;
            /* border-radius: 29px */
        }

        .pay {
            font-size: 18px;
            color: #000;
            font-weight: 600;
            margin-top: 5px
        }

        .amount {
            background-color: #f3f3fd;
            border-radius: 8px
        }

        .inner {
            padding-top: 8px;
            padding-bottom: 8px;
            padding-left: 19px;
            padding-right: 19px
        }

        .dollar {
            color: #a49ecc;
            font-size: 20px;
            font-weight: 500
        }

        .total {
            font-size: 20px;
            font-weight: 500;
            color: #6458ab
        }

        .labeltxt {
            font-size: 13px;
            color: #adb5bd;
            font-weight: 500;
            margin-top: 5px
        }

        .image {
            position: relative;
            top: 39px;
            right: 13px
        }

        .form-control {
            border: 2px solid #c4c2d0;
            border-radius: 7px
        }

        .inputtxt {
            color: #000 !important;
            font-weight: bold;
            font-size: 14px;
            padding-top: 21px;
            padding-bottom: 21px
        }

        .exptxt {
            color: #adb5bd;
            font-size: 13px;
            font-weight: 500
        }

        .cvvtxt {
            color: #adb5bd;
            font-size: 13px;
            font-weight: 500
        }

        .expiry {
            padding-top: 21px;
            padding-bottom: 21px;
            width: 120px;
            font-size: 14px;
            font-weight: bold
        }

        .cvv {
            padding-top: 21px;
            padding-bottom: 21px;
            width: 120px
        }

        .cancel {
            background-color: #fff;
            color: #adb5bd;
            font-size: 13px;
            font-weight: 500;
            border: none;
            position: relative;
            top: 24px
        }

        .cancel:hover {
            background-color: #fff;
            color: #adb5bd;
            font-size: 13px;
            font-weight: 500;
            border: none
        }

        .cancel:focus {
            background-color: #fff;
            color: #adb5bd;
            font-size: 13px;
            font-weight: 500;
            border: 1px solid #adb5bd
        }

        .payment {
            font-weight: 600;
            font-size: 14px;
            background-color: #673AB7;
            border: none;
            width: 150px;
            padding-top: 21px;
            padding-bottom: 21px;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 11px
        }

        .payment:hover {
            font-weight: 600;
            font-size: 14px;
            background-color: #673AB7;
            border: none;
            width: 150px;
            padding-top: 21px;
            padding-bottom: 21px;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 11px
        }

        .payment:focus {
            background-color: #673AB7
        }
    </style>
    <!-- 🟡payment head tag ends -->
</head>

<body>

    <?php include 'index_header.php' ?>

    <!-- ----------------------- 🟡 MAIN CONTENT AREA STARTS-------------------------------- -->
    <?php $query = $admin->ret("SELECT * FROM `user`  where `user_id`='$s_variable' ");
    $row = $query->fetch(PDO::FETCH_ASSOC); ?>



    <!-- Start Page Title Area -->
    <div style="  padding-top: 30px;
  background-color: black;
  background-image: url(temp_images/tractor.jpg);
  background-position: left bottom;
  background-repeat: no-repeat;
  background-size: cover; 
  height:400px;">
        <div class="container">
            <div class="page-title-content">
                <h1 style="color:white;">Checkout</h1>
                <ul>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Checkout Area -->
    <div class="checkout-area ptb-100">
        <div class="container">

            <form autocomplete="off" action="user/controller/order_controller.php" method="POST">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="billing-details">
                            <h3><span>Billing details</span></h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>First name <span class="required">*</span></label>
                                        <input style="border-color: #cccdcf;" value="<?php echo $row['user_name'] ?>" name="full_name" type="text" required class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Country / Region <span class="required">*</span></label>
                                        <input style="border-color: #cccdcf;" name="country" id="country_selector" value="India" required type="text">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Phone <span class="required">*</span></label>
                                        <input style="border-color: #cccdcf;" value="<?php echo $row['phone'] ?>" name="phone" type="text" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Email address <span class="required">*</span></label>
                                        <input style="border-color: #cccdcf;" value="<?php echo $row['email'] ?>" name="email" type="email" required class="form-control">
                                    </div>
                                </div>



                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Street address <span class="required">*</span></label>
                                        <input style="border-color: #cccdcf;" name="street" type="text" required class="form-control" placeholder="House number and street name">
                                    </div>
                                </div>
                          
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>City <span class="required">*</span></label>
                                        <input style="border-color: #cccdcf;" name="city" required type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Pincode <span class="required">*</span></label>
                                        <input style="border-color: #cccdcf;" name="pincode" required type="number" maxlength="6" class="form-control">
                                    </div>
                                </div>
 

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                    </div>


                    <div class="col-lg-12 col-md-12">
                        <div class="order-details">
                            <h3>Your order</h3>
                            <div class="order-table table-responsive">
                                <table class="table table-bordered">
                                    <tbody>

                                        <?php $query = $admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON cart.product_id = product.product_Id where `user_idc`='$s_variable' ");
                                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <tr>
                                                <td class="product-name"><a href="products-details.html"><?php echo $row['product_name'] ?></a></td>
                                                <td class="product-total">
                                                    <span class="subtotal-amount"><?php echo $row['product_price'] ?></span>
                                                </td>
                                            </tr>
                                        <?php } ?>


                                        <!--🔴calculating cart total -->
                                        <?php $total_loop = 0;
                                        $query = $admin->ret("SELECT `cart_total` FROM `cart` WHERE `user_idc`=$s_variable");
                                        while ($row_total = $query->fetch(PDO::FETCH_ASSOC)) {
                                            $total_loop = $total_loop + $row_total['cart_total'];
                                        } ?>

                                        <tr>
                                            <td class="total-price"><span>Order Total</span></td>
                                            <td class="product-subtotal">
                                                <span class="subtotal-amount"><?php echo $total_loop ?> RS</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="payment-box">
                                <div >
                                    <p>
                                        <input type="radio" id="direct-bank-transfer" value="upi" name="payment_method" onchange="cardform(this.value)" required>
                                        <label for="direct-bank-transfer">UPI/Net Banking</label>
                                        Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                    </p>
                                    <div style="display: none;" id="upi_div"><img src="harishthaqr.jpg">

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Transaction id <span class="required">*</span></label>
                                                <input style="border-color: #cccdcf;" name="transaction_id" placeholder="Enter transaction id" type="text" class="form-control" autocomplete="off">
                                            </div>

                                        </div>
                                    </div>

                                    <p>
                                        <input type="radio" id="paypal" value="card" name="payment_method" onchange="cardform(this.value)" required>
                                        <label for="paypal">Debit card / Credit card</label>
                                        <img src="index_assets/assets/img/paypal.png" alt="paypal">
                                        Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.
                                    </p>
                                    <div style="display: none;" id="card_div">
                                        <!-- 🔴 card paymen  body starts -->
                                        <div class="container d-flex justify-content-center main">
                                            <div class="card" style="background-color: #E6EBEE;">

                                                <div class="px-3 pt-3">
                                                    <label for="card number" class="d-flex justify-content-between"><span class="labeltxt">CARD NUMBER</span><img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" width="25" class="image" /></label>
                                                    <input type="text" class="form-control inputtxt" id="card_no" name="card_number" placeholder="0000 0000 0000 0000" minlength="16" maxlength="16">
                                                </div>


                                                <div class="d-flex justify-content-between px-3 pt-4">
                                                    <div><label for="date" class="exptxt"> Expiry </label><input type="text" name="expiry" class="form-control expiry" placeholder="MM / YY" id="card_expiry" name="card_expiry" minlength="5" maxlength="5"></div>
                                                    <div><label for="cvv" class="cvvtxt">CVV / CVC</label><input type="text" name="number" class="form-control cvv" id="exp" minlength="3" maxlength="3"></div>
                                                </div>
                                                <div class="d-flex justify-content-between px-3 pt-4 pb-4">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 🔴 card paymen  body ends -->
                                    </div>


                                    <p>
                                        <input type="radio" id="cash-on-delivery" value="cash" name="payment_method" onchange="cardform(this.value)" required>
                                        <label for="cash-on-delivery">Cash on delivery</label>

                                    </p>
                                    <div style="display: none;" id="cash_div"> Pay with cash upon delivery.</div>

                                </div>
                                <button type="submit" name="checkout_the_product" class="default-btn"><span>Place Order</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Checkout Area -->

    <!-- ----------------------- 🟡 MAIN CONTENT AREA ENDS-------------------------------- -->


    <?php include 'index_footer.php' ?>


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

    <!-- 🟡 div flow down javascript starts-->
    <script>
        function cardform(myvalue) {


            if (myvalue == 'upi') { //upi radio button value
                document.getElementById('upi_div').style.display = 'block'; //div id
                document.getElementById('card_div').style.display = 'none';
                document.getElementById('cash_div').style.display = 'none';
            } else if (myvalue == 'card') { //card radio button id
                document.getElementById('card_div').style.display = 'block';
                document.getElementById('upi_div').style.display = 'none';
                document.getElementById('cash_div').style.display = 'none';
            } else if (myvalue == 'cash') {
                document.getElementById('card_div').style.display = 'none';
                document.getElementById('upi_div').style.display = 'none';
                document.getElementById('cash_div').style.display = 'block';
            }

        }
    </script>
    <!-- 🟡 div flow down javascript ends-->


    <!-- 🟡payment card javascript starts -->
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src=''></script>
    <script type='text/Javascript'></script>
    <!-- 🟡payment card javascript ends -->



</body>

<!-- Mirrored from templates.envytheme.com/patoi/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 May 2022 10:51:36 GMT -->

</html>