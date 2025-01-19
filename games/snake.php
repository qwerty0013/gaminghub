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
    <title>Snake Game - Gaming Lounge</title>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    />

    <style id="customStyles">
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap");

      * {
        margin: 0;
        padding: 0;
      }

      body {
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        height: 100vh;
      }

      .container {
        display: flex;
        justify-content: center;
        width: 500px;
        height: 670px;
        border-radius: 10px;
        border: 2px solid rgb(20, 20, 220);
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      }

      .landing-page,
      .game-container,
      .leaderboard-container {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .landing-page img {
        width: 100px;
        margin-top: 100px;
      }

      .landing-page h1 {
        text-align: center;
        font-size: 45px;
        font-weight: bold;
        margin: 20px 20px;
      }

      .landing-page button {
        font-size: 25px;
        padding: 5px;
        height: 50px;
        width: 300px;
        border: none;
        border-radius: 10px;
        background-image: radial-gradient(
          circle 248px at center,
          #16d9e3 0%,
          #30c7ec 47%,
          #46aef7 100%
        );
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        margin: 20px;
        cursor: pointer;
      }

      .landing-page button:hover {
        font-size: 27px;
        background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="landing-page">
        <img src="./img/snake.png" alt="" />
        <h1>Snake Game</h1>
        <div class="username">
          <span style="color: #555">Welcome, <?php echo $username; ?>!</span>
        </div>
        <button onclick="startGame()">Start Game</button>
        <button onclick="returnback()">
          Return Back
        </button>
      </div>
    </div>

    <section class="content" style="display: none">
      <h1 class="title"><img src="./img/snake.png" /> Snake Game</h1>
      <h2 class="mb-4">
        Timer: <span id="timer" class="badge badge-secondary">00:00</span>
      </h2>

      <canvas id="canvas" width="640" height="480"></canvas>
      <br />
      <form id="gameForm" class="form-inline" action="snakedb.php" method="POST">
        <label for="score" class="mr-2" style="font-size: 35px"
          >Final Score:</label
        >
        <input
          type="number"
          readonly
          name="final-score"
          id="score"
          class="form-control mb-2 mr-sm-2"
        />

        <div class="input-group mb-2 mr-sm-2">
          <button type="submit" name="submit"  class="btn btn-primary">
            Submit
          </button>
          <button
            type="button"
            onclick="reloadPage()"
            class="btn btn-secondary"
          >
            Back
          </button>
        </div>
      </form>
    </section>

    <script>
      function startGame() {
        startTimer();
        document.querySelector(".landing-page").style.display = "none";
        document.querySelector(".content").style.display = "";

       
        var styleElement = document.getElementById("customStyles");

        if (styleElement) {
          styleElement.innerHTML = `
            * {
                margin: 0;
                padding: 0;
                outline: none;
                box-sizing: border-box;
            }


            html, body {
                width: 100%;
                height: 100%;
                position: relative;
            }

            body {
                background: radial-gradient(
                          circle 248px at center,
                          #16d9e3 0%,
                          #30c7ec 47%,
                          #46aef7 100%
                        );
                background-size: cover;
                font-size: 62.5%;
            }

            section img {
                max-width: 70px;
            }

            .content {
                display: flex;
                flex-flow: column;
                align-items: center;
                position: relative;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -36%);
                padding: 0em;
            }
            .content .title {
                font: 5em Lobster, cursive;
                text-shadow: 0 2px 0 rgba(0, 0, 0, 0.5);
                color: #fafafa;
                margin: -0.5em 0 0.5em 0;
            }
            .content canvas {
                background: #fafafa;
                box-shadow: 0 2px 16px rgba(0, 0, 0, 0.25);
            }
        `;
        } else {
          console.error("Style element with id 'customStyles' not found.");
        }
        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");
        var dir, score, snake, food;
        var speed = 222;
        var speedSnake = 20;

        document.addEventListener("keydown", function (e) {
          var keyCode = e.keyCode;
          if (keyCode == 37 && dir != "right") {
            dir = "left";
          }
          if (keyCode == 38 && dir != "down") {
            dir = "up";
          }
          if (keyCode == 39 && dir != "left") {
            dir = "right";
          }
          if (keyCode == 40 && dir != "up") {
            dir = "down";
          }
        });

        setInterval(draw, speed);

        function init() {
          dir = "right";
          score = 0;
          snake = [
            { x: 40, y: 40 },
            { x: 60, y: 40 },
            { x: 80, y: 40 },
          ];
          createFood();
        }

        function add() {
          var lastsnake = snake[snake.length - 1];

          if (dir == "right") {
            snake.push({ x: lastsnake.x + speedSnake, y: lastsnake.y });
          }
          if (dir == "down") {
            snake.push({ x: lastsnake.x, y: lastsnake.y + speedSnake });
          }
          if (dir == "left") {
            snake.push({ x: lastsnake.x - speedSnake, y: lastsnake.y });
          }
          if (dir == "up") {
            snake.push({ x: lastsnake.x, y: lastsnake.y - speedSnake });
          }
        }

        function createFood() {
          food = {
            x: Math.floor(Math.random() * 25),
            y: Math.floor(Math.random() * 25),
          };
          for (var i = 0; i < snake.length; i++) {
            var snake2 = snake[i];
            if (food.x == snake2.x && food.y == snake2.y) {
              createFood();
            }
          }
        }

        function draw() {
          ctx.clearRect(0, 0, 888, 555);
          snake.shift();
          add();

          var lastsnake = snake[snake.length - 1];

          if (lastsnake.x == food.x * 20 && lastsnake.y == food.y * 20) {
            score += 5;
            add();
            createFood();
          }

          for (i = 0; i < snake.length; i++) {
            snake2 = snake[i];
            if (i == snake.length - 1) {
              ctx.fillStyle = "#83a41a";
            } else {
              ctx.fillStyle = "#b4ce3a";
            }
            if (snake2.x > 640) {
              snake2.x = 0;
            }
            if (snake2.x < 0) {
              snake2.x = 640;
            }
            if (snake2.y > 480) {
              snake2.y = 0;
            }
            if (snake2.y < 0) {
              snake2.y = 480;
            }

            if (
              snake2.x == lastsnake.x &&
              snake2.y == lastsnake.y &&
              i < snake.length - 2
            ) {
              alert("Game Over! Your Score is: " + score);
              document.getElementById("score").value = score;
              resetTimer();
              init();
              startTimer();
            }

            ctx.fillRect(snake2.x, snake2.y, 19, 19);
          }
          ctx.fillRect(food.x * 17, food.y * 20, 19, 19);
          ctx.fillText("Score: " + score, 10, 20);
        }

        requestAnimationFrame(init);
      }

      function back() {
        location.reload();
      }
      function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = seconds % 60;
        return `${String(minutes).padStart(2, "0")}:${String(
          remainingSeconds
        ).padStart(2, "0")}`;
      }

      let seconds = 0;
      let timerInterval;

      function startTimer() {
        timerInterval = setInterval(function () {
          seconds++;
          document.getElementById("timer").textContent = formatTime(seconds);
        }, 1000); 
      }

      function stopTimer() {
        clearInterval(timerInterval);
      }
      function resetTimer() {
        stopTimer();
        seconds = 0;
        document.getElementById("timer").textContent = formatTime(seconds);
      }
      function reloadPage() {
        location.reload();
      }
      function returnback() {
        window.location.replace("/comproject/games.php");
      }
    </script>
  </body>
</html>
