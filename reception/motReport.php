<?php
include 'connect.php';

//if there is a globabl var for reg no, then assign in locally 
$regNo = $_GET['regNo'];
$getMot =  $db->query("SELECT * FROM `motreminder` WHERE registrationNo = '$regNo'");


$row = $getMot->fetch_assoc();







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
    <button class="btn btn-success" id="download"> Download PDF</button>
    
    <div class="spacer"></div>

    <div class="receipt-content" id="motreminderreport">
        <div class="container">

            <div class="card-header">
                Invoice
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <div>
                            <?php
                            echo $row["address"];
                            ?>
                        </div>
                    </div>
                    <div class="col offset-2">
                        <div>
                            <div>
                                <strong>Quick Fix Fitters,</strong>
                            </div>
                            <div>19 High St.,</div>
                            <div>Ashford,</div>
                            <div>Kent CT16 8YY</div>
                            <br>
                            <div>
                                <?php
                                    echo date("d-F-Y")
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div>
                            <?php
                            echo "Dear" . " " . $row["fname"] . " " . $row["sname"] . ",";
                            ?>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div style="text-align:center;">
                        <h6>REMINDER - MoT TEST DUE</h6>
                    </div>
                    <div style="text-align:center;">

                        <?php
                        echo 'Vehicle Registration Number ' . $row['registrationNo'] . ' && ' . "Renewal Test Date " . $row["motdate"];

                        ?>
                    </div>
                    <br>
                    <br>
                    <div>
                        <p>According to our records, the above vehicle is due to have its MoT certificate renewed on the date shown.</p>
                        <p> Account Holders customers such as yourself are assured of our prompt attention, and we hope that you will use our
                            services on this occasion in order to have the necessary test carried out on your vehicle.</p>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div>
                        <p>
                            Yours sincerely,
                        </p>
                        <br>
                        <p>
                            G. Lancaster
                        </p>
                    </div>
                </div>
            </div>
        </div>
</body>
<script src="motreminder.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</html>