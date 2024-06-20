<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $customer_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

  if ($customer_id > 0) {
    try {
      // Delete related transactions
      $sql = "DELETE FROM Transaction WHERE customer_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $customer_id);
      $stmt->execute();
      $stmt->close();

      // Delete the customer
      $sql = "DELETE FROM Customer WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $customer_id);
      $stmt->execute();
      $stmt->close();

      $_SESSION['message'] = "Customer and related transactions deleted successfully.";
    } catch (Exception $e) {
      $_SESSION['message'] = "Error deleting customer: " . $e->getMessage();
    }
  } else {
    $_SESSION['message'] = "Invalid customer ID.";
  }

  $conn->close();
  header("Location: /pharma-suite/customer/customer_list_page.php");
  exit();
} else {
  $_SESSION['message'] = "Invalid request method.";
  $conn->close();
  header("Location: /pharma-suite/customer/customer_list_page.php");
  exit();
}
