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
    <title>Contact and Support - Gaming Lounge</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <nav>
      <a href="./mainpage.php" class="logo"
        ><img src="./img/sitelogo.png" class="logo"
      /></a>
      <div class="container">
        <a href="./games.php">Games</a>
        <a href="./leaderboard.php">Leaderboard</a>
        <a href="./details.php">Account Details</a>
        <a href="./aboutus.php">About Us</a>
        <a href="./support.php">Contact and Support </a>
      </div>
      <div class="user-info">
        <a href="logout.php"><img src="./img/logout.png" alt="User Icon" /></a>
        <span id="Username"> <?php echo $username; ?></span>
      </div>
    </nav>

    <header>
      <h1>Contact and Support</h1>
    </header>

    <main>
      <div class="game-container" id="email-support">
        <a href="mailto:support@gaminglounge.com">
          <h2>Email Support</h2>
          <p>Send us an email at support@gaminglounge.com for assistance.</p>
        </a>
      </div>

      <div class="game-container" id="live-chat">
        <a href="https://discord.gg/Mf96bG9h" target="_blank">
          <h2>Discord Server</h2>
          <p>
            Connect with our support team through the Discord server for
            real-time help.
          </p>
        </a>
      </div>

      <!-- Forums Section -->
      <div class="forums-container" id="forums">
        <a href="https://forums.gaminglounge.com" target="_blank">
          <h2>Forums</h2>
          <p>
            Join our forums to share suggestions and connect with the community.
          </p>
        </a>
      </div>

      <!-- Patreon Section -->
      <div class="patreon-container" id="patreon">
        <a href="https://www.patreon.com/gaminglounge" target="_blank">
          <h2>Support us on Patreon</h2>
          <p>
            Consider becoming a Patreon to support the development of new games.
          </p>
        </a>
      </div>
      <div class="faq-container" id="faq">
        <a href="#">
          <h2>FAQs Page</h2>
          <p>
            Visit our FAQs page to find answers to commonly asked questions.
          </p>
        </a>
      </div>

      <div class="social-media-container" id="social-media">
        <a href="https://www.facebook.com/gaminglounge" target="_blank">
          <h2>Social Media</h2>
          <p>Follow us on Facebook for updates and announcements.</p>
        </a>
      </div>
    </main>

    <footer>
      <p>&copy; 2024 Gaming Lounge. All rights reserved.</p>
    </footer>
  </body>
</html>
