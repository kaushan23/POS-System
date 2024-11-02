<?php
require('admin_authorization.php');
?>



<?php
$mysqli = new mysqli("localhost", "root", "", "emart");

//check connection
if ($mysqli == FALSE) {
    die("ERROR: Could not connect." . $mysqli->connect_error);
}

$id = $_GET['ID'];

$query = "SELECT * from item WHERE id='".$id."'";
$result = mysqli_query($mysqli, $query);
$row_user = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Edit Stock</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <!--BOOTSTRAP PLUGIN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/editemployee.css">
</head>

<body>
<div class="cont">
    <div class="row">
        <div class="table-responsive" style="padding:10px">
            <a href="reports.php"><img src="images/back.png" alt="back" style="margin-right:820px; margin-top:25px"></a>
            <div style="color:#8107a0; font-size: 2.5vmax; font-weight: bold; text-align: center; margin-bottom:0px">
                Edit Stock Details
            </div>
            <?php
            $status = "";
            if (isset($_POST['new']) && $_POST['new'] == 1) {
                $id = $_REQUEST['ID'];
                $update = "UPDATE item SET id='". $_POST['id']."', name='".$_POST['name'] ."', price='".$_POST['price'] ."', stock='". $_POST['stock']."', Status='" .$_POST['Status']."' WHERE id='".$_POST['id']."'";
                mysqli_query($mysqli, $update);
                $status = "<div class='alert alert-success'><strong>Success!</strong> Record Updated Successfully.</div><a href='stockReport.php'>View Updated Records</a>";
                echo $status;
            } else {
            } ?>

            <form action="" method="POST">
                <div class="form-row">
                    <div class="col md-4 mb-4">
                        <input type="hidden" name="new" value="1"/>
                        <input name="id" type="text" value="<?php echo $row_user['id']; ?>" hidden="">
                    </div>
                    <div class="col md-4 mb-4">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                               value="<?php echo $row_user['name']; ?>">
                    </div>
                    <div class="col md-4 mb-4">
                        <label for="QtyInStock">Qty Purchased:</label>
                        <input type="number" class="form-control" id="QtyInStock" placeholder="Qty In Stock"
                               name="stock" value="<?php echo $row_user['stock']; ?>">
                    </div>
                    <div class="col md-4 mb-4">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" id="price" placeholder="Price"
                               name="price" value="<?php echo $row_user['price']; ?>">
                    </div>
                    <div class="col md-4 mb-4">
                        <label for="status">Status:</label>
                        <select class="form-select mt-3" id="status" name="Status" placeholder="Status">
                            <option value="<?php echo $row_user['Status']; ?>" hidden><?php echo $row_user['Status']; ?></option>
                            <option value="1">1</option>
                            <option value="0">0</option>
                        </select>
                    </div>


                    <div class="col md-4 mb-4">
                        <input name="submit" type="submit" class="btn btn-primary mr-1" value="Update">
                        <a href="stockReport.php" class="btn btn-primary mr-1">Cancel</a>
                    </div>
                </div>
        </div>
    </div>
</div>
</body>

</html>
