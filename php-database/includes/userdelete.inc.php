<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = 5;  
try {
// grabbing the connection for the data base 
require_once "dbhinc.php";
// creating our query thus the :id which are the named place holders 
$query = "DELETE FROM users WHERE id = :id ;";
// preparing the data 
$statement = $pdo->prepare($query);

//  we bind the place holder names to the data before submitting the data finally
$statement->bindParam(":id", $id, PDO::PARAM_INT);

$statement->execute();

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