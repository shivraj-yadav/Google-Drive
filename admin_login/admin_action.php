<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['approve']) || isset($_POST['deny'])) {
        $user_id = $_POST['user_id'];
        $action = isset($_POST['approve']) ? 'approved' : 'denied';

        // Update the user's status based on the action
        $updateSql = "UPDATE users SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("si", $action, $user_id);
        $stmt->execute();

        // Delete the user if the action is 'denied'
        if ($action == 'denied') {
            $deleteSql = "DELETE FROM users WHERE id = ?";
            $deleteStmt = $conn->prepare($deleteSql);
            $deleteStmt->bind_param("i", $user_id);
            $deleteStmt->execute();
            $deleteStmt->close();
        }

        // Redirect back to the admin dashboard after the action
        header("Location: admin_dashboard.php");
        exit();
    }
}

// Redirect if accessed directly without proper POST data
header("Location: admin_dashboard.php");
exit();
?>
