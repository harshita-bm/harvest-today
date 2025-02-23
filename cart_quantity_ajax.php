<?php

include 'config.php';

$admin = new Admin();

if (!isset($_SESSION['user_id'])) {
    header("location:petowner/loginfront.php");
}
$s_variable = $_SESSION['user_id'];


//echo "ajax working";
?>

<?php
//------------------------------1.increment quantity

if (isset($_GET['cart_id_increment'])) {

    $cart_id = $_GET['cart_id_increment'];

    $query = $admin->ret("SELECT * from `cart` INNER JOIN `product` ON cart.product_id= product.product_id where `cart_id`=$cart_id");
    $row = $query->fetch(PDO::FETCH_ASSOC);

    $product_price = $row['product_price'];

    $quantity = $row['quantity'] + 1; //quantity incremented +1

    $cart_total = $product_price * $quantity;

    $query = $admin->cud("UPDATE `cart` SET `quantity`='$quantity',`cart_total`=$cart_total WHERE `cart_id`=$cart_id", "updated successfully");
}
?>

<?php
//------------------------------1.decrement quantity

if (isset($_GET['cart_id_decrement'])) {

    $cart_id = $_GET['cart_id_decrement'];

    $query = $admin->ret("SELECT * from `cart` INNER JOIN `product` ON cart.product_id= product.product_id where `cart_id`=$cart_id");
    $row = $query->fetch(PDO::FETCH_ASSOC);

    $product_price = $row['product_price'];

    $quantity = $row['quantity'] - 1; //quantity incremented +1

    $cart_total = $product_price * $quantity;

    $query = $admin->cud("UPDATE `cart` SET `quantity`='$quantity',`cart_total`=$cart_total WHERE `cart_id`=$cart_id", "updated successfully");
}
?>

<!-- 🟡 ajax pushing code -->

<div class="cart-area ptb-100" id="ajax_cart_table">
        <div class="container">
            <form>
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th scope="col">Product</th>
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
                        <li>Total <span><?php echo $total_loop ?> RS</span></li>
                    </ul>
                    <a href="checkout.php" class="default-btn"><span>Proceed to Checkout</span></a>
                </div>
            <?php } else { ?>
                <p style="color:red;  text-align: center;">cart is empty</p>
            <?php } ?>
            </form>
        </div>
    </div>