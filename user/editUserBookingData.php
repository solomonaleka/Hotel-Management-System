<?php
session_start();
$timezone = "Asia/Manila";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$checkInDate = date('m/d/Y');
$checkOutDate = date('m/d/Y', strtotime("+1 day", strtotime($checkInDate)));

include 'base.php';
if(isset($_GET['booking_id'])  && is_numeric($_GET['booking_id'])) {
  $booking_id=$_GET['booking_id'];
  $sql="Select* from booking_details where booking_id='$booking_id'";
  $result=mysqli_query($db_conn,$sql);
  $row=mysqli_fetch_array($result);
}
// define variables and set to empty values
$firstname = $secondname = $hotelname = $room = $amount = $roomNumber = ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = test_firstname($_POST["firstname"]);
  $secondname = test_secondname($_POST["secondname"]);
  $hotelname = test_hotelname($_POST["hotelname"]);
  $room = test_room($_POST["room"]);
  $amount = test_amount($_POST["amount"]);
  $roomNumber = test_roomNumber($_POST["roomNumber"]);
}

function test_firstname($firstname) {
  $firstname = trim($firstname);
  $firstname = stripslashes($firstname);
  $firstname = htmlspecialchars($firstname);
  return $firstname;
}

function test_secondname($secondname) {
  $secondname = trim($secondname);
  $secondname = stripslashes($secondname);
  $secondname = htmlspecialchars($secondname);
  return $secondname;
}

function test_hotelname($hotelname) {
  $hotelname = trim($hotelname);
  $hotelname = stripslashes($hotelname);
  $hotelname = htmlspecialchars($hotelname);
  return $hotelname;
}
function test_room($room) {
  $room = trim($room);
  $room = stripslashes($room);
  $room = htmlspecialchars($room);
  return $room;
}
function test_amount($amount) {
  $amount = trim($amount);
  $amount = stripslashes($amount);
  $amount = htmlspecialchars($amount);
  return $amount;
}
function test_roomNumber($roomNumber) {
  $roomNumber = trim($roomNumber);
  $roomNumber = stripslashes($roomNumber);
  $roomNumber = htmlspecialchars($roomNumber);
  return $roomNumber;
}
if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
  echo "<script type=\"text/javascript\"> alert('Only letters and white space allowed for First Name') </script>";
  exit();
} 

if (!preg_match("/^[a-zA-Z ]*$/",$secondname)) {
  echo "<script type=\"text/javascript\"> alert('Only letters and white space allowed for Second Name') </script>";
  exit();
} 


if(isset($_POST['edit'])){
$firstname=mysqli_real_escape_string($db_conn,$_POST['firstname']);
$secondname=mysqli_real_escape_string($db_conn,$_POST['secondname']);
$hotelname=mysqli_real_escape_string($db_conn,$_POST['hotelname']);
$room=mysqli_real_escape_string($db_conn,$_POST['room']);
$amount=mysqli_real_escape_string($db_conn,$_POST['amount']);
$roomNumber=mysqli_real_escape_string($db_conn,$_POST['roomNumber']);
$checkInDate=mysqli_real_escape_string($db_conn,$_POST['checkInDate']);
$checkOutDate=mysqli_real_escape_string($db_conn,$_POST['checkOutDate']);
$booking_id=mysqli_real_escape_string($db_conn,$_POST['booking_id']);


// Declaring the session variables...
$_SESSION["firstname"] = $firstname;
$_SESSION["secondname"] =$secondname;
$_SESSION["hotelname"] = $hotelname;
$_SESSION["room"] =$room;
$_SESSION["amount"] = $amount;
$_SESSION["roomNumber"] =$roomNumber;
$_SESSION["checkInDate"] = $checkInDate;
$_SESSION["checkOutDate"] =$checkOutDate;
$days =6;
$payable= $amount*$days;
$_SESSION['pay']= $payable;

//Sql command that checks whether client booking really exists in the user_details table...
$check_user="SELECT * FROM  user_details where first_name='$firstname'";
$result_user=mysqli_query($db_conn,$check_user);
$count_user=mysqli_num_rows($result_user);
if($count_user>0) {
//Sql command that checks whether selected room exists in the room_details table...
$check_room="SELECT * FROM  room_details where room_number='$roomNumber' and hotel_name='$hotelname' and room_type='$room'";
$result_room=mysqli_query($db_conn,$check_room);
$count_room=mysqli_num_rows($result_room);
if($count_room>0) { // opening select room if statement...
//Sql command for updating booking data into the database.
$sql="update booking_details set first_name='$firstname',second_name='$secondname',hotel_name='$hotelname',room_type='$room',fixed_charge='$amount',room_number='$roomNumber',check_in_date='$checkInDate',check_out_date='$checkOutDate' where booking_id='$booking_id'";
$result=mysqli_query($db_conn,$sql);
if($result){ // opening insert room if statement... 
//Sql command that removes booked room from room_details table...
$delete_room="DELETE FROM  room_details where room_number='$roomNumber'";
$result_delete=mysqli_query($db_conn,$delete_room);
if($result_delete) { // opening delete room if statement...
echo "<script> window.location=\"../Avari_Hotels/payment.php\" </script>";
} // closing delete room if statement...
} // closing insert room if statement... 
} // closing select room if statement..
else { // opening select room else statement...
echo "<script> window.location=\"../userBookingData.php\" </script>";
} // closing select room else statement..
} // close select user if statement
else {
echo "<script> alert('Not a registered client!!')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>

  <link rel="stylesheet" type="text/css" href="../css/main_style.css" />
 <link rel="stylesheet" type="text/css" href="../css/sub_style.css" />
 <link type="text/css" href="../css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
 <?php include '../essentials/metadata.php' ?>
 <script language="javascript" type="text/javascript" src="../js/editUserBookingData.js"> </script>
<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="../js/jquery-ui-1.8.21.custom.min.js"></script>
   <script>
$(function() {
    $( "#checkInDate" ).datepicker({
        // before datepicker opens run this function
        beforeShow: function(){
            // this gets today's date       
            var theDate = new Date();
            // sets "theDate" 17 days ahead of today
            //theDate.setDate(theDate.getDate() + 17);
      theDate.setDate(<?php echo $checkOutDate ?> + 17);
            // set min date as 6 days from today
            $(this).datepicker('option','minDate',theDate);         
        },
        // When datepicker for start date closes run this function
        onClose: function(){
            // this gets the selected start date        
            var theDate = new Date($(this).datepicker('getDate'));
            // this sets "theDate" 1 day forward of start date
            theDate.setDate(theDate.getDate() + 1);
            // set min date for the end date as one day after start date
            $('#checkOutDate').datepicker('option','minDate',theDate);
      
        }
    });
    $( "#checkOutDate" ).datepicker({
        // before datepicker opens run this function
        beforeShow: function(){
            // this gets today's date       
            var theDate = new Date($( "#checkInDate" ).datepicker('getDate'));
            // sets "theDate" 2 days ahead of today
            theDate.setDate(theDate.getDate() + 1);
            // set min date as 2 days from today
            $(this).datepicker('option','minDate',theDate);         
        } 
  });
});
</script>
<style type="text/css">
 #user{
    width: 180px;
    height:30px;
    margin-left:785px;
    background-color:black;
    color:white;
    border:2px dotted maroon;
  }
</style>
</head>
<body>
<br /> <br />
  <div id="main">
    <?php include '../essentials/header.php' ?>
    <?php include 'userNavBar.php' ?> 
    <br />
    <?php
// Echo session variables that were set on previous page
echo "<p id=\"user\">".$_SESSION["username"] ." is logged in."."</p>";
?> 
  <div id="site_content">   
    <br />   
    <h1 style="margin-left:325px;"> <u> Update Booking Data </u> </h1>
    <br />
           <form name="myForm" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" onsubmit="return(validate());" novalidate>
           <div id="bookingContainer">
                <div id="form-group">
                <label>First Name:</label>
                    <input name="firstname" type="text" maxlength="25" placeholder="First Name..." value="<?php echo $row[0]; ?>" />
                </div> <br /> <br />
                 <div id="form-group">
                <label>Second Name:</label>
                    <input name="secondname" type="text" maxlength="25" placeholder="Second Name..." value="<?php echo $row[5]; ?>" />
                </div> <br /> <br />
                <div id="form-group">
                <label> Hotel Name : <a href="../viewRoomsUser.php"> <i> (Click for help) </i> </a> </label>
                     <select name="hotelname">
                <option value="-select-" selected > -select- </option>
                <option value="Avari Hotels"> Avari Hotels </option>
                <option value="Aloft Hotels"> Aloft Hotels </option>
                <option value="Choice Hotels"> Choice Hotels </option>
                <option value="Clarion Hotels"> Clarion Hotels </option>
                     </select>
                </div> <br /> <br />
                 <div id="form-group">
                <label> Type Of Room:</label>
                     <select name="room">
                <option value="-select-" selected > -select- </option>
                <option value="Standard Single Room"> Standard Single Room </option>
                <option value="Superior Single Room"> Superior Single Room </option>
                <option value="Standard Double Room"> Standard Double Room </option>
                <option value="Superior Double Room"> Superior Double Room </option>
                <option value="Family Room"> Family Room </option>
                <option value="VIP Room"> VIP room </option>
                     </select>
                </div> <br /> <br />
                 <div id="form-group">
                <label> Amount Per Room :</label>
                     <select name="amount">
                <option value="-select-" selected > -select- </option>
                <option value="700"> 700 </option>
                <option value="800"> 800 </option>
                <option value="900"> 900 </option>
                <option value="1000"> 1000 </option>
                <option value="1100"> 1100 </option>
                <option value="1200"> 1200 </option>
                <option value="1300"> 1300 </option>
                <option value="1400"> 1400 </option>
                <option value="1500"> 1500 </option>
                <option value="1600"> 1600 </option>
                <option value="1700"> 1700 </option>
                     </select>
                </div> <br /> <br />
                <div id="form-group">
                <label>Room Number:</label>
                    <input name="roomNumber" type="number" placeholder="Room Number..." value="<?php echo $row[6]; ?>" />
                </div> <br /> <br />
                <div id="form-group">
                <label>Check In Date:</label>
                    <input name="checkInDate" type="text" id="checkInDate" value="<?php echo $row[8]; ?>"/>
                </div> <br /> <br />
                <div id="form-group">
                <label>Check Out Date:</label>
                    <input name="checkOutDate" type="text" id="checkOutDate" value="<?php echo $row[9]; ?>"/>
                </div> <br /> <br />
                <input type="hidden" name="booking_id" value="<?php echo $row[4]; ?>" />
          <input type="submit" name="edit" value="Update" style="margin-left:170px;">
            </form>                    
  </div> <!--close site_content--> 
  <?php include '../essentials/footer.php' ?>
</div> <!--close main-->
</body>
</html>









