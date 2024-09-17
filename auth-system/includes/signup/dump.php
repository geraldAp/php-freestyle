<?php

$query = "INSERT INTO users (username , email , pwd) VALUES (?,?,?) ;";

$statement = $pdo->prepare($query);
// hashing the password 
$options = [
    "cost" => 12,
];
$hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
// after actually submitting the data 
$statement->execute([$username, $email, $hashed_pwd]);

$pdo = null;
$statement = null;

header("Location: ../index.php");
die();