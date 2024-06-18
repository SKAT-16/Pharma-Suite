<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/medicine/controllers/retrieve-list.php";
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/assets/components/side-bar.php";
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/assets/components/banner.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="/pharma-suite/assets/styles/general.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/sidebar.css" />
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
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
      </button>
    </form>

    <div class="header-right">
      <a href="/pharma-suite/medicine/medicine_add_page.php" class="add-btn">
        <svg class="add-icon" viewBox="0 0 24 24">
          <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
        </svg>
      </a>
    </div>
  </header>
  <main class="list-main">
    <table cellspacing="3">
      <tr>
        <td class="list-row1">Name</td>
        <td class="list-row1">Catagory</td>
        <td class="list-row1">Supplier</td>
        <td class="list-row1">Quantity</td>
        <td class="list-row1">Unit Price</td>
        <td class="list-row1">Expiration date</td>
        <td class="list-row1">Actions</td>
      </tr>
      <?php
      if (empty($medicines))
        echo "<tr><td style='text-align: center; padding-top: 50px;'  colspan='6'>No medicines Found</td></tr>";
      else
        foreach ($medicines as $key => $row) {
          echo "
              <tr class='list-row'>
                  <td class='list-cells'>" . $row['name'] . "</td>
                  <td class='list-cells'>" . $row['category_name'] . "</td>
                  <td class='list-cells'>" . $row['supplier_name'] . "</td>
                  <td class='list-cells'>" . $row['stock_quantity'] . "</td>
                  <td class='list-cells'>" . $row['unit_price'] . "</td>
                  <td class='list-cells " . ($row['expiry_date'] < date('Y-m-d') ? 'expired' : '') . "'>
                      " . $row['expiry_date'] . "
                  </td>
                  <td>
                    <a style='background-color: #55cc55' class='action-btn' href='./medicine_edit_page.php?id=" . $row['id'] . "'>Edit</a>
                    <a style='background-color: #cc5555' class='action-btn' href='./controllers/delete-item.php?id=" . $row['id'] . "' onclick='return confirmDelete(" . $row['stock_quantity'] . ")'>Delete</a>
                  </td>
              </tr>
          ";
        }
      ?>
    </table>
  </main>
  <script>
    function confirmDelete(stockCount) {
      return confirm("The medicine(about " + stockCount + " in stock) and the associated transactions will be deleted.\n\n\t Are you sure about this action?");
    }

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