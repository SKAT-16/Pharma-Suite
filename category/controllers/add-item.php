<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $description = $_POST['description'];

  // Check if category name is already in use
  $sql = "SELECT id FROM Category WHERE name = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $name);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $_SESSION['message'] = "Category name is already in use.";
  } else {
    $sql = "INSERT INTO Category (name, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $description);
    $stmt->execute();
    $_SESSION['message'] = "New category added successfully.";
  }

  $stmt->close();
  $conn->close();
  header("Location: /pharma-suite/category/category_list_page.php");
  exit();
}
