<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT id, fullname, position, email, contact_number, address, salary, status
        FROM Employee WHERE position != 'Manager'";

$params = [];
$types = '';

if (!empty($query)) {
    $query = "%{$query}%";
    $sql .= " AND (fullname LIKE ? 
              OR position LIKE ?
              OR email LIKE ?
              OR contact_number LIKE ?
              OR address LIKE ?
              OR salary LIKE ?
              OR status LIKE ?)";
    $params = [$query, $query, $query, $query, $query, $query, $query];
    $types = str_repeat('s', count($params));
}

$sql .= " ORDER BY Employee.fullname";

$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
$employees = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        if ($row['id'] != $_SESSION['emp_id'] || ($row['position'] != $_SESSION['position']))
            $employees[] = $row;
    }
}

$stmt->close();
$conn->close();
