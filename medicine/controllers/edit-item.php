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
}
