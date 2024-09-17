<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function userFieldsExist($pdo, $username,$pwd)
{
    global $errors;
    $query = "SELECT username,pwd FROM users WHERE username = :username;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $username);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Check if the password is correct
        if (password_verify($pwd, $result['pwd'])) {
            // Password is correct
            return true;  // Return the user data
        } else {
            // Password is incorrect
            return false;  // Or handle the error
        }
    } else {
        // Username does not exist
        return false;
    }
}

function password_exists($pdo, $pwd)
{

    $query = "SELECT username FROM users WHERE pwd = :pwd;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":pwd", $pwd);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}
