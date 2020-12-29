<?php
  session_start();
  if (empty($_SESSION))
  {
    header("location: index.php");
  }
  else
  {
    $hostname = "localhost";
    $db = "rosenpark";
    $username = "root";
    $password = "";
    $con = mysqli_connect($hostname, $username, $password, $db);

    if (!empty($_GET))
    {
      $id = $_GET['id'];
      $table = "bookings";
      $query = "DELETE FROM $table WHERE booking_id = $id";

      if (mysqli_query($con, $query))
      {
        echo '<script>alert("Successfully cancelled booking.");</script>';
      }
      else
      {
        echo '<script>alert("Failed to cancel booking. Please try again.");</script>';
      }

      echo '<script>window.history.back();</script>';
    }
  }

?>
