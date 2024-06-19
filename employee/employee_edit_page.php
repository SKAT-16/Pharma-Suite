<?php
session_start();
include "./controllers/edit-item.php";
include "../assets/components/side-bar.php";
include "../assets/components/banner.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/pharma-suite/assets/styles/general.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/main.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/sidebar.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/header.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <style>
    h1 {
      padding-left: 30px;
      margin-bottom: 20px;
    }

    .input-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin-left: 32px;
    }

    .input-container>div {
      flex-basis: 48%;
      margin-bottom: 10px;
    }

    .input-container input {
      padding-left: 30px;
      font-family: "Poppins", sans-serif;
      background-color: #b5bcc5;
      opacity: 49%;

      border: none;
      height: 40px;
      width: 300px;
      border-radius: 10px;
      margin-top: 5px;
    }

    .input-container select {
      padding: 0 30px;
      font-family: "Poppins", sans-serif;
      background-color: #b5bcc5;
      opacity: 49%;

      border: none;
      height: 40px;
      width: 300px;
      border-radius: 10px;
      margin-top: 5px;
    }

    label {
      font-size: 14px;
      color: #4c535f;
    }

    .update {
      cursor: pointer;
      padding: 8px 20px;
      border-radius: 10px;
      border: none;
      background-color: #1d242e;
      color: rgb(232, 232, 232);
      box-shadow: 0 8px 21px rgba(0, 0, 0, 16%);
      transition: ease 0.3s;
      border: 3px solid #1d242e;
    }

    .reset {
      cursor: pointer;
      padding: 8px 20px;
      border-radius: 10px;
      border: 3px solid #1d242e;
      color: #1d242e;
      box-shadow: 0 8px 21px rgba(0, 0, 0, 16%);
      transition: ease 0.3s;
      width: 100px;
    }

    .update:hover,
    .reset:hover {
      transform: scale(1.08);
    }

    .buttons {
      display: flex;
      justify-content: center;
      margin-top: 20px;
      gap: 30px;
    }
  </style>
</head>

<body>
  <?php displaySideBar(); ?>
  <?php displayBanner(); ?>
  <header>
    <div class="header-left">
      <input type="text" placeholder="Search for anything here." />
      <button>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
      </button>
    </div>
  </header>
  <main>
    <h1><?php echo $employee['fullname']; ?></h1>
    <form action="/pharma-suite/employee/controllers/edit-item.php" method="post" id="myForm">
      <div class="input-container">
        <input type="hidden" name="id" value="<?php echo $employee['id']; ?>" />
        <div>
          <label for="fullname">Fullname</label><br />
          <input type="text" name="fullname" id="fullname" value="<?php echo $employee['fullname']; ?>" required />
        </div>
        <div>
          <label for="username">Username</label><br />
          <input type="text" name="username" id="username" value="<?php echo $employee['username']; ?>" required />
        </div>
        <div>
          <label for="email">Email</label><br />
          <input type="email" name="email" id="email" value="<?php echo $employee['email']; ?>" required />
        </div>
        <div>
          <label for="password">Password*(Not required)</label><br />
          <input type="password" name="password" id="password" />
        </div>
        <div>
          <label for="address">Address</label><br />
          <input type="text" name="address" id="address" value="<?php echo $employee['address']; ?>" required />
        </div>
        <div>
          <label for="status">Status</label><br />
          <select name="status" id="">
            <?php
            if ($employee['status'] == "INACTIVE")
              echo '
                  <option selected value="INACTIVE">Inactive</option>
                  <option value="ACTIVE">Active</option>
                ';
            else
              echo '
                  <option value="INACTIVE">Inactive</option>
                  <option selected value="ACTIVE">Active</option>'; ?>
          </select>
        </div>
        <div>
          <label for="contact">Contact</label><br />
          <input type="text" name="contact" id="contact" value="<?php echo $employee['contact_number']; ?>" required />
        </div>
        <div>
          <label for="salary">Salary</label><br />
          <input step="0.01" type="number" name="salary" id="salary" value="<?php echo $employee['salary']; ?>" required />
        </div>
      </div>
      <div class="buttons">
        <button class="update" type="submit">Update</button>
        <button class="reset" type="reset">Reset</button>
      </div>
    </form>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        var banner = document.getElementById("banner");
        if (banner) {
          banner.style.display = "block"; // Show the banner
          setTimeout(function() {
            banner.style.display = "none"; // Hide the banner after 5 seconds
          }, 5000);
        }
      });
    </script>
</body>

</html>