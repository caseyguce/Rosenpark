<?php

  $hostname = "localhost";
  $db = "rosenpark";
  $username = "root";
  $password = "";
  $table = "bookings";
  $con = mysqli_connect($hostname, $username, $password, $db);
  $query = "SELECT * FROM $table WHERE booking_confirmation_status = 'upcoming'";
  $result = mysqli_query($con, $query);

  while ($row = mysqli_fetch_assoc($result))
  {
    if ($row['booking_date'] < date("Y-m-d"))
    {
        $query = "UPDATE $table SET booking_confirmation_status = 'done'";
        mysqli_query($con, $query);
    }
  }
?>
