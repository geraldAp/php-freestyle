<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usersearch = $_POST["usersearch"];
    try {
        // grabbing the connection for the data base 
        require_once "./includes/dbhinc.php";
        // creating our query with a named placeholder
        $query = "SELECT * FROM comments WHERE username LIKE :usersearch;";
        // preparing the data 
        $statement = $pdo->prepare($query);

        //  we bind the placeholder to the data
        $usersearch = '%' . $usersearch . '%'; // Using LIKE for partial matching
        $statement->bindParam(":usersearch", $usersearch, PDO::PARAM_STR);

        $statement->execute();
        // fetch all data as an associative array
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $statement = null;
    } catch (PDOException $e) {
        die("Error Message: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h3 {
            color: #333;
        }

        .result {
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .no-results {
            color: red;
            font-weight: bold;
        }

        .search-results {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="search-results">
        <h3>Search Results:</h3>
        <?php
        if (empty($results)) {
            echo "<div class='no-results'>No results found for your search.</div>";
        } else {
            foreach ($results as $result) {
                
                echo "<div class='result'>";
                echo "<strong>Username: </strong>" . htmlspecialchars($result['username']) . "<br>";
                echo "<strong>Comment: </strong>" . htmlspecialchars($result['comment_text']) . "<br>";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>

</html>
