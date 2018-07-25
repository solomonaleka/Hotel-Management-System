<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
  <?php include ('essentials/externalReference.php') ?>
  <?php include ('essentials/metadata.php') ?>
  <style>
  h1 {
    text-decoration:none;
  }
  .enclose {
    height:30px;
    background-color:#FFDEAD;
    border-radius:10px;
    padding:5px;
  }
  #user{
    width:190px;
    height:30px;
    margin-left:670px;
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
  <?php include 'essentials/adminNavBar.php' ?>  
  <div id="site_content">      
      <?php include 'essentials/postcontentAdmin.php' ?>  
      <br />             
  </div> <!--close site_content--> 
  <?php include 'essentials/footer.php' ?>
</body>
</html>