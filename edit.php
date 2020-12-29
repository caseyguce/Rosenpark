<?php
include ("header.php");
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "rosenpark";
$dbtable = "venues";

if (!empty($_GET))
{
    $con = mysqli_connect($hostname, $username, $password, $dbname);
    $id = $_GET['id'];

    $query = "SELECT * FROM $dbtable WHERE venue_id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    echo "<form action='edit_process.php' method='POST'>";
    echo "<div class='edit-form'>";
    echo "<h1>Edit Venue Details</h1>";
    echo "<a href='index.php?page=my_venues'>< Back</a>";
    echo "<h2>".$row['venue_name']."</h2>";
    echo "<table><tbody><tr><td rowspan='10' style='width: 45%; border: 0; padding: 0'><img src='".($row['venue_image'])."'></img></td>";
    echo "<input type='hidden' name='id' value='".($row['venue_id'])."'></input>";

    echo "<tr>";
    echo "<td class='label'>Venue Image URL:</td><td><input name='image' maxlength='100' value='".$row['venue_image']."'/></td>";
    echo "</tr><tr>";
    echo "<td class='label'>Venue Name:</td><td><input name='name' maxlength='50' value='".($row['venue_name'])."'/><br /></td>";
    echo "</tr><tr>";
    echo "<td class='label'>Hourly Rate:</td><td>PHP <input class='rate' type='number' name='rate' value='".($row['venue_rate'])."'></input> /hr</td>";
    echo "</tr><tr><td class='label'>Venue Location:</td>";
    echo "<td>";
    ?>

    <select name='location'>
      <option value='Manila' <?php if($row['venue_location']=="Manila") echo 'selected="selected"'; ?>>Manila</option>
      <option value='Makati' <?php if($row['venue_location']=="Makati") echo 'selected="selected"'; ?>>Makati</option>
      <option value='Taguig' <?php if($row['venue_location']=="Taguig") echo 'selected="selected"'; ?>>Taguig</option>
      <option value='Quezon City' <?php if($row['venue_location']=="Quezon City") echo 'selected="selected"'; ?>>Quezon City</option>
      <option value='Caloocan' <?php if($row['venue_location']=="Caloocan") echo 'selected="selected"'; ?>>Caloocan</option>
      <option value='Pasay' <?php if($row['venue_location']=="Pasay") echo 'selected="selected"'; ?>>Pasay</option>
      <option value='Malabon' <?php if($row['venue_location']=="Malabon") echo 'selected="selected"'; ?>>Malabon</option>
      <option value='Las Pinas' <?php if($row['venue_location']=="Las Pinas") echo 'selected="selected"'; ?>>Las Pinas</option>
      <option value='Mandaluyong' <?php if($row['venue_location']=="Mandaluyong") echo 'selected="selected"'; ?>>Mandaluyong</option>
      <option value='Marikina' <?php if($row['venue_location']=="Marikina") echo 'selected="selected"'; ?>>Marikina</option>
      <option value='Muntinlupa' <?php if($row['venue_location']=="Muntinlupa") echo 'selected="selected"'; ?>>Muntinlupa</option>
      <option value='Navotas' <?php if($row['venue_location']=="Navotas") echo 'selected="selected"'; ?>>Navotas</option>
      <option value='Paranaque' <?php if($row['venue_location']=="Paranaque") echo 'selected="selected"'; ?>>Paranaque</option>
      <option value='Pasig' <?php if($row['venue_location']=="Pasig") echo 'selected="selected"'; ?>>Pasig</option>
      <option value='San Juan' <?php if($row['venue_location']=="San Juan") echo 'selected="selected"'; ?>>San Juan</option>
      <option value='Valenzuela' <?php if($row['venue_location']=="Valenzuela") echo 'selected="selected"'; ?>>Valenzuela</option>
      <option value='Pateros' <?php if($row['venue_location']=="Pateros") echo 'selected="selected"'; ?>>Pateros</option>
    </select>

    <?php
    echo "</td>";
    echo "</tr><tr>";
    echo "<td class='label'>Full Address:</td><td colspan='3'><input type='text' maxlength='100' name='address' value='".($row['venue_full_address'])."'></input></td></tr><tr>";
    echo "<td class='label'>Venue Capacity:</td><td><input type='number' name='capacity' value='".($row['venue_capacity'])."'></input></td>";
    echo "</tr><tr><td class='label'>Venue Event Type:</td><td>";
    ?>

    <select name='event'>
      <option value='Wedding' <?php if($row['venue_event_types']=="Wedding") echo 'selected="selected"'; ?>>Wedding</option>
      <option value='Birthday' <?php if($row['venue_event_types']=="Birthday") echo 'selected="selected"'; ?>>Birthday</option>
      <option value='Conference/Seminar' <?php if($row['venue_event_types']=="Conference/Seminar") echo 'selected="selected"'; ?>>Conference/Seminar</option>
      <option value='Christmas Party' <?php if($row['venue_event_types']=="Christmas Party") echo 'selected="selected"'; ?>>Christmas Party</option>
      <option value='Meeting' <?php if($row['venue_event_types']=="Meeting") echo 'selected="selected"'; ?>>Meeting</option>
    </select>

    </td></tr><tr><td class='label'>

    <?php
    echo "Venue Description:</td><td colspan='3'><input type='text' maxlength='200' name='description' value='".($row['venue_description'])."'></input></td>";
    echo "<tr><td colspan='3' style='border: 0;''>";
    echo "<button type='Submit'>Save</button></td></tr>";
    echo "</tbody></table>";
    echo "</div></form><br />";
}

include ("footer.php");
?>
