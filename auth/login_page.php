<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/assets/components/banner.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/general.css">
  <link rel="stylesheet" href="/pharma-suite/assets/styles/login.css">
  <title>Login</title>
</head>

<body>
  <?php displayBanner(); ?>
  <form action="./controllers/login.php" method="post">
    <div class="login-container">
      <div class="centered">
        <h1 class="welcome">WELCOME</h1>
        <div class="input-container">
          <input type="text" name="username" placeholder="Username" />
          <i class="bx bx-user"></i>
        </div>
        <div class="input-container">
          <input type="password" name="password" placeholder="Password" />
          <i class="bx bx-lock"></i>
        </div>
        <button type="submit" name="login" class="login-button">Login</button>
      </div>
      <div class="new-account">
        <a href="./register_page.php" onclick="showSignup()">New Account</a>?
      </div>
    </div>
  </form>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var banner = document.getElementById("banner");
      if (banner) {
        banner.style.display = "block";
        setTimeout(function() {
          banner.style.display = "none";
        }, 5000);
      }
    });
  </script>
</body>

</html>