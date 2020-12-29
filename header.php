<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rosenpark - Book your venue</title>
  <link id="icon-image" rel="icon" type="image/png" href="images/icon.jpg">

  <link id="master-style" rel="stylesheet" type="text/css" href="css/styles.css">
  <link id="header-style" rel="stylesheet" type="text/css" href="css/header.css">
  <link id="landing-style" rel="stylesheet" type="text/css" href="css/landing.css">
  <link id="featured-style" rel="stylesheet" type="text/css" href="css/featured.css">
  <link id="customers-style" rel="stylesheet" type="text/css" href="css/customers.css">
  <link id="footer-style" rel="stylesheet" type="text/css" href="css/footer.css">
  <link id="register-style" rel="stylesheet" type="text/css" href="css/register.css">
  <link id="login-style" rel="stylesheet" type="text/css" href="css/login.css">
  <link id="forms-style" rel="stylesheet" type="text/css" href="css/forms.css">
  <link id="browse-style" rel="stylesheet" type="text/css" href="css/browse.css">
  <link id="venues-style" rel="stylesheet" type="text/css" href="css/venues.css">
  <link id="edit-style" rel="stylesheet" type="text/css" href="css/edit.css">
  <link id="check-avail-style" rel="stylesheet" type="text/css" href="css/check-avail.css">
  <link id="book-style" rel="stylesheet" type="text/css" href="css/book.css">
  <link id="my-bookings-style" rel="stylesheet" type="text/css" href="css/my-bookings.css">
  <link id="view-style" rel="stylesheet" type="text/css" href="css/view.css">

  <script id="scroll-script" src="js/scroll.js"></script>
</head>
<body>

<div id="header" class="header">
  <table>
    <tbody>
      <tr>
        <td class="logo">
          <a href="index.php" class="logo-text">Rosenpark</a>
        </td>
        <td>
          <a href="index.php?page=browse" class="header-links">Browse venues</a>
        </td>
        <td>
          <?php
          session_start();
            if (isset($_SESSION["username"]) || !empty($_SESSION["username"]))
            {
              echo "<a href=\"index.php?page=my_bookings\" class=\"header-links\">My Bookings</a>";
              echo "</td>";
              echo "<td>";
              echo "<a href=\"index.php?page=logout\" class=\"header-links\">Logout</a>";
              echo "<td>";
              echo "<div class=\"button\"><a href=\"index.php?page=my_venues\" class=\"header-links\">";
              echo "<button class=\"add-venue-button\">My venues</button></a>";
              echo "</div>";
            }
           else
           {
              echo "<a href=\"index.php?page=login\" class=\"header-links\">Login</a>";
              echo "</td>";
              echo "<td>";
              echo "<a href=\"index.php?page=register\" class=\"header-links\">Signup</a>";
              echo "</td>";
              echo "<td>";
              echo "<div class=\"button\"><a href=\"index.php?page=login\">";
              echo "<button id=\"add-venue-button\" class=\"add-venue-button\">Add a venue</button>";
              echo "</a></div>";
           }
            ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>
