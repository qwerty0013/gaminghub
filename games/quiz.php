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
    <title>Quiz Mania - Gaming Lounge</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    />
    <style>
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

      .header {
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        height: 60px;
        width: 497px;
        border-radius: 10px 10px 0 0;
        background-image: radial-gradient(
          circle 248px at center,
          #16d9e3 0%,
          #30c7ec 47%,
          #46aef7 100%
        );
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
      }

      .header h3 {
        font-size: 25px;
        font-weight: bold;
        margin: 0 !important;
      }

      .header img {
        width: 50px;
      }

      .time-score {
        display: flex;
        justify-content: space-between;
        padding: 20px;
        width: 460px;
        text-shadow: 3px 3px 2px rgba(72, 206, 255, 1);
      }

      .game-container > h1 {
        font-size: 60px;
        text-shadow: 3px 3px 2px rgba(72, 206, 255, 1);
        margin: 10px;
      }

      .game-container > button {
        width: 300px;
        height: 50px;
        font-size: 20px;
        padding: 5px;
        border-radius: 5px;
        border: none;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        background-image: linear-gradient(120deg, #89f7fe 0%, #66a6ff 100%);
      }

      .game-container > button:hover {
        font-size: 22px;
        background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
      }

      .game-container > input {
        font-size: 30px;
        width: 70px;
        padding: 5px;
        text-align: center;
        background-color: transparent;
        outline: none;
        border: none;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border-radius: 5px;
      }

      form {
        max-width: 600px;
        margin: 0 auto;
      }

      .question {
        margin-bottom: 15px;
      }

      .options {
        margin-left: 20px;
      }

      input[type="radio"] {
        margin-right: 5px;
      }

      input[type="submit"] {
        margin-top: 15px;
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        cursor: pointer;
      }

      .footer button {
        font-size: 20px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border: none;
        width: 120px;
        padding: 5px;
        border-radius: 5px;
        background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
        cursor: pointer;
        margin: 20px;
      }

      .footer button:hover {
        background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
      }

      #submit {
        background-image: linear-gradient(to top, #00c6fb 0%, #00c6fb 100%);
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="landing-page">
        <img src="./img/quiz.png" alt="" />
        <h1>Quiz Mania</h1>
        <div class="username">
          <span style="color: #555">Welcome, <?php echo $username; ?>!</span>
        </div>
        <button onclick="startGame()">Start Game</button>
        <button onclick="returnback()">
          Return Back
        </button>
      </div>

      <div class="game-container" style="display: none">
        <div class="header">
          <img src="./img/quiz.png" alt="" class="img-fluid" />
          <h3>Quiz Mania in Gaming Lounge</h3>
        </div>

        <div class="time-score">
          <h3 id="timer">Time: 00:30s</h3>
          <h3>High Score:</h3>
        </div>

        <div class="quiz-container">
          <form id="quiz-form">
            <div class="question">
              <div id="question-holder" class="d-inline-block">
                <img
                  src="./img/question.png"
                  style="width: 50px"
                  class="img-fluid"
                />
                <b> Question?? </b>
              </div>

              <div class="options mt-3">
                <label class="d-block">
                  <input
                    id="input1"
                    type="radio"
                    value="a"
                    name="options"
                    checked
                  />
                  <span id="option1">A. Option 1</span>
                </label>
                <label class="d-block">
                  <input id="input2" type="radio" value="b" name="options" />
                  <span id="option2">B. Option 2</span>
                </label>
                <label class="d-block">
                  <input id="input3" type="radio" value="c" name="options" />
                  <span id="option3">C. Option 3</span>
                </label>
                <label class="d-block">
                  <input id="input4" type="radio" value="d" name="options" />
                  <span id="option4">D. Option 4</span>
                </label>
              </div>
            </div>

            <button id="startquiz" type="button" class="btn btn-primary mt-3">
              Start Quiz
            </button>
          </form>
        </div>

        <div class="table-responsive mt-4">
          <table class="table">
            <tr>
              <td style="padding-right: 50px">Correct Answers</td>
              <td>Incorrect Answers</td>
            </tr>
            <tr>
              <td id="correctans" style="padding-right: 50px">-</td>
              <td id="wrongans">-</td>
            </tr>
          </table>
        </div>

        <h3 id="cscore" class="mt-4">Score: <span id="score">00</span></h3>

        <form action="quizdb.php" method="POST" style="display: none" id="form">
          <label class="mt-3">Final Score: </label>

          <div class="input-group mb-3">
            <input
              type="number"
              name="final-score"
              id="final-score"
              class="form-control"
              readonly
            />
            <button type="submit" name="submit" class="btn btn-success">
              Submit
            </button>
          </div>
        </form>

        <div class="footer mt-4">
          <button onclick="back()" class="btn btn-secondary">Back</button>
          <button id="restart" onclick="back()" class="btn btn-warning">
            Restart
          </button>
        </div>
      </div>
    </div>

    <script>
      function startGame() {
        document.querySelector(".landing-page").style.display = "none";
        document.querySelector(".game-container").style.display = "";

        // DOM Elements
        const form = document.getElementById("quiz-form");
        const quizbegin = document.getElementById("startquiz");
        const quest = document.getElementById("question-holder");
        const opt1 = document.getElementById("option1");
        const opt2 = document.getElementById("option2");
        const opt3 = document.getElementById("option3");
        const opt4 = document.getElementById("option4");
        const scoreEl = document.getElementById("score");
        const correct = document.getElementById("correctans");
        const incorrect = document.getElementById("wrongans");
        const finalscore = document.getElementById("final-score");
        const restartEl = document.getElementById("restart");

        var ctr = 0;
        var right = 0;
        var wrong = 0;
        var seconds = 30;
        var score = 0;
        var timerElement = document.getElementById("timer");
        var inputs = form.querySelectorAll("input[type='radio']:checked");
        const questions = {
          first: "What country has the highest life expectancy?",
          second: "What game studio makes the Red Dead Redemption series?",
          third:
            "What is the highest-rated film on IMDb as of January 1st, 2024? ",
          fourth: "In what country would you find Mount Kilimanjaro?",
          fifth: "What is the world's fastest bird?",
          sixth: "From what grain is the Japanese spirit Sake made?",
          seventh:
            "In which part of your body would you find the cruciate ligament?",
          eighth: "What is the complete form of RADAR?",
          ninth:
            "The whistle of a fast-moving rail engine is heard ascending-descending when it crosses the station; it is called:",
          tenth: "What is the dimensional formula of the Planck’s constant?",
          eleventh:
            " If the length of a pendulum is doubled and the diameter of its ball is reduced to half, what will it’s time period be?",
          twelveth:
            "Which of the following properties doesn’t change when electromagnetic waves pass from one medium to another?",
          thirteenth: "What is the SI unit of magnetic flux?",
          fourteenth:
            "Thin wires can be drawn from a piece of metal. Which property of the metal is it responsible for?",
          fifteenth: "Who discovered radioactivity?  ",
          sixteenth:
            "In ‘One Piece’, Monkey D. Luffy originally sets out with the Straw Hat Pirates to become the pirate king on which ship?",
          seventeenth:
            "In Greek mythology, what was left in Pan­dora’s box after the evils, ills, diseases, and burdensome labor had escaped?",
          eighteenth:
            "Which one is the first avatar of Lord Vishnu from his Dashavatar?",
          nineteenth:
            "On which day of Kurukshetra War, Bhishma was put on deathbed of arrows by Arjun",
          tweentyth:
            "In computer field, what is the difference between a virus and a worm? ",
        };
        const answers = {
          first: "B. Hong Kong", // A) Japan    B) Hong Kong    C) Finland    D) Denmark
          second: "A. Rockstar Games", // A) Rockstar Games    B) Activision    C) Devoted Studios    D)  Red Soft Systems
          third: "B. The Shawshank Redemption", // A) The Godfather    B) The Shawshank Redemption    C) The Dark Knight    D) Fight Club
          fourth: "C. Tanzania", // A) Lebanon    B) Lesotho    C) Tanzania    D) Japan
          fifth: "D. The Peregrine Falcon", // A) Pyrrhuloxia    B) Dickcissel    C) Blue Footed Booby    D)  The Peregrine Falcon
          sixth: "C. Rice", // A) Maize    B) Wheat    C) Rice    D) Barley
          seventh: "B. Knee", // A) Ankle    B) Knee    C) Wrist    D) Neck
          eighth: "A. Radio Detecting and Ranging", // A) Radio Detecting and Ranging     B) Radio Device and Ranging    C) Radio Detects and Range D) Region Device and Ranging
          ninth: "B. Doppler Effect", // A) Peltier Effect    B) Doppler Effect    C) Ultrasonic Voice    D) Subsonic Effect
          tenth: "D. [ML2T-1]", // A) [ML2T-2]    B) [MLT]    C) [M2L2T3]    D) [ML2T-1]
          eleventh: "A. √2", // A) √2    B) Half    C) Remains Same    D) Double
          twelveth: "A. Frequency", // A) Frequency    B) Speed    C) Wavelength    D) All of These
          thirteenth: "B. Weber", // A) Tesla    B) Weber    C) Armstrong    D) Maxwell
          fourteenth: "A. Ductility", // (A) ductility     (B) hardness    (C) malleability    (D) conductivity
          fifteenth: "D.  Henri Becquerel", // A.  Marie Curie   B.  Roentgen   C.  John Dalton   D.  Henri Becquerel
          sixteenth: "A. Going Merry", // a) Going Merry    b) Jolly Roger    c) Thousand Sunny    d) Ever Darker
          seventeenth: "C. Hope", // (a) Charity    (b) Faith    (c) Hope    (d) Tolerance
          eighteenth: "A. Matsya", // (a) Matsya   (b) Kurma   (c) Varah   (d) Narasimbha
          nineteenth: "C. 10th Day", // (a) 5th Day    (b) 8th Day    (c) 10th Day    (d) 16th Day
          tweentyth:
            "C. A virus is a self-replicating program, while a worm is not.", // A. A virus needs a host program to run, while a worm can run independently.     B. A virus can only spread through removable media, while a worm can spread over a network.C. A virus is a self-replicating program, while a worm is not.   D. All of the above
        };
        const first = {
          opt1: "A. Japan",
          opt2: "B. Hong Kong",
          opt3: "C. Finland",
          opt4: "D. Denmark",
        };
        const second = {
          opt1: "A. Rockstar Games",
          opt2: "B. Activision ",
          opt3: "C. Devoted Studios",
          opt4: "D. Red Soft Systems",
        };
        const third = {
          opt1: "A. The Godfather ",
          opt2: "B. The Shawshank Redemption",
          opt3: "C. The Dark Knight ",
          opt4: "D. Fight Club",
        };
        const fourth = {
          opt1: "A. Lebanon",
          opt2: "B. Lesotho",
          opt3: "C. Tanzania",
          opt4: "D. Japan",
        };
        const fifth = {
          opt1: "A. Pyrrhuloxia  ",
          opt2: "B. Dickcissel ",
          opt3: "C. Blue Footed Booby ",
          opt4: "D. The Peregrine Falcon",
        };
        const sixth = {
          opt1: "A. Maize",
          opt2: "B. Wheat",
          opt3: "C. Rice",
          opt4: "D. Barley",
        };
        const seventh = {
          opt1: "A. Ankle",
          opt2: "B. Knee",
          opt3: "C. Wrist",
          opt4: "D. Neck",
        };
        const eighth = {
          opt1: "A. Radio Detecting and Ranging",
          opt2: "B. Radio Device and Ranging",
          opt3: "C. Radio Detects and Range",
          opt4: "D. Region Device and Ranging",
        };
        const ninth = {
          opt1: "A. Peltier Effect",
          opt2: "B. Doppler Effect",
          opt3: "C. Ultrasonic Voice",
          opt4: "D. Subsonic Effect",
        };
        const tenth = {
          opt1: "A. [ML2T-2]",
          opt2: "B. [MLT]",
          opt3: "C. [M2L2T3]",
          opt4: "D. [ML2T-1]",
        };
        const eleventh = {
          opt1: "A. √2",
          opt2: "B. Half",
          opt3: "C. Remains Same",
          opt4: "D. Double",
        };
        const twelveth = {
          opt1: "A. Frequency",
          opt2: "B. Speed",
          opt3: "C. Wavelength",
          opt4: "D. All of These",
        };
        const thirteenth = {
          opt1: "A. Tesla",
          opt2: "B. Weber",
          opt3: "C. Armstrong",
          opt4: "D. Maxwell",
        };
        const fourteenth = {
          opt1: "A. Ductility",
          opt2: "B. Hardness",
          opt3: "C. Malleability",
          opt4: "D. Conductivity",
        };
        const fifteenth = {
          opt1: "A.  Marie Curie",
          opt2: "B.  Roentgen",
          opt3: "C.  John Dalton",
          opt4: "D.  Henri Becquerel",
        };
        const sixteenth = {
          opt1: "A. Going Merry",
          opt2: "B. Jolly Roger",
          opt3: "C. Thousand Sunny",
          opt4: "D. Ever Darker",
        };
        const seventeenth = {
          opt1: "A. Charity",
          opt2: "B. Faith",
          opt3: "C. Hope",
          opt4: "D. Tolerance",
        };
        const eighteenth = {
          opt1: "A. Matsya",
          opt2: "B. Kurma",
          opt3: "C. Varah",
          opt4: "D. Narasimbha",
        };
        const nineteenth = {
          opt1: "A. 5th Day",
          opt2: "B. 8th Day",
          opt3: "C. 10th Day",
          opt4: "D. 16th Day",
        };
        const tweentyth = {
          opt1: "A. A virus needs a host program to run, while a worm can run independently.",
          opt2: "B. A virus can only spread through removable media, while a worm can spread over a network.",
          opt3: "C. A virus is a self-replicating program, while a worm is not.",
          opt4: "D. All of the above",
        };

        var list = [
          "first",
          "second",
          "third",
          "fourth",
          "fifth",
          "sixth",
          "seventh",
          "eighth",
          "ninth",
          "tenth",
          "eleventh",
          "twelveth",
          "thirteenth",
          "fourteenth",
          "fifteenth",
          "sixteenth",
          "seventeenth",
          "eighteenth",
          "nineteenth",
          "tweentyth",
        ];
        questchange();
        function questchange() {
          correct.textContent = right;
          incorrect.textContent = wrong;
          quizbegin.onclick = function nextques() {
            function updateTimer() {
              timerElement.textContent = "Time: " + seconds;
              seconds--;

              if (seconds < 0) {
                var formElement = form.elements;
                for (let i = 0; i < formElement.length; i++) {
                  formElement[i].disabled = true;
                }
                finalscore.value = score;
                document.getElementById("form").style.display = "";
                document.getElementById("cscore").style.display = "none";
                clearInterval(timerInterval);
                timerElement.textContent = "Time's up!";
              }
            }
            if (ctr == 0) {
              var timerInterval = setInterval(updateTimer, 1000);
            }
            quizbegin.textContent = "Confirm?";
            for (var i = list.length - 1; i > 0; i--) {
              var j = Math.floor(Math.random() * (i + 1));
              var temp = list[i];
              list[i] = list[j];
              list[j] = temp;
            }
            var questno = list.pop();
            let newquest = quest.querySelector("b");
            newquest.textContent = questions[questno];
            opt1.textContent = eval(questno).opt1;
            opt2.textContent = eval(questno).opt2;
            opt3.textContent = eval(questno).opt3;
            opt4.textContent = eval(questno).opt4;
            document.getElementById("input1").value = eval(questno).opt1;
            document.getElementById("input2").value = eval(questno).opt2;
            document.getElementById("input3").value = eval(questno).opt3;
            document.getElementById("input4").value = eval(questno).opt4;
            quizbegin.onclick = function nextques() {
              quizbegin.textContent = "Next Question!";
              var input = form.querySelectorAll("input[type='radio']:checked");
              console.log(input[0].value);
              if (input[0].value == answers[questno]) {
                score = score + 5;
                right = right + 1;
                scoreEl.textContent = score;
              } else {
                wrong = wrong + 1;
                score = score - 2;
                scoreEl.textContent = score;
              }
              ctr = ctr + 1;
              questchange();
            };
          };
        }
      }

      function back() {
        location.reload();
      }
      function returnback() {
        window.location.replace("/comproject/games.php");
      }
    </script>
  </body>
</html>
