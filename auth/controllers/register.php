<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['cpassword'];

  // Check if passwords match
  if ($password != $confirm_password) {
    $_SESSION['message'] = 'Passwords do not match';
    $conn->close();
    header("Location: /pharma-suite/auth/register_page.php");
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
    $conn->close();
    header("Location: /pharma-suite/auth/register_page.php");
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
  $_SESSION['fullname'] = $row['fullname'];
  $_SESSION['position'] = $row['position'];
  $conn->close();
  header("Location: /pharma-suite/dashboard/dashboard_page.php");
  exit();
}
