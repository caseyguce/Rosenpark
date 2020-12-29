<div class='view compute-rate'>
  <?php

  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "rosenpark";
  $dbtable = "bookings";
  $con = mysqli_connect($hostname, $username, $password, $dbname);

  if (!empty($_POST))
  {
    $id = $_POST['venue_id'];
    $rate = $_POST['venue_rate'];
    $date = $_POST['date'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $event = $_POST['event'];
    $people = $_POST['people'];

    if ($from < $to)
    {
      if (empty($_SESSION["username"]))
      {
        header("location:index.php?page=login");
      }
      if ($date < date("Y-m-d"))
      {
        echo "<script>alert('You cannot book in the past!');</script>";
        echo "<script>window.history.back();</script>";
      }

      $query = "SELECT * FROM venues WHERE venue_id = $id";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_assoc($result);

      if ($row['venue_manager'] == $_SESSION["username"])
      {
        echo "<script>alert('You cannot book your own venue!');</script>";
        echo "<script>window.history.back();</script>";
      }

      if ($people > $row['venue_capacity'])
      {
        echo "<script>alert('Head count exceeds maximum venue capacity!');</script>";
        echo "<script>window.history.back();</script>";
      }

      $query = "SELECT * FROM $dbtable WHERE venue_id = $id AND booking_date = '$date' AND (('$from' >= booking_start_time AND '$from' < booking_end_time) OR ('$to' > booking_start_time AND '$to' <= booking_end_time));";
      $result = mysqli_query($con, $query);

      if (mysqli_num_rows($result))
      {
        echo "<script>alert('Venue is booked on that timeslot.');</script>";
        echo "<script>window.history.back();</script>";
      }
      else
      {
        $diff = strtotime($_POST['to']) - strtotime($_POST['from']);
        $diff = date('H', $diff)-1;
        $total = $diff*$rate;

        if ($total == 0)
        {
          $total = $rate;
        }

        $table = "venues";
        $query = "SELECT * FROM $table WHERE venue_id = $id";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
          echo "<table>";
            echo "<tr>";
              echo "<td colspan='2'>";
                echo "<a href='index.php?page=browse'>< Back</a>";
                echo "<h1>Book <i>".($row['venue_name'])."</i></h1>";
                echo "<img src='".($row['venue_image'])."'></img>";
                echo "<h2>PHP ".($row['venue_rate'])."/hr</h2>";
                echo "<h3>".($row['venue_location'])."</h3>";
                echo "<p>".($row['venue_full_address'])."</p>";
                echo "<h4>Maximum of ".($row['venue_capacity'])." people</h4>";
                echo "<p>".($row['venue_description'])."</p>";
                echo "<h4>Usually for ".($row['venue_event_types'])."</h4>";
              echo "</td>";
            echo "</tr>";
            echo "</table><br><table class='book-info'>";
            echo "<tr>";
              echo "<td colspan='2'><h2>Booking Information</h2></td>";
            echo "</tr><tr>";
              echo "<td><b>Booking Date: </b>".date("M. d, Y", strtotime($date))."</td>";
              echo "<td><b>Booking Time: </b>".date("h:i A", strtotime($from))." to ".date("h:i A", strtotime($to))."</td>";
            echo "</tr><tr>";
              echo "<td><b>Head Count: </b>$people </td>";
              echo "<td><b>Event Type: </b>$event </td>";
            echo "</tr><tr>";
              echo "<td colspan='2'><b>Total Payable: </b> PHP $total (Hourly Rate x Booking Duration on Hourly Interval)</td>";
            echo "</tr><tr>";
              echo"<td colspan='2'>";

              $client = $_SESSION["username"];
              $payment = 'pending';
              $confirmation = 'pending';

              echo "<form action='book.php' method='post'>";
              echo "<input type='hidden' value='$id' name='venue_id'></input>";
              echo "<input type='hidden' value='$client' name='booking_client'></input>";
              echo "<input type='hidden' value='$date' name='booking_date'></input>";
              echo "<input type='hidden' value='$from' name='booking_start_time'></input>";
              echo "<input type='hidden' value='$to' name='booking_end_time'></input>";
              echo "<input type='hidden' value='$event' name='event_type'></input>";
              echo "<input type='hidden' value='$people' name='people_count'></input>";
              echo "<input type='hidden' value='$total' name='booking_payable'></input>";
              echo "<input type='hidden' value='$payment' name='booking_payment_status'></input>";
              echo "<input type='hidden' value='$confirmation' name='booking_confirmation_status'></input>";
              echo "<button type='submit'>Book</button>";
              echo "</form>";
              echo "</td>";
            echo "</tr>";
          echo "</table>";
      }
    }
    else
    {
      echo "<script>alert('Invalid values!');</script>";
      echo "<script>window.history.back();</script>";
    }
  }
  else
  {
    header("location:index.php");
  }
  ?>
</div>
