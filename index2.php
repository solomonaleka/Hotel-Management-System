<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
  <?php include 'essentials/externalReference.php' ?>
  <?php include 'essentials/metadata.php' ?>
  <style>
  .enclose{
    height:30px;
    background-color:#FFDEAD;
    border-radius:10px;
    padding:5px;
  }
  #user{
    width: 180px;
    height:30px;
    margin-left:680px;
    background-color:black;
    color:white;
    border:2px dotted maroon;
  }
  </style>
</head>
<body>
<br /> <br />
  <div id="main">
    <?php include 'essentials/header.php' ?>
	<?php include 'essentials/userNavBar.php' ?>	
	<div id="site_content">				
      <?php include 'essentials/postcontentAd.php' ?> 	 	              
	</div> <!--close site_content--> 
  <?php include 'essentials/footer.php' ?>
</div> <!-- close main -->
</body>
</html>