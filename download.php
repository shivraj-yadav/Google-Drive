<?php
include("conn.php");

// Retrieve the file ID from the URL
$fileId = $_GET['id'];

// Fetch file information from the database
$sql = "SELECT * FROM user_files WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $fileId);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Set the appropriate headers for PDF download
    header("Content-Type: application/pdf");
    header("Content-Disposition: attachment; filename=" . $row['file_name']);
    header("Content-Length: " . strlen($row['file_content']));

    // Output the file content
    echo $row['file_content'];
} else {
    echo "File not found.";
}

$conn->close();
?>
