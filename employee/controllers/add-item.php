<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $fullname = $_POST['fullname'];
  $contact_number = $_POST['contact'];
  $salary = $_POST['salary'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $address = $_POST['address'];
  $status = $_POST['status'];

  // Check if the username already exists
  $sql = "SELECT COUNT(*) as count FROM Employee WHERE username = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $stmt->close();

  if ($row['count'] > 0) {
    $_SESSION['message'] = "Username already in use.";
    $conn->close();
    header("Location: /pharma-suite/employee/employee_add_page.php");
    exit();
  }

  echo ("ssdsssss" . $fullname . " . " . $contact_number . $salary . $username . $email . $password . $address . $status);
  // Insert the new employee
  $sql = "INSERT INTO Employee (fullname, contact_number, salary, username, email, password, address, status)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssdsssss", $fullname, $contact_number, $salary, $username, $email, $password, $address, $status);
  $stmt->execute();


  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "New employee added successfully";
  header("Location: /pharma-suite/employee/employee_list_page.php");
  exit();
}
