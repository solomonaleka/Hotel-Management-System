<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deluxe Hotel Management System</title>
  <?php include 'essentials/externalReference.php' ?>
  <?php include 'essentials/metadata.php' ?>

<style>
select {
    width: 20%;
    padding: 16px 20px;
    border: none;
    color: #6A5ACD;
    margin-top: auto;
    margin-left:700px;
}
</style>
  <script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","admin/viewHotels.php?q="+str,true);
        xmlhttp.send();
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
      <br />
      <h1 style="margin-left: 310px;"> <u> Hotels in the database </u> </h1>
        <form>
<select name="users" onchange="showUser(this.value)" >
  <option value="-select a hotel-">-select a hotel-</option>
  <option value="1">Avari Hotels</option>
  <option value="2">Aloft Hotels</option>
  <option value="3">Choice Hotels</option>
  <option value="4">Clarion Hotels</option>
  </select>
</form>
<div id="result_set_hotel_details">
<div id="txtHint" style="margin-left:60px;"><b>Hotel data will be displayed here ...</b>
</div> <!-- close txtHint-->
</div> <!-- close result_set_hotel_details-->  	 	               
	</div> <!--close site_content--> 
  <br />
  <input style="margin-left:470px;" type="submit" value="Print PDF" onclick="window.print()" />
  <?php include 'essentials/footer.php' ?>
</div> <!-- close main -->
</body>
</html>