<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/database/setup_conn.php";

$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT id, fullname, position, email, contact_number, salary, status
        FROM Employee";

$params = [];
$types = '';

if (!empty($query)) {
    $query = "%{$query}%";
    $sql .= " WHERE fullname LIKE ? 
              OR position LIKE ?
              OR email LIKE ?
              OR contact_number LIKE ?
              OR salary LIKE ?
              OR status LIKE ?";
    $params = [$query, $query, $query, $query, $query, $query];
    $types = str_repeat('s', count($params)); // 's' for string type for all LIKE comparisons
}

$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
$employees = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
}

$stmt->close();
$conn->close();
