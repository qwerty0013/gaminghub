<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - Gaming Lounge         </title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    />
    <style>
      body {
        background: linear-gradient(45deg, #ff6b6b, #56ccf2);
        color: #fff;
      }

      .container {
        background: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 50px;
      }

      h1 {
        color: #007bff;
      }

      label {
        color: #007bff;
      }

      input {
        border-color: #007bff;
        color: #007bff;
        background-color: rgba(255, 255, 255, 0.9);
      }

      button {
        background: #007bff;
        border: none;
      }

      button:hover {
        background: #0056b3;
      }

      .logo {
        max-width: 100px;
        height: auto;
        display: block;
        margin: 0 auto;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h1 class="text-center mt-5">Welcome to Gaming Lounge!</h1>
          <img
            src="/img/sitelogo.png"
            class="img-fluid mx-auto d-block mb-4 logo"
            alt="Logo"
          />

          <form action="signup.php" method="POST">
            <div class="mb-3">
              <label for="name" class="form-label">Name:</label>
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                required
              />
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                required
              />
            </div>
            <div class="mb-3">
              <label for="dob" class="form-label">Date of Birth:</label>
              <input
                type="date"
                class="form-control"
                id="dob"
                name="dob"
                required
              />
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username:</label>
              <input
                type="text"
                class="form-control"
                id="username"
                name="username"
                required
              />
            </div>
            <div class="mb-3">
              <label for="usertag" class="form-label"
                >User Tag (Containing 4 Numbers):</label
              >
              <input
                type="text"
                class="form-control"
                id="usertag"
                name="usertag"
                required
              />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password:</label>
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                required
              />
            </div>
            <div class="mb-3">
              <label for="confirmPassword" class="form-label"
                >Confirm Password:</label
              >
              <input
                type="password"
                class="form-control"
                id="confirmPassword"
                name="confirmPassword"
                required
              />
            </div>
            <button
              type="submit"
              name="submit"
              class="btn btn-primary"
              style="display: none"
              id="submit"
            >
              Are You Sure?
            </button>
          </form>
          <button
            id="formvalidation"
            onclick="validation()"
            style="display: inline"
            class="confirm"
          >
            Register
          </button>
          <div class="text-center mt-3">
            <p>Already registered? <a href="./login.php">Login here</a>.</p>
          </div>
        </div>
      </div>
    </div>
    <script>
      function validation() {
        event.preventDefault();

        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var dob = document.getElementById("dob").value;
        var username = document.getElementById("username").value;
        var usertag = document.getElementById("usertag").value;
        var pass = document.getElementById("password").value;
        var cpass = document.getElementById("confirmPassword").value;
        var submit = document.getElementById("confirm");
        if (name == "") {
          alert("Please Input Your Name!!");
          return false;
        } else if (email == "") {
          alert("Please Input Your Email!!");
          return false;
        } else if (dob == "") {
          alert("Please Input Your Date of Birth!!");
          return false;
        } else if (username == "") {
          alert("Please Input Your Username!!");
          return false;
        } else if (usertag == "") {
          alert("Please Input Your Usertag!!");
          return false;
        } else if (pass == "") {
          alert("Please Input Your Password!!");
          return false;
        } else if (cpass == "") {
          alert("Please Confirm Your Password!!");
          return false;
        } else if (pass.length < 8) {
          alert("Password must be of atleast 8 characters!!");
        }
        if (usertag.length != "4") {
          alert("Please make sure your usertag contains only 4 numbers!!");
          return false;
        }
        if (cpass != pass) {
          alert(
            "Please enter same value in confirm password as that of password!!"
          );
          return false;
        }
        if (username.length < 8) {
          alert("Username must be over 8 characters!!");
          return false;
        }
        if (username.length > 15) {
          alert("Username must be less than 15 characters!!");
        } else {
          document.querySelector(".confirm").style.display = "none";
          document.getElementById("submit").style.display = "";
        }
      }
    </script>
  </body>
</html>
