<?php
// session should be secure to one users browser so people cannot steal it and access the info elsewhere.

// session use only cookies (any session id can only be passed using the session cookies and not through urls in your website.) 


// seting the ini 
// mandatory that this should be in your website if you have anything to do with sessions 
ini_set('session.use_only_cookies', 1); // setting use only cookie value to 1 that is true 1 is true 0 is false basically
ini_set('session.use_strict_mode', 1); // we make sure the website only uses a session id that has been created by the website.

// creating the session cookie parameters 
session_set_cookie_params([
    'lifetime' => 1800,   // Session cookie lifetime (in seconds).
    'domain'   => 'localhost',  // Domain for which the cookie is valid.
    'path'     => '/',    // Path on the domain where the cookie is valid.
    'secure'   => true,   // Sends the cookie only over HTTPS.
    'httponly' => true,   // Ensures the cookie is only accessible through HTTP(S), not JavaScript.
]);

// starting the session
session_start();


// regenerating a much stronger session id
if (!isset($_SESSION['last_regeneration'])) {
    session_regenerate_id(true);
    $SESSION['last_regeneration'] = time();
} else {
    $interval = 60 * 30;

    if (time() - $_SESSION['last_regeneration'] >= $interval) {
        session_regenerate_id(true);
        $SESSION['last_regeneration'] = time();
    }
}
