<?php
$connect = mysqli_connect("localhost", "root", "", "garit_system");
?>
<!DOCTYPE html>
<html>

<head>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comfortaa&display=swap');
    </style>
</head>

<body>

    <button class="btn-success" id="download"> Download PDF</button>

    <br>
    <br>

    <form method="POST" action="">
        <label><strong>Select a month:</strong></label>
        <div class="input-group">
            <select class="" name="month">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <button name="submit">Select</button>
        </div>
    </form>
    <br>

    <div>
        <div id="stockReport">
            <div class="card-header bg-transparent header-elements-inline">
                <div>
                    <h1 STYLE="font-family: Comfortaa">Stock Report</h1>
                    <hr>
                    <!-- CSS Code: Place this code in the document's head (between the 'head' tags) -->
                    <!-- HTML Code: Place this code in the document's body (between the 'body' tags) where the table should appear -->
                    <table class="table table-sm">
                        <thread>
                            <tr>
                                <th class="text-center" scope="col">
                                    <p style="font-size: 12px">Part Name</p>
                                </th>
                                <th class="text-center" scope="col">
                                    <p style="font-size: 12px">Code</p>
                                </th>
                                <th class="text-center" scope="col">
                                    <p style="font-size: 12px">Manufact.</p>
                                </th>
                                <th class="text-center" scope="col">
                                    <p style="font-size: 12px">Vehicle Type</p>
                                </th>
                                <th class="text-center" scope="col">
                                    <p style="font-size: 12px">Year(s)</p>
                                </th>
                                <th class="text-center" scope="col">
                                    <p style="font-size: 12px">Price</p>
                                </th>
                                <th class="text-center" scope="col">
                                    <p style="font-size: 12px">Initial Stock Level</p>
                                </th>
                                <th class="text-center" scope="col">
                                    <p style="font-size: 12px">Initial Cost</p>
                                </th>
                                <th class="text-center" scope="col">
                                    <p style="font-size: 12px">Used</p>
                                </th>
                                <th class="text-center" scope="col">
                                    <p style="font-size: 12px">Delivery</p>
                                </th>
                                <th class="text-center" scope="col">
                                    <p style="font-size: 12px">New Stock Level</p>
                                </th>
                                <th class="text-center" scope="col">
                                    <p style="font-size: 12px">Stock Cost</p>
                                </th>
                                <th class="text-center" scope="col">
                                    <p style="font-size: 12px">Threshold Level</p>
                                </th>
                            </tr>
                        </thread>
                        <tbody>
                            <?php
                            if (isset($_POST['submit'])) {
                                $referenceMonth = $_POST['month'];
                                $sqlMonth = "SELECT * FROM stockreport WHERE date_format(Month, '%m') = $referenceMonth";
                                $sqlResult = mysqli_query($connect, $sqlMonth);
                                while ($row = mysqli_fetch_assoc($sqlResult)) {
                                    echo "<tr>
                                           <td class='text-center'><p style='font-size: 10px'>" . $row['Part Name'] . "</p></td>
                                           <td class='text-center'><p style='font-size: 10px'>" . $row['Code'] . "</p></td>
                                           <td class='text-center'><p style='font-size: 10px'>" . $row['Manufacturer'] . "</p></td>
                                           <td class='text-center'><p style='font-size: 10px'>" . $row['Vehicle Type'] . "</p></td>
                                           <td class='text-center'><p style='font-size: 10px'>" . $row['Year(s)'] . "</p></td>
                                           <td class='text-center'><p style='font-size: 10px'>" . $row['Price'] . "</p></td>
                                           <td class='text-center'><p style='font-size: 10px'>" . $row['Initial Stock Level'] . "</p></td>
                                           <td class='text-center'><p style='font-size: 10px'>" . $row['Initial Cost'] . "</p></td>
                                           <td class='text-center'><p style='font-size: 10px'>" . $row['Used'] . "</p></td>
                                           <td class='text-center'><p style='font-size: 10px'>" . $row['Delivery'] . "</p></td>
                                           <td class='text-center'><p style='font-size: 10px'>" . $row['New Stock Level'] . "</p></td>
                                           <td class='text-center'><p style='font-size: 10px'>" . $row['Stock Cost'] . "</p></td>
                                           <td class='text-center'><p style='font-size: 10px'>" . $row['Threshold Level'] . "</p></td>
                                        </tr>";
                                }
                            }
                            ?>
                            <tr>
                                <td class="text-center">
                                    <p style="font-size: 10px">Total</p>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">
                                    <p style="font-size: 10px">
                                        <?php
                                        if (isset($_POST['submit'])) {
                                            $referenceMonth = $_POST['month'];
                                            $sql = "SELECT SUM(`Initial Cost`) AS total FROM stockreport WHERE date_format(Month, '%m') = $referenceMonth";
                                            $result = mysqli_query($connect, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "£" . $row['total'];
                                            }
                                        }
                                        ?>
                                    </p>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">
                                    <p style="font-size: 10px">
                                        <?php
                                        if (isset($_POST['submit'])) {
                                            $referenceMonth = $_POST['month'];
                                            $cost = "SELECT SUM(`Stock Cost`) AS totatCost FROM stockreport WHERE date_format(Month, '%m') = $referenceMonth";
                                            $resultCost = mysqli_query($connect, $cost);
                                            while ($row = mysqli_fetch_array($resultCost)) {
                                                echo "£" . $row['totatCost'];
                                            }
                                        }
                                        ?>
                                    </p>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="report.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</html>