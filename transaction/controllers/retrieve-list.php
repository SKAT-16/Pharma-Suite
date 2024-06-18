<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT Transaction.id, Medication.name AS medication_name, Employee.fullname AS employee_name, Customer.fullname AS customer_name, Supplier.name AS supplier_name, Transaction.transaction_date, Transaction.quantity
        FROM Transaction
        LEFT JOIN Medication ON Transaction.medication_id = Medication.id
        LEFT JOIN Employee ON Transaction.employee_id = Employee.id
        LEFT JOIN Customer ON Transaction.customer_id = Customer.id
        LEFT JOIN Supplier ON Medication.supplier_id = Supplier.id";

$params = [];
$types = '';
$conditions = [];

if (!empty($query)) {
  $query_string = "%{$query}%";
  $conditions[] = "(Medication.name LIKE ? OR Employee.fullname LIKE ? OR Customer.fullname LIKE ? OR Supplier.name LIKE ?)";
  $params = array_merge($params, [$query_string, $query_string, $query_string, $query_string]);
  $types .= 'ssss';

  if (is_numeric($query)) {
    $conditions[] = "Transaction.quantity >= ?";
    $params[] = $query;
    $types .= 'i';
  }
}

if (!empty($conditions)) {
  $sql .= " WHERE " . implode(" OR ", $conditions);
}

$sql .= " ORDER BY Transaction.transaction_date";

$stmt = $conn->prepare($sql);

if (!empty($params)) {
  $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
$transactions = [];
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $transactions[] = $row;
  }
}

$stmt->close();
$conn->close();
