<?php 

include '../../config.php';

$admin = new Admin();

//note: if(isset) is given to execute particular echo, if is not present always first echo executed

if(isset($_GET['update_status']))
{
$id = $_GET['update_status']; //['mycid'] from managecutomer.php variable

$query=$admin->cud("UPDATE `retailer` SET `status`='approved' WHERE retailer.retailer_id=".$id,"approved");

echo "<script>alert('approved'); window.location.href='../retailer_manage.php';</script>";
}
?>

<?php 
//delete
if(isset($_GET['remove_retailer'])) 
{
  
  $id=$_GET['remove_retailer'];
  $query=$admin -> cud("DELETE FROM `retailer` WHERE `retailer_id`=".$id,"deleted");
  echo "<script>alert('removed successfully'); window.location.href='../retailer_manage.php';</script>";
}
?>