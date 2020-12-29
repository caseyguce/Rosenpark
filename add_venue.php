<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "rosenpark";
$dbtable = "venues";

if (!empty($_POST))
{
    $manager = $_POST['manager'];
    $name = $_POST['name'];
    $rate = $_POST['rate'];
    $location = $_POST['location'];
    $address = $_POST['address'];
    $capacity = $_POST['capacity'];
    $event = $_POST['event'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    $con = mysqli_connect($hostname, $username, $password, $dbname);
    $query = "INSERT INTO $dbtable (venue_manager, venue_name, venue_rate, venue_location, venue_full_address, venue_capacity, venue_event_types, venue_image, venue_description)
              VALUES ('$manager', '$name', $rate, '$location', '$address', $capacity, '$event', '$image', '$description');";

    if (mysqli_query($con, $query))
    {
      echo '<script>alert("Successfully added new listing!");</script>';
    }
    else
    {
      echo '<script>alert("Please input valid values.");</script>';
    }

    echo '<script>window.location.assign("index.php?page=my_venues");</script>';
}
?>
