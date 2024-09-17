<?php

ini_set("session.use_only_cookies", 1);
ini_set("session.use:strict_mode", 1);

session_set_cookie_params([
    "lifetime" => 1800,
    "domain" => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true,
]);

// starting the session
session_start();


// regenerating a much stronger session id last regeneration is simply a session var it's up to you to name it wat you want 
if (!isset($_SESSION['last_regeneration'])) {
    regenerate_session_id();
} else {
    $interval = 60 * 30;

    if (time() - $_SESSION['last_regeneration'] >= $interval) {
        regenerate_session_id();
    }
}

function regenerate_session_id()
{
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}
