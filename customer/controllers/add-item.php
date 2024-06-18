<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $contact_number = $_POST['contact_number'];
  $address = $_POST['address'];

  // Check if email is already in use
  $sql = "SELECT id FROM Customer WHERE email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $_SESSION['message'] = "Email is already in use.";
  } else {
    $sql = "INSERT INTO Customer (fullname, email, contact_number, address) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $fullname, $email, $contact_number, $address);
    $stmt->execute();
    $_SESSION['message'] = "New customer added successfully.";
  }

  $stmt->close();
  $conn->close();
  header("Location: /pharma-suite/customer/customer_list_page.php");
  exit();
}
