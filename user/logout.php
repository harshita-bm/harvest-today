<?php
session_start();
session_destroy();
echo "<script>alert('logout successfull'); window.location.href='../index.php';</script>";
//note: for logout only one page is enough
?>

