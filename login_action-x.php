<?php

@include 'config.php';

$name = $_POST['name'];
$pass = ($_POST['password']);


$passwordhashed =   password_hash($pass, PASSWORD_DEFAULT) ;

echo $passwordhashed;
return "";

$select = " SELECT * FROM register WHERE name = '$name' && password = '$passwordhashed'";

$result = mysqli_query($conn, $select);
//$listen = array();
//while ($row = mysql_fetch_array($result)) {
//    $listen[] = "'". $row['login']. "'";
//}
if (mysqli_num_rows($result) === 0) {

    header('location:loginerror_page.php');

} else {
    $row = mysqli_fetch_assoc($result);
    session_start();
    if ($row['user_type'] == "admin") {

        $_SESSION['userid'] = $name;
        $_SESSION['type'] = "admin";

        header("Location:admin_page.php");
        exit();
    } elseif ($row['user_type'] == "cashier") {

        $_SESSION['userid'] = $name;
        $_SESSION['type'] = "cashier";

        header("Location:cashier_page.php");
        exit();
    }
}

//
//$HASH = password_hash($CLEAR, PASSWORD_DEFAULT);
//$VERIFIED = password_verify($CLEAR, $HASH);

?>
