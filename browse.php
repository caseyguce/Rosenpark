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
      $query = "SELECT * FROM $table";
      $result = mysqli_query($con, $query);

      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr>";
          echo "<td>";
            //echo "<input type='hidden' name='id' value='".($row['venue_id'])."'></input>";
            //echo "<input type='hidden' name='back' value='browse'></input>";
            echo "<img src='".($row['venue_image'])."'></img>";
            echo "<h2>".($row['venue_name'])."</h2>";
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
