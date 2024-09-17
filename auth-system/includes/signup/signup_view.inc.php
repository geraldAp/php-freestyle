<?php

declare(strict_types=1);


function signup_inputs()
{
    // Check if username exists in session data and if there's an error for username taken
    if (isset($_SESSION["signup_data"]["username"]) && isset($_SESSION["errors_signup"]["username_taken"])) {
        echo '<input type="text" id="username" name="username" placeholder="username" value="' . htmlspecialchars($_SESSION["signup_data"]["username"]) . '">';
    } else {
        echo '<input type="text" id="username" name="username" placeholder="Username">';
    }

    // Check if email exists in session data and if there's any email-related error
    if (isset($_SESSION["signup_data"]["email"]) && isset($_SESSION["errors_signup"]["email_registered"]) || isset($_SESSION["errors_signup"]["invalid_email"])) {
        echo '<input type="email" id="email" name="email" placeholder="email" value="' . htmlspecialchars($_SESSION["signup_data"]["email"]) . '">';

    } else {
        echo '<input type="email" id="email" name="email" placeholder="email">';
    }
    echo ' <input type="password" id="password" name="pwd" placeholder="password">';
}
function check_signup_errors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];


        echo "<br>";


        foreach ($errors as $error) {
            echo '<p class="form_error">' . $error . '</p>';
        }

        unset($_SESSION['errors_signup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        $success = $_GET["signup"];

        echo '<p class="form_success">' . $success . '</p>';
    }
}
