<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php
$q = intval($_GET['q']);
include 'base.php';
$sql="SELECT * FROM `hotel_details` WHERE `hotel_id` = '".$q."' ";
$result = mysqli_query($db_conn,$sql);

echo "<table border=\"5\">
<tr>
<th>Hotel ID</th>
<th>Hotel Name</th>
<th>Email Address</th>
<th>City ID</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['hotel_id'] . "</td>";
    echo "<td>" . $row['hotel_name'] . "</td>";
    echo "<td>" . $row['email_address'] . "</td>";
    echo "<td>" . $row['city_id'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($db_conn);


?>
</body>
</html>