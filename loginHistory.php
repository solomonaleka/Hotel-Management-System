<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
  <?php include 'essentials/externalReference.php' ?>
  <?php include 'essentials/metadata.php' ?>
  <script language="javascript" type="text/javascript">
  function isDelete()
  {
   var d = confirm('Are you sure you want to Delete !!');
   if(!d)
   {
    alert(window.location='loginHistory.php');
   }
   else
   {
   return false;
    
   }
  }   
</script>
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
      <h1 style="margin-left: 340px;"> <u> The Login History </u> </h1>
      <br />
      <div id="result_set_login_details">
  <?php
include 'base.php';
$sql="SELECT `log_id`,`username`,`login_date`,`login_time` FROM  `user_log` order by `log_id` asc ";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {
echo "<table border='5' >";
echo "<tr>";
echo  "<th> Login ID </th>";
echo  "<th> Username </th>";
echo  "<th> Login Date </th>";
echo  "<th> Login Time </th>";
echo  "<th> Operation </th>";
echo "</tr>";
while($row=mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$row['log_id']."</td>";
echo "<td>".$row['username']."</td>";
echo "<td>".$row['login_date']."</td>";
echo "<td>".$row['login_time']."</td>";
echo '<td><a href="admin/deleteLoginHistory.php?log_id='.$row['log_id'].'"> <b> <img src="images/deleteIcon.png" height="30" width="30" alt="deleteIcon" style="margin-left:20px;" onclick="isDelete()" /> </b> </a> </td>';
echo "</tr>";
}
echo "</table>";
mysqli_free_result($result);
} else {
echo "No records matching the query were found".mysqli_connect_error();
}
}
mysqli_close($db_conn);
?>
</div> <!--close the result_set_login_details -->            
  </div> <!--close site_content--> 
  <br />
  <input style="margin-left:490px;" type="submit" value="Print PDF" onclick="window.print()" />
  <?php include 'essentials/footer.php' ?>
</div> <!-- close main -->
</body>
</html>