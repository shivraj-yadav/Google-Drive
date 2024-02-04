<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include("conn.php");

// Retrieve the username from the session
$username = $_SESSION['username'];

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileName = basename($_FILES["file"]["name"]);
    $fileContent = file_get_contents($_FILES["file"]["tmp_name"]);

    // Insert file information into the database
    $stmt = $conn->prepare("INSERT INTO user_files (username, file_name, file_content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $fileName, $fileContent);

    if ($stmt->execute()) {
        echo "File uploaded successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
