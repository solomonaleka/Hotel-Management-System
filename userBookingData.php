
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
  <?php include 'essentials/externalReference.php' ?>
  <script language="javascript" type="text/javascript">
  function validate() {
  if( document.myForm.firstname.value == "" )
         {
            alert( "Please provide your Firstname!!" );
            document.myForm.firstname.focus() ;
            return false;
         }
       }
  function isDelete()
  {
   var d = confirm('Are you sure you want to Delete !!');
   if(!d)
   {
    alert(window.location='userBookingData.php');
   }
   else
   {
   return false;
    
   }
  }       
  </script>

  <!-- Inline style goes here...-->
  <style type="text/css">

   #loginContainer {
font-family: "Times New Roman";
position:relative;
border-radius: 25px;
width:450px;
height:200px;
background-color:lemonChiffon;
border: 3px dotted maroon;
margin-left:auto;
margin-right:auto;
}

  input[type=text] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid maroon;
    border-radius: 4px;
    background: #ccc url(images/background2.jpg) repeat;
    background-attachment: fixed;
    color: white;
}
#result_set_booking_details {
font-family: verdana,serif;
position:relative;
width:450px;
height:auto;
margin-left: 190px;
}
  </style>
</head>
<body>
<br /> <br />
  <div id="main_index">
    <?php include 'essentials/header.php' ?>
    <?php include 'essentials/userNavBar.php' ?>   
  <br />
  <div id="loginContainer">
<h1 style="margin-left:120px;color:black;text-decoration:none;"> View Booking Data </h1>
<hr />
<hr />
<br />
<form name="myForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>
                <div id="form-group">
                    <label style="color:black;margin-left:30px;">Firstname:</label>
                    <input name="firstname" type="text" placeholder="Firstname..." />
                </div>  <br /> <br />
                
              <input type="submit" name="submit" value="View" onclick="validate()" style="margin-left:200px;" >
            </form>
            </div> <!-- close loginContainer -->
            <br />
            <div id="result_set_booking_details_user">
<?php
include 'base.php';
if(isset($_POST['submit'])) {
$firstname=mysqli_real_escape_string($db_conn,$_POST['firstname']);
$sql="SELECT* FROM  `booking_details` where first_name='$firstname' ";
$result=mysqli_query($db_conn,$sql);
if($result) {
if(mysqli_num_rows($result)>0) {
echo "<table border='5' >";

echo "<tr>";
echo  "<th> Booking ID </th>";
echo  "<th> First Name </th>";
echo  "<th> Second Name </th>";
echo  "<th> Hotel Name </th>";
echo  "<th> Room Type </th>";
echo  "<th> Fixed Charge </th>";
echo  "<th> Time Of Booking </th>";
echo  "<th> Check In Date </th>";
echo  "<th> Check Out Date </th>";
echo  "<th> Room Number </th>";
echo  "<th> Operation 1 </th>";
echo  "<th> Operation 2 </th>";
echo "</tr>";
while($row=mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$row['booking_id']."</td>";
echo "<td>".$row['first_name']."</td>";
echo "<td>".$row['second_name']."</td>";
echo "<td>".$row['hotel_name']."</td>";
echo "<td>".$row['room_type']."</td>";
echo "<td>".$row['fixed_charge']."</td>";
echo "<td>".$row['time_of_booking']."</td>";
echo "<td>".$row['check_in_date']."</td>";
echo "<td>".$row['check_out_date']."</td>";
echo "<td>".$row['room_number']."</td>";
echo '<td><a href="user/deleteUserBookingData.php?booking_id='.$row['booking_id'].'"> <b> <img src="images/deleteIcon.png" height="30" width="30" alt="deleteIcon" style="margin-left:20px;" onclick="isDelete()"/> </b> </a> </td>';
echo '<td><a href="user/editUserBookingData.php?booking_id='.$row['booking_id'].'"> <b> <img src="images/editIcon.png" height="30" width="30" alt="editIcon" style="margin-left:20px;" /> </b> </a> </td>';
echo "</tr>";
}
echo "</table>";
//closing result set.
mysqli_free_result($result);
} else {
echo "<h4 style=\"color:black;margin-left:50px;\">"."No record matching the query exists in the database!!"."</h4>".mysqli_connect_error();
}
}
mysqli_close($db_conn);
}
?>
</div> <!-- closing result_set_booking_details_user...-->
<?php include 'essentials/footer.php' ?>
</div> <!-- close main_index --> 
<br />
<br />
</body>
</html>
