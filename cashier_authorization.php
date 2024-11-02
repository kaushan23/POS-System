<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: ./LogIn.php');
}
if ($_SESSION["type"] !== "cashier") {
    header('location: ./unauthorized.php');
}
?>
