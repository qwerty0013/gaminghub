<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Gaming Lounge</title>
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
          <h1 class="text-center mt-5">Welcome back to Gaming Lounge!</h1>
          <img
            src="./img/sitelogo.png"
            class="img-fluid mx-auto d-block mb-4 logo"
            alt="Logo"
          />

          <form action="sessionstart.php" method="POST">
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
              <label for="password" class="form-label">Password:</label>
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                required
              />
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Login</button>
          </form>

          <div class="text-center mt-3">
            <p>New user? <a href="./register.php">Register here</a>.</p>
          </div>
        </div>s
      </div>
    </div>
  </body>
</html>
