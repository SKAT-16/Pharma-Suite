<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $medicine_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

  if ($medicine_id > 0) {
    try {
      // Delete related transactions
      $sql = "DELETE FROM Transaction WHERE medication_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $medicine_id);
      $stmt->execute();
      $stmt->close();

      // Delete the medicine
      $sql = "DELETE FROM Medication WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $medicine_id);
      $stmt->execute();
      $stmt->close();

      $_SESSION['message'] = "Medicine and related transactions deleted successfully.";
    } catch (Exception $e) {
      $_SESSION['message'] = "Error deleting medicine: " . $e->getMessage();
    }
  } else {
    $_SESSION['message'] = "Invalid medicine ID.";
  }

  // Redirect to a page (e.g., the medicine list page)
  header("Location: /pharma-suite/medicine/medicine_list_page.php");
  exit();
} else {
  $_SESSION['message'] = "Invalid request method.";
  header("Location: /pharma-suite/medicine/medicine_list_page.php");
  exit();
}

$conn->close();
