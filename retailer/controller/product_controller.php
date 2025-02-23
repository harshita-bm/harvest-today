<?php 

include '../../config.php';

$admin = new Admin();

if (!isset($_SESSION['retailer_id'])) { //$_SESSION is from admin loginback.php page
    header("location:login_front.php");
}

$s_variable =$_SESSION['retailer_id']; //assigning session to variable


//---create/insert
if(isset($_POST['insert_product'])){ 

	$product_name = $_POST['product_name'];  //['product_name'] HTML input tag name=""

    $product_price = $_POST['product_price'];

    $category_idp =$_POST['category_idp'];

    $product_description =$_POST['product_description'];

    $retailer_idp =$s_variable;

    $product_status ='available';


//image
$imagetargetfolder ='../uploads/'; //folder in which we store image
$imagename=$imagetargetfolder.basename($_FILES["image"]["name"]); //['image'] is name in HTML input tag
move_uploaded_file($_FILES["image"]["tmp_name"],$imagename); 

$query=$admin->cud("INSERT INTO `product`(`product_name`,`product_price`,`product_imagedb`,`category_idp`,`product_description`,`retailer_idp`,`product_status`) VALUES('$product_name','$product_price','$imagename','$category_idp','$product_description','$retailer_idp','$product_status')","saved");

echo "<script>alert('inserted successfully');window.location.href='../product_manage.php';</script>";
}          
?>

<?php
//update------------------------------------------------------------------
if(isset($_POST['update_product'])){ 

    $product_id = $_POST['product_id'];

	$product_name = $_POST['product_name'];  //['product_name'] HTML input tag name=""

    $product_price = $_POST['product_price'];

    $imagename =$_POST['img']; //old image

    $category_idp =$_POST['category_idp'];

    $product_description =$_POST['product_description'];





    //new image
    if(is_uploaded_file($_FILES["image"]["tmp_name"])){
        $imagetargetfolder ='../uploads/'; 
        $imagename=$imagetargetfolder.basename($_FILES["image"]["name"]); //['image'] HTML tag input imagedb name
        move_uploaded_file($_FILES["image"]["tmp_name"],$imagename); 
    }

$query=$admin->cud("UPDATE `product` SET `product_name`='$product_name',`product_price`='$product_price',`product_imagedb`='$imagename',`category_idp`='$category_idp',`product_description`='$product_description' WHERE product.product_id='$product_id' ","updated successfully"); 

echo "<script>alert('updated');window.location.href='../product_manage.php';</script>";
}
?>

<?php
//delete------------------------------------------------------------------
if(isset($_GET['delete_product'])){  //delete_product id is href variable from location_manage delete button

$product_id =$_GET['delete_product']; 

$query=$admin->cud("DELETE FROM `product` where `product_id`=".$product_id,"Deleted successfully");

echo "<script>alert('deleted'); window.location.href='../product_manage.php';</script>";
}

?>

<?php
//unavailable-----------------------------------------------------------------
if(isset($_GET['mark_unavailable'])){ 

    $product_id = $_GET['mark_unavailable'];  

$query=$admin->cud("UPDATE `product` SET `product_status`='unavailable' WHERE product.product_id='$product_id' ","updated successfully"); 

echo "<script>alert('updated as unavailable');window.location.href='../product_manage.php';</script>";
}
?>

<?php
//unavailable-----------------------------------------------------------------
if(isset($_GET['mark_available'])){ 

    $product_id = $_GET['mark_available'];  

$query=$admin->cud("UPDATE `product` SET `product_status`='available' WHERE product.product_id='$product_id' ","updated successfully"); 

echo "<script>alert('updated as available');window.location.href='../product_manage.php';</script>";
}
?>