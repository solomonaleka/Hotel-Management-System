
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
  <?php include 'essentials/externalReference.php' ?>
  <script language="javascript" type="text/javascript" src="js/login.js">
  </script>

  <!-- Inline style goes here...-->
  <style type="text/css">

   #loginContainer {
font-family: "Times New Roman";
position:relative;
border-radius: 25px;
width:450px;
height:200px;
background-color:lemonChiffon;
border: 3px dotted maroon;
margin-left:auto;
margin-right:auto;
}

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
#result_set_user_details {
font-family: verdana,serif;
position:relative;
width:450px;
height:auto;
margin-left: 425px;
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
  <script type"text/javascript">
  function message () {
    document.write("Trial");
    |document.getElementById("data").innerHTML="Your password will be displayed here...";
 }
 </script>
<br /> <br />
  <div id="main_index">
    <?php include 'essentials/header.php' ?>   
    <div class="button_small">
          <a href="index.php">Homepage</a>
        </div><!--close button_small-->
  <div id="loginContainer">
<h1 style="margin-left:80px;color:black;text-decoration:none;"> Password Recovery Form </h1>
<hr />
<hr />
<br />
<form name="myForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return(validate());" novalidate>
                <div id="form-group">
                    <label style="color:black;margin-left:30px;">Username:</label>
                    <input name="username" type="text" placeholder="Username...">
                </div>  <br /> <br />
                
              <input type="submit" name="submit" value="Recover" onclick="message()" style="margin-left:200px;" >
            </form>
            </div> <!-- close loginContainer -->
            <br />
            <p id="data"> </p>
            <div id="result_set_user_details">
<?php
include 'base.php';
if(isset($_POST['submit'])) {
$username=mysqli_real_escape_string($db_conn,$_POST['username']);
$sql="SELECT `password` FROM  `user_details` where username='$username'";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {
echo "<table border='5' >";

echo "<tr>";
echo  "<th> Password </th>";
echo "</tr>";
while($row=mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$row['password']."</td>";
echo "</tr>";
}
echo "</table>";
//closing result set.
mysqli_free_result($result);
} else {
echo "<h4 style=\"color:black;\">"."No record matching the query exists in the database!"."</h4>".mysqli_connect_error();
}
}
mysqli_close($db_conn);
}
?>
</div> <!-- closing result_set_user_details...-->
<?php include 'essentials/footer.php' ?>
</div> <!-- close main_index --> 
<br />
<br />
</body>
</html>
