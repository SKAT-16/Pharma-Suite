<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/dashboard/controllers/retrieve-list.php";
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/assets/components/side-bar.php";
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/assets/components/banner.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pharmacy Management</title>
  <link rel="stylesheet" href="/pharma-suite/assets/styles/general.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/header.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/sidebar.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/main.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <style>
    .card {
      transition: background-color 0.3s ease, transform 0.3s ease,
        box-shadow 0.3s ease;
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
    }

    .available {
      border-color: #008800;
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
    <div class="header-right">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
      </svg>
      <div class="count">01</div>
    </div>
  </header>
  <main>
    <div class="upper-main">
      <div class="contain-dash">
        <h1>Dashboard</h1>
        <p>A quick data overview of the inventory.</p>
      </div>
      <div class="card-container">
        <div class="card">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
            <path d="M420-340h120v-100h100v-120H540v-100H420v100H320v120h100v100Zm60 260q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Zm0-84q104-33 172-132t68-220v-189l-240-90-240 90v189q0 121 68 220t172 132Zm0-316Z" />
          </svg>
          <p class="amount"><?php echo $total_medicines_sold; ?></p>
          <p class="activity">Medicine Sales today</p>
        </div>
        <div class="card">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
            <path d="M560-440q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35ZM280-320q-33 0-56.5-23.5T200-400v-320q0-33 23.5-56.5T280-800h560q33 0 56.5 23.5T920-720v320q0 33-23.5 56.5T840-320H280Zm80-80h400q0-33 23.5-56.5T840-480v-160q-33 0-56.5-23.5T760-720H360q0 33-23.5 56.5T280-640v160q33 0 56.5 23.5T360-400Zm440 240H120q-33 0-56.5-23.5T40-240v-440h80v440h680v80ZM280-400v-320 320Z" />
          </svg>
          <p class="amount"><?php echo $total_transactions; ?></p>
          <p class="activity">Transactions today</p>
        </div>
        <div class="card available">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
            <path d="M160-80q-33 0-56.5-23.5T80-160v-480q0-33 23.5-56.5T160-720h160v-80q0-33 23.5-56.5T400-880h160q33 0 56.5 23.5T640-800v80h160q33 0 56.5 23.5T880-640v480q0 33-23.5 56.5T800-80H160Zm0-80h640v-480H160v480Zm240-560h160v-80H400v80ZM160-160v-480 480Zm280-200v120h80v-120h120v-80H520v-120h-80v120H320v80h120Z" />
          </svg>
          <p class="amount"><?php echo $available_medicines_count; ?></p>
          <p class="activity">Medicines avilable</p>
        </div>
        <div class="card error">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
          </svg>
          <p class="amount"><?php echo $expired_medicines_count; ?></p>
          <p class="activity">Expired Medicine</p>
        </div>
      </div>
    </div>
    <div class="lower-main">
      <table class="dashboard-table">
        <tr>
          <td colspan="2" class="row1">My Pharmacy</td>
        </tr>
        <tr>
          <td class="amount"><?php echo $total_suppliers; ?></td>
          <td class="amount"><?php echo $total_employees; ?></td>
        </tr>
        <tr>
          <td>Total number of suppliers</td>
          <td>Total number of employees</td>
        </tr>
      </table>
      <table class="dashboard-table">
        <tr>
          <td colspan="2" class="row1">Quick Report</td>
        </tr>
        <tr>
          <td class="amount"><?php echo $total_medicine_sold; ?></td>
          <td class="amount"><?php echo $total_medicine_in_stock; ?></td>
        </tr>
        <tr>
          <td>Total quantity of Medicine sold</td>
          <td>Total quantity of Medicines in stock</td>
        </tr>
      </table>
    </div>
  </main>
</body>

</html>