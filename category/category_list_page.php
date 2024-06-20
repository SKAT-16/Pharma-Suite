<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include "./controllers/retrieve-list.php";
include "../assets/components/side-bar.php";
include "../assets/components/banner.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/general.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/category.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/sidebar.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/header.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <title>Document</title>
  <style>

  </style>
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
  <main>
    <div class="category-title">Category</div>
    <div class="card-table">
      <?php
      foreach ($categories as $key => $row) {
        if (strtoupper($_SESSION['position']) != "CASHIER")
          echo "
          <a href='/pharma-suite/category/category_edit_page.php?id=" . $row['id'] . "' class='card'> ";
        else
          echo "
          <a class='card'> ";

        echo "
          <div class='card-title'>" . $row['name'] . "</div>
          <div class='card-description'>
            " . $row['description'] . "
          </div>
          <div class='card-more'>
            <div class='store'>" . $row['medicine_count'] . " in store</div>
            <div class='view-more-icon'>
              <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' class='size-6' style='width: 16px; height: 16px'>
                <path stroke-linecap='round' stroke-linejoin='round' d='m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5' />
              </svg>
            </div>
          </div>
      </a>";
      }

      if (strtoupper($_SESSION['position']) != "CASHIER")
        echo "<a href='/pharma-suite/category/category_add_page.php' class='card'>
                <div class='plus'>
                  <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='#c2cde1' class='size-6'>
                    <path stroke-linecap='round' stroke-linejoin='round' d='M12 4.5v15m7.5-7.5h-15' />
                  </svg>
                </div>
              </a>";
      ?>
    </div>
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