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

    <title>Harvest Today</title>

    <link rel="icon" type="image/png" href="index_assets/assets/img/favicon.png">
</head>

<body>

    <?php include 'index_header.php' ?>


    <!-- Start Main Banner Area -->
    <div >
        <video autoplay muted loop id="myVideo" width="1690px">

            <source src="crop.mp4" type="video/mp4">
        </video>

        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="main-banner-content" style="margin-top: -500px; margin-left:200px; color:white;">
                        <span class="sub-title">Welcome to Harvest Today products</span>
                        <h1 style="color:white;">We provide best Farming products</h1>
                        <!-- <p>Save 20% off your first order</p> -->
                        <a href="#change" class="default-btn"><span>Shop Now</span></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">

                </div>
            </div>
        </div>
    </div>
    <!-- End Main Banner Area -->


    <!-- Start Products Area -->
    <div class="products-area pb-75" id="change">
        <div class="container">
            <div class="section-title pt-4">
                <h2>All Products</h2>
            </div>

            <div>
                <select class="form-control" onchange="selectoption(this.value)" required style="background-color: #F1F1F1;">
                    <option selected disabled value="">select category</option>

                    <?php $query = $admin->ret("SELECT * FROM `category` ");
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                    <?php } ?>
                </select>
            </div> <br>


            <div class="row justify-content-center">
                <!-- single product starts -->
                <?php $query = $admin->ret("SELECT * FROM `product` INNER JOIN `category` ON product.category_idp = category.category_id ");
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-products-box">
                            <div class="image">
                                <a class="d-block" style="width: auto; height:200px;">
                                    <img src="retailer/uploads/<?php echo $row['product_imagedb'] ?>" height="800px" width="800px">
                                </a>
                                <ul class="products-button">
                                    <!-- add to cart button -->
                                    <?php if (!isset($_SESSION['user_id'])) { ?>
                                        <li><a href="user/login_front.php"><i class='bx bx-cart-alt'></i></a></li>
                                    <?php } else { ?>
                                               
                                        <?php if($row['product_status']=='unavailable'){ ?>
                                            <span style="color:white; background-color:red; margin-bottom:10px;"><b>unavailable</b></span>
                                        <?php } else { ?>
                                        <li><a href="user\controller\cart_controller.php?add_to_cart=<?php echo $row['product_id'] ?>"><i class='bx bx-cart-alt'></i></a></li>
                                        <?php } ?>
                                    <?php } ?>

                                    <!-- <li><a href="wishlist.html"><i class='bx bx-heart'></i></a></li> -->
                                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView<?php echo $row['product_id'] ?>"><i class='bx bx-show'></i></a></li>
                                    <!-- <li><a href="products-details.html"><i class='bx bx-link-alt'></i></a></li> -->
                                </ul>
                            </div>
                            <div class="content">
                                <h3><a href="products-details.html"><?php echo $row['product_name'] ?></a></h3>
                                <div class="price">
                                    <span class="new-price"><?php echo $row['product_price'] ?> RS</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- 🟨 Modal -->
                    <div class="modal fade productsQuickView" id="productsQuickView<?php echo $row['product_id'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="image">
                                                <img src="retailer/uploads/<?php echo $row['product_imagedb'] ?>" height="800px" width="800px">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="content">
                                                <h3 style="font-size:30px;"><a href="products-details.html"><?php echo $row['product_name'] ?></a></h3>
                                                <div class="price">
                                                    <span class="new-price" style="font-size: 30px;"><?php echo $row['product_price'] ?> RS</span>

                                                </div>
                           
                                                <p style="font-size: 20px;"><?php echo $row['product_description'] ?></p>

                                                <ul class="products-info">
                                                    <!-- <li><span>SKU:</span> 007</li> -->
                                                    <li style="font-size: 30px;"><span>Product Category:</span><?php echo $row['category_name'] ?></li>
                                                    <li style="font-size: 30px;"><span>Availability:</span> Available</li>
                                                    <!-- <li><span>Tag:</span> Accessories</li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End QuickView Modal -->
                <?php } ?>
                <!-- single product ends -->
            </div>
        </div>
    </div>
    <!-- End Products Area -->



    <!-- 🟨 adevertisement -->
    <!-- Start Facility Area -->
    <div class="facility-area">
        <div class="container">
            <div class="facility-inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="single-facility-box">
                            <img src="index_assets/assets/img/icon/icon1.png" alt="icon">
                            <h3>Best collection</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="single-facility-box">
                            <img src="index_assets/assets/img/icon/icon2.png" alt="icon">
                            <h3>Fast delivery</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="single-facility-box">
                            <img src="index_assets/assets/img/icon/icon3.png" alt="icon">
                            <h3>24/7 customer support</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="single-facility-box">
                            <img src="index_assets/assets/img/icon/icon4.png" alt="icon">
                            <h3>Secured payment</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Facility Area -->

    <!-- Start Blog Area -->
    <div class="blog-area pt-100 pb-75">
        <!-- 🔴 kept empty to manage space -->
    </div>
    <!-- End Blog Area -->


    <?php include 'index_footer.php' ?>


    <!-- Start Sidebar Modal Area -->
    <div class="productsFilterModal modal right fade" id="productsFilterModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <aside class="widget-area">
                        <div class="widget widget_categories">
                            <h3 class="widget-title"><span>Categories</span></h3>
                            <ul>
                                <li><a href="shop-left-sidebar.html">Business</a></li>
                                <li><a href="shop-left-sidebar.html">Privacy</a></li>
                                <li><a href="shop-left-sidebar.html">Technology</a></li>
                                <li><a href="shop-left-sidebar.html">Tips</a></li>
                                <li><a href="shop-left-sidebar.html">Log in</a></li>
                                <li><a href="shop-left-sidebar.html">Uncategorized</a></li>
                            </ul>
                        </div>
                        <div class="widget widget_price_filter">
                            <h3 class="widget-title"><span>Filter by Price</span></h3>
                            <div class="collection_filter_by_price">
                                <input class="js-range-of-price" type="text" data-min="0" data-max="1055" name="filter_by_price" data-step="10">
                            </div>
                        </div>
                        <div class="widget widget_patoi_posts_thumb">
                            <h3 class="widget-title"><span>Our Best Sellers</span></h3>
                            <article class="item">
                                <a href="products-details.html" class="thumb">
                                    <img src="index_assets/assets/img/products/products1.jpg" alt="blog-image">
                                </a>
                                <div class="info">
                                    <h4 class="title"><a href="products-details.html">Pet brash</a></h4>
                                    <div class="star-rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </div>
                                    <span class="price">$150.00</span>
                                </div>
                            </article>
                            <article class="item">
                                <a href="products-details.html" class="thumb">
                                    <img src="index_assets/assets/img/products/products2.jpg" alt="blog-image">
                                </a>
                                <div class="info">
                                    <h4 class="title"><a href="products-details.html">Automatic dog blue leash</a></h4>
                                    <div class="star-rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </div>
                                    <span class="price">$150.00</span>
                                </div>
                            </article>
                            <article class="item">
                                <a href="products-details.html" class="thumb">
                                    <img src="index_assets/assets/img/products/products3.jpg" alt="blog-image">
                                </a>
                                <div class="info">
                                    <h4 class="title"><a href="products-details.html">Cat toilet bowl</a></h4>
                                    <div class="star-rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </div>
                                    <span class="price">$150.00</span>
                                </div>
                            </article>
                            <article class="item">
                                <a href="products-details.html" class="thumb">
                                    <img src="index_assets/assets/img/products/products4.jpg" alt="blog-image">
                                </a>
                                <div class="info">
                                    <h4 class="title"><a href="products-details.html">Bowl with rubber toy</a></h4>
                                    <div class="star-rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </div>
                                    <span class="price">$150.00</span>
                                </div>
                            </article>
                        </div>
                        <div class="widget widget_tag_cloud">
                            <h3 class="widget-title"><span>Tags</span></h3>
                            <div class="tagcloud">
                                <a href="shop-left-sidebar.html">Advertisment</a>
                                <a href="shop-left-sidebar.html">Business</a>
                                <a href="shop-left-sidebar.html">Life</a>
                                <a href="shop-left-sidebar.html">Lifestyle</a>
                                <a href="shop-left-sidebar.html">Fashion</a>
                                <a href="shop-left-sidebar.html">Ads</a>
                                <a href="shop-left-sidebar.html">Advertisment</a>
                            </div>
                        </div>
                        <div class="widget widget_follow_us">
                            <h3 class="widget-title"><span>Follow Us</span></h3>
                            <ul>
                                <li><a href="#" target="_blank">Facebook</a></li>
                                <li><a href="#" target="_blank">Twitter</a></li>
                                <li><a href="#" target="_blank">Instagram</a></li>
                                <li><a href="#" target="_blank">Pinterest</a></li>
                                <li><a href="#" target="_blank">Linkedin</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar Modal Area -->

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



    	<!--🟨 course ajax -->
	<script>
		function selectoption(select_value) {

			var xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("change").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", "select_ajax.php?select_value=" + select_value, true);
			xhttp.send();
		}
	</script>
</body>


</html>