<?php
  include("header.php");
?>
<div class='view bookings'>
  <table>
    <tbody>
      <?php
      if (empty($_GET))
      {
        header("location:index.php");
      }
      $id = $_GET['id'];
      $hostname = "localhost";
      $db = "rosenpark";
      $username = "root";
      $password = "";
      $table = "venues";
      $con = mysqli_connect($hostname, $username, $password, $db);
      $query = "SELECT * FROM $table WHERE venue_id = $id";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_assoc($result);
      $rate = $row['venue_rate'];
          echo "<tr>";
            echo "<td>";
              echo "<a href='index.php?page=my_venues'>< Back</a>";
              echo "<h1><i>".($row['venue_name'])."</i> Bookings</h1>";
              echo "<img src='".($row['venue_image'])."'></img>";
              echo "<h2>PHP ".($row['venue_rate'])."/hr</h2>";
              echo "<h3>".($row['venue_location'])."</h3>";
              echo "<p>".($row['venue_full_address'])."</p>";
              echo "<h4>Maximum of ".($row['venue_capacity'])." people</h4>";
              echo "<p>".($row['venue_description'])."</p>";
              echo "<h4>Usually for ".($row['venue_event_types'])."</h4>";
            echo "</td>";
          echo "</tr>";
      ?>
    </tbody>
  </table>
  <br>
  <div id='avail' class='check-avail'>
    <h2>Pending Bookings</h2>
    <?php
      $table = "bookings";
      $query = "SELECT * FROM $table WHERE venue_id = $id AND booking_confirmation_status = 'pending'";
      $result = mysqli_query($con, $query);

      if(mysqli_num_rows($result) == 0)
      {
        echo "This venue does not have any pending bookings.";
      }
      else
      {
        echo "<table>";
            echo "<thead>";
              echo "<td class='b-num'><h3>Booking #</h3></td>";
              echo "<td><h3>Booking Client</h3></td>";
              echo "<td><h3>Booking Client Contact</h3></td>";
              echo "<td><h3>Date</h3></td>";
              echo "<td><h3>From</h3></td>";
              echo "<td><h3>Until</h3></td>";
              echo "<td><h3>Event Type</h3></td>";
              echo "<td><h3>People Count</h3></td>";
              echo "<td><h3>Payable</h3></td>";
              echo "<td><h3>Confirmation</h3></td>";
            echo "</thead>";
            echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result))
        {
          $table2 = "users";
          $username = $row['booking_client'];
          $query2 = "SELECT * FROM $table2 WHERE username = '$username'";
          $result2 = mysqli_query($con, $query2);
          $row2 = mysqli_fetch_assoc($result2);

          echo "<tr>";
            echo "<td class='b-num'>".($row['booking_id'])."</td>";
            echo "<td>".($row2['name'])."</td>";
            echo "<td>".($row2['contact'])."</td>";
            echo "<td>".(date("M. d, Y", strtotime($row['booking_date'])))."</td>";
            echo "<td>".date("h:i A", strtotime($row['booking_start_time']))."</td>";
            echo "<td>".date("h:i A", strtotime($row['booking_end_time']))."</td>";
            echo "<td>".($row['event_type'])."</td>";
            echo "<td>".($row['people_count'])."</td>";
            echo "<td>PHP ".($row['booking_payable'])."</td>";
            echo "<form action='update_status.php' method='post'>";
            echo "<input type='hidden' value='".($row['booking_id'])."' name='booking_id'></input>";
            echo "<input type='hidden' value='".($row['venue_id'])."' name='venue_id'></input>";
            echo "<td><button type='submit'>OK</button>&nbsp;<a href='cancel_booking.php?id=".($row['booking_id'])."'><button type='button'>Reject</button></a></td>";
            echo "</form>";
          echo "</tr>";
        }
          echo "</tbody>";
        echo "</table>";
      }
    ?>
    <br><br>
  </div>
  <div id='avail' class='check-avail'>
    <h2>Booking History</h2>
    <?php
      $table = "bookings";
      $query = "SELECT * FROM $table WHERE venue_id = $id AND booking_confirmation_status = 'upcoming'";
      $result = mysqli_query($con, $query);

      if(mysqli_num_rows($result) == 0)
      {
        echo "This venue does not have any upcoming bookings.";
      }
      else
      {
        echo "<table>";
            echo "<thead>";
              echo "<td class='b-num'><h3>Booking #</h3></td>";
              echo "<td><h3>Booking Client</h3></td>";
              echo "<td><h3>Booking Client Contact</h3></td>";
              echo "<td><h3>Date</h3></td>";
              echo "<td><h3>From</h3></td>";
              echo "<td><h3>Until</h3></td>";
              echo "<td><h3>Event Type</h3></td>";
              echo "<td><h3>People Count</h3></td>";
              echo "<td><h3>Payable</h3></td>";
              echo "<td><h3>Status</h3></td>";
            echo "</thead>";
            echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result))
        {
          $table2 = "users";
          $username = $row['booking_client'];
          $query2 = "SELECT * FROM $table2 WHERE username = '$username'";
          $result2 = mysqli_query($con, $query2);
          $row2 = mysqli_fetch_assoc($result2);

          echo "<tr>";
            echo "<td class='b-num'>".($row['booking_id'])."</td>";
            echo "<td>".($row2['name'])."</td>";
            echo "<td>".($row2['contact'])."</td>";
            echo "<td>".(date("M. d, Y", strtotime($row['booking_date'])))."</td>";
            echo "<td>".date("h:i A", strtotime($row['booking_start_time']))."</td>";
            echo "<td>".date("h:i A", strtotime($row['booking_end_time']))."</td>";
            echo "<td>".($row['event_type'])."</td>";
            echo "<td>".($row['people_count'])."</td>";
            echo "<td>PHP ".($row['booking_payable'])."</td>";
            echo "<td>".($row['booking_confirmation_status'])."</td>";
          echo "</tr>";
        }
          echo "</tbody>";
        echo "</table>";
      }
    ?>
    <br><br>
  </div>
</div>

<script type="text/javascript">
    function toggle() {
      var x = document.getElementById("avail");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
</script>

<?php
  include("footer.php");
?>
