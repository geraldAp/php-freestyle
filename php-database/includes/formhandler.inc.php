<?php
// ensuring there user actually submitted this form before going into this page so if the user doesn't submit the fom they shouldn't be able to access this page . 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Grabbing user data.
// so usually i would use the html special char sanitization method but i am not in this case since actually aren't going to spit this data out to the web browser.
$username = $_POST["username"];
$pwd = $_POST["pwd"];
$email = $_POST["email"];

try {
// grabbing the connection for the data base 
require_once "dbhinc.php";
// creating our query thus the ? which are the unnamed place holders 
$query = "INSERT INTO users (username , pwd,email) VALUES (?,?,?);";
// preparing the data 
$statement = $pdo->prepare($query);
// after actually submiting the data 
$statement->execute([$username, $pwd, $email]);

// manually close the statement and close the connection the connection closes auto but it's a best practice thing to close it.
$pdo = null;
$statement = null;
// for now go back to the main page the data has been sent basically so yh 
header("Location: ../index.php");
die();
}catch (PDOException $e) {
    // outing the error message and terminating the entire script with the die inbuilt function from php
    die("". $e->getMessage());
}
}else{
    // send the user back to this page 
    header("Location: ../index.php");
    exit;
};