<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $employee_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

  // Fetch the existing details of the employee
  $sql = "SELECT * FROM Employee WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $employee_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $employee = $result->fetch_assoc();

  if (!$employee) {
    $_SESSION['message'] = "Employee not found";
    $conn->close();
    header("Location: /pharma-suite/employee/employee_list_page.php");
    exit();
  }

  $stmt->close();
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $employee_id = $_POST['id'];
  $fullname = $_POST['fullname'];
  $contact_number = $_POST['contact'];
  $salary = $_POST['salary'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $status = $_POST['status'];
  $position = $_POST['position'];

  // Prepare SQL for updating the employee
  if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "UPDATE Employee SET fullname = ?, position = ?, contact_number = ?, salary = ?, username = ?, email = ?, password = ?, address = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdsssssi", $fullname, $position, $contact_number, $salary, $username, $email, $hashed_password, $address, $status, $employee_id);
  } else {
    $sql = "UPDATE Employee SET fullname = ?, position = ?, contact_number = ?, salary = ?, username = ?, email = ?, address = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdssssi", $fullname, $position, $contact_number, $salary, $username, $email, $address, $status, $employee_id);
  }

  $stmt->execute();
  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Employee updated successfully";
  header("Location: /pharma-suite/employee/employee_list_page.php");
  exit();
}
