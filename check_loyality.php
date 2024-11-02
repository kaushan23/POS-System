<?php

@include 'config.php';

$phonenum = $_GET["phonenum"];

$select = " SELECT * FROM loyalty_card WHERE Phone_Number = '$phonenum'";

$result = mysqli_query($conn, $select);

if (mysqli_num_rows($result) !== 0) {
    echo "hasloyality";
} else {
    echo "doesnt";
}
?>