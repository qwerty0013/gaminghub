
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
    <title>Connect 4 - Gaming Lounge</title>
    
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />

    <style>
      body {
        background: linear-gradient(45deg, #30c7ec, #ffffff);
        background-repeat: no-repeat;
        background-size: cover;
        color: #333;
        margin: 0;
        padding: 0;
      }

      .container {
        max-width: 800px;
        margin: 50px auto;
      }

      .header {
        text-align: center;
        margin-bottom: 30px;
      }

      .logo {
        max-width: 80px;
        height: auto;
      }

      .avatars {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
        width: 180px;
      }

      .avatar {
        max-width: 100%;
        height: auto;
        border-radius: 50%;
        margin-bottom: 20px;
      }

      .username {
        text-align: center;
        margin-top: 10px;
        font-size: 18px;
        color: #555;
      }

      #main-container {
        text-align: center;
        align-items: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 100vh;
      }

      #player {
        background-color: #d5deff;
        border: 8px solid #4f3ff0;
        border-radius: 10px;
        margin-top: 50px;
        padding: 20px;
        max-width: 500px;
      }

      #player-type {
        color: #4f3ff0;
        font-family: "Poppins";
        letter-spacing: 5px;
        text-align: center;
        text-transform: uppercase;
      }

      #grid {
        background-color: #4f3ff0;
        border: 3.5px solid #d5deff;
        border-radius: 8px;
        box-shadow: 2px 3px 7px grey;
        margin-top: 50px;
        max-width: 600px;
        padding: 3px;
      }

      .row {
        display: flex;
      }

      .col {
        align-items: center;
        background-color: #d5deff;
        border: 1px solid #4f3ff0;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        height: 75px;
        margin: 5px;
        width: 75px;
      }

      .btn {
        background-color: transparent;
        border: none;
        color: transparent;
        height: 100%;
        padding: 0;
        width: 100%;
      }

      #reset-btn {
        background-color: transparent;
        border: 2px solid #4f3ff0;
        border-radius: 5px;
        color: #4f3ff0;
        font-family: "Poppins";
        font-size: 1.5rem;
        margin: 50px 0;
        padding: 10px 40px;
        text-transform: uppercase;
        transition: 0.7s;
        display: inline;
      }

      #reset-btn:hover {
        background-color: #4f3ff0;
        color: #d5deff;
        cursor: pointer;
        transition: 0.7s;
      }

      .btn-player-1 {
        background-color: #34c471;
        border: 2px solid #34c471;
        border-radius: 50%;
        color: red;
        height: 50px;
        width: 50px;
      }

      /* Player - 2 Buttons */

      .btn-player-2 {
        background-color: #df3670;
        border: 2px solid #df3670;
        border-radius: 50%;
        color: red;
        height: 50px;
        width: 50px;
      }

      /* Media Queries */

      @media (max-width: 800px) {
        #grid {
          width: 500px;
        }

        .col {
          height: 62px;
          margin: 4px;
          width: 62px;
        }

        #player {
          width: 450px;
        }

        #reset-btn {
          font-size: 1.2rem;
        }

        .btn-player-1 {
          height: 40px;
          width: 40px;
        }

        .btn-player-2 {
          height: 40px;
          width: 40px;
        }
      }

      @media (max-width: 550px) {
        #grid {
          width: 400px;
        }

        .col {
          height: 50px;
          margin: 3px;
          width: 50px;
        }

        #player {
          width: 350px;
        }

        #reset-btn {
          font-size: 1rem;
        }

        .btn-player-1 {
          height: 30px;
          width: 30px;
        }

        .btn-player-2 {
          height: 30px;
          width: 30px;
        }
      }

      @media (max-width: 450px) {
        #grid {
          width: 90%;
        }

        .col {
          height: 40px;
          margin: 2px;
        }

        #player {
          align-items: center;
          display: flex;
          border-width: 5px;
          justify-content: center;
          height: 30px;
          width: 78%;
        }

        #player-type {
          font-size: 1.2rem;
        }

        #reset-btn {
          font-size: 0.8rem;
        }

        .btn-player-1 {
          height: 20px;
          width: 20px;
        }

        .btn-player-2 {
          height: 20px;
          width: 20px;
        }
      }
      #scoreboard {
        background-color: #007bff;
        color: #fff;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        text-align: center;
      }

      #scoreboard p {
        margin: 0;
        font-size: 18px;
        margin-bottom: 10px;
      }

      #scoreboard span {
        font-weight: bold;
        font-size: 24px;
        display: inline-block;
        margin-top: 5px;
        margin-left: 10px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <img src="./img/c4.png" alt="Logo" class="logo" />
        <h1 class="mb-4" style="color: #007bff">Connect 4</h1>
      </div>
      <div id="landing-page">
        <div class="username">
          <span style="color: #555">Welcome, <?php echo $username; ?>!</span>
        </div>
        <form>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="playerName1">
                  <img
                    src="./img/avatar3.png"
                    alt="Avatar X"
                    class="avatars"
                    id="avatarX"
                  />Player 1 Name:</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="playerName1"
                  placeholder="Player 1 Name"
                  required
                />
              </div>
              <div class="col-md-6">
                <label for="playerName2"
                  ><img
                    src="./img/avatar4.png"
                    alt="Avatar O"
                    class="avatars"
                    id="avatarO"
                  />Player 2 Name:</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="playerName2"
                  placeholder="Player 2 Name"
                  required
                />
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="colordropdown">Choose Color:</label>
            <select class="form-control" id="colorDropdown">
              <option value="red">Red</option>
              <option value="green">Green</option>
            </select>
          </div>

          <button type="button" class="btn btn-primary" onclick="startGame()">
            Start Game
          </button>
          <button
            type="button"
            class="btn btn-secondary float-start"
            onclick="goBack()"
          >
            Back
          </button>
        </form>
      </div>
      <div id="main-container" style="display: none">
        <div id="player">
          <h1 id="player-type">Player - 1</h1>
        </div>

        <div id="grid">
          <div class="row">
            <div class="col">
              <button class="btn btn-1"></button>
            </div>

            <div class="col">
              <button class="btn btn-2"></button>
            </div>

            <div class="col">
              <button class="btn btn-3"></button>
            </div>

            <div class="col">
              <button class="btn btn-4"></button>
            </div>

            <div class="col">
              <button class="btn btn-5"></button>
            </div>

            <div class="col">
              <button class="btn btn-6"></button>
            </div>

            <div class="col">
              <button class="btn btn-7"></button>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <button class="btn btn-8"></button>
            </div>

            <div class="col">
              <button class="btn btn-9"></button>
            </div>

            <div class="col">
              <button class="btn btn-10"></button>
            </div>

            <div class="col">
              <button class="btn btn-11"></button>
            </div>

            <div class="col">
              <button class="btn btn-12"></button>
            </div>

            <div class="col">
              <button class="btn btn-13"></button>
            </div>

            <div class="col">
              <button class="btn btn-14"></button>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <button class="btn btn-15"></button>
            </div>

            <div class="col">
              <button class="btn btn-16"></button>
            </div>

            <div class="col">
              <button class="btn btn-17"></button>
            </div>

            <div class="col">
              <button class="btn btn-18"></button>
            </div>

            <div class="col">
              <button class="btn btn-19"></button>
            </div>

            <div class="col">
              <button class="btn btn-20"></button>
            </div>

            <div class="col">
              <button class="btn btn-21"></button>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <button class="btn btn-22"></button>
            </div>

            <div class="col">
              <button class="btn btn-23"></button>
            </div>

            <div class="col">
              <button class="btn btn-24"></button>
            </div>

            <div class="col">
              <button class="btn btn-25"></button>
            </div>

            <div class="col">
              <button class="btn btn-26"></button>
            </div>

            <div class="col">
              <button class="btn btn-27"></button>
            </div>

            <div class="col">
              <button class="btn btn-28"></button>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <button class="btn btn-29"></button>
            </div>

            <div class="col">
              <button class="btn btn-30"></button>
            </div>

            <div class="col">
              <button class="btn btn-31"></button>
            </div>

            <div class="col">
              <button class="btn btn-32"></button>
            </div>

            <div class="col">
              <button class="btn btn-33"></button>
            </div>

            <div class="col">
              <button class="btn btn-34"></button>
            </div>

            <div class="col">
              <button class="btn btn-35"></button>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <button class="btn btn-36"></button>
            </div>

            <div class="col">
              <button class="btn btn-37"></button>
            </div>

            <div class="col">
              <button class="btn btn-38"></button>
            </div>

            <div class="col">
              <button class="btn btn-39"></button>
            </div>

            <div class="col">
              <button class="btn btn-40"></button>
            </div>

            <div class="col">
              <button class="btn btn-41"></button>
            </div>

            <div class="col">
              <button class="btn btn-42"></button>
            </div>
          </div>
        </div>
        <div id="scoreboard">
          <p>
            <span id="username1"> </span> Wins:
            <span id="player1-wins">0</span> |
            <span id="username2"> </span> Wins:
            <span id="player2-wins">0</span>
          </p>
        </div>
        <span style="display: inline">
          <button type="button" id="reset-btn">Play Again</button>
          <button type="button" id="reset-btn" onclick="refresh()">
            Go Back
          </button>
        </span>
      </div>
    </div>

    <script>
      function startGame() {
        color = document.getElementById("colorDropdown");
        if (color.value == "green") {
          var user1 = document.getElementById("playerName1");
          var user2 = document.getElementById("playerName2");
          console.log(user1.value);
        } else {
          var user2 = document.getElementById("playerName1");
          var user1 = document.getElementById("playerName2");
        }
        if (user1.value != "" || user2.value != "") {
          document.getElementById("landing-page").style.display = "none";
          document.getElementById("main-container").style.display = "";
        } else {
          alert("Please enter both player name!");
        }
        document.getElementById("username1").textContent = user1.value;
        document.getElementById("username2").textContent = user2.value;
        document.getElementById("player-type").textContent = user1.value;
      }
      var user1Wins = 0;
      var user2Wins = 0;
      color = document.getElementById("colorDropdown");
      if (color.value == "Red") {
        var user1 = document.getElementById("playerName1");
        var user2 = document.getElementById("playerName2");
        console.log(user1.value);
      } else {
        var user2 = document.getElementById("playerName1");
        var user1 = document.getElementById("playerName2");
      }
      var buttons = document.getElementsByClassName("btn");
      var resetButton = document.getElementById("reset-btn");
      var playerTypeDisplay = document.getElementById("player-type");
      var currentPlayer = 1;
      var filledGrid = Array.from({ length: 6 }, () => Array(7).fill(-1));
      var filledCellsCount = 0;

      resetButton.addEventListener("click", function () {
        resetGame();
      });

      for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function () {
          var buttonNo = this.classList[1];
          handleMove(this, buttonNo.slice(4));
        });
      }

      function handleMove(button, buttonNo) {
        var row = calculateRow(buttonNo);
        var col = calculateColumn(buttonNo);

        if (currentPlayer === 1) {
          applyMoveStyles(button, "btn-player-1");
          filledGrid[row][col] = 1;
          filledCellsCount++;

          if (checkWinner(row, col, 1)) {
            setTimeout(function () {
              user1Wins++;
              document.getElementById("player1-wins").textContent = user1Wins;
              alert("Game Over: " + user1.value + " Wins!");
              resetGame();
            }, 200);
          }

          currentPlayer = 2;
          updatePlayerTypeDisplay(user2.value);
        } else {
          applyMoveStyles(button, "btn-player-2");
          filledGrid[row][col] = 2;
          filledCellsCount++;

          if (checkWinner(row, col, 2)) {
            setTimeout(function () {
              alert("Game Over: " + user2.value + " Wins!");
              user2Wins++;
              document.getElementById("player2-wins").textContent = user2Wins;
              resetGame();
            }, 200);
          }

          currentPlayer = 1;
          updatePlayerTypeDisplay(user1.value);
        }

        if (filledCellsCount === 42) {
          setTimeout(function () {
            alert("Game Draw");
            resetGame();
          }, 200);
          return;
        }

        setTimeout(function () {
          button.disabled = true;
        }, 10);
      }

      function applyMoveStyles(button, playerClass) {
        button.classList.add(playerClass);
      }

      function checkWinner(row, col, player) {
        var count = 0;

        for (var i = 0; i < 7; i++) {
          if (filledGrid[row][i] === player) {
            count++;
            if (count === 4) return true;
          } else {
            count = 0;
          }
        }

        count = 0;

        for (var i = 0; i < 6; i++) {
          if (filledGrid[i][col] === player) {
            count++;
            if (count === 4) return true;
          } else {
            count = 0;
          }
        }

        count = 0;

        if (row >= col) {
          var i = row - col;
          var j = 0;

          for (; i <= 5; i++, j++) {
            if (filledGrid[i][j] === player) {
              count++;
              if (count == 4) return true;
            } else {
              count = 0;
            }
          }
        } else {
          var i = 0;
          var j = col - row;

          for (; j <= 6; i++, j++) {
            if (filledGrid[i][j] === player) {
              count++;
              if (count == 4) return true;
            } else {
              count = 0;
            }
          }
        }

        count = 0;

        if (row + col <= 5) {
          var i = row + col;
          var j = 0;

          for (; i >= 0 && j <= row + col; i--, j++) {
            if (filledGrid[i][j] === player) {
              count++;
              if (count == 4) return true;
            } else {
              count = 0;
            }
          }
        } else {
          var i = 5;
          var j = row + col - 5;

          for (; j <= 6; j++, i--) {
            if (filledGrid[i][j] === player) {
              count++;
              if (count == 4) return true;
            } else {
              count = 0;
            }
          }
        }
        return false;
      }

      function resetGame() {
        for (var i = 0; i < buttons.length; i++) {
          buttons[i].disabled = false;
          buttons[i].classList.remove("btn-player-1");
          buttons[i].classList.remove("btn-player-2");
        }

        currentPlayer = 1;
        updatePlayerTypeDisplay(user1.value);
        filledCellsCount = 0;

        for (var i = 0; i < 6; i++) {
          for (var j = 0; j < 7; j++) {
            filledGrid[i][j] = -1;
          }
        }
      }

      function calculateRow(buttonNo) {
        return buttonNo % 7 === 0
          ? Math.floor(buttonNo / 7) - 1
          : Math.floor(buttonNo / 7);
      }

      function calculateColumn(buttonNo) {
        return buttonNo % 7 === 0 ? 6 : (buttonNo % 7) - 1;
      }

      function updatePlayerTypeDisplay(playerType) {
        playerTypeDisplay.textContent = playerType;
      }
      function refresh() {
        location.reload();
      }
      
      function goBack() {
        window.location.replace("/comproject/games.php");
      }
    </script>
  </body>
</html>
