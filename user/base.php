<?php
$servername="localhost";
$username="root";
$password="";
$dbname="deluxe_hotel_management_system";
$db_conn=mysqli_connect($servername,$username,$password,$dbname);
// Testing whether the connection was successful...
if(!$db_conn) {
	die("Connection failed:".mysqli_connect_error());
}
// echo "Connection has been made";
?>