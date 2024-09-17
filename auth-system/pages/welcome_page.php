<?php
require_once '../includes/config.session.php';
if (!isset($_SESSION['login_status']) && $_SESSION['login_status'] !== 'verified') {
header("Location : ./login.php ");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Body Styles */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        }

        /* Welcome Container Styles */
        .welcome-container {
            text-align: center;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }

        /* Heading Styles */
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #333;
        }

        /* Paragraph Styles */
        p {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 30px;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            font-size: 1.1em;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="welcome-container">
        <h1>Welcome to Our Website</h1>
        <p>We're glad to have you here! Explore and enjoy.</p>
    </div>
</body>

</html>