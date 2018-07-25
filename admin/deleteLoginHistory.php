<?php
include 'base.php';
if(isset($_GET['log_id'])  && is_numeric($_GET['log_id'])) {
	$log_id=$_GET['log_id'];
	$sql="Delete from user_log where log_id=$log_id";
$result=mysqli_query($db_conn,$sql);
if($result){
	header("location:../loginHistory.php");
}
else {
	header("location:../loginHistory.php");
}
}
?>