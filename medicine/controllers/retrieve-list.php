<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

$query = isset($_GET['query']) ? $_GET['query'] : '';
$sql = "SELECT Medication.id, Medication.name, Category.name AS category_name, Supplier.name AS supplier_name, Medication.expiry_date, Medication.stock_quantity, Medication.unit_price
            FROM Medication
            JOIN Category ON Medication.category_id = Category.id
            JOIN Supplier ON Medication.supplier_id = Supplier.id";

$params = [];
$types = '';

if (!empty($query)) {
    $query = "%{$query}%";
    $sql .= " WHERE (Medication.name LIKE ? 
                    OR Category.name LIKE ?
                    OR Supplier.name LIKE ?
                    OR Medication.expiry_date LIKE ?
                    OR Medication.stock_quantity LIKE ?
                    OR Medication.unit_price LIKE ?)";
    $params = [$query, $query, $query, $query, $query, $query];
    $types = "ssssss";
}

$sql .= " ORDER BY Medication.name";

$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
$medicines = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $medicines[] = $row;
    }
}

$stmt->close();
$conn->close();
