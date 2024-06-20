<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $employee_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

  if ($employee_id > 0) {
    try {
      // Delete related transactions
      $sql = "DELETE FROM Transaction WHERE employee_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $employee_id);
      $stmt->execute();
      $stmt->close();

      // Delete the employee
      $sql = "DELETE FROM Employee WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $employee_id);
      $stmt->execute();
      $stmt->close();

      $_SESSION['message'] = "Employee and related transactions deleted successfully.";
    } catch (Exception $e) {
      $_SESSION['message'] = "Error deleting employee: " . $e->getMessage();
    }
  } else {
    $_SESSION['message'] = "Invalid employee ID.";
  }

  // Redirect to a page (e.g., the employee list page)
  $conn->close();
  header("Location: /pharma-suite/employee/employee_list_page.php");
  exit();
} else {
  $_SESSION['message'] = "Invalid request method.";
  $conn->close();
  header("Location: /pharma-suite/employee/employee_list_page.php");
  exit();
}
