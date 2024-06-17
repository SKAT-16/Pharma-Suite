<?php
$conn = mysqli_connect("localhost", "root", "") or die("Connection Failed: " . mysqli_connect_error());

mysqli_select_db($conn, "pharmacy_inventory") or die("Could not select database");

// Insert mock data into Category table
$sql = "INSERT INTO Category (name, description) VALUES
    ('Analgesics', 'Pain relief medications'),
    ('Antibiotics', 'Medications to fight bacterial infections'),
    ('Antivirals', 'Medications to fight viral infections'),
    ('Antifungals', 'Medications to treat fungal infections'),
    ('Antidepressants', 'Medications for treating depression'),
    ('Vitamins', 'Supplements for various health benefits'),
    ('Antihistamines', 'Medications to treat allergies'),
    ('Anti-inflammatory', 'Medications to reduce inflammation'),
    ('Antacids', 'Medications to neutralize stomach acid'),
    ('Antidiabetics', 'Medications to manage diabetes')";
$conn->query($sql) or die("Error inserting data into Category table: " . $conn->error);

// Insert mock data into Supplier table
$sql = "INSERT INTO Supplier (name, contact_person_name, contact_number, email, address) VALUES
    ('MedSupplies Inc.', 'John Doe', '123-456-7890', 'johndoe@medsupplies.com', '123 Main St'),
    ('PharmaWholesale Ltd.', 'Jane Smith', '987-654-3210', 'janesmith@pharmawholesale.com', '456 Elm St'),
    ('Healthcare Distributors', 'Mike Brown', '555-123-4567', 'mikebrown@healthcaredistributors.com', '789 Oak St'),
    ('Medical Supplies Co.', 'Sara Lee', '444-555-6666', 'saralee@medsuppliesco.com', '101 Pine St'),
    ('DrugStore Wholesale', 'Tom Hanks', '333-444-5555', 'tomhanks@drugstorewholesale.com', '202 Cedar St'),
    ('PharmaPlus Ltd.', 'Emma Watson', '222-333-4444', 'emmawatson@pharmaplus.com', '303 Birch St'),
    ('HealthFirst Suppliers', 'Chris Evans', '111-222-3333', 'chrisevans@healthfirst.com', '404 Spruce St'),
    ('MedDistributor Inc.', 'Robert Downey', '666-777-8888', 'robertdowney@meddistributor.com', '505 Maple St'),
    ('Wellness Supplies', 'Scarlett Johansson', '999-000-1111', 'scarlett@wellnesssupplies.com', '606 Willow St'),
    ('CarePlus Distributors', 'Chris Hemsworth', '888-999-0000', 'chris@careplus.com', '707 Pine St')";
$conn->query($sql) or die("Error inserting data into Supplier table: " . $conn->error);

// Insert mock data into Medication table
$sql = "INSERT INTO Medication (name, description, manufacturer, strength, dosage_form, expiry_date, stock_quantity, unit_price, supplier_id, category_id) VALUES
    ('Aspirin', 'Pain reliever and fever reducer', 'Bayer', '500mg', 'Tablet', '2024-12-31', 100, 0.10, 1, 1),
    ('Amoxicillin', 'Antibiotic', 'GlaxoSmithKline', '250mg', 'Capsule', '2024-11-30', 150, 0.20, 2, 2),
    ('Paracetamol', 'Pain reliever and fever reducer', 'Johnson & Johnson', '500mg', 'Tablet', '2024-10-31', 200, 0.15, 3, 1),
    ('Ibuprofen', 'Nonsteroidal anti-inflammatory drug', 'Pfizer', '400mg', 'Tablet', '2024-09-30', 120, 0.18, 4, 8),
    ('Cetirizine', 'Antihistamine', 'Novartis', '10mg', 'Tablet', '2024-08-31', 130, 0.12, 5, 7),
    ('Lisinopril', 'Antihypertensive', 'Merck', '10mg', 'Tablet', '2024-07-31', 140, 0.22, 6, 10),
    ('Simvastatin', 'Cholesterol-lowering medication', 'AstraZeneca', '20mg', 'Tablet', '2024-06-30', 160, 0.25, 7, 10),
    ('Metformin', 'Antidiabetic medication', 'Boehringer Ingelheim', '500mg', 'Tablet', '2024-05-31', 170, 0.30, 8, 10),
    ('Levothyroxine', 'Thyroid hormone replacement', 'AbbVie', '50mcg', 'Tablet', '2024-04-30', 180, 0.35, 9, 10),
    ('Fluoxetine', 'Antidepressant', 'Eli Lilly', '20mg', 'Capsule', '2024-03-31', 190, 0.40, 10, 5)";
$conn->query($sql) or die("Error inserting data into Medication table: " . $conn->error);

// Insert mock data into Employee table with a default password 123456
$default_passwd = "$2y$10$DZlnn72GPjwcTlE/CVBxn.X6iQI7WpoOnojsMZndP89Hl0xkVZeZS";
$sql = "INSERT INTO Employee (fullname, position, contact_number, salary, username, email, password, address, profile_pic, status) VALUES
    ('Alice Johnson', 'MANAGER', '111-222-3333', 55000.00, 'alice', 'alice@example.com', '$default_passwd', '123 Maple St', NULL, 'ACTIVE'),
    ('Bob Smith', 'EMPLOYEE', '222-333-4444', 45000.00, 'bob', 'bob@example.com', '$default_passwd', '456 Oak St', NULL, 'ACTIVE'),
    ('Carol White', 'EMPLOYEE', '333-444-5555', 35000.00, 'carol', 'carol@example.com', '$default_passwd', '789 Pine St', NULL, 'ACTIVE'),
    ('David Brown', 'EMPLOYEE', '444-555-6666', 47000.00, 'david', 'david@example.com', '$default_passwd', '101 Cedar St', NULL, 'INACTIVE'),
    ('Eva Green', 'EMPLOYEE', '555-666-7777', 36000.00, 'eva', 'eva@example.com', '$default_passwd', '202 Birch St', NULL, 'ACTIVE'),
    ('Frank Miller', 'MANAGER', '666-777-8888', 60000.00, 'frank', 'frank@example.com', '$default_passwd', '303 Spruce St', NULL, 'INACTIVE'),
    ('Grace Lee', 'EMPLOYEE', '777-888-9999', 48000.00, 'grace', 'grace@example.com', '$default_passwd', '404 Willow St', NULL, 'ACTIVE'),
    ('Hannah Davis', 'EMPLOYEE', '888-999-0000', 37000.00, 'hannah', 'hannah@example.com', '$default_passwd', '505 Elm St', NULL, 'ACTIVE'),
    ('Ivan Wilson', 'EMPLOYEE', '999-000-1111', 49000.00, 'ivan', 'ivan@example.com', '$default_passwd', '606 Pine St', NULL, 'INACTIVE'),
    ('Jackie Chan', 'EMPLOYEE', '000-111-2222', 38000.00, 'jackie', 'jackie@example.com', '$default_passwd', '707 Cedar St', NULL, 'ACTIVE')";
$conn->query($sql) or die("Error inserting data into Employee table: " . $conn->error);

// Insert mock data into Transaction table
$sql = "INSERT INTO Transaction (medication_id, employee_id, transaction_date, quantity, transaction_type, unit_price) VALUES
    (1, 1, '2023-01-15 10:00:00', 50, 'SALE', 0.10),
    (2, 2, '2024-01-16 11:00:00', 75, 'PURCHASE', 0.20),
    (3, 3, '2022-01-17 12:00:00', 100, 'SALE', 0.15),
    (4, 4, '2023-01-18 13:00:00', 60, 'SALE', 0.18),
    (5, 5, '2024-01-19 14:00:00', 65, 'PURCHASE', 0.12),
    (6, 6, '2024-01-20 15:00:00', 70, 'SALE', 0.22),
    (7, 7, '2025-01-21 16:00:00', 80, 'SALE', 0.25),
    (8, 8, '2021-01-22 17:00:00', 85, 'PURCHASE', 0.30),
    (9, 9, '2024-01-23 18:00:00', 90, 'SALE', 0.35),
    (10, 10, '2024-01-24 19:00:00', 95, 'SALE', 0.40)";
$conn->query($sql) or die("Error inserting data into Transaction table: " . $conn->error);

echo "Mock data inserted successfully!";
