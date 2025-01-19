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
    <title>About Us - Gaming Lounge</title>
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
      <h1>About Gaming Lounge</h1>
    </header>

    <div class="container about-content">
      <h2>Our Mission and Vision</h2>
      <p>
        At Gaming Lounge, our mission is to create a dynamic and inclusive space
        for gamers of all levels, fostering a sense of community and excitement.
        We are dedicated to delivering engaging and accessible gaming
        experiences that transcend boundaries and bring people together.
      </p>
      <p>
        Our vision is to be a leading platform that redefines the gaming
        landscape, making it a source of joy, inspiration, and connection. We
        aim to provide a diverse range of games that cater to various interests,
        creating a hub where players can explore, compete, and share memorable
        moments.
      </p>

      <h2>Our History</h2>
      <p>
        Gaming Lounge was founded in 2024 with a passion for bringing the joy of
        gaming to people around the world. What started as a small initiative
        has grown into a thriving community, offering a diverse range of
        mini-games to players of all ages.
      </p>
      <p>
        Over the years, we have expanded our library, constantly adding new and
        exciting games to keep the experience fresh. Our journey has been marked
        by the support and enthusiasm of our dedicated community, who have made
        Gaming Lounge a go-to destination for quick, delightful gaming
        experiences.
      </p>
      <p>
        We are proud of the milestones we've achieved and are excited about the
        future as we continue to evolve and enhance the gaming experience for
        everyone.
      </p>

      <h2>Meet Our Team</h2>

      <div class="team-member">
        <div class="team-member-text">
          <h3>John Doe</h3>
          <p>Founder & CEO</p>
          <p>
            John is the visionary behind Gaming Lounge, bringing a wealth of
            experience and passion for gaming to the team. With a background in
            the gaming industry, John is dedicated to creating an inclusive
            gaming space for all.
          </p>
        </div>
        <img src="./img/ceo.jpg" alt="Team Member" />
      </div>

      <h2>Values and Culture</h2>
      <p>
        At Gaming Lounge, our values and culture form the foundation of who we
        are and guide our every decision. We believe in creating a vibrant and
        inclusive environment that reflects our commitment to the gaming
        community.
      </p>

      <h3>Our Core Values</h3>
      <ul>
        <li>
          <strong>Passion:</strong> We are passionate about gaming and dedicated
          to delivering exceptional experiences.
        </li>
        <li>
          <strong>Inclusivity:</strong> We embrace diversity and strive to make
          gaming accessible to everyone.
        </li>
        <li>
          <strong>Innovation:</strong> We continuously explore new ideas and
          technologies to push the boundaries of gaming.
        </li>
        <li>
          <strong>Community:</strong> We foster a sense of community,
          encouraging collaboration and camaraderie among gamers.
        </li>
        <li>
          <strong>Integrity:</strong> We uphold the highest standards of
          integrity, ensuring fairness and transparency in all aspects.
        </li>
      </ul>

      <h3>Our Culture</h3>
      <p>
        Our culture is built on the belief that gaming is a universal language
        that transcends cultural and geographical barriers. We celebrate
        creativity, teamwork, and a shared love for gaming. Whether you're a
        player enjoying our mini-games or a member of our team, you're part of
        the Gaming Lounge family.
      </p>

      <p>
        We encourage an open and collaborative work environment, where every
        voice is valued, and ideas are welcomed. Innovation flourishes in an
        atmosphere of respect and trust, and we strive to maintain that ethos in
        everything we do.
      </p>

      <p>
        Join us on this exciting journey as we continue to shape the gaming
        landscape with our values as our guiding principles.
      </p>

      <h2>Contact Us</h2>
      <p>
        Have questions or suggestions? Feel free to reach out to us via email at
        info@gaminglounge.com or give us a call at +1 (555) 123-4567. Your
        feedback is valuable to us!
      </p>
    </div>

    <footer>
      <p>&copy; 2024 Gaming Lounge. All rights reserved.</p>
    </footer>
  </body>
</html>
