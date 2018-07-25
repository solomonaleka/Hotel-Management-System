<?php
$hotelname = $email = $cityid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $hotelname = test_hotelname($_POST["hotelname"]);
  $email = test_email($_POST["email"]);
  $cityid = test_cityid($_POST["cityid"]);
}

function test_hotelname($hotelname) {
  $hotelname = trim($hotelname);
  $hotelname = stripslashes($hotelname);
  $hotelname = htmlspecialchars($hotelname);
  return $hotelname;
}
function test_email($email) {
  $email = trim($email);
  $email = stripslashes($email);
  $email = htmlspecialchars($email);
  return $email;
}
function test_cityid($cityid) {
  $cityid = trim($cityid);
  $cityid = stripslashes($cityid);
  $cityid = htmlspecialchars($cityid);
  return $cityid;
}
if (!preg_match("/^[a-zA-Z ]*$/",$hotelname) ) {
  echo "<script type=\"text/javascript\"> alert('Only letters and white space allowed for Hotel Name') </script>";
  exit();
} 

//Referring to a file connecting to the database.
include('base.php');
//Isset meaning the submit button has been clicked.
if(ISSET($_POST['submit'])){
$hotelname=mysqli_real_escape_string($db_conn,$_POST['hotelname']);
$email=mysqli_real_escape_string($db_conn,$_POST['email']);
$cityid=mysqli_real_escape_string($db_conn,$_POST['cityid']);
//Sql command for inserting data into the database.
$sql="insert into `hotel_details` (`hotel_name`,`email_address`,`city_id`) values ('$hotelname','$email','$cityid')";
$result=mysqli_query($db_conn,$sql);
if($result){
echo "<script> alert('A new hotel has been created successfully!!')</script>";
} else{
echo "<script> alert('Error in creating a new hotel!!')</script>";
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

  <script language="javascript" type="text/javascript" src="js/newHotel.js">
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
    <h1 style="margin-left:360px;color:black;"> <u> New Hotel Form </u> </h1>
<br />
           <form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return(validate());" novalidate>
           <div id="new_hotel_container">
                <div id="form-group">
                <label>Hotel Name:</label>
                    <input name="hotelname" type="text" placeholder="Hotel Name..." value="" />
                </div> <br /> <br />
                 <div id="form-group">
                <label>Email Address:</label>
                    <input name="email" type="text" placeholder="Email Address..." value="" /> 
                </div> <br /> <br />
                <div id="form-group">
                <label>City ID: <a href="room_type/cityCountryTableBooking.php"> <i> (Click for help) </i> </a> </label>
                <select name="cityid">
                  <option value="-select-" selected > -select- </option>
                <option value="20000"> 20000 </option>
                <option value="20001"> 20001 </option>
                <option value="20002"> 20002 </option>
                <option value="20003"> 20003 </option>
                     </select>
                </div> <br /> <br />
          <input type="submit" name="submit" id="submit" value="Submit" style="margin-left:170px;">
            </form> 
          </div> <!-- close new_hotel_container -->
	</div> <!--close site_content-->
  <?php include 'essentials/footer.php' ?> 
</div> <!-- close main -->
</body>
</html>