<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .calculator {
            width: 60%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .display {
            width: 100%;
            height: 40px;
            margin-bottom: 10px;
            background-color: #f1f1f1;
            text-align: right;
            padding: 10px;
            font-size: 18px;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        button {
            padding: 15px;
            font-size: 18px;
            border: none;
            background-color: #eee;
            border-radius: 5px;
            cursor: pointer;
        }

        button:active {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <!-- now the action here we are using a super global and sending the data to the same page thus the $_SERVER["PHP_SELF"] -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="number" name="num01" required placeholder="number one">
        <select name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="num02" required placeholder="Number two">
        <button type="submit">Calculate</button>

    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // grabbing data 
        $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_INT); // doing this to sanitize the input to ensure we avoid malicious code injection 
        $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_INT);
        $operator = htmlspecialchars($_POST["operator"]);


        // error handling 
        $errors = false;
        if (empty($num01) || empty($num02) || empty($operator)) {
            echo "";
            $errors = true;
        }
        if (!is_numeric($num01) || !is_numeric($num02) || !is_string($operator)) {
            $errors = true;
        }


        // calculate the numbers if no errors 
        $result = null;

        if (!$errors) {
            switch ($operator) {
                case 'add':
                    $result = $num01 + $num02;
                    break;
                case 'subtract':
                    $result = $num01 - $num02;
                    break;
                case 'multiply':
                    $result = $num01 * $num02;
                    break;
                case 'divide':
                    if ($num02 !== 0) {
                        $result = $num01 / $num02;
                    } else {
                        echo "<p class='calc-error'>Division by 0 not allowed </p>";
                    }
                    break;
                default:
                    echo "<p class='calc-error'>error error error person </p>";
                    break;
            }

            echo ' <p class="calc-result"> Result =' . $result . "</p>";
        }
    }
    ?>
</body>

</html>