<div id='avail' class='check-avail my-bookings'>

  <?php
    if (empty($_SESSION))
    {
      header("location: index.php");
    }

    $user_name = $_SESSION["full_name"];

    echo "<h2>$user_name's Bookings</h2>";

    $hostname = "localhost";
    $db = "rosenpark";
    $username = "root";
    $password = "";
    $id = $_SESSION["username"];
    $con = mysqli_connect($hostname, $username, $password, $db);

    $table = "bookings";
    $query = "SELECT * FROM $table WHERE booking_client = '$id'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) == 0)
    {
      echo "You do not have any bookings.";
      echo "<br><br><br><br><br>";
    }
    else
    {
      echo "<table>";
          echo "<thead>";
            echo "<td class='b-num'><h3>Venue</h3></td>";
            echo "<td><h3>Venue Manager</h3></td>";
            echo "<td><h3>Venue Manager Contact Num</h3></td>";
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
        $table2 = "venues";
        $venid = $row['venue_id'];
        $query2 = "SELECT * FROM $table2 WHERE venue_id = $venid;";
        $result2 = mysqli_query($con, $query2);
        $row2 = mysqli_fetch_assoc($result2);

        $table3 = "users";
        $username = $row2['venue_manager'];
        $query3 = "SELECT * FROM $table3 WHERE username = '$username';";
        $result3 = mysqli_query($con, $query3);
        $row3 = mysqli_fetch_assoc($result3);

        echo "<tr>";
          echo "<td class='b-num'><a href='view.php?id=$venid&back=my_bookings'>".($row2['venue_name'])."</a></td>";
          echo "<td>".($row3['name'])."</td>";
          echo "<td>".($row3['contact'])."</td>";
          echo "<td>".(date("M. d, Y", strtotime($row['booking_date'])))."</td>";
          echo "<td>".date("h:i A", strtotime($row['booking_start_time']))."</td>";
          echo "<td>".date("h:i A", strtotime($row['booking_end_time']))."</td>";
          echo "<td>".($row['event_type'])."</td>";
          echo "<td>".($row['people_count'])."</td>";
          echo "<td>PHP ".($row['booking_payable'])."</td>";
          echo "<td>".($row['booking_confirmation_status'])."</td>";
          if ($row['booking_confirmation_status'] == 'pending')
          {
            echo "<td><a href='cancel_booking.php?id=".$row['booking_id']."'><button type='button'>Cancel</button></a></td>";
          }
        echo "</tr>";
      }
        echo "</tbody>";
      echo "</table>";
    }
  ?>
  <br><br>
</div>
