<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "rosenpark";
$dbtable = "bookings";

if (!empty($_POST))
{
    $id = $_POST['booking_id'];
    $venue = $_POST['venue_id'];

    $con = mysqli_connect($hostname, $username, $password, $dbname);
    $query = "UPDATE $dbtable SET booking_confirmation_status = 'upcoming' WHERE booking_id = $id;";

    if (mysqli_query($con, $query))
    {
      echo "<script type='text/javascript'>alert('Successfully confirmed this booking.')</script>";
    }
    else
    {
      echo "<script type='text/javascript>alert('Failed to confirm booking. Please try again.')</script>";
    }

    echo '<script>window.location.assign("bookings.php?id='.$venue.'");</script>';
}
else
{
  header("location:index.php");
}
?>
