<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "rosenpark";
$dbtable = "users";

session_start();

if (!empty($_POST))
{
  if (isset($_POST['username']) && isset($_POST['password']))
  {
    $login_user = $_POST['username'];
    $login_pass = $_POST['password'];
    $con = mysqli_connect($hostname, $username, $password, $dbname);
    $query = "SELECT * FROM $dbtable WHERE username='$login_user' AND password='$login_pass'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
      if ($row)
      {
        $_SESSION["full_name"] = $row['name'];
        $_SESSION["username"] = $login_user;
        //echo "<script type='text/javascript'> alert('".$_SESSION["username"]."');</script>";
        //echo "<script type='text/javascript'> alert('".$_SESSION["usertype"]."');</script>";
        echo "<script type='text/javascript'> alert('Successfully logged in!');
        window.location.replace(\"index.php\");</script>";
      }
      else {
        echo "<script type='text/javascript'> alert('Failed to login. Please check if you have entered the right credentials.');
        window.location.replace(\"index.php?page=login\");</script>";
    }
  }
}

?>
