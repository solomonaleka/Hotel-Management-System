<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
   <link rel="stylesheet" type="text/css" href="../css/main_style.css" />
 <link rel="stylesheet" type="text/css" href="../css/sub_style.css" />
  <?php include '../essentials/metadata.php' ?>
</head>
<body>
<br /> <br />
  <div id="main">
    <?php include '../essentials/header.php' ?>
    <?php include 'userNavBar.php' ?>
	<div id="site_content">	
    <br />
    <h1 style="margin-left:340px;text-decoration:none;color:maroon;"> <u> Superior Double Room </u> </h1>
    <br />
    <div class="content_container_ad">
<img style="border-radius:25px;margin-left:0px;height:350px;width:400px;" src="../images/imageF.jpeg" alt="Third Image">
      </div><!--close content_container-->
      <h3 style="text-decoration:none;color:black;"> Available rooms in this category are shown below. </h3>
      <hr />
      <hr />
        <div id="result_set_room_detail">
    <?php
include 'base.php';
$sql="SELECT `room_id`,`hotel_name`,`room_type`,`room_number` FROM  `room_details` where `hotel_name`='Avari Hotels' and `room_type`='Superior Double Room' order by `room_number` asc ";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {
echo "<table border='5' >";
echo "<tr>";
echo  "<th> Room_ID </th>";
echo  "<th> Hotel Name </th>";
echo  "<th> Room Type </th>";
echo  "<th> Room Number </th>";
echo "</tr>";
while($row=mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$row['room_id']."</td>";
echo "<td>".$row['hotel_name']."</td>";
echo "<td>".$row['room_type']."</td>";
echo "<td>".$row['room_number']."</td>";
echo "</tr>";
}
echo "</table>";
//closing result set.
mysqli_free_result($result);
} else {
echo "No records matching the query were found".mysqli_connect_error();
}
}
mysqli_close($db_conn);
?>
<br />
<hr /> <hr />
</div> <!--close result_set_room_details-->
<div class="content_container_ad">
        <p style="margin-left:30px;"> Facilities and services available in this type of room are: </p>
        <ol type="1" start="1" style="font-size:16px;">
      <li> Flat screen TV. </li>
      <li> Blackout curtains. </li>
      <li> Coffee/tea facilities. </li>
      <li> King size bed 180cm </li>
      <li> Air cooling system </li>
      <li> Toilet and shower/bath. </li>
      <li> Iron and ironing board. </li>
    </ol>
    <br /> 
        <div class="button_small">
          <a href="superiorDoubleRoomForm.php">Book Now</a>
        </div><!--close button_small-->
        </div> <!-- close_container_ad_top-->	 	 	              
	</div> <!--close site_content--> 
  <?php include '../essentials/footer.php' ?>
</div> <!--close main-->
</body>
</html>