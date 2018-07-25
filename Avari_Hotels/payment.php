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
<h1 style="text-decoration:none;margin-left:0px;"> Reservation Details For <?php echo $_SESSION['firstname']." ".$_SESSION['secondname']; ?> </h1>
<table>
  <tr>   <td colspan="2"><div align="center"></div></td>
  </tr>
  <tr>
    <td width="400" style="color:#000033;margin-left:300px;"><div align="left"> First Name: </div></td>
    <td width="400" style="color:#000033;margin-left:300px;"><div align="left"><?php echo $_SESSION['firstname'];?></div></td>
  </tr>
  <tr>
    <td><div align="left" style="color:#000033;"> Second Name: </div></td>
    <td style="color:#000033;"><div align="left"><?php echo $_SESSION['secondname'];?></div></td>
  </tr>
  <tr>
    <td style="color:#000033;"><div align="left"> Hotel Name: </div></td>
    <td style="color:#000033;"><div align="left"><?php echo $_SESSION['hotelname']; ; ?></div></td>
  </tr>
  <tr>
    <td style="color:#000033;"><div align="left"> Room Type: </div></td>
    <td style="color:#000033;"><div align="left"><?php echo $_SESSION['room']; ?></div></td>
  </tr>
  <tr>
    <td style="color:#000033;"><div align="left"> Amount Per Day: </div></td>
    <td style="color:#000033;"><div align="left"><?php echo $_SESSION['amount']; ?></div></td>
  </tr>
  <tr>
    <td style="color:#000033;"><div align="left"> Number Of Days: </div></td>
    <td style="color:#000033;"><div align="left"><?php echo $_SESSION['days']; ?></div></td>
  </tr>
  <tr>
    <td style="color:#000033;"><div align="left"> Room Number: </div></td>
    <td style="color:#000033;"><div align="left"><?php echo $_SESSION['roomNumber']; ?></div></td>
  </tr>
  <tr>
    <td style="color:#000033;"><div align="left"> Check In Date: </div></td>
    <td style="color:#000033;"><div align="left"><?php echo $_SESSION['checkInDate']; ?></div></td>
  </tr>
    <tr>
    <td style="color:#000033;"><div align="left"> Check Out Date: </div></td>
    <td style="color:#000033;"><div align="left"><?php echo $_SESSION['checkOutDate']; ?></div></td>
  </tr>
   <tr>
    <td style="color:#000033;"><div align="left">Payable:</div></td>
    <td style="color:#000033;"><div align="left"><?php echo 'KES '.$_SESSION['pay']; ?></div></td>
  </tr>
</table>
<br /> <br />
<input type="image" src="../images/mpesa.jpg" alt="Mpesa"  name="mpesa" style="width:69;height:23;margin-left:50px;" onclick="window.location='mpesa.php'"/>
	</div> <!--close site_content--> 
  <?php include '../essentials/footer.php' ?>
</div> <!-- close main -->
</body>
</html>