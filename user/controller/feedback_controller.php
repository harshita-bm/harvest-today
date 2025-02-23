<?php 

include '../../config.php';

$admin = new Admin();

if (!isset($_SESSION['user_id'])) {
    header("location:../login_front.php");
}


$s_variable = $_SESSION['user_id'];

//---create/insert
if(isset($_POST['send_feedback'])){ 

	$message = $_POST['message'];  

    $user_id=$s_variable;

$query=$admin->cud("INSERT INTO `feedback`(`message`,`user_idf`) VALUES('$message','$user_id')","saved");

echo "<script>alert('Thanks for your feedback');window.location.href='../../feedback.php';</script>";
}          
?>