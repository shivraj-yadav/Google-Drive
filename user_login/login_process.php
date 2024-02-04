<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT id, username, password, status FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $username, $stored_password, $status);

    if ($stmt->fetch()) {
        // Verify the password
        if ($password === $stored_password) {
            if ($status == 'approved') {
                // Login successful, set session variable
                session_start();
                $_SESSION['username'] = $username;

                // Redirect to the next page
                header("Location: ../welcome.php");
                exit();
            } else if ($status == 'denied') {
                // User has been denied access, handle accordingly (e.g., show a message)
                echo "Access denied. Please contact the administrator for more information.";
            } else {
                // User status is neither approved nor denied (e.g., 'pending')
                echo "<script>alert('Your account status is not yet approved. Please wait for administrator approval.');window.location='login.php';</script>";
                exit();
            }
        } else {
            // Invalid password
            echo "Invalid password.";
        }
    } else {
        // User not found
        echo "<script>alert('User not found.'); window.location.href = 'login.php';</script>";
        exit();
    }

    $stmt->close();
    $conn->close();
}
// Redirect or perform other actions after login process
// ...
?>
