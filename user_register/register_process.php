<?php
// Establish database connection (Replace with your database details)
include("../conn.php");

// Retrieve values from the registration form
$username = $_POST['username'];
$password = $_POST['password'];

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    // Registration successful, display alert and redirect to register.php
    echo "<script>alert('Registration successful!'); window.location='register.php';</script>";
    exit(); // Make sure to exit after displaying the alert

} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
