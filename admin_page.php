<?php
require('admin_authorization.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Page</title>
  <link rel = "icon" type = "image/x-icon" href = "./images/logo.png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/Admin.css">
</head>
<body>

    <div class="title">
    <h1>ADMIN PAGE <img src="images/logout.png" class="profile" onclick="logout()" style="width: 25px; height: 25px; margin-left: 430px;"/></h1>
    </div>


    <div class="grid-container padding-0">
      <div class="grid-item"><a href="#" class="button1">Add Employee</a></div>
      <div class="grid-item"><a href="Add_Item.php" class="button2">Add Item</a></div>
      <div class="grid-item"><a href="reports.php" class="button3">Reports</a></div>
    </div>
<div class="container">
    <div class="wrapper">
      <div class="title"><span>Register</span></div>
        <div style="color:red;text-align: center"><?php if(isset($_GET["messege"])){echo $_GET["messege"];} ?></div>
      <form action="admin_page_action.php" method = "POST">


        <div class="row">
          <input type="text" name="name" placeholder="Name" id="input"  required>
        </div>

        <div class="row">           
            <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email"  required>
          </div>

          <div class="row">
            <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                   placeholder="Password"  required>
          </div>

          <div class="row">
            <input type="password" name="cpassword" placeholder="Confirm Your Password"  required>
          </div>

          <div class="row">
          <label for="user">
            <h3 class="Ttitle">Choose a User:</h3>
          </label>
            <select name="user_type" class="user">
              <option value="admin">Admin</option>
              <option value="cashier">Cashier</option>
            </select>
           </div>
           <br>
          <br>
       
        <p class="para">already have an account? <a href="LogIn.php">login now</a></p>
        <div class="row button">
          <input type="submit" value="Create Account">
        </div>
    </form>
    </div>
    <div class="left">
        <img src="./images/bg.jpg" >
        <div class="overlay">
            <i>E-MART</i>
		  </div>
	</div>

</div>

<script>
    function logout(){
        if(confirm("Do you want to log out?")){
            location.href='welcome.php';
        }
    }

    function alphaOnly(event) {
        var value = String.fromCharCode(event.which);
        var pattern = new RegExp(/[a-zA-Z]/i);
        return pattern.test(value);
    }

    $('#input').bind('keypress', alphaOnly);

</script>
 
</body>
</html>
