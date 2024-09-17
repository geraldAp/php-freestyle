<?php
 

 $sensitiveData = "Gerald";
 $salt = bin2hex(random_bytes(16));
 $pepper = 'ASECRETEPEPPERSTRINGHEHEHEHEHEHE'; //fuse salt and pepper to get a stronger encryption

 echo $salt . "\n";

 $dataToHash = $sensitiveData . $salt . $pepper;
 $hash = hash('sha256', $dataToHash); //sha256 is the hashing algorithm 

 echo $hash ."\n";

// verifying the password 
$storedSalt = $salt;
$storedHash = $hash; 
$pepper_2 = 'ASECRETEPEPPERSTRINGHEHEHEHEHEH';

$dataToHash_2 = $sensitiveData . $storedSalt . $pepper_2;

$verification_hash = hash('sha256', $dataToHash_2);

$isItVerified = $storedHash === $verification_hash;

echo "Is Verified: " . ($isItVerified ? 'true' : 'false') . "\n";