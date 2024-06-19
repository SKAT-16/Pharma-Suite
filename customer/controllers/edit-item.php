<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $customer_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

  if ($customer_id > 0) {
    $sql = "SELECT * FROM Customer WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $customer = $result->fetch_assoc();

    if (!$customer) {
      $_SESSION['message'] = "Customer not found.";
      $conn->close();
      header("Location: /pharma-suite/customer/customer_list_page.php");
      exit();
    }
  }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $customer_id = $_POST['id'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $contact_number = $_POST['contact_number'];
  $address = $_POST['address'];

  // Check if email is already in use by another customer
  $sql = "SELECT id FROM Customer WHERE email = ? AND id != ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("si", $email, $customer_id);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $_SESSION['message'] = "Email is already in use by another customer.";
  } else {
    $sql = "UPDATE Customer SET fullname = ?, email = ?, contact_number = ?, address = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $fullname, $email, $contact_number, $address, $customer_id);
    $stmt->execute();
    $_SESSION['message'] = "Customer updated successfully.";
  }

  $stmt->close();
  $conn->close();
  header("Location: /pharma-suite/customer/customer_list_page.php");
  exit();
}
