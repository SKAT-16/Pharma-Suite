<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/database/setup_conn.php";

// Retrieve Categories and the count of medicines in stock for each category
$sql = "SELECT Category.id, Category.name, Category.description, COUNT(Medication.id) AS medicine_count
        FROM Category
        LEFT JOIN Medication ON Category.id = Medication.category_id AND Medication.stock_quantity > 0
        GROUP BY Category.id, Category.name, Category.description";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$categories = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
    $stmt->close();
}

$conn->close();
?>