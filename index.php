  <?php
    include("header.php");
    include("update.php");
    echo "<div class='others'>";
      if (isset($_GET['page']))
      {
        $page = $_GET['page'];
        switch ($page){
        case 'search':
        include 'search.php';
        break;
        case 'login':
        include 'login.php';
        break;
        case 'register':
        include 'register.php';
        break;
        case 'logout':
        include 'logout.php';
        break;
        case 'my_venues':
        include 'my_venues.php';
        break;
        case 'contact':
        include 'contact.php';
        break;
        case 'my_bookings':
        include 'my_bookings.php';
        break;
        case 'add':
        include 'add.php';
        break;
        case 'edit':
        include 'edit.php';
        break;
        case 'browse':
        include 'browse.php';
        break;
        case 'view':
        include 'view.php';
        break;
        case 'compute_rate':
        include 'compute_rate.php';
        break;
        default:
        include 'landing.php';
        break;
       }
      }
      else {
        include 'landing.php';
      }

      echo "</div>";
      include("footer.php");
    ?>
