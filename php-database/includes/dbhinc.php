<?php 
declare(strict_types= 1);
// dsn (data source name) we telling our app what data source we are using 

$dsn = "mysql:host=localhost;dbname=my_firstdb"; // the database driver we are using and the host we are on 
$dbusername = "root";
$dbpassword = "";


try{
// running a pdo(php data objects (very flexible to connecting to other databases)) connection a way to connect to the db this create a database object object that we are going to use for the connection as seen takes in some params and all based on the dsn , username and password.
$pdo = new PDO($dsn, $dbusername, $dbpassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//bassically saying if we get an error we what to throw an exeption
}catch(PDOException $e){
echo "Connection failed" . $e->getMessage();
}