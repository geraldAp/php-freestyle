
<?php
// to make the server know ohw there is a session going in this webpage so we need to attach a session id cookie on the browser so the server can pinpoint which user it is accessing this website 
session_start();


$_SESSION["username"] = "Gerald";

// unset($_SESSION["username"]);
// session_unset(); //deletes all session data
// session_destroy(); //purges the sessions for the page it is in but not all the pages 


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo $_SESSION["username"]

    ?>
</body>

</html>