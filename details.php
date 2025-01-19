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
    <title>Account Details - Gaming Lounge</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <style>
      #avatar-container {
        text-align: center;
        margin-top: 20px;
      }

      #avatar {
        max-width: 200px;
        max-height: 200px;
        border-radius: 50%;
        border: 5px solid #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      }

      .account-details {
        margin-top: 20px;
      }

      #update-password-form,
      #delete-account-button {
        margin-top: 30px;
        position: relative;
        left: 30%;
      }

      #delete-account-button:hover {
        background-color: #bb2d3b;
      }

      #update-password-form {
        position: relative;

        left: 50%;
        transform: translate(-50%, -10%);
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

    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div id="avatar-container">
            <img id="avatar" src="./img/avatar.gif" alt="User Avatar" />
          </div>
          <div id="details">
            <div class="account-details">
              <h3>Account Details:</h3>
              <?php
              require "connection.php";
              $sql = "SELECT * FROM account where username='$username'";
              $records = mysqli_query($conn,$sql);

              foreach($records as $record){
                $name = $record['name'];
                $email = $record['email'];
                $dob = $record['dob'];
                $gamername = $record['username']."#".$record['usertag'];
              }
              echo "<p>
              <strong>Name: </strong>"
              . $name . "
            </p>
            <p>
              <strong>Email:</strong>
              " . $email . "
            </p>
            <p>
              <strong>DOB:</strong> "
              . $dob . "
            </p>
            <p>
              <strong>Gamer Name:</strong>
              " . $gamername ."
            </p>"
              ?>
              
            </div>
            <button class="btn btn-secondary" onclick="changePass()">
              Update Password
            </button>
            <div class="account-details">
              <h3>Gaming Stats:</h3>
              <?php
              $quizScore=0;
              $snakeScore=0;
              $snakeRank=0;
              $quizRank=0;
              require "connection.php";
              $quiz = "SELECT * FROM quizdb ORDER BY score DESC";
              $snake = "SELECT * FROM snakedb ORDER BY score DESC";
              $data1 = mysqli_query($conn,$quiz);
              $data2 = mysqli_query($conn,$snake);
              $ctr = 0;
              foreach($data1 as $record1){
                $ctr++;
                if ($record1['username']== $username){
                  $quizScore = $record1['score'];
                  $quizRank = $ctr;
                }
              }
              $ctr = 0;
              foreach($data2 as $record2){
                $ctr++;
                if ($record2['username']== $username){
                  $snakeScore = $record2['score'];
                  $snakeRank = $ctr;
                }
              }
              ?>
              <p>
                <strong>Quiz Mania High-Score:</strong>
                <?php echo $quizScore; ?>
              </p>
              <p>
                <strong>Quiz Mania Rank:</strong>
                <?php echo $quizRank; ?>
              </p>
              <p>
                <strong>Snake Game High-Score:</strong>
                <?php echo $snakeScore; ?>
              </p>
              <p>
                <strong>Snake Game Rank:</strong>
                <?php echo $snakeRank; ?>
              </p>
              <button class="btn btn-secondary" onclick="toGames()">
                Improve Stats
              </button>
            </div>
            <form action="delacc.php">
              <button
                type="submit"
                class="btn btn-primary"
                id="delete-account-button"
                onclick="deleteAccount()"
              >
                Delete My Account
              </button>
            </form>
          </div>
          <form
            id="update-password-form"
            action="updatePass.php"
            method="POST"
            style="display: none"
          >
            <h3>Current Password:</h3>
            <div class="mb-3">
              <input
                type="password"
                class="form-control"
                id="current-password"
                name="current-password"
                required
              />
            </div>
            <h3>New Password:</h3>
            <div class="mb-3">
              <input
                type="password"
                class="form-control"
                id="new-password"
                name="new-password"
                required
              />
            </div>
            <button type="submit" name="submit" class="btn btn-primary">
              Update Password
            </button>
            <button onclick="refresh()" class="btn btn-primary">Go Back</button>
          </form>
        </div>
      </div>
    </div>

    <footer>
      <p>&copy; 2024 Gaming Lounge. All rights reserved.</p>
    </footer>

    <script>
      function changePass() {
        document.getElementById("details").style.display = "none";
        document.getElementById("update-password-form").style.display = "";
      }
      function refresh() {
        location.reload();
      }
      function toGames() {
        window.location.replace("/comproject/games.php");
      }
      function deleteAccount(){
        alert("Are You Sure?");
      }
    </script>
  </body>
</html>
