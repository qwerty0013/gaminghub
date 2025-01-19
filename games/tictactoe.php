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
    <title>Tic Tac Toe - Gaming Lounge</title>
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

      .form-group {
        margin-bottom: 20px;
        text-align: center;
      }

      label {
        font-weight: bold;
        color: #555;
      }

      .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
      }

      .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
      }

      .ui {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .row {
        display: flex;
      }

      .cell {
        border: none;
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        text-align: center;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .cell:active {
        outline: none;
      }

      .cell:hover {
        transform: scale(1.1);
        box-shadow: 0 0 10px rgba(30, 144, 255, 0.8);
      }

      #b1 {
        border-bottom: 1px solid gray;
        border-right: 1px solid gray;
      }

      #b2 {
        border-bottom: 1px solid gray;
        border-right: 1px solid gray;
        border-left: 1px solid gray;
      }

      #b3 {
        border-bottom: 1px solid gray;
        border-left: 1px solid gray;
      }

      #b4 {
        border-top: 1px solid gray;
        border-bottom: 1px solid gray;
        border-right: 1px solid gray;
      }

      #b5 {
        border: 1px solid gray;
      }

      #b6 {
        border-top: 1px solid gray;
        border-bottom: 1px solid gray;
        border-left: 1px solid gray;
      }

      #b7 {
        border-top: 1px solid gray;
        border-right: 1px solid gray;
      }

      #b8 {
        border-top: 1px solid gray;
        border-right: 1px solid gray;
        border-left: 1px solid gray;
      }

      #b9 {
        border-top: 1px solid gray;
        border-left: 1px solid gray;
      }

      #but {
        box-sizing: border-box;
        width: 95px;
        height: 40px;
        border: 1px solid dodgerblue;
        margin-left: auto;
        border-radius: 8px;
        background-color: whitesmoke;
        color: dodgerblue;
        font-size: 20px;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      #but:hover {
        transform: scale(1.1);
        box-shadow: 0 0 10px rgba(30, 144, 255, 0.8);
      }

      #print {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: dodgerblue;
        font-size: 20px;
      }

      #main {
        text-align: center;
      }

      #ins {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: dodgerblue;
        transition: transform 0.3s ease;
      }

      #ins:hover {
        transform: scale(1.1);
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <img src="./img/ttt.png" alt="Logo" class="logo" />
        <h1 class="mb-4" style="color: #007bff">Tic Tac Toe</h1>
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
                    src="./img/avatar1.png"
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
                    src="./img/avatar2.png"
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
            <label for="symbolDropdown">Choose Symbol:</label>
            <select class="form-control" id="symbolDropdown">
              <option value="X">X</option>
              <option value="O">O</option>
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
      <div id="main" style="display: none">
        <form id="reset">
          <span id="ins">
            <p>
              Game starts by just Tap on box<br /><br />First Player starts as
              <b>Player X </b>And Second Player as
              <b>Player 0</b>
            </p>
          </span>
          <br /><br />
          <div class="ui">
            <div class="row">
              <input
                type="text"
                id="b1"
                class="cell"
                onclick="myfunc_3(); myfunc();"
                readonly
              />
              <input
                type="text"
                id="b2"
                class="cell"
                onclick="myfunc_4(); myfunc();"
                readonly
              />
              <input
                type="text"
                id="b3"
                class="cell"
                onclick="myfunc_5(); myfunc();"
                readonly
              />
            </div>
            <div class="row">
              <input
                type="text"
                id="b4"
                class="cell"
                onclick="myfunc_6(); myfunc();"
                readonly
              />
              <input
                type="text"
                id="b5"
                class="cell"
                onclick="myfunc_7(); myfunc();"
                readonly
              />
              <input
                type="text"
                id="b6"
                class="cell"
                onclick="myfunc_8(); myfunc();"
                readonly
              />
            </div>
            <div class="row">
              <input
                type="text"
                id="b7"
                class="cell"
                onclick="myfunc_9(); myfunc();"
                readonly
              />
              <input
                type="text"
                id="b8"
                class="cell"
                onclick="myfunc_10();myfunc();"
                readonly
              />
              <input
                type="text"
                id="b9"
                class="cell"
                onclick="myfunc_11();myfunc();"
                readonly
              />
            </div>
          </div>
          <br /><br /><br />

          <button id="but" onclick="myfunc_2()">RESET</button>
          <br /><br />
          <p id="print"></p>
        </form>
      </div>
    </div>
    <script>
      var ins = document.getElementById("ins");
      var instruct = ins.querySelector("p");
      var symbs = document.getElementById("symbolDropdown");
      var wins1 = 0;
      var wins2 = 0;

      function startGame() {
        if (symbs.value == "X") {
          var user1 = document.getElementById("playerName1");
          var user2 = document.getElementById("playerName2");
          instruct.innerHTML =
            "Game starts by just tapping on a box<br /><br />" +
            user1.value +
            " starts as <b>Player X</b> and " +
            user2.value +
            " starts as <b>Player O</b>";
        } else {
          var user2 = document.getElementById("playerName1");
          var user1 = document.getElementById("playerName2");
          instruct.innerHTML =
            "Game starts by just tapping on a box<br /><br />" +
            user1.value +
            " starts as <b>Player X</b> and " +
            user2.value +
            " starts as <b>Player O</b>";
        }
        if (user1.value != "" || user2.value != "") {
          document.getElementById("landing-page").style.display = "none";
          document.getElementById("main").style.display = "";
        } else {
          alert("Please enter both player name!");
        }
      }
      function myfunc() {
        if (symbs.value == "X") {
          var user1 = document.getElementById("playerName1");
          var user2 = document.getElementById("playerName2");
        } else {
          var user2 = document.getElementById("playerName1");
          var user1 = document.getElementById("playerName2");
        }
        var b1, b2, b3, b4, b5, b6, b7, b8, b9;
        b1 = document.getElementById("b1").value;
        b2 = document.getElementById("b2").value;
        b3 = document.getElementById("b3").value;
        b4 = document.getElementById("b4").value;
        b5 = document.getElementById("b5").value;
        b6 = document.getElementById("b6").value;
        b7 = document.getElementById("b7").value;
        b8 = document.getElementById("b8").value;
        b9 = document.getElementById("b9").value;

        var b1btn, b2btn, b3btn, b4btn, b5btn, b6btn, b7btn, b8btn, b9btn;

        b1btn = document.getElementById("b1");
        b2btn = document.getElementById("b2");
        b3btn = document.getElementById("b3");
        b4btn = document.getElementById("b4");
        b5btn = document.getElementById("b5");
        b6btn = document.getElementById("b6");
        b7btn = document.getElementById("b7");
        b8btn = document.getElementById("b8");
        b9btn = document.getElementById("b9");

        if (
          (b1 == "x" || b1 == "X") &&
          (b2 == "x" || b2 == "X") &&
          (b3 == "x" || b3 == "X")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user1.value + " won";
          b4btn.disabled = true;
          b5btn.disabled = true;
          b6btn.disabled = true;
          b7btn.disabled = true;
          b8btn.disabled = true;
          b9btn.disabled = true;

          b1btn.style.color = "red";
          b2btn.style.color = "red";
          b3btn.style.color = "red";
        } else if (
          (b1 == "x" || b1 == "X") &&
          (b4 == "x" || b4 == "X") &&
          (b7 == "x" || b7 == "X")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user1.value + " won";
          b2btn.disabled = true;
          b3btn.disabled = true;
          b5btn.disabled = true;
          b6btn.disabled = true;
          b8btn.disabled = true;
          b9btn.disabled = true;

          b1btn.style.color = "red";
          b4btn.style.color = "red";
          b7btn.style.color = "red";
        } else if (
          (b7 == "x" || b7 == "X") &&
          (b8 == "x" || b8 == "X") &&
          (b9 == "x" || b9 == "X")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user1.value + " won";

          b1btn.disabled = true;
          b2btn.disabled = true;
          b3btn.disabled = true;
          b4btn.disabled = true;
          b5btn.disabled = true;
          b6btn.disabled = true;

          b7btn.style.color = "red";
          b8btn.style.color = "red";
          b9btn.style.color = "red";
        } else if (
          (b3 == "x" || b3 == "X") &&
          (b6 == "x" || b6 == "X") &&
          (b9 == "x" || b9 == "X")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user1.value + " won";

          b1btn.disabled = true;
          b2btn.disabled = true;
          b4btn.disabled = true;
          b5btn.disabled = true;
          b7btn.disabled = true;
          b8btn.disabled = true;

          b3btn.style.color = "red";
          b6btn.style.color = "red";
          b9btn.style.color = "red";
        } else if (
          (b1 == "x" || b1 == "X") &&
          (b5 == "x" || b5 == "X") &&
          (b9 == "x" || b9 == "X")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user1.value + " won";
          b2btn.disabled = true;
          b3btn.disabled = true;
          b4btn.disabled = true;
          b6btn.disabled = true;
          b7btn.disabled = true;
          b8btn.disabled = true;

          b1btn.style.color = "red";
          b5btn.style.color = "red";
          b9btn.style.color = "red";
        } else if (
          (b3 == "x" || b3 == "X") &&
          (b5 == "x" || b5 == "X") &&
          (b7 == "x" || b7 == "X")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user1.value + " won";
          b1btn.disabled = true;
          b2btn.disabled = true;
          b4btn.disabled = true;
          b6btn.disabled = true;
          b8btn.disabled = true;
          b9btn.disabled = true;

          b3btn.style.color = "red";
          b5btn.style.color = "red";
          b7btn.style.color = "red";
        } else if (
          (b2 == "x" || b2 == "X") &&
          (b5 == "x" || b5 == "X") &&
          (b8 == "x" || b8 == "X")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user1.value + " won";
          b1btn.disabled = true;
          b2btn.disabled = true;
          b4btn.disabled = true;
          b6btn.disabled = true;
          b7btn.disabled = true;
          b9btn.disabled = true;

          b2btn.style.color = "red";
          b5btn.style.color = "red";
          b8btn.style.color = "red";
        } else if (
          (b4 == "x" || b4 == "X") &&
          (b5 == "x" || b5 == "X") &&
          (b6 == "x" || b6 == "X")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user1.value + " won";
          b1btn.disabled = true;
          b2btn.disabled = true;
          b3btn.disabled = true;
          b7btn.disabled = true;
          b8btn.disabled = true;
          b9btn.disabled = true;

          b4btn.style.color = "red";
          b5btn.style.color = "red";
          b6btn.style.color = "red";
        } else if (
          (b1 == "0" || b1 == "0") &&
          (b2 == "0" || b2 == "0") &&
          (b3 == "0" || b3 == "0")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user2.value + " won";
          b4btn.disabled = true;
          b5btn.disabled = true;
          b6btn.disabled = true;
          b7btn.disabled = true;
          b8btn.disabled = true;
          b9btn.disabled = true;

          b1btn.style.color = "red";
          b2btn.style.color = "red";
          b3btn.style.color = "red";
        } else if (
          (b1 == "0" || b1 == "0") &&
          (b4 == "0" || b4 == "0") &&
          (b7 == "0" || b7 == "0")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user2.value + " won";
          b2btn.disabled = true;
          b3btn.disabled = true;
          b5btn.disabled = true;
          b6btn.disabled = true;
          b8btn.disabled = true;
          b9btn.disabled = true;

          b1btn.style.color = "red";
          b4btn.style.color = "red";
          b7btn.style.color = "red";
        } else if (
          (b7 == "0" || b7 == "0") &&
          (b8 == "0" || b8 == "0") &&
          (b9 == "0" || b9 == "0")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user2.value + " won";
          b1btn.disabled = true;
          b2btn.disabled = true;
          b3btn.disabled = true;
          b4btn.disabled = true;
          b5btn.disabled = true;
          b6btn.disabled = true;

          b7btn.style.color = "red";
          b8btn.style.color = "red";
          b9btn.style.color = "red";
        } else if (
          (b3 == "0" || b3 == "0") &&
          (b6 == "0" || b6 == "0") &&
          (b9 == "0" || b9 == "0")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user2.value + " won";
          b1btn.disabled = true;
          b2btn.disabled = true;
          b4btn.disabled = true;
          b5btn.disabled = true;
          b7btn.disabled = true;
          b8btn.disabled = true;
          b3btn.style.color = "red";
          b6btn.style.color = "red";
          b9btn.style.color = "red";
        } else if (
          (b1 == "0" || b1 == "0") &&
          (b5 == "0" || b5 == "0") &&
          (b9 == "0" || b9 == "0")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user2.value + " won";
          b2btn.disabled = true;
          b3btn.disabled = true;
          b4btn.disabled = true;
          b6btn.disabled = true;
          b7btn.disabled = true;
          b8btn.disabled = true;

          b1btn.style.color = "red";
          b5btn.style.color = "red";
          b9btn.style.color = "red";
        } else if (
          (b3 == "0" || b3 == "0") &&
          (b5 == "0" || b5 == "0") &&
          (b7 == "0" || b7 == "0")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user2.value + " won";
          b1btn.disabled = true;
          b2btn.disabled = true;
          b4btn.disabled = true;
          b6btn.disabled = true;
          b8btn.disabled = true;
          b9btn.disabled = true;

          b3btn.style.color = "red";
          b5btn.style.color = "red";
          b7btn.style.color = "red";
        } else if (
          (b2 == "0" || b2 == "0") &&
          (b5 == "0" || b5 == "0") &&
          (b8 == "0" || b8 == "0")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user2.value + " won";
          b1btn.disabled = true;
          b3btn.disabled = true;
          b4btn.disabled = true;
          b6btn.disabled = true;
          b7btn.disabled = true;
          b9btn.disabled = true;

          b2btn.style.color = "red";
          b5btn.style.color = "red";
          b8btn.style.color = "red";
        } else if (
          (b4 == "0" || b4 == "0") &&
          (b5 == "0" || b5 == "0") &&
          (b6 == "0" || b6 == "0")
        ) {
          document.getElementById("print").innerHTML =
            "Player " + user2.value + " won";
          b1btn.disabled = true;
          b2btn.disabled = true;
          b3btn.disabled = true;
          b7btn.disabled = true;
          b8btn.disabled = true;
          b9btn.disabled = true;

          b4btn.style.color = "red";
          b5btn.style.color = "red";
          b6btn.style.color = "red";
        }

        else if (
          (b1 == "X" || b1 == "0") &&
          (b2 == "X" || b2 == "0") &&
          (b3 == "X" || b3 == "0") &&
          (b4 == "X" || b4 == "0") &&
          (b5 == "X" || b5 == "0") &&
          (b6 == "X" || b6 == "0") &&
          (b7 == "X" || b7 == "0") &&
          (b8 == "X" || b8 == "0") &&
          (b9 == "X" || b9 == "0")
        ) {
          document.getElementById("print").innerHTML = "Match Tie";
        } else {
          if (flag == 1) {
            document.getElementById("print").innerHTML =
              "Player" + user1.value + " Turn";
          } else {
            document.getElementById("print").innerHTML =
              "Player" + user2.value + " Turn";
          }
        }
      }

      function myfunc_2() {
        location.reload();
      }

      flag = 1;
      function myfunc_3() {
        if (flag == 1) {
          document.getElementById("b1").value = "X";
          document.getElementById("b1").disabled = true;
          flag = 0;
        } else {
          document.getElementById("b1").value = "0";
          document.getElementById("b1").disabled = true;
          flag = 1;
        }
      }

      function myfunc_4() {
        if (flag == 1) {
          document.getElementById("b2").value = "X";
          document.getElementById("b2").disabled = true;
          flag = 0;
        } else {
          document.getElementById("b2").value = "0";
          document.getElementById("b2").disabled = true;
          flag = 1;
        }
      }

      function myfunc_5() {
        if (flag == 1) {
          document.getElementById("b3").value = "X";
          document.getElementById("b3").disabled = true;
          flag = 0;
        } else {
          document.getElementById("b3").value = "0";
          document.getElementById("b3").disabled = true;
          flag = 1;
        }
      }

      function myfunc_6() {
        if (flag == 1) {
          document.getElementById("b4").value = "X";
          document.getElementById("b4").disabled = true;
          flag = 0;
        } else {
          document.getElementById("b4").value = "0";
          document.getElementById("b4").disabled = true;
          flag = 1;
        }
      }

      function myfunc_7() {
        if (flag == 1) {
          document.getElementById("b5").value = "X";
          document.getElementById("b5").disabled = true;
          flag = 0;
        } else {
          document.getElementById("b5").value = "0";
          document.getElementById("b5").disabled = true;
          flag = 1;
        }
      }

      function myfunc_8() {
        if (flag == 1) {
          document.getElementById("b6").value = "X";
          document.getElementById("b6").disabled = true;
          flag = 0;
        } else {
          document.getElementById("b6").value = "0";
          document.getElementById("b6").disabled = true;
          flag = 1;
        }
      }

      function myfunc_9() {
        if (flag == 1) {
          document.getElementById("b7").value = "X";
          document.getElementById("b7").disabled = true;
          flag = 0;
        } else {
          document.getElementById("b7").value = "0";
          document.getElementById("b7").disabled = true;
          flag = 1;
        }
      }

      function myfunc_10() {
        if (flag == 1) {
          document.getElementById("b8").value = "X";
          document.getElementById("b8").disabled = true;
          flag = 0;
        } else {
          document.getElementById("b8").value = "0";
          document.getElementById("b8").disabled = true;
          flag = 1;
        }
      }

      function myfunc_11() {
        if (flag == 1) {
          document.getElementById("b9").value = "X";
          document.getElementById("b9").disabled = true;
          flag = 0;
        } else {
          document.getElementById("b9").value = "0";
          document.getElementById("b9").disabled = true;
          flag = 1;
        }
      }
      function goBack() {
        window.location.replace("/comproject/games.php");
      }
    </script>
  </body>
</html>
