<?php
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

//Referring to a file connecting to the database.
include 'base.php';
if(isset($_POST['submit'])){
$firstname=mysqli_real_escape_string($db_conn,$_POST['firstname']);
$email=mysqli_real_escape_string($db_conn,$_POST['email']);
$phone=mysqli_real_escape_string($db_conn,$_POST['phone']);
$message=mysqli_real_escape_string($db_conn,$_POST['message']);
// Sql command that checks whether client commenting really exists in the database...
$check="SELECT * FROM  user_details where first_name='$firstname'";
$check_result=mysqli_query($db_conn,$check);
$row_counting=mysqli_num_rows($check_result);
if($row_counting>0) {
//Sql command for inserting data into the database.
$sql="insert into `contact_details`(`first_name`,`email_address`,`phone_number`,`message`) values ('$firstname','$email','$phone','$message')";
$result=mysqli_query($db_conn,$sql);
if($result){
echo "<script> alert('Your comment data has been saved successfully!!')</script>";
} else{
echo "<script> alert('Error in storing comment data!!')</script>";
}
}
else {
echo "<script> alert('Not a registered client!!')</script>";
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
</head>
<body>
<br /> <br />
  <div id="main">
    <?php include 'essentials/header.php' ?>
  <?php include 'essentials/userNavBar.php' ?>  
  <div id="site_content">   
    <br />   
    <h1 style="margin-left:340px;"> <u> The Comment Form </u> </h1>
    <br />
           <form name="myForm" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" onsubmit="return(validate());" >
           <div id="contactContainer">
                <div id="form-group">
                    <label>First Name:</label>
                    <input name="firstname" type="text" maxlength="30" placeholder="First Name..." value="" />
                </div>  <br /> <br />
                <div id="form-group">
                <label>Email Address:</label>
                    <input name="email" type="text" maxlength="50" placeholder="Email Address..." value="" />
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
          <input type="submit" name="submit" value="Submit" style="margin-left:170px;">
            </form>
            </div> <!-- close contactContainer -->                    
  </div> <!--close site_content--> 
  <?php include 'essentials/footer.php' ?>
</div> <!-- close main -- >
</body>
</html>