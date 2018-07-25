<?php
include 'base.php';
if(isset($_GET['booking_id'])  && is_numeric($_GET['booking_id'])) {
	$booking_id=$_GET['booking_id'];
	$sql="Delete from booking_details where booking_id=$booking_id";
$result=mysqli_query($db_conn,$sql);
if($result){
	header("location:../userBookingData.php");
}
else {
	header("location:../userBookingData.php");
}
}
?>