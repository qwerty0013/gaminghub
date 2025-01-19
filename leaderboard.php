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
    <title>Leaderboard - Gaming Lounge</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="style.css">
    <style>
      
      header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 5px;
        margin-top: 50px;
      }

      .leaderboard-selector {
        margin-bottom: 20px;
        text-align: center;
      }

      .leaderboard-table {
        width: 100%;
        margin-bottom: 20px;
        display: none; 
      }
    </style>
  </head>
  <body>
    <nav>
      <a href="./mainpage.php" class="logo">
        <img src="./img/sitelogo.png" class="logo" />
      </a>
      <div class="container">
        <a href="./games.php">Games</a>
        <a href="./leaderboard.php">Leaderboard</a>
        <a href="./details.php">Account Details</a>
        <a href="./aboutus.php">About Us</a>
        <a href="./support.php">Contact and Support</a>
      </div>
      <div class="user-info">
        <a href="logout.php"><img src="./img/logout.png" alt="User Icon" /></a>
        <span id="Username"> <?php echo $username; ?></span>
      </div>
    </nav>

    <header>
      <h1>Leaderboard</h1>
    </header>

    <div class="container leaderboard-selector">
      <label for="gameSelector" class="form-label">Select Game:</label>
      <select class="form-select" id="gameSelector">
        <option value="snake">Snake Game</option>
        <option value="quiz">Quiz</option>
      </select>
    </div>

   
    <div class="container leaderboard-table" id="snakeTable">
      <h2>Snake Game Leaderboard</h2>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Rank</th>
            <th>Player</th>
            <th>Score</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require "connection.php";
          $sql = "SELECT * from snakedb ORDER BY score DESC";
          $records = mysqli_query($conn,$sql);
          $count = mysqli_num_rows($records);
          $srank = 0;
          if ($count>0)
          {
            foreach($records as $record){
              $srank = $srank +1;
              echo "<tr> 
              <td>". $srank. "</td>
              <td>". $record['username']."#".$record['usertag']. "</td>
              <td>". $record['score']. "</td>
              </tr>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>

    <div class="container leaderboard-table" id="quizTable">
      <h2>Quiz Mania Leaderboard</h2>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Rank</th>
            <th>Player</th>
            <th>Score</th>
          </tr>
        </thead>
        <tbody>
        <?php
          require "connection.php";
          $sql = "SELECT * from quizdb ORDER BY score DESC";
          $records = mysqli_query($conn,$sql);
          $count = mysqli_num_rows($records);
          $srank = 0;
          if ($count>0)
          {
            foreach($records as $record){
              $srank = $srank +1;
              echo "<tr> 
              <td>". $srank. "</td>
              <td>". $record['username']."#".$record['usertag']. "</td>
              <td>". $record['score']. "</td>
              </tr>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>

    <footer>
      <p>&copy; 2024 Gaming Lounge. All rights reserved.</p>
    </footer>

    <script>
      function switchLeaderboard() {
        var selectedGame = document.getElementById("gameSelector").value;
        var snakeTable = document.getElementById("snakeTable");
        var quizTable = document.getElementById("quizTable");

        if (selectedGame === "snake") {
          snakeTable.style.display = "block";
          quizTable.style.display = "none";
        } else if (selectedGame === "quiz") {
          snakeTable.style.display = "none";
          quizTable.style.display = "block";
        }
      }

      document
        .getElementById("gameSelector")
        .addEventListener("change", switchLeaderboard);

      switchLeaderboard();
    </script>
  </body>
</html>
