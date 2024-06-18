<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $supplier_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

  if ($supplier_id > 0) {
    try {
      // Get all medicines supplied by this supplier
      $sql = "SELECT id FROM Medication WHERE supplier_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $supplier_id);
      $stmt->execute();
      $result = $stmt->get_result();
      $medicines = $result->fetch_all(MYSQLI_ASSOC);
      $stmt->close();

      // Delete related transactions for each medicine
      $sql = "DELETE FROM Transaction WHERE medication_id = ?";
      $stmt = $conn->prepare($sql);
      foreach ($medicines as $medicine) {
        $stmt->bind_param("i", $medicine['id']);
        $stmt->execute();
      }
      $stmt->close();

      // Delete medicines supplied by this supplier
      $sql = "DELETE FROM Medication WHERE supplier_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $supplier_id);
      $stmt->execute();
      $stmt->close();

      // Delete the supplier
      $sql = "DELETE FROM Supplier WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $supplier_id);
      $stmt->execute();
      $stmt->close();

      $_SESSION['message'] = "Supplier and related medicines and transactions deleted successfully.";
    } catch (Exception $e) {
      $_SESSION['message'] = "Error deleting supplier: " . $e->getMessage();
    }
  } else {
    $_SESSION['message'] = "Invalid supplier ID.";
  }

  // Redirect to a page (e.g., the supplier list page)
  header("Location: /pharma-suite/supplier/supplier_list_page.php");
  exit();
} else {
  $_SESSION['message'] = "Invalid request method.";
  header("Location: /pharma-suite/supplier/supplier_list_page.php");
  exit();
}

$conn->close();
