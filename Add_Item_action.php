<?php

@include 'config.php';

$name = $_POST['name'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$data = "INSERT INTO item(name,price,stock)
     VALUES ('$name','$price','$stock')";
if (mysqli_query($conn, $data)) {
    header("Location:Add_Item.php");
    exit();
    // echo "New record has been added successfully !";
} else {
    echo "Error: " . $data . ":-" . mysqli_error($conn);
}
mysqli_close($conn);
?>
