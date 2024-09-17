<?php

declare(strict_types=1);



function is_input_empty(string $username, string $pwd): bool
{
    if (empty($username) || empty($pwd)) {
        return true;
    } else {
        return false;
    };
}



function isValidUserFields($pdo, string $username, string $pwd)
{
  return  userFieldsExist($pdo, $username,$pwd);
}



function login_user($pdo, string $username, string $pwd) {

}
