<?php
$conn = mysqli_connect("localhost", "root", "") or die("Connection Failed: " . mysqli_connect_error());

$sql = "DROP DATABASE IF EXISTS pharmacy_inventory";
$conn->query($sql) or die("Error dropping database: " . $conn->error);

$sql = "CREATE DATABASE IF NOT EXISTS pharmacy_inventory";
$conn->prepare($sql)->execute() or die("Error creating database: " . $conn->error);

mysqli_select_db($conn, "pharmacy_inventory");

$sql = "CREATE TABLE IF NOT EXISTS Category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);";
$conn->prepare($sql)->execute() or die("Error creating category table: " . $conn->error);

$sql = "CREATE TABLE IF NOT EXISTS Supplier (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    contact_person_name VARCHAR(255) NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL
);";
$conn->prepare($sql)->execute() or die("Error creating supplier table: " . $conn->error);

$sql = "CREATE TABLE IF NOT EXISTS Medication (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    manufacturer VARCHAR(255) NOT NULL,
    strength VARCHAR(50),
    dosage_form VARCHAR(50) NOT NULL,
    expiry_date DATE NOT NULL,
    stock_quantity INT NOT NULL,
    unit_price DECIMAL(10, 2) NOT NULL,
    supplier_id INT NOT NULL,
    category_id INT NOT NULL,
    FOREIGN KEY (supplier_id) REFERENCES Supplier(id),
    FOREIGN KEY (category_id) REFERENCES Category(id)
);";
$conn->prepare($sql)->execute() or die("Error creating medication table: " . $conn->error);

$sql = "CREATE TABLE IF NOT EXISTS Employee (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    position VARCHAR(20),
    contact_number VARCHAR(20),
    salary DECIMAL(10, 2),
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    profile_pic BLOB DEFAULT NULL,
    status VARCHAR(50) DEFAULT 'INACTIVE'
);";
$conn->prepare($sql)->execute() or die("Error creating employee table: " . $conn->error);

$sql = "CREATE TABLE IF NOT EXISTS Customer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    contact_number VARCHAR(20),
    email VARCHAR(255),
    address VARCHAR(255)
);";
$conn->prepare($sql)->execute() or die("Error creating customer table: " . $conn->error);

$sql = "CREATE TABLE IF NOT EXISTS Transaction (
    id INT AUTO_INCREMENT PRIMARY KEY,
    medication_id INT NOT NULL,
    employee_id INT NOT NULL,
    customer_id INT DEFAULT NULL,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    quantity INT NOT NULL,
    FOREIGN KEY (medication_id) REFERENCES Medication(id),
    FOREIGN KEY (employee_id) REFERENCES Employee(id),
    FOREIGN KEY (customer_id) REFERENCES Customer(id)
);";
$conn->prepare($sql)->execute() or die("Error creating transaction table: " . $conn->error);

echo "Database setup successful!";
