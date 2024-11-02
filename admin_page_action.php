<?php

@include 'config.php';



$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = $_POST['password'];
$hash = password_hash($pass,PASSWORD_DEFAULT);
$cpass = $_POST['cpassword'];
$user_type = $_POST['user_type'];

$select = " SELECT * FROM register WHERE email = '$email' && password = '$pass' ";

$result = mysqli_query($conn, $select);

if (mysqli_num_rows($result) > 0) {
    header('location:admin_page.php?messege=User Already registered');
   $error[] = 'user already exist!';

}
else {

    if ($pass != $cpass) {
        header('location:admin_page.php?messege=Passwords does not match');
        $error[] = 'password not matched!';
    } else {

//        Validate password strength
        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $number = preg_match('@[0-9]@', $pass);

        if ((!$uppercase) || (!$lowercase) || (!$number) || (strlen($pass)) < 8) {
            header('location:admin_page.php?messege=Passwords does not match');
        }else{
                $insert = "INSERT INTO register(name, email, password, user_type) VALUES('$name','$email','$hash','$user_type')";
                mysqli_query($conn, $insert);
                header('location:LogIn.php');
            }


    }
}

?>