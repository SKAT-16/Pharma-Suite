<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $transaction_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

  if ($transaction_id > 0) {
    try {
      // Delete the transaction
      $sql = "DELETE FROM Transaction WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $transaction_id);
      $stmt->execute();
      $stmt->close();

      $_SESSION['message'] = "Transaction deleted successfully.";
    } catch (Exception $e) {
      $_SESSION['message'] = "Error deleting transaction: " . $e->getMessage();
    }
  } else {
    $_SESSION['message'] = "Invalid transaction ID.";
  }

  header("Location: /pharma-suite/transaction/transaction_list_page.php");
  exit();
} else {
  $_SESSION['message'] = "Invalid request method.";
  header("Location: /pharma-suite/transaction/transaction_list_page.php");
  exit();
}

$conn->close();
