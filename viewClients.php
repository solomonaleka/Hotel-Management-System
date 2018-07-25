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
    alert(window.location='viewClients.php');
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
      <h1 style="margin-left: 340px;"> <u> Clients in the database </u> </h1>
      <br />
      <div id="result_set_user_details_admin">
  <?php
include 'base.php';
$sql="SELECT* FROM  `user_details` order by `user_id` asc";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {
echo "<table border='5' >";
echo "<tr>";
echo  "<th> User ID </th>";
echo  "<th> First Name </th>";
echo  "<th> Second Name </th>";
echo  "<th> Phone Number </th>";
echo  "<th> Email Address </th>";
echo  "<th> Gender </th>";
echo  "<th> Username </th>";
echo  "<th> Operation 1 </th>";
echo  "<th> Operation 2 </th>";
echo "</tr>";
while($row=mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$row['user_id']."</td>";
echo "<td>".$row['first_name']."</td>";
echo "<td>".$row['second_name']."</td>";
echo "<td>".$row['phone_no']."</td>";
echo "<td>".$row['email_address']."</td>";
echo "<td>".$row['gender']."</td>";
echo "<td>".$row['username']."</td>";
echo '<td><a href="admin/deleteClient.php?user_id='.$row['user_id'].'"> <b> <img src="images/deleteIcon.png" height="30" width="30" alt="deleteIcon" style="margin-left:20px;" onclick="isDelete()"/> </b> </a> </td>';
echo '<td><a href="admin/editClient.php?user_id='.$row['user_id'].'"> <b> <img src="images/editIcon.png" height="30" width="30" alt="editIcon" style="margin-left:20px;"/> </b> </a> </td>';
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
</div> <!-- close result_set_user_details_admin-->  	 	               
	</div> <!--close site_content--> 
  <br />
  <input style="margin-left:500px;" type="submit" value="Print PDF" onclick="window.print()" />
  <?php include 'essentials/footer.php' ?>
</div> <!-- close main -->
</body>
</html>