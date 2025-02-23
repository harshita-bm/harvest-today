<?php

include '../../config.php';

$admin = new Admin();

//---LOGIN
if(isset($_POST['login'])){

	$username = $_POST['username'];

	$password = $_POST['password'];

	$query=$admin->ret("SELECT * FROM `retailer` WHERE `username`='$username' AND `password`='$password' ");


//couting row
	$num=$query->rowCount();

	if($num>0){
		$row=$query->fetch(PDO::FETCH_ASSOC);

		$id =$row['retailer_id'];
		$_SESSION['retailer_id']=$id; //used to uniquely identify user session. use this in user pages

		echo "<script>alert('login successful'); window.location.href='../index.php';</script>";

	}


	else
	{
		echo "<script>alert('wrong username/password OR wait for approval'); window.location.href='../login_front.php';</script>";
	}
	
}

?>

<?php
//Registration
if(isset($_POST['register'])){

	$username = $_POST['username'];

	$password = $_POST['password'];

	$retailer_name = $_POST['retailer_name'];

	$phone = $_POST['phone'];

	$status ='pending';


	$email =$_POST['email'];

	$shop_name =$_POST['shop_name'];

	
	//---image
	$imagetargetfolder ='../uploads/';  // folder to store images
	$imagename=$imagetargetfolder.basename($_FILES["image"]["name"]); //['image'] is HTML name=""
	move_uploaded_file($_FILES["image"]["tmp_name"],$imagename); 
	
	$query=$admin->cud("INSERT INTO `retailer` (`username`,`password`,`retailer_name`,`phone`,`retailer_imagedb`,`status`,`email`,`shop_name`)   VALUES('$username','$password','$retailer_name','$phone','$imagename','$status','$email','$shop_name')","saved");
	
	echo "<script>alert('registration successful'); window.location.href='../index.php';</script>";
	}
?>