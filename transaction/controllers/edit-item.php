<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $transaction_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

  if ($transaction_id > 0) {
    // Fetch medications from the database
    $sql = "SELECT id, name FROM Medication";
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

    // Fetch the existing details of the transaction
    $sql = "SELECT * FROM Transaction WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $transaction_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $transaction = $result->fetch_assoc();

    if (!$transaction) {
      $_SESSION['message'] = "Transaction not found";
      $conn->close();
      header("Location: /pharma-suite/transaction/transaction_list_page.php");
      exit();
    }
  } else {
    $_SESSION['message'] = "Invalid transaction ID.";
    $conn->close();
    header("Location: /pharma-suite/transaction/transaction_list_page.php");
    exit();
  }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $transaction_id = $_POST['id'];
  $medication_id = $_POST['medication_id'];
  $employee_id = $_POST['employee_id'];
  $customer_id = $_POST['customer_id'];
  $transaction_date = $_POST['transaction_date'];
  $quantity = $_POST['quantity'];

  echo $transaction_date;

  $sql = "UPDATE Transaction SET medication_id = ?, employee_id = ?, customer_id = ?, transaction_date = ?, quantity = ? WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iiisii", $medication_id, $employee_id, $customer_id, $transaction_date, $quantity, $transaction_id);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Transaction updated successfully";
  header("Location: /pharma-suite/transaction/transaction_list_page.php");
  exit();
}
