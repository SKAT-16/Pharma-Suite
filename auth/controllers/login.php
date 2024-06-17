<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";
session_start();

if (isset($_POST['login'])) {
  // Get form data
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check if user exists and password is correct
  $sql = "SELECT id, fullname, position, password FROM Employee WHERE username = ?;";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute() or die("Error: " . $sql . "<br>" . $conn->error);
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      $_SESSION['emp_id'] = $row['id'];
      $_SESSION['fullname'] = $row['fullname'];
      $_SESSION['postion'] = $row['position'];
      header("Location: /pharma-suite/dashboard/dashboard_page.php");
      exit();
    }
  }

  // Redirect to login page with error message
  $_SESSION['message'] = 'Invalid username or password';
  header("Location: /pharma-suite/auth/login_page.php");
}