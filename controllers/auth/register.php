<?php
include $_SERVER['DOCUMENT_ROOT']. "/pharma-suite/database/setup_conn.php";
session_start();

if (isset($_POST['register'])) {
  // Get form data
  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['cpassword'];
  
  // Check if passwords match
  if($password != $confirm_password) {
    $_SESSION['message'] = 'Passwords do not match';
    header("Location: /pharma-suite/pages/register_page.php");  
    exit();
  }
  $password = password_hash($password, PASSWORD_DEFAULT);
  
  // Check if username already exists
  $sql = "SELECT * FROM Employee WHERE username = ?;";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute() or die("Error: " . $sql . "<br>" . $conn->error);
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $_SESSION['message'] = 'Username already taken';
    header("Location: /pharma-suite/pages/register_page.php");
    exit();
  }

  // Insert user into database
  $sql = "INSERT INTO Employee(fullname, username, email, password) VALUES(?,?,?,?);";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssss", $fullname, $username, $email, $password);
  $stmt->execute() or die("Error: " . $sql . "<br>" . $conn->error);

  // Set session variables
  $sql = "SELECT id FROM Employee WHERE username = ?;";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute() or die("Error: " . $sql . "<br>" . $conn->error);
  $result = $stmt->get_result();

  $row = $result->fetch_assoc();
  $_SESSION['emp_id'] = $row['id'];
  header("Location: /pharma-suite/pages/dashboard_page.php");
}
?>