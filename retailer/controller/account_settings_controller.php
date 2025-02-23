<?php 

include '../../config.php';

$admin = new Admin();

?>

<?php
//update------------------------------------------------------------------
if(isset($_POST['update'])){ //update is submit button name

    $id = $_POST['retailer_id']; //hidden id passed in update form

	$username = $_POST['username']; 

    $password = $_POST['password']; 

    $imagename =$_POST['img']; //old image

    //new image
    if(is_uploaded_file($_FILES["image"]["tmp_name"])){
        $imagetargetfolder ='../uploads/'; 
        $imagename=$imagetargetfolder.basename($_FILES["image"]["name"]); //['image'] HTML tag input imagedb name
        move_uploaded_file($_FILES["image"]["tmp_name"],$imagename); 
    }

$query=$admin->cud("UPDATE `retailer` SET `username`='$username', `password`='$password',`retailer_imagedb`='$imagename' WHERE retailer.retailer_id='$id' ","updated successfully"); 

echo "<script>alert('updated');window.location.href='../account_settings.php';</script>";
}
?>

<?php
//delete------------------------------------------------------------------
if(isset($_GET['delete_account'])){  //delete_locations id is href variable from locations_manage delete button

$id =$_GET['delete_account']; 

$query=$admin->cud("DELETE FROM `retailer` where `retailer_id`=".$id,"Deleted successfully");
session_destroy();
echo "<script>alert('your account is deleted'); window.location.href='../../index.php';</script>";
}

?>