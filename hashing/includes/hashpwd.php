<?php

// for hashing password using php's hashing function

$pwd = "12345678";

// password_hash($pwd, PASSWORD_DEFAULT); //so with this if the password algo changes in php in the future you would get that change 

$options = [
    "cost"=> 12,
];
$hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT,$options); // this is the current algo being used and it is what default is using atm "this is what is recommended " the 3rd param is the salt round nb: the higher the cost the slower the hashing thus the harder it is to brute force the decryption usually the best is 10  
$login_pwd = "12345678";

// verifying the password with php's function 

$isItVerified = password_verify($login_pwd, $hashed_pwd) ? "true" : "false";

echo $isItVerified;