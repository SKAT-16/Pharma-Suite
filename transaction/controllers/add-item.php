<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // Fetch medications from the database
  $sql = "SELECT id, name, unit_price FROM Medication";
  $result = $conn->query($sql);
  $medications = [];
  if ($result) {
    while ($row = $result->fetch_assoc()) {
      $medications[] = $row;
    }
  }

  // Fetch employees from the database
  $sql = "SELECT id, fullname FROM Employee";
  $result = $conn->query($sql);
  $employees = [];
  if ($result) {
    while ($row = $result->fetch_assoc()) {
      $employees[] = $row;
    }
  }

  // Fetch customers from the database
  $sql = "SELECT id, fullname FROM Customer";
  $result = $conn->query($sql);
  $customers = [];
  if ($result) {
    while ($row = $result->fetch_assoc()) {
      $customers[] = $row;
    }
  }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $medication_id = $_POST['medication_id'];
  $employee_id = $_POST['employee_id'];
  $customer_id = $_POST['customer_id'];
  $transaction_date = $_POST['transaction_date'];
  $quantity = $_POST['quantity'];

  $sql = "INSERT INTO Transaction(medication_id, employee_id, customer_id, transaction_date, quantity)
          VALUES (?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iiisi", $medication_id, $employee_id, $customer_id, $transaction_date, $quantity);
  $stmt->execute();

  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "New transaction added successfully";
  header("Location: /pharma-suite/transaction/transaction_list_page.php");
  exit();
}
