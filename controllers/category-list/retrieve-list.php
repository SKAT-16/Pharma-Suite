<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/database/setup_conn.php";

$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT Category.id, Category.name, Category.description, COUNT(Medication.id) AS medicine_count
        FROM Category
        LEFT JOIN Medication ON Category.id = Medication.category_id AND Medication.stock_quantity > 0";

$params = [];
$types = '';

if (!empty($query)) {
    $query = "%{$query}%";
    $sql .= " WHERE Category.name LIKE ? 
              OR Category.description LIKE ?";
    $params = [$query, $query];
    $types = str_repeat('s', count($params)); // 's' for string type for all LIKE comparisons
}

$sql .= " GROUP BY Category.id, Category.name, Category.description";

$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
$categories = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}

$stmt->close();
$conn->close();
