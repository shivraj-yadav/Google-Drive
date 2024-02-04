<!-- admin_dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>

<h2>Admin Dashboard</h2>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include '../conn.php';
    $sql = "SELECT id, username, status FROM users WHERE status = 'pending'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['username']}</td>";
        echo "<td>{$row['status']}</td>";
        echo "<td class='action-buttons'>
                <form method='post' action='admin_action.php'>
                    <input type='hidden' name='user_id' value='{$row['id']}'>
                    <button type='submit' onclick='confirmation()' name='approve'>Approve</button>
                    <button type='submit' onclick='confirmation()' name='deny'>Deny</button>
                </form>
                <script type='text/javascript'>function confirmation(){
                    a=confirm('Are you sure you want to');
                    if(a==true)
                    window.location.assign('admin_action.php');
                    else
                    window.location.assign('admin_dashboard.php');
                }</script>
              </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

</body>
</html>
