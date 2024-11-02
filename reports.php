<?php
@include 'admin_authorization.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Reports</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/list.css">
</head>

<body>
<div class="container">
    <div class="wrapper">
        <div class="bkimg">
            <a href="admin_page.php">
                <img src="images/back.png" alt="back">
            </a>
        </div>
        <br>
        <div class="title"><span>Reports</span></div>
        <div class="button">
            <div class="d-grid gap-5">
                <a href="dailysales.php" class="btn btn-primary">View Sales Report</a>
                <a href="stockReport.php" class="btn btn-primary">View Stock Level Report</a>
                <a href="employdetails.php" class="btn btn-primary">View Employ Details</a>
            </div>
        </div>
    </div>
    <div class="left">
        <img src="images/bg.jpg">
        <div class="overlay">
            <i>E-MART</i>
        </div>
    </div>
</body>

</html>