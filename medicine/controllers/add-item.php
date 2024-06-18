<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
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
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

  $sql = "INSERT INTO Medication (name, description, manufacturer, strength, dosage_form, expiry_date, stock_quantity, unit_price, category_id, supplier_id)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssssidii", $name, $description, $manufacturer, $strength, $dosage_form, $expiry_date, $stock_quantity, $unit_price, $category_id, $supplier_id);
  $stmt->execute();

  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "New medicine added successfully";
  header("Location: /pharma-suite/medicine/medicine_list_page.php");
  exit();
}
