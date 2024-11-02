<?php
require('cashier_authorization.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cashier page</title>
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="./css/Cashier.css">

    <script type="text/javascript">
        function addRows() {
            var table = document.getElementById('cashier1');
            var rowCount = table.rows.length;
            var cellCount = table.rows[1].cells.length;
            var row = table.insertRow(rowCount);
            for (var i = 0; i <= cellCount; i++) {
                var cell = 'cell' + i;
                cell = row.insertCell(i);
                var copycel = document.getElementById('col' + i).innerHTML;
                cell.innerHTML = copycel;
            }
        }

        function deleteRows() {
            var table = document.getElementById('cashier1');
            var rowCount = table.rows.length;
            if (rowCount > '3') {
                var row = table.deleteRow(rowCount - 1);
                rowCount--;
            } else {
                alert('There should be atleast one row');
            }
        }


    </script>


</head>

<body onload=display_ct();>
<div class="main">
    <div class="top">
        <div class="pic">
            <img src="./images/logo.png" alt="logo" class="logo">
        </div>
        <div class="titl">
            <h1>E-Mart</h1>
        </div>
        <div style="width: 220px;">
            <p style="padding-right:20px;"><span id='ct5'></span></p>
            <img src="images/logout.png" class="profile" onclick="logout()"
                 style="width: 25px; height: 25px; margin-left: 150px; margin-top: 30px;"/>
        </div>
    </div>
    <div class="bottom">
        <div class="left ">
            <table id="cashier1">
                <tr class="row1">

                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Unit price(Rs.)</th>
                    <th>Total(Rs.)</th>
                </tr>
                <tr>
                    <td id="col0"><input min="1" id="inputid" class="idc" type="number" name="id[]"  value="" required
                                         onkeyup="fetchdata(this)"/></td>
                    <td id="col1" class="productNametd"><input class="productName" type="text" name="name[]" required disabled/>
                    </td>
                    <td id="col2"><input type="number" class="quantitycl" name="quantity[]" value="" required
                                         onkeyup="calculateTotal(this)"/></td>
                    <td id="col3" class="productpricetd"><input class="productprice" type="number" name="uprice[]"
                                                                value="" required disabled/></td>
                    <td id="col4"><input type="number" class="totalin" name="total[]" value="" required disabled/></td>

                </tr>
            </table>
            <div>
                <td><input type="button" class="table_row_button" value="Add Row" onclick="buttonadd()"/></td>
                <td><input type="button" class="table_row_button" value="Delete Row" onclick="deleteRows()"/></td>
            </div>
            <div class="total">
                <div class="sdtleft">

                    <h2 class="txt">Sub Total : </h2>
                    <h2 class="txt">Phone number(Loyality) : </h2>
                    <h2 class="txt">Total : </h2>

                </div>
                <div class="sdtright">
                    <input class="input subtotalinp" type="text" maxlength="50" disabled>
                    <input class="input TelNO " onkeyup="checkloyality(this)" type="text" maxlength="10"
                           placeholder="Loyalty card TelNo"  id="phonenumbinp">
                    <select name="discount" id="discount" onchange="checkloyality(this)" >
                        <option value="0">0%</option>
                        <option value="2">2%</option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="20">20%</option>
                    </select>
                    <input class="input" type="text" id="totalfinal" disabled>
                </div>
            </div>
            <div class="down_butto">
                <pre><button class="butto" type="submit" style="font-size:24px" onClick="printRecipet()">PRINT RECEIPT <i class="fa fa-print"></i></button><a href="Item_table.php"><input type="submit" value="Item Details" class="button_2"></a></pre>
            </div>
        </div>
        <div class="right">
            <img src="./images/bg.jpg" class="background" alt="backgroun">
            <div class="wrapper">
                <div class="title"><span>Loyalty Card</span></div>
                <form action="Cashier_page_action.php" method="POST">
                    <div class="row">
                        <label>
                            <input type="text" placeholder="Name" id="input"  name="Name"  required>
                        </label>
                    </div>
                    <div class="row">
                        <label>
                            <input type="tel" placeholder="NIC" pattern="[0-9]{12}" title="Please enter valid NIC Number"  name="NIC" required>
                        </label>
                    </div>
                    <div class="row">
                        <label>
                            <input type="tel" placeholder="PhoneNumber"
                                   name="Phone_Number" pattern="[0-9]{10}" title="Please enter exactly 10 digits" required>
                        </label>
                    </div>
                    <div class="row">
                        <label>
                            <input type="text" placeholder="Address" name="Address"
                                   required>
                        </label>
                    </div>

                    <div class="row button">
                        <input type="submit" value="Add">
                        <input type="reset" value="Cancel">
                    </div>
                    <form>
            </div>
        </div>
    </div>
</div>

<script>
    function display_ct5() {
        var x = new Date()
        var ampm = x.getHours() >= 12 ? ' PM' : ' AM';

        var x1 = x.getMonth() + 1 + "/" + x.getDate() + "/" + x.getFullYear();
        x1 = x1 + " - " + x.getHours() + ":" + x.getMinutes() + ":" + x.getSeconds() + ":" + ampm;
        document.getElementById('ct5').innerHTML = x1;
        display_c5();
    }

    function display_c5() {
        var refresh = 1000; // Refresh rate in milli seconds
        mytime = setTimeout('display_ct5()', refresh)
    }

    display_c5()

    function fetchdata(inpelem) {
        var trobj = $(inpelem).parent();
        $.ajax({
            url: "http://localhost/project/Item_Api.php?id=" + inpelem.value, success: function (result) {
                var decodedres = JSON.parse(result)
                console.log(decodedres[0])

                console.log(trobj.parent().children().eq(1).children().eq(0))
                trobj.parent().children().eq(1).children().eq(0).val(decodedres[0].name);
                trobj.parent().children().eq(3).children().eq(0).val(decodedres[0].price);
            }
        });
        calculatetotalFin();
    }

    function calculateTotal(impelem) {
        console.log($(impelem).parent().parent().children().eq(3).children().eq(0)[0].value)
        console.log($(impelem).parent().parent().children().eq(4).children().eq(0).val(impelem.value * $(impelem).parent().parent().children().eq(3).children().eq(0)[0].value));
        calculatetotalFin();
    }

    function buttonadd() {
        addRows();

    }

    function calculatetotalFin() {
        var total = 0;
        for (let i = 0; i < $('.totalin').length; i++) {
            total = total + parseInt($('.totalin')[i].value)
        }
        $(".subtotalinp").val(total)
        console.log(total)
    }

    function logout() {
        if (confirm("Do you want to log out?")) {
            location.href = 'welcome.php';
        }
    }

    function printRecipet() {


        var l = 0
        var idlist = $(".idc").map(function () {
            return $(this).val();
            l += 1
        }).get();


        var namelist = $(".productName").map(function () {
            return $(this).val();
        }).get();

        if( namelist.length === 1  ){
            if(namelist[0] === ""){
                alert("Please add at least one valid product")
                return
            }
        }
        var quantitycl = $(".quantitycl").map(function () {
            return $(this).val();
        }).get();

        var isInvalid = false
        for (let i = 0; i < quantitycl.length  ; i++) {
            if(quantitycl[i] === ""){
                isInvalid = true
            }
        }
        if( isInvalid){
            alert("please add quantity on each product")
            return
        }
        var productprice = $(".productprice").map(function () {
            return $(this).val();
        }).get();
        var totalin = $(".totalin").map(function () {
            return $(this).val();
        }).get();
        var phonenumber = $("#phonenumbinp").val();

        post("./Print_reciept.php", {
            idlist: idlist,
            namelist: namelist,
            quantitycl: quantitycl,
            productprice: productprice,
            totalin: totalin,
            phonenumber: phonenumber
        })
    }


    function post(path, parameters) {
        var form = $('<form></form>');

        form.attr("method", "post");
        form.attr("action", path);

        $.each(parameters, function (key, value) {
            var field = $('<input></input>');

            field.attr("type", "hidden");
            field.attr("name", key);
            field.attr("value", value);

            form.append(field);
        });

        // The form needs to be a part of the document in
        // order for us to be able to submit it.
        $(document.body).append(form);
        form.submit();
    }

    function checkloyality(inpelem) {
        var phonenumbinp = $("#phonenumbinp").val();
        $.ajax({
            url: "http://localhost/project/check_loyality.php?phonenum=" + phonenumbinp,
            success: function (result) {
                var subtptal = $(".subtotalinp").val()
                if (result.trim() === "hasloyality") {
                    var discount = $("#discount").val()


                    $("#totalfinal").val(parseInt(subtptal) - (parseInt(subtptal) / 100 * parseInt(discount)))
                } else {
                    $("#totalfinal").val(subtptal)
                }

                console.log(result.trim())
            }
        });
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
