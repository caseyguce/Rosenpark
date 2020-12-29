<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "rosenpark";
$dbtable = "venues";

if (!empty($_POST))
{
  $id = $_POST['id'];
  $name = $_POST['name'];
  $rate = $_POST['rate'];
  $location = $_POST['location'];
  $address = $_POST['address'];
  $capacity = $_POST['capacity'];
  $event = $_POST['event'];
  $image = $_POST['image'];
  $description = $_POST['description'];

    $con = mysqli_connect($hostname, $username, $password, $dbname);
    $query = "UPDATE $dbtable SET
      venue_name = '$name',
      venue_rate = '$rate',
      venue_location = '$location',
      venue_full_address = '$address',
      venue_capacity = '$capacity',
      venue_event_types = '$event',
      venue_image = '$image',
      venue_description = '$description'
      WHERE venue_id = $id;";

    if (mysqli_query($con, $query))
    {
      echo "<script type='text/javascript'>alert('Successfully edited this venue.')</script>";
    }
    else
    {
      echo "<script type='text/javascript>alert('Failed to edit this venue. Please try again.')</script>";
    }

    echo '<script>window.location.assign("edit.php?id='.$id.'");</script>';
}
?>
