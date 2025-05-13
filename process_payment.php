<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";  // Default XAMPP password for root is empty
$dbname = "restaurant";  // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$address = $_POST['address'];
$address = $_POST['name'];
$phoneno = $_POST['phoneno'];
$paymentMode = $_POST['paymentMode'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO orders (address,name, phoneno, payment_mode) VALUES ('$address',' $name', '$phoneno','$paymentMode')");


// Execute the statement
if ($stmt->execute() === TRUE) {
    echo "Order placed successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
