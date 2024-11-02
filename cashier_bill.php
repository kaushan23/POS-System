<?php

@include 'config.php';

$order = $_POST['name'];
$date = $_POST['password'];
$total = $_POST['user'];

$data = "INSERT INTO order_tab(order_no,date,total)
     VALUES ('$order','$date','$total')";
if (mysqli_query($conn, $data)) {
    header("Location:cashier_page.php");
    exit();
    // echo "New record has been added successfully !";
} else {
    echo "Error: " . $data . ":-" . mysqli_error($conn);
}
mysqli_close($conn);

?>

<?php

@include 'config.php';

?>
