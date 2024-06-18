<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $contact_name = $_POST['contact_name'];
  $contact_number = $_POST['contact_number'];
  $email = $_POST['email'];
  $address = $_POST['address'];

  $sql = "INSERT INTO Supplier (name, contact_person_name, contact_number, email, address)
          VALUES (?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssss", $name, $contact_name, $contact_number, $email, $address);

  if ($stmt->execute() === false) {
    die('Error executing statement: ' . $stmt->error);
  }

  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "New supplier added successfully";
  header("Location: /pharma-suite/supplier/supplier_list_page.php");
  exit();
}
