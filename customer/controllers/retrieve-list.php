<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT id, fullname, contact_number, email, address
        FROM Customer";

$params = [];
$types = '';

if (!empty($query)) {
  $query = "%{$query}%";
  $sql .= " WHERE fullname LIKE ? 
              OR contact_number LIKE ?
              OR email LIKE ?
              OR address LIKE ?";
  $params = [$query, $query, $query, $query];
  $types = str_repeat('s', count($params)); // 's' for string type for all LIKE comparisons
}

$sql .= " ORDER BY Customer.fullname";

$stmt = $conn->prepare($sql);

if (!empty($params)) {
  $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
$customers = [];
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $customers[] = $row;
  }
}

$stmt->close();
$conn->close();
