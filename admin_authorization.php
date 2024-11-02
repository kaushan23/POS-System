<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header('location: ./LogIn.php');
    }
    if( $_SESSION["type"] !== "admin" ){
        header('location: ./unauthorized.php');
    }
?>





