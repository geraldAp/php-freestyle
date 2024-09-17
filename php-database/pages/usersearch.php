<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .search-form {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .search-form label {
            font-size: 14px;
            display: block;
            margin-bottom: 5px;
        }

        .search-form input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            width: 200px;
        }

        .search-form button {
            padding: 8px 12px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .search-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <form class="search-form" action="../search.php" method="POST">
        <label for="search">Search for users:</label>
        <input type="text" id="search" name="usersearch" placeholder="Search...">
        <button type="submit">Search</button>
    </form>
</body>

</html>
