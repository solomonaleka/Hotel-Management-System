<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
   <link rel="stylesheet" type="text/css" href="../css/main_style.css" />
 <link rel="stylesheet" type="text/css" href="../css/sub_style.css" />
  <?php include '../essentials/metadata.php' ?>
</head>
<body>
<br /> <br />
  <div id="main">
    <?php include '../essentials/header.php' ?>
    <?php include 'userNavBar.php' ?>
	<div id="site_content">
    <br /> <br />
<h1 style="text-decoration:none;margin-left:380px;"> Mpesa Details </h1>
<br />


  <p>THANK YOU FOR MAKING YOUR RESRVATION .
    YOU ARE EXPECTED TO PAY A TO TOTAL AMOUNT OF <?php echo 'KES '.$_SESSION['pay']; ?> TO CONFIRM RESERVATION. PAY YOUR BILL VIA MPESA USING ANY OF THE NUMBERS BELOW. </p>
    <br />
    <ol style="margin-left:200px;font-size:20px;">
    <li> 0725912152 </li>
    <li> 0713787314 </li>
    </ol> 


	</div> <!--close site_content--> 
  <?php include '../essentials/footer.php' ?>
</body>
</html>