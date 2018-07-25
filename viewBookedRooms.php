<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
  <?php include 'essentials/externalReference.php' ?>
  <?php include 'essentials/metadata.php' ?>
  <script language="javascript" type="text/javascript">
  function isDelete()
  {
   var d = confirm('Are you sure you want to Delete !!');
   if(!d)
   {
    alert(window.location='viewBookedRooms.php');
   }
   else
   {
   return false;
    
   }
  }   
</script>
</head>
<body>
<br /> <br />
  <div id="main">
    <?php include 'essentials/header.php' ?>
  <?php include 'essentials/adminNavBar.php' ?>  
  <div id="site_content"> 
  <br />            
      <!--main content of the page goes here...-->              
      <br />
      <h1 style="margin-left: 280px;"> <u> Booked Rooms in the Database </u> </h1>
      <br />
      <div id="result_set_booking_details_admin">
  <?php
include 'base.php';
$sql="SELECT * FROM  `booking_details` order by `booking_id` asc";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {

  echo "<table border='1' >";
echo "<tr>";
echo  "<th> Booking ID </th>";
echo  "<th> First Name </th>";
echo  "<th> Second Name </th>";
echo  "<th> Hotel Name </th>";
echo  "<th> Room Type </th>";
echo  "<th> Fixed Charge </th>";
echo  "<th> Time Of Booking </th>";
echo  "<th> Check In Date </th>";
echo  "<th> Check In Date </th>";
echo  "<th> Operation </th>";
echo "</tr>";
while($row=mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$row['booking_id']."</td>";
echo "<td>".$row['first_name']."</td>";
echo "<td>".$row['second_name']."</td>";
echo "<td>".$row['hotel_name']."</td>";
echo "<td>".$row['room_type']."</td>";
echo "<td>".$row['fixed_charge']."</td>";
echo "<td>".$row['time_of_booking']."</td>";
echo "<td>".$row['check_in_date']."</td>";
echo "<td>".$row['check_out_date']."</td>";
echo '<td><a href="user/deleteUserBookingData.php?booking_id='.$row['booking_id'].'"> <b> <img src="images/deleteIcon.png" height="30" width="30" alt="deleteIcon" style="margin-left:20px;" onclick="isDelete()" /> </b> </a> </td>';
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
</div> <!-- close result_set_booking_details_admin -->              
	</div> <!--close site_content--> 
  <br />
  <input style="margin-left:490px;" type="submit" value="Print PDF" onclick="window.print()" />
  <?php include 'essentials/footer.php' ?>
</div> <!-- close main -->
</body>
</html>