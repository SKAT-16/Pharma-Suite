<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

$employee_id = $_SESSION['emp_id'];

$sql = "SELECT fullname, position, contact_number, salary, username, email, address, profile_pic, status
            FROM Employee
            WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employee_id);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();
$stmt->close();
$conn->close();
