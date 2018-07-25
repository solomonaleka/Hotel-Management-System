<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
  <?php include 'essentials/externalReference.php' ?>
  <?php include 'essentials/metadata.php' ?>
</head>
<body>
<br /> <br />
  <div id="main">
    <?php include 'essentials/header.php' ?>
  <?php include 'essentials/userNavBar.php' ?>  
  <div id="site_content"> 
  <br />            
      <!--main content of the page goes here...-->              
      <br />
      <h1 style="margin-left: 290px;"> <u> Available Rooms in the database </u> </h1>
      <br />
      <div id="result_set_room_details_user">
  <?php
include 'base.php';
$sql="SELECT `room_id`,`hotel_name`,`room_type`,`room_number` FROM  `room_details` order  by `room_number` asc ";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {
echo "<table border='5' >";

echo "<tr>";
echo  "<th> Room ID </th>";
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
</div>  <!-- close result_set_room_details_user --> 	 	               
	</div> <!--close site_content--> 
  <br />
  <input style="margin-left:500px;" type="submit" value="Print PDF" onclick="window.print()" />
  <?php include 'essentials/footer.php' ?>
</div> <!-- close main -->
</body>
</html>