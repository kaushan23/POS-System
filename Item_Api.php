<?php
header('Access-Control-Allow-Origin: *');
@include 'config.php';
$query = "select * from item where Status= 1 and id=" . $_GET["id"];
$result = mysqli_query($conn, $query);
$json = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($json);
?>