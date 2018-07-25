<?php
$hotel_name = $room_type = $room_number = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $hotelname = test_hotelname($_POST["hotelname"]);
  $roomtype = test_roomtype($_POST["roomtype"]);
  $roomnumber = test_roomnumber($_POST["roomnumber"]);
}

function test_hotelname($hotelname) {
  $hotelname = trim($hotelname);
  $hotelname = stripslashes($hotelname);
  $hotelname = htmlspecialchars($hotelname);
  return $hotelname;
}
function test_roomtype($roomtype) {
  $roomtype = trim($roomtype);
  $roomtype = stripslashes($roomtype);
  $roomtype = htmlspecialchars($roomtype);
  return $roomtype;
}
function test_roomnumber($roomnumber) {
  $roomnumber = trim($roomnumber);
  $roomnumber = stripslashes($roomnumber);
  $roomnumber = htmlspecialchars($roomnumber);
  return $roomnumber;
}

//Referring to a file connecting to the database.
include('base.php');
//Isset meaning the submit button has been clicked.
if(ISSET($_POST['submit'])){
$hotelname=mysqli_real_escape_string($db_conn,$_POST['hotelname']);
$roomtype=mysqli_real_escape_string($db_conn,$_POST['roomtype']);
$roomnumber=mysqli_real_escape_string($db_conn,$_POST['roomnumber']);
//Sql command that checks whether selected room exists in the room_details table...
$check_room="SELECT * FROM  room_details where room_number='$roomnumber'";
$result_room=mysqli_query($db_conn,$check_room);
$count_room=mysqli_num_rows($result_room);
if($count_room==1) {
  echo "<script> alert('The room exists!!')</script>";
}
else {
  //Sql command for inserting data into the room_details table.
$sql="insert into `room_details` (`hotel_name`,`room_type`,`room_number`) values ('$hotelname','$roomtype','$roomnumber')";
$result=mysqli_query($db_conn,$sql);
if($result){
echo "<script> alert('A new room has been added successfully!!')</script>";
} else{
echo "<script> alert('Error in adding a new room!!')</script>";
}
}
}
mysqli_close($db_conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
  <?php include 'essentials/externalReference.php' ?>
  <?php include 'essentials/metadata.php' ?>

  <script language="javascript" type="text/javascript" src="js/newRoom.js">
</script>

</head>
<body>
<br /> <br />
  <div id="main">
    <?php include 'essentials/header.php' ?>
	<?php include 'essentials/adminNavBar.php' ?>	
	<div id="site_content">	
  <br />	
    <br />
    <h1 style="margin-left:360px;color:black;"> <u> New Room Form </u> </h1>
<br />
           <form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return(validate());" novalidate>
           <div id="new_hotel_container">
                <div id="form-group">
                <label>Hotel Name:</label>
                   <select name="hotelname">
                <option value="-select-" selected > -select- </option>
                <option value="Avari Hotels"> Avari Hotels </option>
                <option value="Aloft Hotels"> Aloft Hotels </option>
                <option value="Choice Hotels"> Choice Hotels </option>
                <option value="Clarion Hotels"> Clarison Hotel </option>
                     </select>
                </div> <br /> <br />
                 <div id="form-group">
                <label>Room Type:</label>
                <select name="roomtype">
                <option value="-select-" selected > -select- </option>
                <option value="Standard Single Room"> Standard Single Room </option>
                <option value="Superior Single Room"> Superior Single Room </option>
                <option value="Standard Double Room"> Standard Double Room </option>
                <option value="Superior Double Room"> Superior Double Room </option>
                <option value="Family Room"> Family Room </option>
                <option value="VIP Room"> VIP Room </option>
                     </select>
                </div> <br /> <br />
                <div id="form-group">
                <label>Room Number:</label>
                    <input name="roomnumber" type="number" placeholder="Room Number..." value="" />
                </div> <br /> <br />
          <input type="submit" name="submit" id="submit" value="Submit" style="margin-left:170px;">
            </form> 
          </div> <!-- close new_hotel_container -->
	</div> <!--close site_content-->
  <?php include 'essentials/footer.php' ?> 
</div> <!-- close main -->
</body>
</html>