<?php

@include 'config.php';


   $Name = $_POST['Name'];
   $NIC = $_POST['NIC'];
   $Phone_Number = $_POST['Phone_Number'];
   $Address =$_POST['Address'];
   $Stock = $_POST['Stock'];
   echo "$NIC";
   $data = "INSERT INTO  loyalty_card(Name, NIC, Phone_Number, Address, Stock) VALUES('$Name','$NIC','$Phone_Number','$Address','$Stock')";


   if (mysqli_query($conn, $data)) {
      header("Location:cashier_page.php");
      exit();
   }
   else {
      echo "Error: " . $data . ":-" . mysqli_error($conn);
   }
   mysqli_close($conn);

?>
