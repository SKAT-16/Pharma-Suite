<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pharma-suite/_database/setup_conn.php";

// Mock data for Category table
$sql = "INSERT INTO Category (name, description) VALUES
    ('Antibiotics', 'Used to treat infections'),
    ('Pain Relief', 'Used to relieve pain'),
    ('Vitamins', 'Used to supplement diet'),
    ('Antidepressants', 'Used to treat depression'),
    ('Antihistamines', 'Used to treat allergies'),
    ('Antacids', 'Used to neutralize stomach acid'),
    ('Anti-diabetics', 'Used to treat diabetes'),
    ('Antifungals', 'Used to treat fungal infections'),
    ('Vaccines', 'Used to prevent diseases'),
    ('Antivirals', 'Used to treat viral infections')";
$conn->prepare($sql)->execute() or die("Error inserting data into category table: " . $conn->error);

// Mock data for Supplier table
$sql = "INSERT INTO Supplier (name, contact_person_name, contact_number, email, address) VALUES
    ('ABC Pharma', 'John Doe', '1234567890', 'john@abcpharma.com', '123 Street, City'),
    ('XYZ Meds', 'Jane Smith', '0987654321', 'jane@xyzmeds.com', '456 Avenue, City'),
    ('Global Health', 'Alice Johnson', '1122334455', 'alice@globalhealth.com', '789 Boulevard, City'),
    ('MediCorp', 'Bob Brown', '6677889900', 'bob@medicorp.com', '101 Road, City'),
    ('HealthPlus', 'Charlie Green', '2233445566', 'charlie@healthplus.com', '202 Drive, City'),
    ('LifeCare', 'David Black', '3344556677', 'david@lifecare.com', '303 Lane, City'),
    ('PharmaDirect', 'Eve White', '4455667788', 'eve@pharmadirect.com', '404 Path, City'),
    ('Wellness Inc', 'Frank Blue', '5566778899', 'frank@wellnessinc.com', '505 Way, City'),
    ('HealthFirst', 'Grace Yellow', '6677889900', 'grace@healthfirst.com', '606 Street, City'),
    ('MedSupply', 'Hank Red', '7788990011', 'hank@medsupply.com', '707 Avenue, City')";
$conn->prepare($sql)->execute() or die("Error inserting data into supplier table: " . $conn->error);

// Mock data for Medication table
$sql = "INSERT INTO Medication (name, description, manufacturer, strength, dosage_form, expiry_date, stock_quantity, unit_price, supplier_id, category_id) VALUES
    ('Amoxicillin', 'Antibiotic for infections', 'Pharma Inc', '500mg', 'Tablet', '2025-12-31', 100, 10.50, 1, 1),
    ('Ibuprofen', 'Pain reliever', 'HealthCo', '200mg', 'Tablet', '2024-11-30', 200, 5.25, 2, 2),
    ('Vitamin C', 'Dietary supplement', 'VitaminWorld', '1000mg', 'Tablet', '2026-01-01', 150, 8.00, 3, 3),
    ('Sertraline', 'Antidepressant', 'Pharma Inc', '50mg', 'Tablet', '2025-09-15', 120, 12.75, 4, 4),
    ('Loratadine', 'Allergy relief', 'HealthCo', '10mg', 'Tablet', '2024-10-10', 180, 7.50, 5, 5),
    ('Omeprazole', 'Acid reducer', 'Pharma Inc', '20mg', 'Capsule', '2025-08-20', 160, 9.00, 6, 6),
    ('Metformin', 'Diabetes medication', 'HealthCo', '500mg', 'Tablet', '2024-07-25', 130, 6.00, 7, 7),
    ('Fluconazole', 'Antifungal', 'Pharma Inc', '150mg', 'Tablet', '2025-06-30', 140, 14.25, 8, 8),
    ('Influenza Vaccine', 'Flu prevention', 'Vaccine Corp', '0.5mL', 'Injection', '2026-05-01', 50, 20.00, 9, 9),
    ('Acyclovir', 'Antiviral', 'Pharma Inc', '400mg', 'Tablet', '2025-04-15', 110, 15.00, 10, 10)";
$conn->prepare($sql)->execute() or die("Error inserting data into medication table: " . $conn->error);

// Mock data for Employee table
$sql = "INSERT INTO Employee (fullname, position, contact_number, salary, username, email, password, address, profile_pic, status) VALUES
    ('John Doe', 'Manager', '1234567890', 60000.00, 'johndoe', 'john@example.com', '" . password_hash('1', PASSWORD_DEFAULT) . "', '123 Main St, City', NULL, 'ACTIVE'),
    ('Jane Smith', 'Pharmacist', '0987654321', 55000.00, 'janesmith', 'jane@example.com', '" . password_hash('1', PASSWORD_DEFAULT) . "', '456 Oak St, City', NULL, 'ACTIVE'),
    ('Alice Johnson', 'Cashier', '1122334455', 30000.00, 'alicejohnson', 'alice@example.com', '" . password_hash('1', PASSWORD_DEFAULT) . "', '789 Pine St, City', NULL, 'INACTIVE'),
    ('Bob Brown', 'Technician', '6677889900', 40000.00, 'bobbrown', 'bob@example.com', '" . password_hash('1', PASSWORD_DEFAULT) . "', '101 Maple St, City', NULL, 'ACTIVE'),
    ('Charlie Green', 'Manager', '2233445566', 62000.00, 'charliegreen', 'charlie@example.com', '" . password_hash('1', PASSWORD_DEFAULT) . "', '202 Elm St, City', NULL, 'ACTIVE'),
    ('David Black', 'Pharmacist', '3344556677', 56000.00, 'davidblack', 'david@example.com', '" . password_hash('1', PASSWORD_DEFAULT) . "', '303 Cedar St, City', NULL, 'INACTIVE'),
    ('Eve White', 'Cashier', '4455667788', 31000.00, 'evewhite', 'eve@example.com', '" . password_hash('1', PASSWORD_DEFAULT) . "', '404 Birch St, City', NULL, 'ACTIVE'),
    ('Frank Blue', 'Technician', '5566778899', 42000.00, 'frankblue', 'frank@example.com', '" . password_hash('1', PASSWORD_DEFAULT) . "', '505 Spruce St, City', NULL, 'ACTIVE'),
    ('Grace Yellow', 'Pharmacist', '6677889900', 57000.00, 'graceyellow', 'grace@example.com', '" . password_hash('1', PASSWORD_DEFAULT) . "', '606 Fir St, City', NULL, 'ACTIVE'),
    ('Hank Red', 'Cashier', '7788990011', 32000.00, 'hankred', 'hank@example.com', '" . password_hash('1', PASSWORD_DEFAULT) . "', '707 Ash St, City', NULL, 'INACTIVE')";
$conn->prepare($sql)->execute() or die("Error inserting data into employee table: " . $conn->error);

// Mock data for Customer table
$sql = "INSERT INTO Customer (fullname, contact_number, email, address) VALUES
    ('Emma Brown', '1231231234', 'emma@example.com', '123 Green St, City'),
    ('Liam Smith', '2342342345', 'liam@example.com', '234 Blue St, City'),
    ('Olivia Johnson', '3453453456', 'olivia@example.com', '345 Red St, City'),
    ('Noah Williams', '4564564567', 'noah@example.com', '456 Yellow St, City'),
    ('Ava Jones', '5675675678', 'ava@example.com', '567 Orange St, City'),
    ('Isabella Brown', '6786786789', 'isabella@example.com', '678 Purple St, City'),
    ('Sophia Garcia', '7897897890', 'sophia@example.com', '789 White St, City'),
    ('Mason Martinez', '8908908901', 'mason@example.com', '890 Black St, City'),
    ('Mia Lee', '9019019012', 'mia@example.com', '901 Pink St, City'),
    ('James Gonzalez', '0120120123', 'james@example.com', '012 Cyan St, City')";
$conn->prepare($sql)->execute() or die("Error inserting data into customer table: " . $conn->error);

// Mock data for Transaction table
$sql = "INSERT INTO Transaction (medication_id, employee_id, customer_id, supplier_id, transaction_date, quantity, transaction_type, unit_price) VALUES
    (1, 1, 1, NULL, '2024-06-16 10:00:00', 5, 'SALE', 10.50),
    (2, 2, 2, NULL, '2024-06-16 11:00:00', 10, 'SALE', 5.25),
    (3, 3, 3, NULL, '2024-06-16 12:00:00', 8, 'SALE', 8.00),
    (4, 4, 4, NULL, '2024-06-16 13:00:00', 6, 'SALE', 12.75),
    (5, 5, 5, NULL, '2024-06-16 14:00:00', 7, 'SALE', 7.50),
    (6, 6, 6, NULL, '2024-06-16 15:00:00', 9, 'SALE', 9.00),
    (7, 7, 7, NULL, '2024-06-16 16:00:00', 4, 'SALE', 6.00),
    (8, 8, 8, NULL, '2024-06-16 17:00:00', 5, 'SALE', 14.25),
    (9, 9, 9, NULL, '2024-06-16 18:00:00', 3, 'SALE', 20.00),
    (10, 10, 10, NULL, '2024-06-16 19:00:00', 6, 'SALE', 15.00),
    (1, 1, NULL, 1, '2024-06-15 10:00:00', 50, 'PURCHASE', 10.50),
    (2, 2, NULL, 2, '2024-06-15 11:00:00', 100, 'PURCHASE', 5.25),
    (3, 3, NULL, 3, '2024-06-15 12:00:00', 75, 'PURCHASE', 8.00),
    (4, 4, NULL, 4, '2024-06-15 13:00:00', 60, 'PURCHASE', 12.75),
    (5, 5, NULL, 5, '2024-06-15 14:00:00', 80, 'PURCHASE', 7.50),
    (6, 6, NULL, 6, '2024-06-15 15:00:00', 90, 'PURCHASE', 9.00),
    (7, 7, NULL, 7, '2024-06-15 16:00:00', 55, 'PURCHASE', 6.00),
    (8, 8, NULL, 8, '2024-06-15 17:00:00', 70, 'PURCHASE', 14.25),
    (9, 9, NULL, 9, '2024-06-15 18:00:00', 40, 'PURCHASE', 20.00),
    (10, 10, NULL, 10, '2024-06-15 19:00:00', 65, 'PURCHASE', 15.00)";
$conn->prepare($sql)->execute() or die("Error inserting data into transaction table: " . $conn->error);

echo "Mock data insertion successful!";
