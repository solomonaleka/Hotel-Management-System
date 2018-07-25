<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php
$q = intval($_GET['q']);
include 'base.php';
$sql="SELECT * FROM `commission_details` WHERE `commission_id` = '".$q."' ";
$result = mysqli_query($db_conn,$sql);

echo "<table border=\"5\">
<tr>
<th>Commission ID</th>
<th>Hotel Name</th>
<th>Standard Single</th>
<th>Superior Single</th>
<th>Standard Double</th>
<th>Superior Double</th>
<th>Family Room</th>
<th>VIP Room</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
echo "<td>".$row['commission_id']."</td>";
echo "<td>".$row['hotel_name']."</td>";
echo "<td>".$row['standard_single']."</td>";
echo "<td>".$row['superior_single']."</td>";
echo "<td>".$row['standard_double']."</td>";
echo "<td>".$row['superior_double']."</td>";
echo "<td>".$row['family_room']."</td>";
echo "<td>".$row['vip_room']."</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($db_conn);

?>
</body>
</html>

