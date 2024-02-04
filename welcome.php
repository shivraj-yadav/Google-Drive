<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: user_login/login.php");
    exit();
}

include("conn.php");

// Retrieve the username from the session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, <?php echo $username; ?></title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 30px;
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
    <h2>Welcome, <?php echo $username; ?>!</h2>

    <form action="pdf_view/view_files.php" method="post">
        <button type="submit">View Files</button>
    </form>

    <form action="pdf_upload/upload_file.php" method="post" enctype="multipart/form-data">
        <button type="submit">Upload File</button>
    </form>

    <p><a href="logout.php">Logout</a></p>
</body>
</html>
