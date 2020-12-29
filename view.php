<?php
  include("header.php");
?>
<div class='view'>
  <table>
    <tbody>
      <?php
      if (empty($_GET))
      {
        header("location:index.php");
      }
      $id = $_GET['id'];
      $back = $_GET['back'];
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
              echo "<a href='index.php?page=".$back."'>< Back</a>";
              echo "<h1>".($row['venue_name'])."</h1>";
              echo "<img src='".($row['venue_image'])."'></img>";
              echo "<h2>PHP ".($row['venue_rate'])."/hr</h2>";
              echo "<h3>".($row['venue_location'])."</h3>";
              echo "<p>".($row['venue_full_address'])."</p>";
              echo "<h4>Maximum of ".($row['venue_capacity'])." people</h4>";
              echo "<p>".($row['venue_description'])."</p>";
              echo "<h4>Usually for ".($row['venue_event_types'])."</h4>";
              echo "<button type='button' onclick='toggle()'>Check for schedule availability</button>";
            echo "</td>";
          echo "</tr>";
      ?>
    </tbody>
  </table>
  <br>
  <div id='avail' class='check-avail' style='display: none;'>
    <h2>Schedule Availability</h2>
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
        echo "This venue is booked on:<br><br>";
        echo "<table>";
            echo "<thead>";
              echo "<td class='b-num'><h3>Booking #</h3></td>";
              echo "<td><h3>Date</h3></td>";
              echo "<td><h3>From</h3></td>";
              echo "<td><h3>Until</h3></td>";
            echo "</thead>";
            echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result))
        {
          echo "<tr>";
            echo "<td class='b-num'>".($row['booking_id'])."</td>";
            echo "<td>".$row['booking_date']."</td>";
            echo "<td>".date("h:i A", strtotime($row['booking_start_time']))."</td>";
            echo "<td>".date("h:i A", strtotime($row['booking_end_time']))."</td>";
          echo "</tr>";
        }
          echo "</tbody>";
        echo "</table>";
      }
    ?>
    <br><br>
    <div class='book'>
      <form action='index.php?page=compute_rate' method='post'>
        <?php echo "<input type='hidden' value='$id' name='venue_id'></input>"; ?>
        <?php echo "<input type='hidden' value='$rate' name='venue_rate'></input>"; ?>
      <h2>Book this venue</h2>
      <table>
        <tbody>
          <tr>
            <td class='label'><h3>Date</h3>
            <td><input type='date' name='date' required='required'></input></td>
          </tr>
        </tbody>
      </table><br>
      <table>
        <tbody>
          <tr>
            <td class='label-time'><h3>Time</h3></td>
            <td><h4>From </h4><input class='time' type='time' name='from' required='required'></input></td>
            <td><h4>To </h4><input class='time' type='time' name='to' required='required'></input></td>
          </tr>
        </tbody>
      </table><br>
      <table>
        <tbody>
          <tr>
            <td class='label'>
              <h4>Event Type</h4>
            </td>
            <td>
              <select name='event' required='required'>
                <option value='Wedding'>Wedding</option>
                <option value='Birthday'>Birthday</option>
                <option value='Conference/Seminar'>Conference/Seminar</option>
                <option value='Christmas Party'>Christmas Party</option>
                <option value='Meeting'>Meeting</option>
              </select>
            </td>
          </tr>
        </tbody>
      </table><br>
      <table>
        <tbody>
          <tr>
            <td class='label'><h4>People Count</h4></td>
            <td><input type='number' name='people' required='required'></input></td>
          </tr>
      </table><br>
      <div class='compute'><button type='submit'>Compute Rate</button></div>
    </form>
    </div>
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
