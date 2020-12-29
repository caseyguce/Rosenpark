<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "rosenpark";
$dbtable = "users";

session_start();

if (!empty($_POST))
{
  if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['full_name']))
  {
    $user_name = $_POST['username'];
    $pass_word = $_POST['password'];
    $full_name = $_POST['full_name'];
    $contact = $_POST['contact'];
    $con = mysqli_connect($hostname, $username, $password, $dbname);
    $query = "INSERT INTO $dbtable VALUES ('$user_name', '$pass_word', '$full_name', '$contact');";
      if (mysqli_query($con, $query))
      {
        echo "<script type='text/javascript'> alert('Successfully registered!');
        window.location.replace(\"index.php?page=login\");</script>";
      }
      else {
        echo "<script type='text/javascript'> alert('Failed to register. Username may already be taken.');
        window.location.replace(\"index.php?page=register\");</script>";
    }
  }

}


?>
