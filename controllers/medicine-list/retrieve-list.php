<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/database/setup_conn.php";

// Retrieve Medicines in Stock
$sql = "SELECT Medication.name, Category.name AS category_name, Medication.expiry_date, Medication.stock_quantity, Medication.unit_price
        FROM Medication
        JOIN Category ON Medication.category_id = Category.id
        WHERE Medication.stock_quantity > 0";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$medicines = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $medicines[] = $row;
    }
    $stmt->close();
}

$conn->close();
?>