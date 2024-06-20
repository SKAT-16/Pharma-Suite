<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $category_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

  if ($category_id > 0) {
    try {
      // Check if any medication is linked to this category
      $sql = "SELECT id FROM Medication WHERE category_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $category_id);
      $stmt->execute();
      $stmt->store_result();

      if ($stmt->num_rows > 0) {
        $_SESSION['message'] = "Category cannot be deleted as it is linked to one or more medications.";
      } else {
        // Delete the category
        $sql = "DELETE FROM Category WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $_SESSION['message'] = "Category deleted successfully.";
      }
      $stmt->close();
    } catch (Exception $e) {
      $_SESSION['message'] = "Error deleting category: " . $e->getMessage();
    }
  } else {
    $_SESSION['message'] = "Invalid category ID.";
  }

  // Redirect to a page (e.g., the category list page)
  header("Location: /pharma-suite/category/category_list_page.php");
  $conn->close();
  exit();
} else {
  $_SESSION['message'] = "Invalid request method.";
  header("Location: /pharma-suite/category/category_list_page.php");
  $conn->close();
  exit();
}
