<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $medicine_id = $_GET['id'];
  // Fetch categories from the database
  $sql = "SELECT id, name FROM Category";
  $result = $conn->query($sql);
  $categories = [];
  if ($result) {
    while ($row = $result->fetch_assoc()) {
      $categories[] = $row;
    }
  }

  // Fetch suppliers from the database
  $sql = "SELECT id, name FROM Supplier";
  $result = $conn->query($sql);
  $suppliers = [];
  if ($result) {
    while ($row = $result->fetch_assoc()) {
      $suppliers[] = $row;
    }
  }


  // Fetch the existing details of the medicine
  $sql = "SELECT * FROM Medication WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $medicine_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $medicine = $result->fetch_assoc();

  if (!$medicine) {
    $_SESSION['message'] = "Medicine not found";
    $conn->close();
    header("Location: /pharma-suite/medicine/medicine_list_page.php");
    exit();
  }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $medicine_id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $manufacturer = $_POST['manufacturer'];
  $strength = $_POST['strength'];
  $dosage_form = $_POST['dosage_form'];
  $expiry_date = $_POST['expiry_date'];
  $stock_quantity = $_POST['stock_quantity'];
  $unit_price = $_POST['unit_price'];
  $category_id = $_POST['category_id'];
  $supplier_id = $_POST['supplier_id'];
  $sql = "UPDATE Medication SET name = ?, description = ?, manufacturer = ?, strength = ?, dosage_form = ?, expiry_date = ?, stock_quantity = ?, unit_price = ?, category_id = ?, supplier_id = ? WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssssidiii", $name, $description, $manufacturer, $strength, $dosage_form, $expiry_date, $stock_quantity, $unit_price, $category_id, $supplier_id, $medicine_id);
  $stmt->execute();
  echo "here";
  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Medicine updated successfully";
  header("Location: /pharma-suite/medicine/medicine_list_page.php");
  exit();
}
