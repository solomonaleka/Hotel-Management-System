<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
  <?php include 'essentials/externalReference.php' ?>
  <?php include 'essentials/metadata.php' ?>
  <script language="javascript" type="text/javascript">
  function standard_single () {
    alert("Click the link below to learn more about Standard Single Room");
  }
  function superior_single () {
    alert("Click the link below to learn more about Superior Single Room");
  }
  function standard_double () {
    alert("Click the link below to learn more about Standard Double Room");
  }
  function superior_double () {
    alert("Click the link below to learn more about Superior Double Room");
  }
  function family_room () {
    alert("Click the link below to learn more about Family Room");
  }
  function vip_room () {
    alert("Click the link below to learn more about VIP Room");
  }
  </script>
  <style>
  h1 {
margin-left: 50px;
text-decoration: overline;
}
/* ...Styling the hotel gallery page...*/
#img {
    margin: 23px;
    border: 3px solid green;
    float: left;
    width: 260px;
    height: 190px;
}
#img:hover {
    border: 3px solid #f4a460;
}
#img img {
    width: 100%;
    height: auto;   
}
#description {
    padding: 15px;
    text-align: center;
 }
     /*...Styling the gallery page....*/

  </style>
</head>
<body>
<br /> <br />
  <div id="main">
    <?php include 'essentials/header.php' ?>
	<?php include 'essentials/userNavBar.php' ?>	
	<div id="site_content">		
    <br />
    <?php include 'essentials/image_gallery.php' ?> 		  	 	 
      <!--main content of the page goes here...-->              
	</div> <!--close site_content--> 
  <input style="margin-left:500px;" type="submit" value="Print Page" onclick="window.print()" />
  <?php include 'essentials/footer.php' ?>
</div> <!-- close main -->
</body>
</html>