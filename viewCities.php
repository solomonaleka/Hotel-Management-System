<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
  <?php include 'essentials/externalReference.php' ?>
  <?php include 'essentials/metadata.php' ?>
</head>
<body>
<br /> <br />
  <div id="main">
    <?php include 'essentials/header.php' ?>
  <?php include 'essentials/adminNavBar.php' ?>  
  <div id="site_content"> 
  <br />            
      <!--main content of the page goes here...-->              
      <br />
      <h1 style="margin-left: 310px;"> <u> Cities in the database </u> </h1>
      <br />
      <div id="result_set_city_details">
  <?php
include 'base.php';
$sql="SELECT `city_id`,`city_name` FROM  `city_details` order by `city_id` asc";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {
echo "<table border='5' >";

echo "<tr>";
echo  "<th> City ID </th>";
echo  "<th> City Name </th>";
echo "</tr>";
while($row=mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$row['city_id']."</td>";
echo "<td>".$row['city_name']."</td>";
echo "</tr>";
}
echo "</table>";
//closing result set.
mysqli_free_result($result);
} else {
echo "No records matching the query were found".mysqli_connect_error();
}
}
mysqli_close($db_conn);
?>
</div> <!-- close result_set_city_details -->  	 	              
	</div> <!--close site_content--> 
  <br />
  <input style="margin-left:480px;" type="submit" value="Print PDF" onclick="window.print()" />
  <?php include 'essentials/footer.php' ?>
</div> <!-- close main -->
</body>
</html>