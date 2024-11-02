<?php
require('cashier_authorization.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php
@include 'config.php';
$query = "select * from item where Status =1";
$result = mysqli_query($conn, $query);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Item Page</title>
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/item_table.css">
</head>
<body class="body1">
<input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Search Items  by name.."
       title="Type a item">
<table class="table1" id="myTable">
    <tr class="tr1">
        <th class="th1">Id</th>
        <th class="th1">Name</th>
        <th class="th1">Price</th>
        <th class="th1">Stock</th>
    </tr>
    <?php
    while ($rows = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td class="td1"><?php echo $rows['id']; ?></td>
        <td class="td1"><?php echo $rows['name']; ?></td>
        <td class="td1"><?php echo $rows['price']; ?></td>
        <td class="td1"><?php echo $rows['stock']; ?></td>
        <?php
        }
        ?>
</table>
<a href="cashier_page.php">
    <button class="bckbtton" type="submit">Back to Cashier Page</button>
</a>


<script>
    function searchFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</body>
</html>
