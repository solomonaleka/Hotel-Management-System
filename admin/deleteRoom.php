<?php
include 'base.php';
if(isset($_GET['room_id'])  && is_numeric($_GET['room_id'])) {
	$room_id=$_GET['room_id'];
	$sql="Delete from room_details where room_id=$room_id";
$result=mysqli_query($db_conn,$sql);
if($result){
	header("location:../viewRoomsAdmin.php");
}
else {
	header("location:../viewRoomsAdmin.php");
}
}
?>