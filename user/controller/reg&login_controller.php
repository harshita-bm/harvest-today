<?php

include '../../config.php';

$admin = new Admin();

//---Home page LOGIN
if (isset($_POST['login'])) {

	$username = $_POST['username'];

	$password = $_POST['password'];

	$query = $admin->ret("SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password' ");


	//couting row
	$num = $query->rowCount();

	if ($num > 0) {
		$row = $query->fetch(PDO::FETCH_ASSOC);

		$id = $row['user_id'];
		$_SESSION['user_id'] = $id; //used to uniquely identify user session. use this in user pages

		echo "<script>alert('login successful'); window.location.href='../../index.php';</script>";
	} else {
		echo "<script>alert('wrong username or password..!'); window.location.href='../../index.php';</script>";
	}
}
?>

<?php
//---Home page LOGIN
if (isset($_POST['login_cart'])) {

	$username = $_POST['username'];

	$password = $_POST['password'];

	$query = $admin->ret("SELECT * FROM `petowner` WHERE `username`='$username' AND `password`='$password' AND `status`='approved' ");


	//couting row
	$num = $query->rowCount();

	if ($num > 0) {
		$row = $query->fetch(PDO::FETCH_ASSOC);

		$id = $row['petowner_id'];
		$_SESSION['petowner_id'] = $id; //used to uniquely identify user session. use this in user pages

		echo "<script>alert('login successful'); window.location.href='../../pet_products_index.php';</script>";
	} else {
		echo "<script>alert('wrong username or password..!'); window.location.href='../../index.php';</script>";
	}
}
?>


<?php
//Registration
if (isset($_POST['register'])) {

	$username = $_POST['username'];

	$password = $_POST['password'];

	$user_name = $_POST['user_name'];

	$phone = $_POST['phone'];

	$email = $_POST['email'];

	$status = 'pending';

	//---image
	$imagetargetfolder = '../uploads/';  // folder to store images
	$imagename = $imagetargetfolder . basename($_FILES["image"]["name"]); //['image'] is HTML name=""
	move_uploaded_file($_FILES["image"]["tmp_name"], $imagename);

	$query = $admin->cud("INSERT INTO `user` (`username`,`password`,`user_name`,`phone`,`email`,`user_imagedb`,`status`) VALUES('$username','$password','$user_name','$phone','$email','$imagename','$status')", "saved");

	echo "<script>alert('registration successful'); window.location.href='../../index.php';</script>";
}




?>