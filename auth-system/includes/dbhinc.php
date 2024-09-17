<?php 
declare(strict_types= 1);
// dsn (data source name) we telling our app what data source we are using 

$dsn = "mysql:host=localhost;dbname=my_firstdb"; // the database driver we are using and the host we are on 
$dbusername = "root";
$dbpassword = "";

// it is 
try{
$pdo = new PDO($dsn, $dbusername, $dbpassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//bassically saying if we get an error we what to throw an exeption
}catch(PDOException $e){
die("Connection failed" . $e->getMessage());
}