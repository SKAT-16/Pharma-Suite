<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/database/setup_conn.php";

// Retrieve Suppliers
$sql = "SELECT id, name, contact_person_name, contact_number, email, address
        FROM Supplier";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$suppliers = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $suppliers[] = $row;
    }
    $stmt->close();
}

$conn->close();
?>