<?php

@include 'config.php';

$name = $_POST['name'];
$pass = ($_POST['password']);



$passwordhashed =   password_hash($pass, PASSWORD_DEFAULT) ;

$result = mysqli_query($conn," SELECT * FROM register where name = '$name' AND Status =1");

$isfound  = false;
$foundrow  = array();
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    if( password_verify( $pass,  $row[3]) ){
        $isfound = true;
        $foundrow = $row;
        break;
    }
}

if ($isfound == false) {

    header('location:loginerror_page.php');

} else {

    session_start();
    if ($foundrow[4] == "admin") {

        $_SESSION['userid'] = $name;
        $_SESSION['type'] = "admin";

        header("Location:admin_page.php");
        exit();
    } elseif ($foundrow[4] == "cashier") {

        $_SESSION['userid'] = $name;
        $_SESSION['type'] = "cashier";

        header("Location:cashier_page.php");
        exit();
    }
}

?>
