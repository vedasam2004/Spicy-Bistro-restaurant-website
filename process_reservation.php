<?php
// Database connection parameters
$servername = "localhost"; // Assuming localhost if using XAMPP
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password (if any, default is empty for XAMPP)
$dbname = "restaurant"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "connetion set";
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $date = $_POST['date'];
    $time = $_POST['time'];
    $people = $_POST['people'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // SQL query to insert data into the database table (assuming table name is `reservations`)
    $sql = "INSERT INTO reservation (date, time, people, name, phone, email)
            VALUES ('$date', '$time', '$people', '$name', '$phone', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation successfully booked.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>