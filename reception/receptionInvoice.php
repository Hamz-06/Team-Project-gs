
<?php
//connect 
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
    <form method="POST" action="">
        <label for="find"><strong>Enter Job Number:</strong></label>
        <div>
            <input placeholder="Enter Job Number" name="regNo">
            <button name="select" class="btn btn-success">Select</button>
        </div>
    </form>



    <div class="receipt-content" id="invoice">
        <div class="container">

            <div class="card-header">
                Invoice
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <div>
                            <strong>Quick Fix Fitters,</strong>
                        </div>
                        <div>19 High St.,</div>
                        <div>Ashford,</div>
                        <div>Kent CT16 8YY</div>
                    </div>

                    <div class="col-sm-6">
                        <div>
                            <?php
                            //get data
                            if (isset($_POST['select'])) {
                                $carReg = $_POST['regNo'];
                                $sqlReg = "SELECT * FROM invoicereportcustomer WHERE jobNo = '$carReg'";
                                $result = mysqli_query($connect, $sqlReg);
                                //if value exists display using echos
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<div><strong>" . $row['fname'] . " " . $row['sname'] . "</strong></div>
                                    <div>" . $row['address'] . "</div>
                                    <div>" . $row['pcode'] . "</div>";
                                    }
                                } else {
                                    echo "<script language='javascript'>
                                        alert('Data Not Found.'); 
                                        </script>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <?php
                        if (isset($_POST['select'])) {
                            $carReg = $_POST['regNo'];
                            $sqlReg = "SELECT * FROM invoicereportcustomer WHERE jobNo = '$carReg'";
                            $result = mysqli_query($connect, $sqlReg);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<br><div><strong>Dear: " . $row['fname'] . " " . $row['sname'] . "</strong></div>"
                                    . "<br><h6 style='text-align:right'>Invoice No: " . $row['jobNo'] . "</h6>";
                            }
                        }
                        ?>
                    </div>
                    <div>
                        <p><strong>Description of work:</strong></p>
                        <?php
                        if (isset($_POST['select'])) {
                            $carReg = $_POST['regNo'];
                            $sqlReg = "SELECT * FROM invoicetask WHERE jobID = '$carReg'";
                            $result = mysqli_query($connect, $sqlReg);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['taskDescription'] . "<br>";
                            }
                        }
                        ?>

                    </div>

                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th class="right">Unit Cost</th>
                                    <th class="center">Qty</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST['select'])) {
                                    $carReg = $_POST['regNo'];
                                    $sqlReg = "SELECT * FROM invoicereportpartsused WHERE jobNo = '$carReg'";
                                    $result = mysqli_query($connect, $sqlReg);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>
                                                <td>" . $row['partName'] . "</td>
                                                <td>" . $row['partCode'] . "</td>
                                                <td>" . $row['price'] . "</td>
                                                <td>" . $row['quantity'] . "</td>
                                                <td>" . $row['total'] . "</td>
                                            <tr>";
                                        }
                                    }
                                }
                                ?>
                                <tr>
                                    <td><strong>Labour</strong></td>
                                    <?php
                                    if (isset($_POST['select'])) {
                                        $carReg = $_POST['regNo'];
                                        $sqlReg = "SELECT * FROM labourtask WHERE jobID = '$carReg'";
                                        $result = mysqli_query($connect, $sqlReg);
                                        if (mysqli_num_rows($result) > 0) {
                                            $duration = "SELECT SUM(duration) AS duration FROM labourtask WHERE jobID = '$carReg'";
                                            $durationResult = mysqli_query($connect, $duration);
                                            $durationRow = $durationResult->fetch_assoc();
                                            $row = $result->fetch_assoc();
                                            echo "
                                            <td></td>                                            
                                                <td>" . $row['hourlyRate'] . "</td>
                                                <td>" . $durationRow['duration'] . "</td>
                                                <td>" . $row['hourlyRate'] * $durationRow['duration'] . "</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <?php
                                    if (isset($_POST['select'])) {
                                        $carReg = $_POST['regNo'];
                                        $sql = "SELECT * FROM job_garits WHERE jobNo = '$carReg'";
                                        $sqlResult = mysqli_query($connect, $sql);
                                        if (mysqli_num_rows($sqlResult) > 0) {
                                            $row = $sqlResult->fetch_assoc();
                                            echo "<td></td><td>" . $row['totalPrice'] . "</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="left">
                                        <strong>VAT</strong>
                                    </td>
                                    <?php
                                    if (isset($_POST['select'])) {
                                        $carReg = $_POST['regNo'];
                                        $sql = "SELECT * FROM job_garits WHERE jobNo = '$carReg'";
                                        $sqlResult = mysqli_query($connect, $sql);
                                        if (mysqli_num_rows($sqlResult) > 0) {
                                            $row = $sqlResult->fetch_assoc();
                                            echo "<td></td><td>" . number_format($row['totalPrice'] * 0.2, 2, '.', ' ') . "</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="left">
                                        <strong>Grand Total</strong>
                                    </td>
                                    <?php
                                    if (isset($_POST['select'])) {
                                        $carReg = $_POST['regNo'];
                                        $sql = "SELECT * FROM job_garits WHERE jobNo = '$carReg'";
                                        $sqlResult = mysqli_query($connect, $sql);
                                        if (mysqli_num_rows($sqlResult) > 0) {
                                            $row = $sqlResult->fetch_assoc();
                                            echo "<td></td><td>" . number_format(($row['totalPrice'] * 0.2) + $row['totalPrice'], 2, '.', ' ') . "</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>Thank you for your valued custom. We look forward to receiving your payment in due course.</p>
                    <p>Yours sincerely,</p>
                    <p>G. Lancaster.</p>
                </div>
            </div>
        </div>
</body>
<script src="invoice.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</html>