<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function loginInputs()
{
    // Check if username exists in session data and if there's an error for username taken
    if (isset($_SESSION["login_data"]["username"]) && isset($_SESSION["errors_login"]["invalid_credentials"])) {
        echo '<input type="text" id="username" name="username" placeholder="username" value="' . htmlspecialchars($_SESSION["login_data"]["username"]) . '">';
    } else {
        echo '<input type="text" id="username" name="username" placeholder="Username">';
    }
    echo ' <input type="password" id="password" name="pwd" placeholder="password">';
}


function check_login_errors()
{
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form_error">' . $error . '</p>';
        }
    } else if (isset($_GET["login"]) && $_GET["login"] === "success") {

        $success = $_GET["login"];

        echo '<p class="form_success">' . $success . '</p>';
    }
}
