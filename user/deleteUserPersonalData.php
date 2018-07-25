<?php
include 'base.php';
if(isset($_GET['user_id'])  && is_numeric($_GET['user_id'])) {
	$user_id=$_GET['user_id'];
	$sql="Delete from user_details where user_id=$user_id";
$result=mysqli_query($db_conn,$sql);
if($result){
	header("location:../userPersonalData.php");
}
else {
	header("location:../userPersonalData.php");
}
}
?>