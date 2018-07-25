<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
  <?php include 'essentials/externalReference.php' ?>
  <?php include 'essentials/metadata.php' ?>
  <script language="javascript" type="text/javascript">
  function isDelete(){
   var d = confirm('Are you sure you want to Delete !!');
   if(!d) {
    alert(window.location='viewComments.php');
   }
   else{
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
      <h1 style="margin-left: 290px;"> <u> Comments in the database </u> </h1>
      <br />
      <div id="result_set_comment_details_admin">
  <?php
include 'base.php';
$sql="SELECT `contact_id`,`first_name`,`email_address`,`phone_number`,`message` FROM  `contact_details` order by `contact_id` asc ";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {
echo "<table border='5' >";

echo "<tr>";
echo  "<th> Contact_ID </th>";
echo  "<th> First sName </th>";
echo  "<th> Email Address </th>";
echo  "<th> Phone Number </th>";
echo  "<th> Message </th>";
echo  "<th> Operation </th>";
echo "</tr>";
while($row=mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$row['contact_id']."</td>";
echo "<td>".$row['first_name']."</td>";
echo "<td>".$row['email_address']."</td>";
echo "<td>".$row['phone_number']."</td>";
echo "<td>".$row['message']."</td>";
echo '<td><a href="admin/deleteComment.php?contact_id='.$row['contact_id'].'"> <b> <img src="images/deleteIcon.png" height="30" width="30" alt="deleteIcon" style="margin-left:20px;" onclick="isDelete()" /> </b> </a> </td>';
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
</div>  <!-- close result_set_comment_details --> 	 	               
	</div> <!--close site_content--> 
  <br />
  <input style="margin-left:470px;" type="submit" value="Print PDF" onclick="window.print()" />
  <?php include 'essentials/footer.php' ?>
</div> <!-- close main -->
</body>
</html>