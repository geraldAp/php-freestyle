<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$username = $_POST["username"];
$pwd = $_POST["pwd"];
$email = $_POST["email"];
$id = 2;  
try {
// grabbing the connection for the data base 
require_once "dbhinc.php";
// creating our query thus the ? which are the unnamed place holders 
$query = "UPDATE users SET username = ? , pwd = ? , email = ? WHERE id = ? ;";
// preparing the data 
$statement = $pdo->prepare($query);
// after actually submiting the data 
$statement->execute([$username, $pwd, $email, $id]);

$pdo = null;
$statement = null;

header("Location: ../index.php");
die();
}catch (PDOException $e) {
    die("Error Message : ". $e->getMessage());
}
}else{
    header("Location: ../index.php");
    exit;
};