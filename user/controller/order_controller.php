<?php

include '../../config.php';

$admin = new Admin();

if (!isset($_SESSION['user_id'])) {
    header("../login_front.php");
}

$s_variable = $_SESSION['user_id'];

//---add customer details to payment table

if (isset($_POST['checkout_the_product'])) {

    //from cart to order table
    $query_cart = $admin->ret("SELECT * FROM `cart` where `user_idc`=$s_variable ");
    while ($row = $query_cart->fetch(PDO::FETCH_ASSOC)) {

        $cart_id = $row['cart_id'];

        $product_id = $row['product_id'];

        $user_id = $row['user_idc'];

        $quantity = $row['quantity'];

        $cart_total = $row['cart_total'];

        $query_orders = $admin->cud("INSERT INTO `orders`(`cart_id`,`product_id`,`user_ido`,`quantity`,`cart_total`) VALUES('$cart_id','$product_id','$user_id','$quantity','$cart_total')", "saved"); 
    }

    
        //🔵 form insertion elements
    $full_name = $_POST['full_name'];

    $country = $_POST['country'];

    $street = $_POST['street'];

    $city = $_POST['city'];

    // $phone = $_POST['phone'];

    $pincode = $_POST['pincode'];

    $phone = $_POST['phone'];

    $email = $_POST['email'];

    $order_status = 'pending';

        //🟨 inserting into payment table
        $card_number = $_POST['card_number'];

        $expiry = $_POST['expiry'];
    
        $transaction_id = $_POST['transaction_id'];
    
        $payment_method = $_POST['payment_method'];

// 🔰while loop
    $query_details = $admin->ret("SELECT * FROM `orders` WHERE `user_ido`=$s_variable and not `order_status`='order accepted' and not `order_status`='order shipped' and not `order_status`='order cancelled' ");
    while ($row = $query_details->fetch(PDO::FETCH_ASSOC)) {

        $order_id = $row['order_id'];

        $product_id = $row['product_id'];

        $query = $admin->cud("UPDATE `orders` SET `full_name`='$full_name', `country`='$country',  `street`='$street',  `city`='$city',`pincode`='$pincode', `datetime`=now(), `phone`='$phone',`email`='$email', `order_status`='$order_status' WHERE orders.user_ido='$s_variable'  and `order_id`='$order_id' ", "updated successfully");
        
         // inserting to payment table
         $query_payment = $admin->cud("INSERT INTO `payment`(`order_id`,`product_id`,`user_idp`,`card_number`,`expiry`,`transaction_id`,`payment_method`) VALUES('$order_id','$product_id','$s_variable','$card_number','$expiry','$transaction_id','$payment_method')", "saved");
        
        
    }
    // deleting from cart
    $query = $admin->cud("DELETE FROM `cart` where `user_idc`=$s_variable", "Deleted successfully");


    //🔰while loop
    // ⭕ inserting order id to payment table
    // $query_details = $admin->ret("SELECT * FROM `orders` WHERE `user_ido`=$s_variable and `order_status`='pending' ");
    // while ($row = $query_details->fetch(PDO::FETCH_ASSOC)) {

    //     $order_id = $row['order_id'];

    //     $query_pay = $admin->cud("UPDATE `payment` SET `card_number`='$card_number',`expiry`='$expiry',`transaction_id`='$transaction_id',`payment_method`='$payment_method' where `order_id`='$order_id' ", "saved");
    // }
     echo "<script>alert('order placed');window.location.href='../../order_status.php';</script>";
}
?>

<!-- cancel order - order_status -->
<?php
if (isset($_GET['cancel_order_id'])) {

    $order_id = $_GET['cancel_order_id'];


    $query =$admin->cud("UPDATE `orders` SET `order_status`='order cancelled' where `order_id`='$order_id' ", "saved");

    $query =$admin->cud("UPDATE `payment` SET `pay_status`='refunded' where `order_id`='$order_id' ", "saved");

    echo "<script>alert('cancelled this order');window.location.href='../../order_status.php';</script>";
}
?>