<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT Transaction.id, Medication.name AS medication_name, Employee.fullname AS employee_name, Customer.fullname AS customer_name, Supplier.name AS supplier_name, Transaction.transaction_date, Transaction.quantity, Transaction.transaction_type, Transaction.unit_price
        FROM Transaction
        LEFT JOIN Medication ON Transaction.medication_id = Medication.id
        LEFT JOIN Employee ON Transaction.employee_id = Employee.id
        LEFT JOIN Customer ON Transaction.customer_id = Customer.id
        LEFT JOIN Supplier ON Transaction.supplier_id = Supplier.id";

$params = [];
$types = '';

if (!empty($query)) {
  $query = "%{$query}%";
  $sql .= " WHERE Transaction.transaction_type LIKE ? 
              OR Medication.name LIKE ?
              OR Employee.fullname LIKE ?
              OR Customer.fullname LIKE ?
              OR Supplier.name LIKE ?
              OR Transaction.quantity LIKE ?
              OR Transaction.unit_price LIKE ?";
  $params = [$query, $query, $query, $query, $query, $query, $query];
  $types = str_repeat('s', count($params)); // 's' for string type for all LIKE comparisons
}

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
