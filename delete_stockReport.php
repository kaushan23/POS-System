<?php

$mysqli = new mysqli("localhost", "root", "", "emart");

if($mysqli == FALSE){
    die("ERROR: Could not connect.".$mysqli->connect_error);
}

$id = $_REQUEST['ID'];
$query = "DELETE FROM stock WHERE ID=$id";

$result = mysqli_query($mysqli, $query) or die(mysqli_error());

header("Location: stockReport.php");
