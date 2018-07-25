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
  <br />  
    <div id="country_city_data_booking" style="margin-left:210px;">
    <table border="5" >
<tr>
<th> CITY ID </th>
<th> CITY NAME </th>
<th> HOTEL NAME </th>
</tr>
<tr> 
<td> 20000 </td>
<td> Nairobi </td>
<td> Avari Hotels </td>
</tr>
<tr> 
<td> 20001 </td>
<td> Mombasa </td>
<td> Aloft Hotels </td>
</tr>
<tr> 
<td> 20002 </td>
<td> Kisumu </td>
<td> Choice Hotels </td>
</tr>
<tr> 
<td> 20003 </td>
<td> Nakuru </td>
<td> Clarion Hotels </td>
</tr>
</table>
</div> <!-- close country_city_data -->          
</div> <!-- close site_content -->
<br />
      <input style="margin-left:395px;"type="submit" value="Print PDF" onclick="window.print()" />
  <?php include '../essentials/footer.php' ?>
</div> <!-- close main -->
</body>
</html>

