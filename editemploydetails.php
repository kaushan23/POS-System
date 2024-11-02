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

$query = "SELECT * from register WHERE ID='" . $id . "'";
$result = mysqli_query($mysqli, $query) or die(mysqli_error());
$row_user = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Employee Details</title>
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
            <a href="reports.php"><img src="images/back.png" alt="back" style="margin-right:820px"></a>
            <br><br>
            <div style="color:#8107a0; font-size: 2.5vmax; font-weight: bold; text-align: center; margin-bottom:25px">
                Employee Details
            </div>
            <?php
            $status = "";
            if (isset($_POST['new']) && $_POST['new'] == 1) {
                $id = $_REQUEST['ID'];
                $update = "UPDATE register set id ='" . $_POST['id'] . "', name='" . $_POST['name'] . "', email='" . $_POST['email'] . "', user_type='" . $_POST['user_type'] . "', Status='".$_POST['Status']."' WHERE id='" . $_POST['id'] . "'";
                mysqli_query($mysqli, $update) or die(mysqli_error());
                $status = "<div class='alert alert-success'><strong>Success!</strong> Record Updated Successfully.</div></br><a href='employdetails.php'>View Updated Records</a>";
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
                        <label for="position">Position:</label>
                        <select class="form-select mt-3" id="position" name="user_type" placeholder="User_Type">
                            <option value="<?php echo $row_user['user_type']; ?>"><?php echo $row_user['user_type']; ?></option>
                            <option value="Admin">Admin</option>
                            <option value="Cashier">Cashier</option>
                        </select>
                        <!--<input type="text" class="form-control" id="position" placeholder="Position" name="Position" required>-->
                    </div>
                    <div class="col md-4 mb-4">
                        <label for="Name">Name:</label>
                        <input type="text" class="form-control" id="Name" placeholder="Name" name="name"
                               value="<?php echo $row_user['name']; ?>">
                    </div>
                    <div class="col md-4 mb-4">
                        <label for="Email">E-mail:</label>
                        <input type="email" class="form-control" id="Email" placeholder="Address" name="email"
                               value="<?php echo $row_user['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    </div>
                    <div class="col md-4 mb-4">
                        <label for="status">Status:</label>
                        <select class="form-select mt-3" id="status" name="Status" placeholder="Status">
                            <option value="<?php echo $row_user['Status']; ?>" hidden><?php echo $row_user['Status']; ?></option>
                            <option value="1">1</option>
                            <option value="0">0</option>
                        </select>

                        <!--<div class="col md-4 mb-4">
                        <label for="Contact">Contact:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">+94</span>
                            <input type="tel" class="form-control" id="Contact" placeholder="Contact" name="Contact"
                                   pattern="[0-9]{3}[0-9]{3}[0-9]{3}" value="<?php echo $row_user['Contact']; ?>">
                        </div>-->
                    </div>
                    <div class="col md-4 mb-4">
                        <input name="submit" type="submit" class="btn btn-primary mr-1" value="Update">
                        <a href="employdetails.php" class="btn btn-primary mr-1">Cancel</a>
                    </div>
                </div>
        </div>
    </div>
</div>
</body>

</html>
