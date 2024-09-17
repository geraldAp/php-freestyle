<?php 

declare(strict_types= 1);

function get_username(object $pdo, string $username ){
$query = "SELECT username FROM users WHERE username = :username ;";

$statement = $pdo->prepare($query);

$statement->bindParam(":username", $username);
$statement->execute();

$result = $statement->fetch(PDO::FETCH_ASSOC);
return $result;
};
 
function get_email(object $pdo, string $email ){
$query = "SELECT username FROM users WHERE email = :email ;";

$statement = $pdo->prepare($query);

$statement->bindParam(":email", $email);
$statement->execute();

$result = $statement->fetch(PDO::FETCH_ASSOC);
return $result;
};

function set_user(object $pdo, string $username, string $pwd ,string $email){
$query = "INSERT INTO users (username , pwd , email ) VALUES (?,?,?)";

$statement = $pdo->prepare($query);

// hashing the password 
$options = [
    "cost"=> 10,
];
$hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT,$options);

$statement->execute([$username,$hashed_pwd, $email]);
};