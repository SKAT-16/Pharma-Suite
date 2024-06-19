<?php
session_start();
include "./controllers/add-item.php";
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
      margin-top: 50px;
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
    <h1>New Transaction</h1>
    <form action="/pharma-suite/transaction/controllers/add-item.php" method="post" id="myForm">
      <div class="input-container">
        <div>
          <label for="medication_id">Medication</label><br />
          <select name="medication_id" id="">
            <?php
            foreach ($medications as $key => $row) {
              echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
            }
            ?>
          </select>
        </div>
        <div>
          <label for="employee_id">Employee</label><br />
          <select name="employee_id" id="">
            <?php
            foreach ($employees as $key => $row) {
              echo "<option value=" . $row['id'] . ">" . $row['fullname'] . "</option>";
            }
            ?>
          </select>
        </div>
        <div>
          <label for="customer_id">customer</label><br />
          <select name="customer_id" id="">
            <?php
            foreach ($customers as $key => $row) {
              echo "<option value=" . $row['id'] . ">" . $row['fullname'] . "</option>";
            }
            ?>
          </select>
        </div>
        <div>
          <label for="transaction_date">Transaction Date</label><br />
          <input type="date" name="transaction_date" id="transaction_date" required />
        </div>
        <div>
          <label for="quantity">Quantity</label><br />
          <input type="number" name="quantity" id="quantity" required />
        </div>
      </div>
      <div class="buttons">
        <button class="update" type="submit">Add</button>
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