<?php

include '../../config.php';

$admin = new Admin();

if (!isset($_SESSION['user_id'])) {
    header("../login_front.php");
}

$s_variable = $_SESSION['user_id'];

//---add to cart from home page
if (isset($_GET['add_to_cart'])) {

    $product_id = $_GET['add_to_cart'];

    $quantity = 1;

    //this query to calculate cart total for fresh add
    $query = $admin->ret("SELECT * from `product` where `product_id`='$product_id' ");
    $product_row = $query->fetch(PDO::FETCH_ASSOC);

    $cart_total =  $quantity * $product_row['product_price'];
    //calculated cart total ends

    $query = $admin->ret("SELECT * from `cart` where `user_idc`='$s_variable' AND `product_id` = $product_id");
    $row_1 = $query->fetch(PDO::FETCH_ASSOC);

    if ($query->rowCount() > 0) //if already present
    {
        $quantity_new = $row_1['quantity'] + 1;

        $cart_total_new = $quantity_new * $product_row['product_price'];

        $query = $admin->cud("UPDATE `cart` SET `quantity`='$quantity_new',`cart_total`=' $cart_total_new' where `user_idc`='$s_variable' AND `product_id` = '$product_id' ", "updated successfully");
        echo "<script>alert('product added to cart again');window.location.href='../../index.php';</script>";
    } else {

        $fresh = $admin->cud("INSERT INTO `cart`(`product_id`,`user_idc`,`quantity`,`cart_total`) VALUES('$product_id','$s_variable','$quantity','$cart_total')", "saved");
        echo "<script>alert('product added to cart');window.location.href='../../index.php';</script>";
    }
   
}
?>

<?php
//delete from cart--------------------------------------------------------------
if(isset($_GET['delete_cart_product'])){  //delete_location id is href variable from location_manage delete button

$cart_id =$_GET['delete_cart_product']; 

$query=$admin->cud("DELETE FROM `cart` where `cart_id`=".$cart_id,"Deleted successfully");

echo "<script>alert('deleted'); window.location.href='../../cart.php';</script>";
}

?>