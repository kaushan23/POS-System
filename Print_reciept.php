<?php

@include 'config.php';

$idlist = explode (",", $_POST["idlist"]);
$namelist = explode (",", $_POST["namelist"]);
$quantitycl =explode (",", $_POST["quantitycl"]);
$productprice =explode (",", $_POST["productprice"]);
$totalin =explode (",", $_POST["totalin"]);
$phonenumber = $_POST["phonenumber"];




//updating stocks
$total = 0;
for ($i = 0; $i < count($idlist); $i++) {
    $select = " SELECT * FROM stock WHERE Item_Code = '$idlist[$i]'";
    $result = mysqli_query($conn, $select);

    $isEligibleDiscounts = false;
    $total = $total + (int) $totalin[$i];
    if (mysqli_num_rows($result) !== 0) {
        //product already in stocks
        $row = mysqli_fetch_assoc($result);
        $totalSOld = $quantitycl[$i] + $row['Qty_Sold'];

        $sql = "UPDATE stock SET Qty_Sold='$totalSOld '  WHERE Item_Code=$idlist[$i]";
        if (mysqli_query($conn, $sql)) {
            // echo "New record has been added successfully !";
            //echo "updated";
        }else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }

    }else{
        //product should add
        $data = "INSERT INTO stock( Item_Code, Name, Qty_Purchased, Qty_Sold	)
            VALUES ('$idlist[$i]','$namelist[$i]',0,'$quantitycl[$i]')";
        if (mysqli_query($conn, $data)) {
            // echo "New record has been added successfully !";
        }
        else {
            echo "Error: " . $data . ":-" . mysqli_error($conn);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/Print_receipt.css">
    <style>@page { size: A5 }</style>

</head>
<body onload="script();">

<div class="container">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="invoice-container">
                        <div class="invoice-header">

                            <!-- Row end -->
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <a href="#" class="invoice-logo">
                                        E-Mart
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <address class="text-right">
                                        No:201/5,<br>
                                        Kaballagoda,<br>
                                        Horana
                                    </address>
                                </div>
                            </div>
                            <!-- Row end -->
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                    <div class="invoice-details">
                                        <address>
                                            Samantha Rathnayaka<br>
                                            Kaballagoda, Horana,
                                        </address>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                    <div class="invoice-details">
                                        <div class="invoice-num">
                                            <div>Invoice - #001</div>
                                            <div>January 30th 2023</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                        <div class="invoice-body">
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table custom-table m-0">
                                            <thead>
                                                <tr>
                                                    <th>Product name</th>
                                                    <th>Quantity</th>
                                                    <th>Unit price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                for ($i=0; $i < count($idlist) ; $i++) {
                                                    $total = $total + ((int) $totalin[$i]);
                                                    echo "<tr><td>" . $namelist[$i] . "</td><td>" . $quantitycl[$i] . "</td><td>" . $productprice[$i] . "</td><td>". $totalin[$i] . "</td></tr>";
                                                }
                                                ?>

                                                <?php

                                                    $select = " SELECT * FROM loyalty_card WHERE Phone_Number = '$phonenumber'";

                                                    $result = mysqli_query($conn, $select);
                                                    $isEligibleDiscounts = false;
                                                    if (mysqli_num_rows($result) !== 0) {
                                                     $isEligibleDiscounts = true;
                                                    }

                                                $discount = 0;
                                                ?>

                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td colspan="2">
                                                        <p>
                                                            Subtotal<br>
                                                            Discount<br>
                                                        </p>
                                                        <h5 class="text-success"><strong>Grand Total</strong></h5>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            Rs:<?php echo $total; ?><br>
                                                            Rs:<?php if ($isEligibleDiscounts) {
                                                                $discount = $total / 100 * 5;
                                                                echo $discount;
                                                            } else {
                                                                echo 0.00;
                                                            }?><br>
                                                        </p>
                                                        <h5 class="text-success"><strong> <?php echo $total - $discount;?> </strong></h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function script()
    {window.print()}

</script>
</body>
</html>


<?php

//updating daily stock report
$todayname = date('D', strtotime(date("Y/m/d") ));
$query = "SELECT * from daily_sales WHERE Day='" . $todayname . "'";
$result = mysqli_query($conn, $query);
$row_user = mysqli_fetch_assoc($result);

$update = "UPDATE daily_sales set  Rs='" . $row_user['Rs']  + ($total - $discount) . "' WHERE Day='" . $todayname . "'";
mysqli_query($conn, $update);


//updating monthly stock report
$thismonth = date('M', strtotime(date("Y/m/d") ));
$query = "SELECT * from monthly_sales WHERE Month='" . $thismonth . "'";
$result = mysqli_query($conn, $query);
$row_user = mysqli_fetch_assoc($result);

$update = "UPDATE monthly_sales set  Rs='" . $row_user['Rs']  + ($total - $discount) . "' WHERE Month='" . $thismonth . "'";
mysqli_query($conn, $update);


//updating yearly stock report
$thisyear = date('Y', strtotime(date("Y/m/d") ));
$query = "SELECT * from yearly_sales WHERE Year='" . $thisyear . "'";
$result = mysqli_query($conn, $query);
$row_user = mysqli_fetch_assoc($result);

$update = "UPDATE yearly_sales set  Rs='" . $row_user['Rs']  + ($total - $discount) . "' WHERE Year='" . $thisyear . "'";
mysqli_query($conn, $update);

?>