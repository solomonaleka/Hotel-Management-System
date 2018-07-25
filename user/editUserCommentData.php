<?php
session_start();
include 'base.php';
if(isset($_GET['contact_id'])  && is_numeric($_GET['contact_id'])) {
  $contact_id=$_GET['contact_id'];
  $sql="Select* from contact_details where contact_id='$contact_id'";
  $result=mysqli_query($db_conn,$sql);
  $row=mysqli_fetch_array($result);
}
// define variables and set to empty values
$firstname = $email = $phone = $message = ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = test_firstname($_POST["firstname"]);
  $email = test_email($_POST["email"]);
  $phone = test_phone($_POST["phone"]);
  $message = test_message($_POST["message"]);
}
function test_firstname($firstname) {
  $firstname = trim($firstname);
  $firstname = stripslashes($firstname);
  $firstname = htmlspecialchars($firstname);
  return $firstname;
}
echo $firstname;

function test_email($email) {
  $email = trim($email);
  $email = stripslashes($email);
  $email = htmlspecialchars($email);
  return $email;
}

function test_phone($phone) {
  $phone = trim($phone);
  $phone = stripslashes($phone);
  $phone = htmlspecialchars($phone);
  return $phone;
}
function test_message($message) {
  $message = trim($message);
  $message = stripslashes($message);
  $message = htmlspecialchars($message);
  return $message;
}
if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
  echo "<script type=\"text/javascript\"> alert('Only letters allowed for First Name') </script>";
  exit();
} 

if(isset($_POST['edit'])){
$firstname=mysqli_real_escape_string($db_conn,$_POST['firstname']);
$email=mysqli_real_escape_string($db_conn,$_POST['email']);
$phone=mysqli_real_escape_string($db_conn,$_POST['phone']);
$message=mysqli_real_escape_string($db_conn,$_POST['message']);
$contact_id=mysqli_real_escape_string($db_conn,$_POST['contact_id']);
//Sql command for inserting data into the database.
$sql="Update `contact_details` set `first_name`='$firstname',`email_address`='$email',`phone_number`='$phone',`message`='$message' where `contact_id`='$contact_id' ";
$result=mysqli_query($db_conn,$sql);
if($result){
  header("location:../userCommentData.php");
}
else {
  header("location:../userCommentData.php");
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
  <script language="javascript" type="text/javascript">

             function validate () { 
         if( document.myForm.firstname.value == "" )
         {
            alert( "Please provide your First Name with letters only!!" );
            document.myForm.firstname.focus() ;
            return false;
         }
         if( document.myForm.email.value == "" )
         {
            alert( "Please provide your Email ID!" );
            document.myForm.email.focus() ;
            return false;
         }
         var emailID = document.myForm.email.value;
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
            alert("Please enter correct Email ID")
            document.myForm.email.focus() ;
            return false;
         }
         if( document.myForm.phone.value == "" )
         {
            alert( "Please provide your Phone Number!" );
            document.myForm.phone.focus() ;
            return false;
         }
         
         if( document.myForm.message.value == "-select-" )
         {
            alert( "Please provide your Opinion!" );
            document.myForm.message.focus() ;
            return false;
         }

       }
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
    <h1 style="margin-left:340px;"> <u> The Comment Form </u> </h1>
    <br />
           <form name="myForm" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" onsubmit="return(validate());" >
           <div id="contactContainer">
                <div id="form-group">
                    <label>First Name:</label>
                    <input name="firstname" type="text" maxlength="30" placeholder="First Name..." value="<?php echo $row[4]; ?>" />
                </div>  <br /> <br />
                <div id="form-group">
                <label>Email Address:</label>
                    <input name="email" type="text" maxlength="50" placeholder="Email Address..." value="<?php echo $row[0]; ?>" />
                </div> <br /> <br />
                 <div id="form-group">
                <label> Phone Number:</label>
                    <input name="phone" type="number" placeholder="Phone Number..." value="" />
                </div> <br /> <br />
                <div id="form-group">
                <label> Rating The Site:</label>
                     <select name="message">
                <option value="-select-" selected > -select- </option>
                <option value="Excellent"> Excellent </option>
                <option value="Good"> Good </option>
                <option value="Average"> Average </option>
                <option value="Poor"> Poor </option>
                <option value="Not Certain"> Not Certain </option>
                     </select>
                </div> <br /> <br />
                <input type="hidden" name="contact_id" value="<?php echo $row[3]; ?>" />
          <input type="submit" name="edit" value="Update" style="margin-left:170px;">
            </form>
            </div> <!-- close contactContainer -->                    
  </div> <!--close site_content--> 
  <?php include '../essentials/footer.php' ?>
</div> <!-- close main -- >
</body>
</html>