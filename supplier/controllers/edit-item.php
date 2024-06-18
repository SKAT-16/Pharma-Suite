<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $supplier_id = $_GET['id'];
  $sql = "SELECT * FROM Supplier WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $supplier_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $supplier = $result->fetch_assoc();
  $stmt->close();
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $supplier_id = $_POST['id'];
  $name = $_POST['name'];
  $contact_person_name = $_POST['contact_name'];
  $contact_number = $_POST['contact_number'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $sql = "UPDATE Supplier SET name = ?, contact_person_name = ?, contact_number = ?, email = ?, address = ? WHERE id = ?";
  $stmt = $conn->prepare($sql);
  if ($stmt === false) {
    die('Error preparing statement: ' . $conn->error);
  }

  $stmt->bind_param("sssssi", $name, $contact_person_name, $contact_number, $email, $address, $supplier_id);

  if ($stmt->execute() === false) {
    die('Error executing statement: ' . $stmt->error);
  }

  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Supplier updated successfully";
  header("Location: /pharma-suite/supplier/supplier_list_page.php");
  exit();
}
