<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/database/setup_conn.php";

// Medicine Sales Today (Total Number of Medicines Sold)
$sql = "SELECT SUM(quantity) AS total_medicines_sold
        FROM Transaction
        WHERE DATE(transaction_date) = CURDATE() AND transaction_type = 'SALE';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_medicines_sold = $row['total_medicines_sold'] ? $row['total_medicines_sold'] : 0;

// Transactions Today
$sql = "SELECT COUNT(*) AS total_transactions
        FROM Transaction
        WHERE DATE(transaction_date) = CURDATE();";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_transactions = $row['total_transactions'];

// Count of Available Medicines (not expired)
$currentDate = date('Y-m-d');
$sql = "SELECT COUNT(*) AS available_medicines_count
        FROM Medication
        WHERE stock_quantity > 0
        AND expiry_date >= '$currentDate';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$available_medicines_count = $row['available_medicines_count'];

// Count of Expired Medicines
$sql = "SELECT COUNT(*) AS expired_medicines_count
        FROM Medication
        WHERE expiry_date < CURDATE();";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$expired_medicines_count = $row['expired_medicines_count'];

// Total Number of Suppliers
$sql = "SELECT COUNT(*) AS total_suppliers FROM Supplier;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_suppliers = $row['total_suppliers'];

// Total Number of Employees
$sql = "SELECT COUNT(*) AS total_employees FROM Employee;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_employees = $row['total_employees'];

// Total Quantity of Medicine Sold
$sql = "SELECT SUM(quantity) AS total_medicine_sold
        FROM Transaction
        WHERE transaction_type = 'SALE';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_medicine_sold = $row['total_medicine_sold'] ? $row['total_medicine_sold'] : 0;

// Total Quantity of Medicines in Stock
$sql = "SELECT SUM(stock_quantity) AS total_medicine_in_stock FROM Medication;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_medicine_in_stock = $row['total_medicine_in_stock'] ? $row['total_medicine_in_stock'] : 0;

$conn->close();
?>