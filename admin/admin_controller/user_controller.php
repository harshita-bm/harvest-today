<?php

include '../../config.php';

$admin = new Admin();

if (!isset($_SESSION['admin_id'])) {
  header("location:../login_front.php");
}
?>

<?php
//delete
if (isset($_GET['remove_user'])) {

  $id = $_GET['remove_user'];
  $query = $admin->cud("DELETE FROM `user` WHERE `user_id`=" . $id, "deleted");
  echo "<script>alert('deleted successfully'); window.location.href='../user_manage.php';</script>";
}
?>