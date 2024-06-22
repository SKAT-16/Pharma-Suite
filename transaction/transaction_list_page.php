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
  <title>Document</title>
  <link rel="stylesheet" href="/pharma-suite/assets/styles/general.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/sidebar.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/main.css" />
  <link rel="stylesheet" href="/pharma-suite/assets/styles/header.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <script src="/pharma-suite/assets/js/jspdf.min.js" type="text/javascript"></script>
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
    <?php
    if (strtoupper($_SESSION['position']) != "PHARMACIST")
      echo '
        <div class="header-right">
          <a href="/pharma-suite/transaction/transaction_add_page.php" class="add-btn">
            <svg class="add-icon" viewBox="0 0 24 24">
              <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
            </svg>
          </a>
        </div>';
    ?>
  </header>
  <main class="list-main">
    <table cellspacing="3" class="list-table">
      <tr>
        <td class="list-row1">Medication</td>
        <td class="list-row1">Supplier</td>
        <td class="list-row1">Customer</td>
        <td class="list-row1">Employee</td>
        <td class="list-row1">Quantity</td>
        <td class="list-row1">Total Price</td>
        <td class="list-row1">Date</td>
        <?php
        if (strtoupper($_SESSION['position']) != "PHARMACIST")
          echo '<td class="list-row1">Actions</td>';
        ?>
      </tr>
      <?php
      if (empty($transactions))
        echo "<tr><td style='text-align: center; padding-top: 50px;'  colspan='6'>No transactions Found</td></tr>";
      else
        foreach ($transactions as $key => $row) {
          echo "
              <tr class='list-row' id='tr" . $row['id'] . "'>
                  <td class='list-cells'>" . $row['medication_name'] . "</td>
                  <td class='list-cells'>" . $row['supplier_name'] . "</td>
                  <td class='list-cells'>" . $row['customer_name'] . "</td>
                  <td class='list-cells'>" . $row['employee_name'] . "</td>
                  <td class='list-cells'>" . $row['quantity'] . "</td>
                  <td class='list-cells'>" . ($row['quantity'] * $row['unit_price']) . " birr</td>
                  <td class='list-cells'>" . date('Y-m-d', strtotime($row['transaction_date'])) . "</td>
                  ";
          if (strtoupper($_SESSION['position']) != "PHARMACIST")
            echo "
                  <td>
                    <button style='background-color: #5555cc' class='action-btn' onclick='return printTransaction(" . $row['id'] . ")'>Print</button>
                    <a style='background-color: #55cc55' class='action-btn' href='./transaction_edit_page.php?id=" . $row['id'] . "'>Edit</a>
                    <a style='background-color: #cc5555' class='action-btn' href='./controllers/delete-item.php?id=" . $row['id'] . "' onclick='return confirmDelete()'>Delete</a>
                  </td>
                  ";
          echo "
              </tr>
          ";
        }
      ?>
    </table>
  </main>

  <script>
    function printTransaction(rowID) {
      const doc = new jsPDF();

      // Capture the transaction details
      const transactionDetails = document.getElementById("tr" + rowID);
      const transactionID = rowID;
      const medicineSold = transactionDetails.children[0].textContent;
      const supplier = transactionDetails.children[1].textContent;
      const customer = transactionDetails.children[2].textContent;
      const employee = transactionDetails.children[3].textContent;
      const quantity = transactionDetails.children[4].textContent;
      const totalPrice = transactionDetails.children[5].textContent;
      const date = transactionDetails.children[6].textContent;

      // Add the transaction details to the PDF with formatting
      doc.setFontSize(18);
      doc.text('Transaction Receipt', 105, 20, null, null, 'center');

      doc.setFontSize(12);
      doc.text('----------------------------------------', 10, 30);
      doc.text('Transaction ID: ' + transactionID, 10, 40);
      doc.text('----------------------------------------', 10, 50);

      doc.setFontSize(14);
      doc.text('Medicine Sold:', 10, 60);
      doc.setFontSize(12);
      doc.text(medicineSold, 60, 60);

      doc.setFontSize(14);
      doc.text('Supplier:', 10, 70);
      doc.setFontSize(12);
      doc.text(supplier, 60, 70);

      doc.setFontSize(14);
      doc.text('Customer:', 10, 80);
      doc.setFontSize(12);
      doc.text(customer, 60, 80);

      doc.setFontSize(14);
      doc.text('Employee:', 10, 90);
      doc.setFontSize(12);
      doc.text(employee, 60, 90);

      doc.setFontSize(14);
      doc.text('Quantity:', 10, 100);
      doc.setFontSize(12);
      doc.text(quantity, 60, 100);

      doc.setFontSize(14);
      doc.text('Total Price:', 10, 110);
      doc.setFontSize(12);
      doc.text(totalPrice, 60, 110);

      doc.setFontSize(14);
      doc.text('Date:', 10, 120);
      doc.setFontSize(12);
      doc.text(date, 60, 120);

      doc.text('----------------------------------------', 10, 130);

      // Save the PDF
      doc.save("transaction-" + transactionID + "(" + date + ").pdf");
    }

    function confirmDelete() {
      return confirm("The transaction contains important data on the medicine sold.\n\n\tAre you sure about this action?");
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