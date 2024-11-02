<!DOCTYPE html>
<html lang="en">

<?php
@include 'config.php';
$query = "select * from reciept_details";
$result = mysqli_query($conn, $query);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receipt_Page</title>
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/receipt.css">
</head>
<body class="body1">
<table class="table">
    <tr class="tr1">
        <th class="th1">Name</th>
        <th class="th1">Quantity</th>
        <th class="th1">Unit Price</th>
    </tr>
    <?php
    while ($rows = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td class="td1"><?php echo $rows['Name']; ?></td>
        <td class="td1"><?php echo $rows['Quantity']; ?></td>
        <td class="td1"><?php echo $rows['Uprice']; ?></td>
        <?php
        }
        ?>
</table>
<label>Total: <input type="float" name="Total"></label>
</body>
</html>
