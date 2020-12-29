<?php

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "rosenpark";
$dbtable = "venues";

if (!empty($_GET))
{
    $id = $_GET['id'];

    $con = mysqli_connect($hostname, $username, $password, $dbname);
    $query = "SELECT * FROM $dbtable WHERE venue_id = $id;";

    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['venue_manager'] == $_SESSION['username'])
    {
      $query = "DELETE FROM $dbtable WHERE venue_id = $id;";
      $query2 = "DELETE FROM bookings WHERE venue_id = $id;";
    }
    else
    {
      $query = "";
    }

    if(mysqli_query($con, $query) && mysqli_query($con, $query2))
    {
      echo "<script type='text/javascript'>alert('You have successfully deleted a listing.');</script>";
    }
    else
    {
      echo "<script type='text/javascript'>alert('You have failed to delete this listing. Please try again');</script>";
    }
    echo "<script>window.location.assign('index.php?page=my_venues');</script>";
}
?>
