<?php
@include 'admin_authorization.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Item Page</title>
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/Add-Item.css">

</head>
<body>
<div class="container">
    <div class="wrapper">
        <div class="bkimg">
            <a href="admin_page.php">
                <img src="./images/back.png" alt="back">
            </a>
        </div>
        <div class="title"><span>Add Item</span></div>
        <form action="Add_Item_action.php" method="POST">
            <div class="row">
                <input type="text" name="name" placeholder="Name"  id="input" required>
            </div>
            <div class="row">
                <input type="number" placeholder="Price" name="price" min="1"  required  >
            </div>
            <div class="row">
                <input type="number" placeholder="Stock" name="stock" min="1" required>
            </div>

            <div class="row button">
                <input type="submit" value="Add">
                <input type="reset" value="Cancel">
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
    function alphaOnly(event) {
        var value = String.fromCharCode(event.which);
        var pattern = new RegExp(/[a-zA-Z]/i);
        return pattern.test(value);
    }

    $('#input').bind('keypress', (alphaOnly));
</script>

</body>
</html>
