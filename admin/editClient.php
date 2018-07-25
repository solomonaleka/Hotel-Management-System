<?php
include 'base.php';
if(isset($_GET['user_id'])  && is_numeric($_GET['user_id'])) {
  $user_id=$_GET['user_id'];
  $sql="Select* from user_details where user_id='$user_id'";
  $result=mysqli_query($db_conn,$sql);
  $row=mysqli_fetch_array($result);
}
  // define variables and set to empty values...
$firstname = $secondname = $phonenumber = $email = $gender = $countryid = $cityid = $username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = test_firstname($_POST["firstname"]);
  $secondname = test_secondname($_POST["secondname"]);
  $phonenumber = test_phonenumber($_POST["phonenumber"]);
  $email = test_email($_POST["email"]);
  $gender = test_gender($_POST["gender"]);
  $countryid = test_countryid($_POST["countryid"]);
  $cityid = test_cityid($_POST["cityid"]);
  $username = test_username($_POST["username"]);
  $password = test_password($_POST["password"]);
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

function test_phonenumber($phonenumber) {
  $phonenumber = trim($phonenumber);
  $phonenumber = stripslashes($phonenumber);
  $phonenumber = htmlspecialchars($phonenumber);
  return $phonenumber;
}
function test_email($email) {
  $email = trim($email);
  $email = stripslashes($email);
  $email = htmlspecialchars($email);
  return $email;
}
function test_gender($gender) {
  $gender = trim($gender);
  $gender = stripslashes($gender);
  $gender = htmlspecialchars($gender);
  return $gender;
}
function test_countryid($countryid) {
  $countryid = trim($countryid);
  $countryid = stripslashes($countryid);
  $countryid = htmlspecialchars($countryid);
  return $countryid;
}
function test_cityid($cityid) {
  $cityid = trim($cityid);
  $cityid = stripslashes($cityid);
  $cityid = htmlspecialchars($cityid);
  return $cityid;
}
function test_username($username) {
  $username = trim($username);
  $username = stripslashes($username);
  $username = htmlspecialchars($username);
  return $username;
}
function test_password($password) {
  $password = trim($password);
  $password = stripslashes($password);
  $password = htmlspecialchars($password);
  return $password;
}

if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
  echo "<script type=\"text/javascript\"> alert('Only letters and white space allowed for First Name') </script>";
  exit();
} 

if (!preg_match("/^[a-zA-Z ]*$/",$secondname)) {
  echo "<script type=\"text/javascript\"> alert('Only letters and white space allowed for Second Name') </script>";
  exit();
}
// The Update button has been clicked..
if(isset($_POST['edit'])) {
$firstname=mysqli_real_escape_string($db_conn,$_POST['firstname']);
$secondname=mysqli_real_escape_string($db_conn,$_POST['secondname']);
$phonenumber=mysqli_real_escape_string($db_conn,$_POST['phonenumber']);
$email=mysqli_real_escape_string($db_conn,$_POST['email']);
$gender=mysqli_real_escape_string($db_conn,$_POST['gender']);
$countryid=mysqli_real_escape_string($db_conn,$_POST['countryid']);
$cityid=mysqli_real_escape_string($db_conn,$_POST['cityid']);
$username=mysqli_real_escape_string($db_conn,$_POST['username']);
$password=mysqli_real_escape_string($db_conn,$_POST['password']);
$user_id=mysqli_real_escape_string($db_conn,$_POST['user_id']);
$sql="Update user_details set first_name='$firstname',second_name='$secondname',phone_no='$phonenumber',email_address='$email',gender='$gender',country_id='$countryid',city_id='$cityid',username='$username',password='$password' where user_id='$user_id'";
$result=mysqli_query($db_conn,$sql);
if($result){
  header("location:viewClients.php");
}
else {
  header("location:viewClients.php");
}
}
mysqli_close($db_conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
  <link rel="stylesheet" type="text/css" href="../css/main_style.css" />
  <link rel="stylesheet" type="text/css" href="../css/sub_style.css" />
  <?php include '../essentials/metadata.php' ?>
  <script language="javascript" type="text/javascript" src="../js/registration.js">
</script>
</head>
<body>
<br /> <br />
  <div id="main">
    <?php include '../essentials/header.php' ?>
    <?php include 'adminNavBar.php' ?>
  <br />	
<h1 style="margin-left:340px;color:black;"> <u> Update User Details </u> </h1>
<br />
<!--The form...-->
           <form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return(validate());" novalidate>
           <div id="registrationContainer">
                <div id="form-group">
                <label>First Name:</label>
                    <input name="firstname" type="text" maxlength="25"placeholder="First Name..." value="<?php echo $row[0]; ?>" />
                </div> <br /> <br />
                 <div id="form-group">
                <label>Second Name:</label>
                    <input name="secondname" type="text" maxlength="25"placeholder="Second Name..." value="<?php echo $row[1]; ?>" />
                </div> <br /> <br />
                 <div id="form-group">
                <label>Phone Number:</label>
                  <input name="phonenumber" type="number" placeholder="Phone Number..." />
                </div> <br /> <br />
                 <div id="form-group">
                <label>Email Address:</label>
                    <input name="email" type="text" maxlength="50" placeholder="Email Address..." value="<?php echo $row[3]; ?>" /> 
                </div> <br /> <br />
                <div id="form-group">
                <label>Gender:</label>
                <select name="gender">
                <option value="Male" selected> Male </option>
                <option value="Female"> Female </option>
                     </select>
                </div> <br /> <br />
                 <div id="form-group">
                <label>Country ID: <a href="cityCountryTable.php"> <i> (Click for help) </i> </a> </label>
                <select name="countryid" required>
                  <option value="-select-" selected > -select- </option>
                <option value="10000"> 10000 </option>
                <option value="10001"> 10001 </option>
                <option value="10002"> 10002 </option>
                <option value="10003"> 10003 </option>
                <option value="10004"> 10004 </option>
                <option value="10005"> 10005 </option>
                <option value="10006"> 10006 </option>
                <option value="10007"> 10007 </option>
                <option value="10008"> 10008 </option>
                <option value="10009"> 10009 </option>
                <option value="10010"> 10010 </option>
                <option value="10011"> 10011 </option>
                     </select>
                </div> <br /> <br />
                <div id="form-group">
                <label>City ID: <a href="cityCountryTable.php"> <i> (Click for help) </i> </a> </label>
                <select name="cityid" required>
                <option value="-select-" selected > -select- </option>
                <option value="20000"> 20000 </option>
                <option value="20001"> 20001 </option>
                <option value="20002"> 20002 </option>
                <option value="20003"> 20003 </option>
                <option value="20004"> 20004 </option>
                <option value="20005"> 20005 </option>
                <option value="20006"> 20006 </option>
                <option value="20007"> 20007 </option>
                <option value="20008"> 20008 </option>
                <option value="20009"> 20009 </option>
                <option value="20010"> 20010 </option>
                <option value="20011"> 20011 </option>
                     </select>
                </div> <br /> <br />
                <div id="form-group">
                <label>Username:</label>
                    <input name="username" type="text" maxlength="25" placeholder="Username..." value=" <?php echo $row[7]; ?>" />
                </div> <br /> <br />
                 <div id="form-group">
                <label>Password:</label>
                    <input type="password" name="password" maxlength="25" placeholder="Password..." />
                </div> <br /> <br />
                <input type="hidden" name="user_id" value="<?php echo $row[9]; ?>" />
          <input type="submit" name="edit" value="Update" style="margin-left:170px;">
        </div> <!-- close registrationContainer -->
            </form>  <!--End of the form...-->
  <?php include '../essentials/footer.php' ?>
</div> <!-- close main -->
</body>
</html>