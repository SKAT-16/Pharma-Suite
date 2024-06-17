<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT id, name, contact_person_name, contact_number, email, address
        FROM Supplier";

$params = [];
$types = '';

if (!empty($query)) {
    $query = "%{$query}%";
    $sql .= " WHERE name LIKE ? 
              OR contact_person_name LIKE ?
              OR contact_number LIKE ?
              OR email LIKE ?
              OR address LIKE ?";
    $params = [$query, $query, $query, $query, $query];
    $types = str_repeat('s', count($params)); // 's' for string type for all LIKE comparisons
}

$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
$suppliers = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $suppliers[] = $row;
    }
}

$stmt->close();
$conn->close();
