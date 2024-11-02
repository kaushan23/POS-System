<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/LogIn.css">

</head>

<body>
<div class="container">
    <div class="wrapper">

        <div class="title"><span>Log In</span></div>
        <form action="login_action.php" method="POST" autocomplete="off">
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Username" onfocus="this.placeholder=''" required>
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" onfocus="this.placeholder=''" id="myInput"
                       required>

            </div>
            &nbsp;&nbsp;&nbsp;<input type="checkbox" onclick="showPassword()">Show Password
            <div class="row button">
                <input type="submit" value="Login">
                <a href="welcome.php"> <input type="button" value="Cancel"></a>
            </div>
        </form>
    </div>

    <div class="left">
        <img src="./images/bg.jpg">
        <div class="overlay">
            <i>E-MART</i>
        </div>
    </div>

</div>

<script>
    function showPassword() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</body>

</html>