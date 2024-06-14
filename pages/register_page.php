<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <title>Login</title>
  <style>
    * {
      font-family: "Poppins", sans-serif;
    }

    body {
      background-color: #edf2f4;
    }

    .input-container {
      position: relative;
      display: flex;
      align-items: center;
    }

    .input-container i {
      position: absolute;
      left: 10px;
      transform: translateY(-40%);
    }

    .input-container>input[type="text"],
    .input-container>input[type="password"],
    .input-container>input[type="email"] {
      padding-left: 30px;
      font-family: "Poppins", sans-serif;
      background-color: #b5bcc5;
      opacity: 75%;

      border: none;
      outline-color: grey;
      height: 40px;
      width: 270px;
      border-radius: 10px;
      margin-bottom: 10px;
    }

    .signUp-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: flex;
      justify-content: center;
      flex-direction: column;
    }

    .welcome {
      font-weight: 700;
      font-size: 50px;
      text-align: center;
      color: #1d242e;
      opacity: 80%;
    }

    .error-message {
      color: #ce0000;
      text-align: center;
    }

    .signUp-button {
      padding: 8px 20px;
      border-radius: 10px;
      border: none;
      background-color: #1d242e;
      color: rgb(232, 232, 232);
      cursor: pointer;
      box-shadow: 0 8px 21px rgba(0, 0, 0, 16%);
      transition: ease 0.3s;
      margin-top: 20px;
      width: 100%;
    }

    .signUp-button:hover {
      transform: scale(1.08);
    }

    .have-account {
      margin-top: 15px;
      margin-bottom: 19px;
      text-align: right;
      font-size: 14px;
    }

    a {
      color: #1d242e;
    }

    a:hover {
      color: #215dac;
    }
  </style>
</head>

<body>
  <form action="/pharma-suite/controllers/auth/register.php" method="post">
    <div class="signUp-container">
      <div class="centered">
        <h1 class="welcome">WELCOME</h1>
        <?php
        if (isset($_SESSION['message']))
          echo "<h5 class='error-message'>" . $_SESSION['message'] . "</h5>";
        $_SESSION['message'] = "";
        ?>
        <div class="input-container">
          <input type="text" name="fullname" placeholder="Fullname" required />
          <i class="bx bx-id-card"></i>
        </div>
        <div class="input-container">
          <input type="text" name="username" placeholder="Username" required />
          <i class="bx bx-user"></i>
        </div>
        <div class="input-container">
          <input type="email" name="email" placeholder="Email" required />
          <i class="bx bx-envelope"></i>
        </div>
        <div class="input-container">
          <input type="password" name="password" placeholder="Password" required />
          <i class="bx bx-lock"></i>
        </div>
        <div class="input-container">
          <input type="password" name="cpassword" placeholder="Confirm Password" required />
          <i class="bx bx-lock"></i>
        </div>
      </div>
      <div class="centered">
        <button type="submit" name="register" class="signUp-button">
          SignUp
        </button>
      </div>
      <div class="have-account">
        <a href="./login_page.php">Already have an account?</a>
      </div>
    </div>
  </form>
</body>
</html>