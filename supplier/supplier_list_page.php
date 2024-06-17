<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/supplier/controllers/retrieve-list.php";
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/assets/components/side-bar.php";
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/assets/components/banner.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="/pharma-suite/assets/styles/sidebar.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/general.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/main.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/header.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
</head>

<body>
  <?php displaySideBar(); ?>
  <?php displayBanner(); ?>
  <header>
    <form action="" class="header-left">
      <input type="text" name="query" placeholder="Search for anything here." />
      <button type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="background-color: transparent;">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
      </button>
    </form>
  </header>
  <main class="list-main">
    <table cellspacing="3" class="list-table">
      <tr>
        <td class="list-row1">Name</td>
        <td class="list-row1">Contact person</td>
        <td class="list-row1">Phone number</td>
        <td class="list-row1">Email</td>
        <td class="list-row1">Address</td>
        <td class="list-row1">Actions</td>
      </tr>
      <?php
      if (empty($suppliers))
        echo "<tr><td style='text-align: center; padding-top: 50px;'  colspan='6'>No suppliers Found</td></tr>";
      else
        foreach ($suppliers as $key => $row) {
          echo "
              <tr class='list-row'>
                  <td class='list-cells'>" . $row['name'] . "</td>
                  <td class='list-cells'>" . $row['contact_person_name'] . "</td>
                  <td class='list-cells'>" . $row['contact_number'] . "</td>
                  <td class='list-cells'>" . $row['email'] . "</td>
                  <td class='list-cells'>" . $row['address'] . "</td>
                  <td><a class='action-btn' style='background-color: #55cc55' href='/pharma-suite/supplier/supplier_edit_page.php?id=" . $row['id'] . "'>Edit</a>
                  <a class='action-btn' style='background-color: #cc5555' href='/pharma-suite/supplier/controllers/delete-item.php?id=" . $row['id'] . "'>Delete</a></td>
              </tr>
          ";
        }
      ?>
    </table>
  </main>
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