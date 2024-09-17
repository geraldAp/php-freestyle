<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        // grabbing the connection for the data base 

        require_once "../dbhinc.php";
        require_once "login_model.inc.php";
        require_once 'login_controller.inc.php';

        // ERROR HANDLERS 
        $errors = [];

        if (is_input_empty($username, $pwd)) {
            $errors["empty_input"] = "Kindly fill in all inputs";
        }

        if (!isValidUserFields($pdo, $username, $pwd)) {
            $errors["invalid_credentials"] = "Username or Password is not correct";
        }

        require_once '../config.session.php';

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            $loginData = [
                "username" => $username,
            ];
            $_SESSION["login_data"] = $loginData;
            header("Location: ../../pages/login.php");
            die();
        }

        // create_user($pdo, $username, $pwd, $email);
        $_SESSION["login_status"] = "verified";
        header("Location: ../../pages/welcome_page.php?login=success");


        $pdo = null;
        $statement = null;
    } catch (PDOException $e) {
        die("Error Message : " . $e->getMessage());
    }
} else {
    header("Location: ../../pages/login.php");
    die();
};
