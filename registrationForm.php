<?php
// define variables and set to empty values...
$firstname = $secondname = $phonenumber = $email = $gender = $username = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = test_firstname($_POST["firstname"]);
  $secondname = test_secondname($_POST["secondname"]);
  $phonenumber = test_phonenumber($_POST["phonenumber"]);
  $email = test_email($_POST["email"]);
  $gender = test_gender($_POST["gender"]);
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

function test_username($username) {
  $username = trim($username);
  $username = stripslashes($username);
  $username = htmlspecialchars($username);
  return $username;
}


if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
  echo "<script type=\"text/javascript\"> alert('Only letters and white space allowed for First Name') </script>";
  exit();
} 

if (!preg_match("/^[a-zA-Z ]*$/",$secondname)) {
  echo "<script type=\"text/javascript\"> alert('Only letters and white space allowed for Second Name') </script>";
  exit();
}

if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
  echo "<script type=\"text/javascript\"> alert('Only letters and white space allowed for Userame') </script>";
  exit();
}
if (!preg_match("/^[a-zA-Z ]*$/",$password)) {
  echo "<script type=\"text/javascript\"> alert('Only letters and white space allowed for Password ') </script>";
  exit();
}


//Referring to the file connecting to the database...
include 'base.php';

// The Register button has been clicked..
if(isset($_POST['submit'])) {
$firstname=mysqli_real_escape_string($db_conn,$_POST['firstname']);
$secondname=mysqli_real_escape_string($db_conn,$_POST['secondname']);
$phonenumber=mysqli_real_escape_string($db_conn,$_POST['phonenumber']);
$email=mysqli_real_escape_string($db_conn,$_POST['email']);
$gender=mysqli_real_escape_string($db_conn,$_POST['gender']);
$username=mysqli_real_escape_string($db_conn,$_POST['username']);
$password=mysqli_real_escape_string($db_conn,$_POST['password']);
//Sql command for inserting data into the database...

$sql="insert into user_details (first_name,second_name,phone_no,email_address,gender,username,password) values ('$firstname','$secondname','$phonenumber','$email','$gender','$username','$password')";
$result=mysqli_query($db_conn,$sql);
if($result){
echo "<script> alert('You have successfully created an account!!')</script>";
} else{
echo "<script> alert('Error in storing user data!!')</script>";
}
}
mysqli_close($db_conn);
?>

<hr />

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
  <?php include 'essentials/externalReference.php' ?>
  <?php include 'essentials/metadata.php' ?>
  <script language="javascript" type="text/javascript" src="js/registration.js">
</script>
<style type="text/css">
.button_small {
    background-color: #4CAF50;
    border-radius:5px;
    padding: 8px 16px;
    text-decoration: none;
    width: 45px;
    margin-left:80px;
  }
</style>
</head>
<body>
<br /> <br />
  <div id="main">
    <?php include 'essentials/header.php' ?> 
            <div class="button_small">
          <a href="index.php">Homepage</a>
        </div><!--close button_small-->	
<h1 style="margin-left:430px;color:black;"> <u> The Registration Form </u> </h1>
<br />
<!--The form...-->
           <form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return(validate());" novalidate>
           <div id="registrationContainer">
                <div id="form-group">
                <label>First Name:</label>
                    <input name="firstname" type="text" value="" maxlength="25"placeholder="First Name..." value="" />
                </div> <br /> <br />
                 <div id="form-group">
                <label>Second Name:</label>
                    <input name="secondname" type="text" maxlength="25"placeholder="Second Name..." value="" />
                </div> <br /> <br />
                 <div id="form-group">
                <label>Phone Number:</label>
                    <input name="phonenumber" type="number" placeholder="Phone Number..." value="" />
                </div> <br /> <br />
                 <div id="form-group">
                <label>Email Address:</label>
                    <input name="email" type="text" maxlength="50" placeholder="Email Address..." value="" /> 
                </div> <br /> <br />
                <div id="form-group">
                <label>Gender:</label>
                <select name="gender">
                <option value="Male" selected> Male </option>
                <option value="Female"> Female </option>
                     </select>
                </div> <br /> <br />
                <div id="form-group">
                <label>Username:</label>
                    <input name="username" type="text" maxlength="25" placeholder="Username..." value="" />
                </div> <br /> <br />
                 <div id="form-group">
                <label>Password:</label>
                    <input type="password" name="password" maxlength="25" placeholder="Password..." value="" />
                </div> <br /> <br />
          <input type="submit" name="submit" value="Register" style="margin-left:170px;">
        </div> <!-- close registrationContainer -->
            </form>  <!--End of the form...-->
  <?php include 'essentials/footer.php' ?>
</div> <!-- close main -->
</body>
</html>