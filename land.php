<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gaming Lounge</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        height: 100vh;
        background: url("./img/sitebg.jpg") center/cover no-repeat;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-family: "Arial", sans-serif;
      }

      #logo {
        max-width: 150px;
        height: auto;
      }

      #site-name {
        font-size: 36px;
        margin-top: 20px;
      }

      #register-dialog {
        background: rgba(0, 0, 0, 0.8);
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
        text-align: center;
      }

      #register-button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        font-size: 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <img src="./img/sitelogo.png" alt="Site Logo" id="logo" />
    <h1 id="site-name">Gaming Lounge</h1>

    <div id="register-dialog">
      <p>Join the gaming community! Register now to unleash the fun.</p>
      <button id="register-button" onclick="redirectToRegister()">
        Register
      </button>
    </div>

    <script>
      function redirectToRegister() {
        window.location.href = "register.php";
      }
    </script>
  </body>
</html>
