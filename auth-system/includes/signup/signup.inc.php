<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        // grabbing the connection for the data base 

        require_once "../dbhinc.php";
        require_once "signup_model.inc.php";
        require_once "signup_controller.inc.php";


        // ERROR HANDLERS 
        $errors = [];

        if (is_input_empty($username, $pwd, $email)) {
            $errors["empty_input"] = "Kindly fill in all inputs";
        }

        if (is_email_valid($email)) {
            $errors["invalid_email"] = "Invalid email used ";
        }

        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "kindly create another username as this already exist ";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_registered"] = "kindly use another email as this already exists or login into account ";
        }

        require_once '../config.session.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;
            header("Location: ../../index.php");
            die();
        }

        create_user($pdo, $username, $pwd, $email);
        header("Location: ../../index.php?signup=success");
        $pdo = null;
        $statement = null;
    } catch (PDOException $e) {
        die("Error Message : " . $e->getMessage());
    }
} else {
    header("Location: ../../index.php");
    die();
};
