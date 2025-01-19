<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - Gaming Lounge</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <nav>
      <a href="./mainpage.php" class="logo"><img src="./img/sitelogo.png" /></a>
      <div class="container">
        <a href="./games.php">Games</a>
        <a href="./leaderboard.php">Leaderboard</a>
        <a href="./details.php">Account Details</a>
        <a href="./aboutus.php">About Us</a>
        <a href="./support.php">Contact and Support </a>
      </div>
      <div class="user-info">
        <a href="logout.php"
          ><img src="./img/logout.png" alt="User Icon"
        /></a>
        <span id="Username"> <?php echo $username; ?></span>
      </div>
    </nav>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h1 class="text-center mt-5">Welcome to Gaming Lounge!</h1>
          <img
            src="./img/sitelogo.png"
            class="img-fluid mx-auto d-block mb-4 logo"
            alt="Logo"
          />
          <div class="content">
            <p>
              Your Gateway to Mini Gaming Bliss! Welcome to Gaming Lounge, where
              the thrill of gaming meets simplicity! Are you ready to dive into
              a world of basic yet incredibly fun mini-games that promise to
              entertain and challenge you? Look no further, Gaming Lounge is
              your go-to destination for quick, delightful gaming experiences.
            </p>
            <h2>Overview</h2>
            <ul>
              <li>
                Simple Yet Addictive: Gaming Lounge is designed for those who
                appreciate the beauty of simplicity. Our collection features
                basic mini-games that are easy to pick up and enjoy, making
                gaming accessible to everyone.
              </li>
              <li>
                Quick Breaks, Big Fun: Need a break from your routine? Our
                mini-games are perfect for those short gaming sessions. Whether
                you're waiting for a meeting or simply want to unwind, Gaming
                Lounge has got you covered.
              </li>
              <li>
                Casual Gaming for All Ages: From classic puzzles to quick reflex
                challenges, our mini-games cater to players of all ages. It's a
                space where kids, teens, and adults can find joy in
                uncomplicated yet engaging gameplay.
              </li>
            </ul>
            <h2>Key Features</h2>
            <ul>
              <li>
                No Frills, Just Thrills: Enjoy the essence of gaming without
                unnecessary complexities. Gaming Lounge brings you
                straightforward, enjoyable experiences that focus on the pure
                joy of playing.
              </li>
              <li>
                Browser-Friendly: No downloads, no installations, just open your
                browser and start playing! Gaming Lounge is designed to be
                accessible anytime, anywhere, without any hassle.
              </li>
              <li>
                Growing Collection: Our library is continually expanding with
                new mini-games added regularly. Discover fresh challenges and
                keep the fun alive with our ever-growing collection.
              </li>
            </ul>
            <h2>Why Gaming Lounge?</h2>
            <ul>
              <li>
                Instant Gratification: Jump into the action right away. Gaming
                Lounge is all about instant gaming satisfaction with no learning
                curve.
              </li>
              <li>
                Community Fun: Connect with other gamers, challenge your
                friends, and share your high scores. Gaming Lounge is not just a
                gaming site; it's a community where everyone can enjoy the
                thrill together.
              </li>
              Why Gaming Lounge? Ready to experience the joy of simple yet
              captivating gaming? Gaming Lounge invites you to explore our
              collection and unlock the fun in mini-gaming today!
            </ul>
          </div>
        </div>
      </div>
    </div>
    <footer class="bg-dark text-white text-center mt-5 py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h5 class="text-light font-weight-bold">Quick Links</h5>
            <ul class="list-unstyled">
              <li><a href="#games" class="text-secondary">Games</a></li>
              <li>
                <a href="#leaderboard" class="text-secondary">Leaderboard</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <h5 class="text-light font-weight-bold">Contact Us</h5>
            <p class="text-secondary">Email: support@gaminglounge.com</p>
            <p class="text-secondary">Phone: +1 (555) 123-4567</p>
          </div>
          <div class="col-md-4">
            <h5 class="text-light font-weight-bold">Follow Us</h5>
            <div class="social-icons">
              <a href="#" target="_blank" class="text-secondary">
                <img
                  src="./img/instagram.png"
                  alt="Instagram Logo"
                  style="width: 50px; height: 50px"
                />
              </a>
              <a href="#" target="_blank" class="text-secondary">
                <img
                  src="./img/twitter.png"
                  alt="Twitter Logo"
                  style="width: 45px; height: 45px"
                />
              </a>
              <a href="#" target="_blank" class="text-secondary">
                <img
                  src="./img/facebook.png"
                  alt="Facebook Logo"
                  style="width: 45px; height: 45px"
                />
              </a>
            </div>
          </div>
        </div>
      </div>
      <p>&copy; 2024 Gaming Lounge. All rights reserved.</p>
    </footer>
  </body>
</html>
