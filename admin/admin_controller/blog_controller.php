<?php

include '../../config.php';

$admin = new Admin();

if (!isset($_SESSION['admin_id'])) {
    header("location:login_front.php");
}
$s_variable = $_SESSION['admin_id'];

//---create/insert location
if (isset($_POST['create_blog'])) {

    $blog_heading = $_POST['blog_heading'];

    $blog_content = $_POST['blog_content'];

    //image
    $imagetargetfolder = '../uploads/'; //folder in which we store image
    $imagename = $imagetargetfolder . basename($_FILES["image"]["name"]); //['image'] is name in HTML input tag
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagename);

    $query = $admin->cud("INSERT INTO `blog`(`blog_heading`,`blog_content`,`blog_image`) VALUES('$blog_heading','$blog_content','$imagename')", "saved");

    echo "<script>alert('inserted successfully');window.location.href='../blog_manage.php';</script>";
}
?>

<?php
//update------------------------------------------------------------------
if (isset($_POST['update_blog'])) {

    $blog_id = $_POST['blog_id'];

    $blog_heading = $_POST['blog_heading'];

    $blog_content = $_POST['blog_content'];

    $imagename = $_POST['img']; //old image

    //new image
    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
        $imagetargetfolder = '../uploads/';
        $imagename = $imagetargetfolder . basename($_FILES["image"]["name"]); //['image'] HTML tag input imagedb name
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagename);
    }

    $query = $admin->cud("UPDATE `blog` SET `blog_heading`='$blog_heading', `blog_content`='$blog_content', `blog_image`='$imagename' where blog.blog_id='$blog_id' ", "updated successfully");

    echo "<script>alert('updated');window.location.href='../blog_manage.php';</script>";
}
?>

<?php
//delete------------------------------------------------------------------
if (isset($_GET['delete_blog'])) {  //delete_locations id is href variable from locations_manage delete button

    $blog_id = $_GET['delete_blog'];

    $query = $admin->cud("DELETE FROM `blog` where `blog_id`='$blog_id'  ", "Deleted successfully");

    echo "<script>alert('deleted'); window.location.href='../blog_manage.php';</script>";
}

?>