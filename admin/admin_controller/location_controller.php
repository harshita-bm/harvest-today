<?php 

include '../../config.php';

$admin = new Admin();


//---create/insert
if(isset($_POST['insert'])){ 

	$location_name = $_POST['location_name'];  //['location_name'] HTML input tag name=""


//image
$imagetargetfolder ='../uploads/'; //folder in which we store image
$imagename=$imagetargetfolder.basename($_FILES["image"]["name"]); //['image'] is name in HTML input tag
move_uploaded_file($_FILES["image"]["tmp_name"],$imagename); 

$query=$admin->cud("INSERT INTO `location`(`location_name`,`location_imagedb`) VALUES('$location_name','$imagename')","saved");

echo "<script>alert('inserted successfully');window.location.href='../location_manage.php';</script>";
}          
?>

<?php
//update------------------------------------------------------------------
if(isset($_POST['update'])){ 

    $id = $_POST['location_id']; //hidden id passed in update form

	$location_name = $_POST['location_name']; 


    $imagename =$_POST['img']; //old image

    //new image
    if(is_uploaded_file($_FILES["image"]["tmp_name"])){
        $imagetargetfolder ='../uploads/'; 
        $imagename=$imagetargetfolder.basename($_FILES["image"]["name"]); //['image'] HTML tag input imagedb name
        move_uploaded_file($_FILES["image"]["tmp_name"],$imagename); 
    }

$query=$admin->cud("UPDATE `location` SET `location_name`='$location_name',`location_imagedb`='$imagename' WHERE location.location_id='$id' ","updated successfully"); 

echo "<script>alert('updated');window.location.href='../location_manage.php';</script>";
}
?>

<?php
//delete------------------------------------------------------------------
if(isset($_GET['delete_location'])){  //delete_location id is href variable from location_manage delete button

$id =$_GET['delete_location']; 

$query=$admin->cud("DELETE FROM `location` where `location_id`=".$id,"Deleted successfully");

echo "<script>alert('deleted'); window.location.href='../location_manage.php';</script>";
}

?>