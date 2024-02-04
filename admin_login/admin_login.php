<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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
            position: relative; /* Added position relative to the body */
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            transition: border-color 0.3s ease-in-out;
            font-size: 16px;
        }

        input[type="button"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            font-size: 18px;
            font-weight: bold;
        }

        input[type="button"]:hover {
            background-color: #45a049;
        }

        form:hover {
            transform: scale(1.02);
        }

        input:focus {
            outline: none;
            border-color: #4caf50;
        }

        p {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        p a {
            color: #4caf50;
            text-decoration: none;
            font-weight: bold;
        }

        p a:hover {
            text-decoration: underline;
        }

        /* Admin login button styles */ 
        #admin-login {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        #admin-login a {
            color: #4caf50;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
<form method="post">
        <h2>Admin Login</h2>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required autocomplete="off" autocapitalize="on">
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required autocomplete="off">
        
        <input type="button" value="Login" onclick="admin_login()">
    </form>
</body>
<script>
    function admin_login() {
        u = document.getElementById("username").value;
        p = document.getElementById("password").value;

        if (u == "shiv" && p == "123") {
            window.location.assign("admin_dashboard.php");
        }
        else
        {
            alert("Please enter a valid username or password");
            
        }
    }
</script>
</html>
