<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$employee_id = $_SESSION['emp_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the updated employee data from the form submission
  $fullname = $_POST['fullname'];
  $contact_number = $_POST['contact_number'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $address = $_POST['address'];

  // Handle image upload
  if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == UPLOAD_ERR_OK) {
    // Ensure the uploads directory exists
    $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/uploads";
    if (!is_dir($uploads_dir)) {
      mkdir($uploads_dir, 0755, true);
    }

    $file_tmp_path = $_FILES["profile_pic"]["tmp_name"];
    $file_name = basename($_FILES["profile_pic"]["name"]);
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_name = uniqid() . '.' . $file_extension;
    $target_file = $uploads_dir . '/' . $new_file_name;

    // Debugging information
    echo "Temporary file path: $file_tmp_path<br>";
    echo "Target file path: $target_file<br>";

    if (move_uploaded_file($file_tmp_path, $target_file)) {
      $profile_pic = "/pharma-suite/uploads/" . $new_file_name;
    } else {
      $error = $_FILES["profile_pic"]["error"];
      echo "Error uploading file. Error code: $error<br>";
      echo "Error details: ";
      print_r(error_get_last());
      exit();
    }
  } else {
    // Retrieve the existing profile picture from the database
    $sql = "SELECT profile_pic FROM Employee WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $profile_pic = $row['profile_pic'];
    $stmt->close();
  }

  // Update the employee data in the database
  if (!empty($password)) {
    $sql = "UPDATE Employee SET fullname = ?, contact_number = ?, username = ?, email = ?, password = ?, address = ?, profile_pic = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $fullname, $contact_number, $username, $email, $password, $address, $profile_pic, $employee_id);
  } else {
    $sql = "UPDATE Employee SET fullname = ?, contact_number = ?, username = ?, email = ?, address = ?, profile_pic = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $fullname, $contact_number, $username, $email, $address, $profile_pic, $employee_id);
  }
  $stmt->execute();
  $stmt->close();

  $conn->close();
  header("Location: /pharma-suite/setting/setting_page.php");
  exit();
}
