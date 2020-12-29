<div class='browse my-venues'>

      <?php
      $hostname = "localhost";
      $db = "rosenpark";
      $username = "root";
      $password = "";
      $table = "venues";
      $user_id = $_SESSION["username"];
      $user_name = $_SESSION["full_name"];
      $con = mysqli_connect($hostname, $username, $password, $db);
      $query = "SELECT * FROM $table WHERE venue_manager = '$user_id'";
      $result = mysqli_query($con, $query);

      echo "<tr><td style='border: none;'>";
      echo "<h1>$user_name's Venues</h1>";
      echo "<button id='addNewButton' onclick='toggle()'>+ List a venue</button><br><br>";
      echo "</td></tr>";
      ?>

      <div id='addNew' class="add-venue" style='display: none'>
        <h2>List a new venue</h2>
          <form action="add_venue.php" method="post">
            <?php echo "<input type='hidden' value='$user_id' name='manager'></input>"; ?>
            <table>
              <tbody>
                <tr>
                  <td class='add-label'>Venue Name:</td>
                  <td class='add-input'><input type='text' maxlength='50' name='name' required='required' placeholder='Ex.: Star Function Hall'></input></td>
                  <td class='add-label'>Venue Rate:</td>
                  <td class='add-input'>PHP <input type='number' class='rate' name='rate' required='required' placeholder='Ex.: 3000'></input> /hr</td>
                </tr>
                <tr>
                  <td class='add-label'>Venue Location:</td>
                  <td class='add-input'>
                    <select name='location'>
                      <option value='Manila'>Manila</option>
                      <option value='Makati'>Makati</option>
                      <option value='Taguig'>Taguig</option>
                      <option value='Quezon City'>Quezon City</option>
                      <option value='Caloocan'>Caloocan</option>
                      <option value='Pasay'>Pasay</option>
                      <option value='Malabon'>Malabon</option>
                      <option value='Las Pinas'>Las Pinas</option>
                      <option value='Mandaluyong'>Mandaluyong</option>
                      <option value='Marikina'>Marikina</option>
                      <option value='Muntinlupa'>Muntinlupa</option>
                      <option value='Navotas'>Navotas</option>
                      <option value='Paranaque'>Paranaque</option>
                      <option value='Pasig'>Pasig</option>
                      <option value='San Juan'>San Juan</option>
                      <option value='Valenzuela'>Valenzuela</option>
                      <option value='Pateros'>Pateros</option>
                    </select>
                  </td>
                  <td class='add-label'>Full Venue Address:</td>
                  <td class='add-input'><input type='text' maxlength='100' name='address' required='required' placeholder='Ex.: 23 Star St., Galaxy Village, Manila'></input></td>
                </tr>
                <tr>
                  <td class='add-label'>Maximum Capacity:</td>
                  <td class='add-input'><input type='number' name='capacity' required='required' placeholder='Ex.: 100'></input></td>
                  <td class='add-label'>Venue Event Type:</td>
                  <td class='add-input'>
                    <select name='event'>
                      <option value='Wedding'>Wedding</option>
                      <option value='Birthday'>Birthday</option>
                      <option value='Conference/Seminar'>Conference/Seminar</option>
                      <option value='Christmas Party'>Christmas Party</option>
                      <option value='Meeting'>Meeting</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class='add-label'>Venue Image URL:</td>
                  <td class='add-input'><input type='text' name='image' required='required' placeholder='Ex.: images/image1.jpg' maxlength='100'></input></td>
                  <td class='add-label'>Venue Description:</td>
                  <td class='add-input'><input type='text' maxlength='200' name='description' required='required' placeholder='Ex.: This is a great location for seminars for its big space.'></input></td>
                </tr>
                <tr>
                  <td colspan='4'>
                    <button type='submit'>List this Venue</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
      </div><br>

      <table>
        <tbody>
      <?php
      if(mysqli_num_rows($result) == 0)
      {
        echo "You do not have any venues listed!";
        echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
      }
      else
      {
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
              echo "<a href='view.php?id=".($row['venue_id'])."&back=my_venues'><button type='button'>View</button></a>&nbsp;";
              echo "<a href='edit.php?id=".($row['venue_id'])."'><button type='button'>Edit</button></a>&nbsp;";
              echo "<a href='delete.php?id=".($row['venue_id'])."'><button type='button'>Delete</button></a>&nbsp;";
              echo "<a href='bookings.php?id=".($row['venue_id'])."'><button type='button'>Bookings</button></a>";
            echo "</td>";
          echo "</tr>";
        }
      }
      ?>
    </tbody>
  </table>
</div>

<script type="text/javascript">
    function toggle() {
      var x = document.getElementById("addNew");
      var y = document.getElementById("addNewButton");
      if (x.style.display === "none") {
        x.style.display = "block";
        y.textContent = "Cancel";
      } else {
        x.style.display = "none";
        y.textContent = "+ List a venue";
      }
    }
</script>
