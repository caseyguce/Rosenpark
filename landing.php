<div class="landing">
<input id="isLanding" type="hidden" value="true"></input>
<h1 class="rosenpark">Rosenpark</h1>
<p class="tagline">Book a venue for your event</p>
<p>Find suitable places for all private and corporate events in the Metro</p><br>
  <div class="landing-search">
    <form action="index.php?page=search" method="post">
    <table>
      <tbody>
        <tr>
          <td>
            <div class="select-div">
              <select name="event" required="required">
                <option value="" disabled selected>Type of event</option>
                <option value="Wedding">Wedding</option>
                <option value="Birthday">Birthday</option>
                <option value="Conference/Seminar">Conference/Seminar</option>
                <option value="Christmas Party">Christmas Party</option>
                <option value="Meeting">Meeting</option>
              </select>
            </div>
          </td>
          <td class="guest-count">
            <input type="number" placeholder="Guest count" name="people" required="required"></input>
          </td>
          <td>
            <div class="select-div">
              <select name="location" required="required">
                <option value="" disabled selected>Location</option>
                <option value="Manila">Manila</option>
                <option value="Makati">Makati</option>
                <option value="Taguig">Taguig</option>
                <option value="Quezon City">Quezon City</option>
                <option value="Caloocan">Caloocan</option>
                <option value="Pasay">Pasay</option>
                <option value="Malabon">Malabon</option>
                <option value="Las Pinas">Las Pinas</option>
                <option value="Mandaluyong">Mandaluyong</option>
                <option value="Marikina">Marikina</option>
                <option value="Muntinlupa">Muntinlupa</option>
                <option value="Navotas">Navotas</option>
                <option value="Paranaque">Paranaque</option>
                <option value="Pasig">Pasig</option>
                <option value="San Juan">San Juan</option>
                <option value="Valenzuela">Valenzuela</option>
                <option value="Pateros">Pateros</option>
              </select>
            </div>
          </td>
          <td class="search-td">
            <button type="submit">Search</button>
          </td>
        </tr>
      </tbody>
  </table>
  </form>
  </div><br>
  &#x2714; Unique Venues &nbsp; &#x2714; Quick and Affordable &nbsp; &#x2714; Free Booking
  <br><br>
  <a href="index.php?page=browse" class="view-all-venues">View all venues</a>
</div>
<div class="featured">
  <table>
    <tbody>
      <tr>
        <td>
          <img src="images/party-img.jpg"></img>
          <h3>Party</h3>
          <p>Birthday, anniversary, or any other reason to throw a party? Rosenpark helps you find the best place for an unforgettable bash!</p>
        </td>
        <td>
          <img src="images/wedding-img.jpg"></img>
          <h3>Wedding</h3>
          <p>Your dream wedding needs the perfect venue - whether it is in a mansion, a banquet hall or an old factory!</p>
        </td>
        <td>
          <img src="images/meeting-img.jpg"></img>
          <h3>Meeting</h3>
          <p>Meeting or a workshop in a cafe, or a seminar in a theater? Find a functional space to boost your creativity!</p>
        </td>
        <td>
          <img src="images/xmas-img.jpg"></img>
          <h3>Christmas Bash</h3>
          <p>Christmas Party coming up soon? Find the perfect place for you!</p>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<div class="customers">
  <table>
    <tbody>
      <tr>
        <td>
          <h1>Looking for a venue?</h1>
          <h3>Find a place fast and easy</h3>
          <p>Rosenpark has a wide selection of amazing event spaces. With over hundreds of venues available from trustworthy hosts, you can find the venue that is just right for you and your budget. Best of all, you can use the search function to find it!</p><br>
          <div class="button"><a href="index.php?page=browse"><button>Browse venues</button></a></div>
        </td>
        <td>
          <h1>Want to get your venue listed?</h1>
          <h3>Get bookings through us</h3>
          <p>Most of your clients look for you on the internet! With the digital age, coming through, your new market becomes the Internet. Hundreds of clients browse our site for venues everyday and of course, we can make sure they come to you. List your venue with us, now!</p><br>
          <div class="button">
            <?php
              if (empty($_SESSION["username"]))
                {echo "<a href=\"index.php?page=login\">";}
              else
                {echo "<a href=\"index.php?page=my_venues\">";}
            ?>
              <button>Add your venue</button></a></div>
        </td>
      </tr>
    </tbody>
  </table>
</div>
