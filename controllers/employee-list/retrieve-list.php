<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/database/setup_conn.php";

// Retrieve Employees
$sql = "SELECT id, fullname, position, email, contact_number, salary, status
        FROM Employee";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$employees = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
    $stmt->close();
}

$conn->close();
?>