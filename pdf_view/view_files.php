<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../user_login/login.php");
    exit();
}

include("../conn.php");

// Retrieve the username from the session
$username = $_SESSION['username'];

// Fetch user's PDF files from the database
$sql = "SELECT * FROM user_files WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View PDF Files</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }

        a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #2078bc;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        body {
            animation: fadeIn 0.8s ease;
        }
    </style>
</head>
<body>
    <h2>PDF Files for <?php echo $username; ?></h2>

    <table>
        <tr>
            <th>File Name</th>
            <th>Upload Time</th>
            <th>Action</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['file_name'] . "</td>";
            echo "<td>" . $row['upload_timestamp'] . "</td>";
            echo "<td><a href='../download.php?id=" . $row['id'] . "'>Download</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <p><a href="../logout.php">Logout</a></p>
</body>
</html>
