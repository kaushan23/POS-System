<?php
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Page</title>
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/welcome.css" type="text/css">

</head>
<body>
<header id="showcase">
    <h1>Welcome To The E-MART</h1>
    <a href="Login.php" class="button">Log In</a>
</header>

</body>
</html>


