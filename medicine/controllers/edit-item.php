<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $medicine_id = $_GET['id'];

  // Fetch the existing details of the medicine
  $sql = "SELECT * FROM Medication WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $medicine_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $medicine = $result->fetch_assoc();

  if (!$medicine) {
    $_SESSION['message'] = "Medicine not found";
    header("Location: /pharma-suite/medicine/medicine_list_page.php");
    exit();
  }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $medicine_id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $sql = "UPDATE Medication SET name = ?, description = ?, price = ? WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssdi", $name, $description, $price, $medicine_id);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Medicine updated successfully";
  header("Location: /pharma-suite/medicine/medicine_list_page.php");
}
