<?php

include '../../config.php';

$admin = new Admin();

//note: if(isset) is given to execute particular echo, if is not present always first echo executed

if (isset($_GET['accept_order_id'])) {
  $order_id = $_GET['accept_order_id']; //['mycid'] from managecutomer.php variable

  $query = $admin->cud("UPDATE `orders` SET `order_status`='order accepted' WHERE orders.order_id='$order_id' AND not `order_status`='order_shipped' ", "approved");

  echo "<script>alert('order is accepted'); window.location.href='../orders_manage.php';</script>";
}


if (isset($_GET['ship_order_id'])) {
  $order_id = $_GET['ship_order_id']; //['mycid'] from managecutomer.php variable

  $query = $admin->cud("UPDATE `orders` SET `order_status`='order shipped' WHERE orders.order_id=" . $order_id, "approved");

  echo "<script>alert('order is shipped'); window.location.href='../orders_manage.php';</script>";
}
?>

<!-- cancel order - order_status -->
<?php
if (isset($_GET['cancel_order_id'])) {

  $order_id = $_GET['cancel_order_id'];


  $query =$admin->cud("UPDATE `orders` SET `order_status`='order cancelled' where `order_id`='$order_id' ", "saved");

  $query =$admin->cud("UPDATE `payment` SET `pay_status`='refunded' where `order_id`='$order_id' ", "saved");

  echo "<script>alert('cancelled this order');window.location.href='../orders_manage.php';</script>";
}
?>