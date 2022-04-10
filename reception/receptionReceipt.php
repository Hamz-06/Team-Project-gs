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
    <label><strong>Print or Download Invoice:</strong></label><br>
    <button class="btn-success" id="download">Download PDF</button>

    <br>
    <br>

    <form method="POST" action="">
        <label for="find"><strong>Find Receipt</strong></label>
        <div>
            <input placeholder="Enter Reference Code" name="refCode">
            <button name="select" class="btn btn-success">Select</button>
        </div>

        <br>

        <label for="remove"><strong>Save Receipt</strong></label>
        <div>
            <input placeholder="Enter Reference Code" name="removeCode">
            <button name="remove" class="btn btn-primary">Save Invoice</button>
            <?php
            if (isset($_POST['remove'])) {
                $deleteReceipt = $_POST['removeCode'];
                $query_total = "SELECT SUM(total) AS subtotal FROM sale_garits WHERE receiptReference ='$deleteReceipt'";
                $row = mysqli_fetch_assoc(mysqli_query($connect, $query_total));
                $ifExist = "SELECT receiptReference FROM sale_garits WHERE receiptReference ='$deleteReceipt'";
                $existResult = mysqli_fetch_assoc(mysqli_query($connect, $ifExist));
                if ($existResult > 0) {
                    $total =  number_format(($row['subtotal'] * 1.20), 2, '.', ',');
                    mysqli_query($connect, "INSERT INTO saleHistory_garits(receiptReference, total)
                VALUES ('$deleteReceipt','$total')")
                        or die(mysqli_error($connect));
                    $sql_deleteData = "DELETE FROM sale_garits WHERE receiptReference ='$deleteReceipt'";
                    $delete_result = mysqli_query($connect, $sql_deleteData);
                    echo "<script language='javascript'>
                    alert('Invoice has been saved, saved invoice can be viewed from clicking on view history.'); 
                    </script>";
                } else {
                    echo "<script language='javascript'>
                    alert('Reference detail was not found.'); 
                    </script>";
                }
            }
            ?>
        </div>
    </form>
    <div>
        <br>
        <label><strong>View History:</strong></label><br>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#history">View Saved Invoice</button>
        <!-- Modal -->
        <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="historylCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Invoice History</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Saved Invoice</h5>
                        <table class="table table-striped">
                            <thead>
                                <th>Reference</th>
                                <th>Total</th>
                                <th>Date</th>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT receiptReference,total,dateAquired FROM salehistory_garits";
                                $result = $connect->query($sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                        <td>" . $row["receiptReference"] . "</td>
                                        <td>" . $row["total"] . "</td>
                                        <td>" . $row["dateAquired"] . "</td>

                                        </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <br>
    <div>
        <div id="invoice">
            <div class="card-header bg-transparent header-elements-inline">
                <div>

                    <h1 STYLE="font-family: Comfortaa">Receipt</h1>
                    <hr>

                    <p style="text-align:center"><strong>Thank You Shopping at Ashford branch of Quick Fix Fitters Garage</strong></p>

                    <div class="container">

                        <div class="card-header">
                            <div class="container col-6 offset-10">
                                <div>
                                    <strong>Quick Fix Fitters,</strong>
                                </div>
                                <div>19 High St.,</div>
                                <div>Ashford,</div>
                                <div>Kent CT16 8YY</div>

                            </div>
                            <h3>Invoice</h3>
                            <hr>
                            <?php
                            if (isset($_POST['select'])) {
                                $reference = $_POST['refCode'];
                                echo "<strong>" . date("Y/m/d") . "</strong>";
                                echo "<p><strong>REFERENCE CODE: " . $reference . "</strong></p>";
                            }

                            ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Qty</th>
                                            <th>Part Code</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_POST['select'])) {
                                            $reference = $_POST['refCode'];

                                            $sqlFindInfo = "SELECT * FROM sale_garits WHERE receiptReference = '$reference'";
                                            $findResult = mysqli_query($connect, $sqlFindInfo);

                                            while ($row = mysqli_fetch_assoc($findResult)) {
                                                echo "<tr>
                                                        <td>" . $row['quantity'] . "</td>
                                                        <td>" . $row['partNo'] . "</td>
                                                        <td>" . $row['total'] . "</td>
                                                     </tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5' style='text-align: center;'>Enter a reference code</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5">
                                </div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <?php
                                            if (isset($_POST['select'])) {
                                                $reference = $_POST['refCode'];
                                                $query_total = "SELECT SUM(total) AS subtotal FROM sale_garits WHERE receiptReference ='$reference'";
                                                $row = mysqli_fetch_assoc(mysqli_query($connect, $query_total));

                                                echo "<tr>
                                                        <td class='left'><strong>Subtotal:</strong></td>
                                                        <td class='right'><strong>" . "£" . $row['subtotal'] . "</strong></td>
                                                    </tr>";
                                                echo "<tr>
                                                        <td class='left'><strong>VAT Rate:</strong></td><td class='right'><strong>20%</strong></td>
                                                    </tr>";
                                                echo "<tr>
                                                        <td class='left'><strong>TOTAL:</strong></td>
                                                        <td class='right'><strong>" . "£" . number_format(($row['subtotal'] * 1.20), 2, '.', ',') . "</strong></td>
                                                    </tr>";
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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