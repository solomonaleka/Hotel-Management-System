<?php
include 'base.php';
if(isset($_GET['contact_id'])  && is_numeric($_GET['contact_id'])) {
	$contact_id=$_GET['contact_id'];
	$sql="Delete from contact_details where contact_id=$contact_id";
$result=mysqli_query($db_conn,$sql);
if($result){
	header("location:../viewComments.php");
}
else {
	header("location:../viewComments.php");
}
}
?>