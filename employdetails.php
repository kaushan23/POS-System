<?php
require('admin_authorization.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/userdet.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <!--ICONS-->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
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
            <div class="table-responsive" style="padding:10px">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search employee  by name.."
                       title="Type in a name">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <tr style="display: table-row;">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User_Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "emart";

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection Failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM register";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["user_type"]; ?></td>
                                <td><?php echo $row["Status"]; ?></td>
                                <td><a href="editemploydetails.php?ID=<?php echo $row["id"]; ?>"><i
                                                class="fi fi-rr-edit"></i></a> <!--/ <a
							href="#" onclick="delete_emp(this)"><i class="fi fi-rr-trash"></i></a>--></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<h4>No Record to View</h3>";
                    }
                    $conn->close();
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    // get the table element
    var $table = document.getElementById("myTable"),
        // number of rows per page
        $n = 5,
        // number of rows of the table
        $rowCount = $table.rows.length,
        // get the first cell's tag name (in the first row)
        $firstRow = $table.rows[0].firstElementChild.tagName,
        // boolean var to check if table has a head row
        $hasHead = ($firstRow === "TH"),
        // an array to hold each row
        $tr = [],
        // loop counters, to start count from rows[1] (2nd row) if the first row has a head tag
        $i, $ii, $j = ($hasHead) ? 1 : 0,
        // holds the first row if it has a (<TH>) & nothing if (<TD>)
        $th = ($hasHead ? $table.rows[(0)].outerHTML : "");
    // count the number of pages
    var $pageCount = Math.ceil($rowCount / $n);
    // if we had one page only, then we have nothing to do ..
    if ($pageCount > 1) {
        // assign each row outHTML (tag name & innerHTML) to the array
        for ($i = $j, $ii = 0; $i < $rowCount; $i++, $ii++)
            $tr[$ii] = $table.rows[$i].outerHTML;
        // create a div block to hold the buttons
        $table.insertAdjacentHTML("afterend", "<div id='buttons'></div");
        // the first sort, default page is the first one
        sort(1);
    }

    // ($p) is the selected page number. it will be generated when a user clicks a button
    function sort($p) {
        /* create ($rows) a variable to hold the group of rows
         ** to be displayed on the selected page,
         ** ($s) the start point .. the first row in each page, Do The Math
         */
        var $rows = $th,
            $s = (($n * $p) - $n);
        for ($i = $s; $i < ($s + $n) && $i < $tr.length; $i++)
            $rows += $tr[$i];

        // now the table has a processed group of rows ..
        $table.innerHTML = $rows;
        // create the pagination buttons
        document.getElementById("buttons").innerHTML = pageButtons($pageCount, $p);
        // CSS Stuff
        document.getElementById("id" + $p).setAttribute("class", "active");
    }


    // ($pCount) : number of pages,($cur) : current page, the selected one ..
    function pageButtons($pCount, $cur) {
        /* this variables will disable the "Prev" button on 1st page
           and "next" button on the last one */
        var $prevDis = ($cur == 1) ? "disabled" : "",
            $nextDis = ($cur == $pCount) ? "disabled" : "",
            /* this ($buttons) will hold every single button needed
             ** it will creates each button and sets the onclick attribute
             ** to the "sort" function with a special ($p) number..
             */
            $buttons = "<input type='button' value='<< Prev' onclick='sort(" + ($cur - 1) + ")' " + $prevDis + ">";
        for ($i = 1; $i <= $pCount; $i++)
            $buttons += "<input type='button' id='id" + $i + "'value='" + $i + "' onclick='sort(" + $i + ")'>";
        $buttons += "<input type='button' value='Next >>' onclick='sort(" + ($cur + 1) + ")' " + $nextDis + ">";
        return $buttons;
    }
</script>

<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function delete_emp(r){
        if(confirm("Do You Want To Delete This Data?")){
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("myTable").deleteRow(i);}


    }
</script>
</body>

</html>
