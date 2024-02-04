<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Application</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        .container a {
            text-decoration: none;
            font-size: 24px;
            margin: 20px;
            padding: 10px 20px;
            border: 1px solid #4caf50;
            border-radius: 5px;
            color: #4caf50;
            background-color: #fff;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .container a:hover {
            background-color: #4caf50;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome to Your Application</h2>
        <a href="user_login/login.php">Login</a>
        <a href="user_register/register.php">Register</a>
    </div>
</body>
</html>
