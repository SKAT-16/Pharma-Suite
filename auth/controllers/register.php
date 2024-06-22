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
  $sql = "INSERT INTO Employee(fullname, username, email, password, position) VALUES(?,?,?,?,'Unassigned');";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssss", $fullname, $username, $email, $password);
  $stmt->execute() or die("Error: " . $sql . "<br>" . $conn->error);


  $_SESSION['message'] = 'You need verification by the Manager after registration!';
  $conn->close();
  header("Location: /pharma-suite/auth/login_page.php");
  exit();
}
