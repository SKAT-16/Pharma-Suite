<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $category_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

  if ($category_id > 0) {
    $sql = "SELECT * FROM Category WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $category = $result->fetch_assoc();

    if (!$category) {
      $_SESSION['message'] = "Category not found.";
      $conn->close();
      header("Location: /pharma-suite/category/category_list_page.php");
      exit();
    }
  }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $category_id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];

  // Check if category name is already in use by another category
  $sql = "SELECT id FROM Category WHERE name = ? AND id != ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("si", $name, $category_id);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $_SESSION['message'] = "Category name is already in use by another category.";
  } else {
    $sql = "UPDATE Category SET name = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $description, $category_id);
    $stmt->execute();
    $_SESSION['message'] = "Category updated successfully.";
  }

  $stmt->close();
  $conn->close();
  header("Location: /pharma-suite/category/category_list_page.php");
  exit();
}
