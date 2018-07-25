<br />
<?php
session_start();
// Echo session variables that were set on previous page
echo "<p id=\"user\">".$_SESSION["username"] ." is logged in"."</p>";
?>
<br />
<div class="content_container_admin">
  <div class="enclose">
  <h2 style="margin-left:60px;padding-top:2px;color:black;"> View Login History </h2>
</div> <!--close enclose-->
        <p> Upon clicking the button below a tabular description of users who once logged in to the sytem is displayed. Data is fetched from the user_log table in the database. </p>
        <div class="button_small">
          <a href="loginHistory.php">Generate</a>
        </div><!--close button_small-->
      </div><!--close content_container-->
          <div class="content_container_admin">
            <div class="enclose">
            <h2 style="margin-left:60px;padding-top:2px;color:black;"> View Booking Data </h2>
          </div> <!--close enclose-->
        <p> Upon clicking the button below a tabular description of all the booked rooms is displayed. Data is fetched from the booking_details table in the database. </p> 
        <div class="button_small">
          <a href="viewBookedRooms.php">Generate</a>
        </div><!--close button_small-->     
      </div><!--close content_container-->
       <div class="content_container_admin">
        <div class="enclose">
            <h2 style="margin-left:60px;padding-top:2px;color:black;"> View City Data </h2>
          </div> <!--close enclose-->
        <p> Upon clicking the button below a tabular description of all the cities is displayed. Data is fetched from the city_details table in the database. </p> 
        <div class="button_small">
          <a href="viewCities.php">Generate</a>
        </div><!--close button_small-->     
      </div><!--close content_container-->
       <div class="content_container_admin">
        <div class="enclose">
            <h2 style="margin-left:60px;padding-top:2px;color:black;"> View Room Data </h2>
          </div> <!--close enclose-->
        <p> Upon clicking the button below a tabular description of all the rooms available for booking is displayed. Data is fetched from the room_details table in the database. </p> 
        <div class="button_small">
          <a href="viewRoomsAdmin.php">Generate</a>
        </div><!--close button_small-->     
      </div><!--close content_container-->
       <div class="content_container_admin">
        <div class="enclose">
            <h2 style="margin-left:60px;padding-top:2px;color:black;"> View Commission Data </h2>
          </div> <!--close enclose-->
        <p> Upon clicking the button below a tabular description of commission charges is displayed. Data is fetched from the commission_details table in the database. </p> 
        <div class="button_small">
          <a href="fetchingCommissionAdmin.php">Generate</a>
        </div><!--close button_small-->     
      </div><!--close content_container-->
       <div class="content_container_admin">
        <div class="enclose">
            <h2 style="margin-left:60px;padding-top:2px;color:black;"> View Comment Data </h2>
          </div> <!--close enclose-->
        <p> Upon clicking the button below a tabular description of all the comments is displayed. Data is fetched from the contact_details table in the database. </p> 
        <div class="button_small">
          <a href="viewComments.php">Generate</a>
        </div><!--close button_small-->     
      </div><!--close content_container-->