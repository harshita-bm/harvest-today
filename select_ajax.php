<?php

include 'config.php';

$admin = new Admin();


//updating customer location_id based on dropdown selection
if (isset($_GET['select_value'])) {

    $selected_category = $_GET['select_value']; //['lid'] is <input tag name=""

}
?>

<!-- showing selected category name -->

<?php $query = $admin->ret("SELECT * FROM `product` INNER JOIN `category` ON product.category_idp = category.category_id where `category_id`='$selected_category' ");
$row = $query->fetch(PDO::FETCH_ASSOC); ?>



<!-- 🟨 ajax change  -->
<div class="products-area pb-75" id="change">
    <div class="container">
        <div class="section-title pt-4">
            <h2>selected Category : <span style="color: red;"><?php echo $row['category_name'] ?> </span> </h2>
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
            <?php $query = $admin->ret("SELECT * FROM `product` INNER JOIN `category` ON product.category_idp = category.category_id where `category_id`='$selected_category' ");
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

                                    <?php if ($row['product_status'] == 'unavailable') { ?>
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