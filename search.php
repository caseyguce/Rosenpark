<div class='browse'>
  <h1>Browse Venues</h1>
  <table>
    <tbody>
      <?php
      $hostname = "localhost";
      $db = "rosenpark";
      $username = "root";
      $password = "";
      $table = "venues";
      $con = mysqli_connect($hostname, $username, $password, $db);

      $event = $_POST['event'];
      $people = $_POST['people'];
      $location = $_POST['location'];

      $query = "SELECT * FROM $table WHERE venue_event_types = '$event' AND venue_capacity >= $people AND venue_location = '$location'";
      $result = mysqli_query($con, $query);

      echo "<tr class='title-browse'><td><h2>Search Results</h2></td></tr>";

      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr>";
          echo "<td>";
            //echo "<input type='hidden' name='id' value='".($row['venue_id'])."'></input>";
            //echo "<input type='hidden' name='back' value='browse'></input>";
            echo "<img src='".($row['venue_image'])."'></img>";
            echo "<h2 style='margin-top: 15px;'>".($row['venue_name'])."</h2>";
            echo "<p>For a maximum of ".($row['venue_capacity'])." people</p>";
            echo "<h3>PHP ".($row['venue_rate'])."/hr</h3>";
            echo "<p>".($row['venue_location'])."</p>";
            echo "<a href='view.php?id=".($row['venue_id'])."&back=browse'><button type='button'>View</button></a>";
          echo "</td>";
        echo "</tr>";
      }

      $query = "SELECT * FROM $table";
      $result = mysqli_query($con, $query);

      echo "<tr class='title-browse'><td><h2>Other Venues</h2></td></tr>";

      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr>";
          echo "<td>";
            //echo "<input type='hidden' name='id' value='".($row['venue_id'])."'></input>";
            //echo "<input type='hidden' name='back' value='browse'></input>";
            echo "<img src='".($row['venue_image'])."'></img>";
            echo "<h2 style='margin-top: 15px;'>".($row['venue_name'])."</h2>";
            echo "<p>For a maximum of ".($row['venue_capacity'])." people</p>";
            echo "<h3>PHP ".($row['venue_rate'])."/hr</h3>";
            echo "<p>".($row['venue_location'])."</p>";
            echo "<a href='view.php?id=".($row['venue_id'])."&back=browse'><button type='button'>View</button></a>";
          echo "</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>
