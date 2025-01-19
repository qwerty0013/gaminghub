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
    <style>
      body {
        background: linear-gradient(45deg, #ff6b6b, #56ccf2);
        color: #1b1b1b;
        padding-top: 70px; 
      }

      .container {
        background: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 20px;
      }

      h1 {
        color: #007bff;
      }

      nav {
        background-color: rgba(0, 0, 0, 0.8);
        padding: 5px;
        border-radius: 0 0 10px 10px;
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: space-between;
      }

      .container a {
        color: #fff;
        text-decoration: none;
        margin: 0 15px;
        font-size: 20px;
      }

      nav a:hover {
        text-decoration: underline;
      }

      nav img {
        max-width: 100px;
        height: auto;
        display: block;
        margin: 0 auto;
      }
      .logo {
        max-width: 80px;
        height: auto;
        display: block;
        margin-right: 30px;
      }
      .user-info {
        display: flex;
        align-items: center;
        color: #fff;
        margin-right: 10px;
        margin-left: 10px;
      }

      .user-info img {
        max-width: 30px;
        height: 25px;
        margin-right: 5px;
      }
      header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 5px;
        margin-top: 50px;
      }

      main {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin: 20px;
      }

      main img {
        max-height: 250px;
      }
      .game-container {
        margin: 20px;
        padding: 10px;
        border: 2px solid #333;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
      }

      .game-container:hover {
        transform: scale(1.05);
      }

      .game-container a {
        text-decoration: none;
        color: #333;
      }

      .game-container h2 {
        margin-bottom: 10px;
      }

      footer {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 9px;
        position: fixed;
        bottom: 0;
        width: 100%;
      }
    </style>
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
        <a href="logout.php"><img src="./img/logout.png" alt="User Icon" /></a>
        <span id="Username"> <?php echo $username; ?></span>
      </div>
    </nav>

    <header>
      <h1>Choose a Game!</h1>
    </header>

    <main>
      <div class="game-container" id="snake">
        <a href="./games/snake.php">
          <h2>Snake Game</h2>
          <img src="./img/snake.png" alt="Snake Game Background" />
        </a>
      </div>

      <div class="game-container" id="quiz">
        <a href="./games/quiz.php">
          <h2>Quiz Mania</h2>
          <img src="./img/quiz.png" alt="Quiz Game Background" />
        </a>
      </div>

      <div class="game-container" id="connect4">
        <a href="./games/connect4.php">
          <h2>Connect 4</h2>
          <img src="./img/c4.png" alt="Connect 4 Game Background" />
        </a>
      </div>

      <div class="game-container" id="tictactoe">
        <a href="./games/tictactoe.php">
          <h2>Tic Tac Toe</h2>
          <img src="./img/ttt.png" alt="Tic Tac Toe Game Background" />
        </a>
      </div>
    </main>

    <footer>
      <p>&copy; 2024 Gaming Lounge. All rights reserved.</p>
    </footer>
  </body>
</html>
