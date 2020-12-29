<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "rosenpark";
$dbtable = "bookings";

if (!empty($_POST))
{
    $venue_id = $_POST['venue_id'];
    $booking_client = $_POST['booking_client'];
    $booking_date = $_POST['booking_date'];
    $booking_start_time = $_POST['booking_start_time'];
    $booking_end_time = $_POST['booking_end_time'];
    $event_type = $_POST['event_type'];
    $people_count = $_POST['people_count'];
    $booking_payable = $_POST['booking_payable'];
    $booking_confirmation_status = $_POST['booking_confirmation_status'];

    $con = mysqli_connect($hostname, $username, $password, $dbname);
    $query = "INSERT INTO $dbtable (venue_id, booking_client, booking_date, booking_start_time, booking_end_time, event_type, people_count, booking_payable, booking_confirmation_status)
              VALUES ($venue_id, '$booking_client', '$booking_date', '$booking_start_time', '$booking_end_time', '$event_type', $people_count, $booking_payable, '$booking_confirmation_status');";

    if (mysqli_query($con, $query))
    {
      echo '<script>alert("Successfully booked this venue!");</script>';
    }
    else
    {
      echo '<script>alert("Failed to book this venue. Please try again.");</script>';
    }

    echo '<script>window.location.assign("index.php?page=my_bookings");</script>';
}
?>
