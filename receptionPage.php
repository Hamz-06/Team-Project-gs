<!DOCTYPE html>
<html lang="en">
<!---IMPORTANT, this script prevents data to be reentered if user refreshes the page-->
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<head>
    <title>Reception - GARITS</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="reception/style.css" rel="stylesheet">
</head>

<body>
    <nav>
        <h1>Receptionist</h1>
    </nav>

    <div class="row content justify-content-between " style="height: 90vh">

        <div class="box col isolated bg-primary box-shadow">
            <!-- Title Left Box-->
            <div class="line">
                <h2>Overview</h2>
            </div>

            <!--nav bar for jobs pending, customer,--->
            <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="jobPending-tab" data-bs-toggle="pill" data-bs-target="#pills-jobPending" type="button" role="tab" aria-controls="pills-jobPending" aria-selected="true">Jobs</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-Customer-tab" data-bs-toggle="pill" data-bs-target="#pills-Customer" type="button" role="tab" aria-controls="pills-Customer" aria-selected="false">Customer</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-Vehicle-tab" data-bs-toggle="pill" data-bs-target="#pills-Vehicle" type="button" role="tab" aria-controls="pills-Vehicle" aria-selected="false">View Vehicle</button>
                </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-jobPending" role="tabpanel" aria-labelledby="pills-jobPending-tab">
                    <!--Start of table for Jobs-->
                    <div class="line" style="height: 73%">
                        <!-- Subtitle -->
                        <div class="row text-left justify-content-between m-0 mb-3">
                            <h3 class="col-5 pl-0">Pending Jobs</h3>
                            <button type="button" class="btn btn-primary col-2 offset-3 btn-sm" data-toggle="modal" data-target="#newJobModal"><i class="bi bi-plus-circle"></i>New Job</button>
                            <button type="button" class="col-2 btn btn-success"><a href="reception/receptionInvoice.php" class="text-decoration-none text-white" target="_blank" rel="noopener noreferrer">Invoice Job</a></button>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Job Number</th>
                                    <th scope="col">Vehicle Reg.</th>
                                    <th scope="col">Job Type</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Service Date</th>

                                </tr>
                                <!--Connection to the database regarding the job table-->
                                <?php
                                include 'reception/connect.php';

                                $sql = "SELECT jobNo,carRegistration,jobType,jobStatus,serviceDate from job_garits";
                                $result = $db->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $status_icon = $row["jobStatus"] == "Complete" ?    // if else statement
                                            "<i class='bi bi-person-check-fill text-success'></i>"
                                            :
                                            "<i class='bi bi-clock-fill text-warning'></i>";


                                        echo "<tr><td>" . $row["jobNo"] . "</td><td>" . $row["carRegistration"] . "</td><td>" . $row["jobType"] . "</td><td>" . $status_icon . "</td><td>" . $row["serviceDate"] . "</td></tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "</table><b>No Data Found.</b>";
                                }
                                $db->close();
                                ?>
                                <!--End of connection-->
                            </thead>
                        </table>
                    </div>
                    <!--End of table for jobs-->
                </div>
                <div class="tab-pane fade" id="pills-Customer" role="tabpanel" aria-labelledby="pills-Customer-tab">

                    <div class="line" style="height: 73%">
                        <!-- Subtitle -->
                        <div class="row text-left justify-content-between m-0 mb-3">
                            <h3 class="col-5 pl-0">Customer Information</h3>
                            <button type="button" class="btn btn-success col-2 offset-3 btn-sm" data-toggle="modal" data-target="#newCustomerModal">
                                <i class="bi bi-person-plus"></i>New Customer</button>
                            <button type="button" class="btn btn-secondary col-2 btn-sm" data-toggle="modal" data-target="#addVehicle">
                                <i class='fas fa-car'></i>Add Vehicle</button>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Card No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Surname</th>
                                    <th scope="col">Customer Type</th>
                                    <th scope="col">Pay Late</th>
                                </tr>
                                <?php
                                include 'reception/connect.php';

                                $sqlCustomer = "SELECT cardNo,fname, sname, customerType, payLate FROM customer_garits";
                                $resultCustomer = $db->query($sqlCustomer);
                                if ($resultCustomer->num_rows > 0) {
                                    while ($row = $resultCustomer->fetch_assoc()) {
                                        // $showInvoice = $row["invoiceNo"] == "" ?    // if else statement
                                        //     "No Invoice assigned"
                                        //     :
                                        //     $row["invoiceNo"];

                                        $showPayLate = $row["payLate"] == "" ?
                                            "N/A" : "Applicable";

                                        echo "<tr><td>" . $row["cardNo"] . "</td><td>" . $row["fname"] . "</td><td>" . $row["sname"]  .
                                            "</td><td>" . $row["customerType"] . "</td><td>" . $showPayLate . "</td></tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "</table><b>No Data Found.</b>";
                                }
                                $db->close();
                                ?>

                            </thead>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-Vehicle" role="tabpanel" aria-labelledby="pills-Vehicle-tab">
                    <div class="line" style="height: 73%">
                        <!-- Subtitle -->
                        <div class="row text-left justify-content-between m-0 mb-3">
                            <h3 class="col-5 pl-0">View Vehicle</h3>
                            <button type="button" class="btn btn-danger col-2 btn-sm" data-toggle="modal" data-target="#deleteVehicle">
                                Delete Vehicle</button>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Registration Number</th>
                                    <th scope="col">Manufacturer</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Colour</th>
                                </tr>
                                <?php
                                include 'reception/connect.php';

                                $sqlCustomer = "SELECT * FROM vehicle_garits";
                                $resultCustomer = $db->query($sqlCustomer);
                                if ($resultCustomer->num_rows > 0) {
                                    while ($row = $resultCustomer->fetch_assoc()) {

                                        echo "<tr><td>" . $row["registrationNo"] . "</td><td>" . $row["make"] . "</td><td>" . $row["model"]  .
                                            "</td><td>" . $row["year"] . "</td><td>" . $row["colour"] . "</td></tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "</table><b>No Data Found.</b>";
                                }
                                $db->close();
                                ?>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal for deleting vehicle-->
        <div class="modal fade" id="deleteVehicle" tabindex="-1" role="dialog" aria-labelledby="deleteVehicle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="deleteVehicle">Delete Vehicle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" onclick="" id="" action="reception/receptionDeleteVehicle.php">
                        <fieldset>
                            <div class="modal-body">

                                <div class="spacer">
                                    <label for="regNo">Enter Registration Number:</label>
                                    <input type="text" class="form-control" id="regNo" name="regNo">
                                    <small id="regNo-error"></small>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                            <div class="modal-footer bg-dark">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
        <!--End of deleting vehicle-->

        <!-- Modal for adding new cutomers to the system -->
        <div class="modal fade" id="newCustomerModal" tabindex="-1" role="dialog" aria-labelledby="newCustomer" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="newCustomer">New Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" onclick="return isValid()" id="register-form" action="reception/receptionFunctionality.php">
                        <fieldset>
                            <div class="modal-body">
                                <!--Customer Details start-->
                                <h4><i class="bi bi-person"></i>Customer</h4>
                                <div class="spacer">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" style="text-transform: uppercase">
                                    <small id="name-error"></small>
                                </div>
                                <div class="spacer">
                                    <label for="sname">Surname:</label>
                                    <input type="text" class="form-control" id="sname" name="sname" style="text-transform: uppercase">
                                    <small id="sname-error"></small>
                                </div>
                                <div class="spacer">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" id="address" name="address" style="text-transform: uppercase">
                                    <small id="address-error"></small>
                                </div>
                                <div class="spacer">
                                    <label for="pcode">Postcode:</label>
                                    <input type="text" class="form-control" id="pcode" name="pcode" style="text-transform: uppercase">
                                    <small id="pcode-error"></small>
                                </div>
                                <div class="spacer">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                    <small id="phone-error"></small>
                                </div>
                                <div class="spacer">
                                    <label for="faxNumber">Fax Number:</label>
                                    <input type="text" class="form-control" id="fax" name="fax">
                                    <small id="fax-error"></small>
                                </div>
                                <!-- Two option radio form -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Casual" checked>
                                    <label class="form-check-label" for="inlineRadio1">Casual</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Account Holder">
                                    <label class="form-check-label" for="inlineRadio2">Account Holder</label>
                                </div>
                                <div>
                                    <br>
                                    <button type="submit" class="btn btn-success" name='customerSub'>Submit</button>
                                </div>
                            </div>
                            <div class="modal-footer bg-dark">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
        <!--End of customer Modal-->

        <!-- Modal for adding new vehicles in the system -->
        <div class="modal fade" id="addVehicle" tabindex="-1" role="dialog" aria-labelledby="addVehicle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="addVehicle">Add Vehicle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="reception/receptionVehicle.php" id="vehicle-form" onclick="return vehicleFormValid()">
                        <fieldset>
                            <div class="modal-body row">
                                <h4><i class='fas fa-car-side'></i>Vehicle</h4>
                                <div>
                                    <label for="cardNumber">Customer Card Number:</label>
                                    <input type="text" class="form-control" id="customerCardNumber" name="customerCardNumber" style="text-transform: uppercase">
                                    <small id="customerCardNumber-error"></small>
                                </div>
                                <div>
                                    <label for="registrationNumber">Registration Number:</label>
                                    <input type="text" class="form-control" id="regNo" name="regNo" style="text-transform: uppercase">
                                    <small id="registration-error"></small>
                                </div>
                                <div>
                                    <label for="manufacture">Manufacturer:</label>
                                    <input type="text" class="form-control" id="make" name="make" style="text-transform: uppercase">
                                    <small id="make-error"></small>
                                </div>
                                <div>
                                    <label for="model">Model:</label>
                                    <input type="text" class="form-control" id="model" name="model" style="text-transform: uppercase">
                                    <small id="model-error"></small>
                                </div>
                                <div>
                                    <label for="year">Year:</label>
                                    <input type="text" class="form-control" id="year" name="year" style="text-transform: uppercase">
                                    <small id="year-error"></small>
                                </div>
                                <div>
                                    <label for="colour">Colour:</label>
                                    <input type="text" class="form-control" id="colour" name="colour" style="text-transform: uppercase">
                                    <small id="colour-error"></small>
                                </div>
                                <div>
                                    <br>
                                    <button type="submitVehicle" class="btnVehicle btn btn-success">Submit</button>
                                </div>
                            </div>
                            <div class="modal-footer bg-dark">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <!--End of vehicle Modal-->

        <!--Start of job Modal-->
        <div class="modal fade" id="newJobModal" tabindex="-1" role="dialog" aria-labelledby="newJob" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="newJob">New Job</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="reception/receptionNewJob.php" id="job-form">
                        <fieldset>
                            <div class="modal-body">
                                <div>
                                    <label for="vehicle">Vehicle:</label>
                                    <input type="text" class="form-control" id="vehicle" name="vehicle" placeholder="Registration Number">
                                    <small id="vehicle-error"></small>
                                </div>
                                <div>
                                    <label for="jobType">Select Job Type:</label>
                                    <div class="input-group">
                                        <select class="form-select" name="jobType" id="jobType">
                                            <option selected value="Vehicle Repair">Vehicle Repair</option>
                                            <option value="Annual Service">Annual Service</option>
                                            <option value="MoT Service">MoT Service</option>
                                        </select>
                                    </div>
                                </div>
                                <label for="jobDes">Job Description:</label>
                                <input type="text" class="form-control" id="jobDes" name="jobDes" placeholder="Job Description">
                                <small id="jobDes-error"></small>
                                <div>
                                    <form>
                                        <h5>Task:</h5>
                                        <table>
                                            <tbody id="tbody"></tbody>
                                        </table>
                                        <br>
                                        <button type="button" class="btn btn-success" onclick="addTask();">Add Task</button>
                                    </form>
                                    <script>
                                        var taskNumber = 0;

                                        function addTask() {
                                            taskNumber++;
                                            var html = "<tr>";
                                            html += "<td>" + "</td>";
                                            html += "<td><input type='text' name='addTask[]'></td><a href='#'onclick='deleteTask()'><i class='bi bi-trash text-danger'></i></a>";
                                            html += "</tr>";
                                            document.getElementById("tbody").insertRow().innerHTML = html;
                                        }

                                        function deleteTask() {
                                            document.getElementById("tbody").deleteRow(0);
                                        }
                                    </script>
                                </div>
                                <br>
                                <div>
                                    <label for="time">Estimated Time:</label>
                                    <input type="text" class="form-control" id="time" name="time" placeholder="Enter Estimate Time">
                                    <small id="time-error"></small>
                                </div>
                                <!-- service date -->
                                <div>
                                    <label for="service">Service Date:</label>
                                    <input type="date" class="form-control" id="servicedate" name="service">
                                    <small id="date-error"></small>
                                </div>
                            </div>
                            <div class="modal-footer bg-dark">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-success" name="jobSubmit" onclick="return jobFormValid()">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <!--end of modal-->




        <div class="box col bg-primary box-shadow">

            <!-- Title Right Box-->
            <div class="line">
                <h2>Stock Control</h2>
            </div>

            <!-- Subtitle -->
            <div class="row text-left justify-content-between m-0 mb-3">
                <h3 class="col-5 pl-0">Parts inventory</h3>
                <button type="button" class="btn btn-info col-2 offset-3 btn-sm  text-white" data-toggle="modal" data-target="#stockLedgerModal">Stock Ledger</button>
                <button type="button" class="btn btn-primary col-2 btn-sm" data-toggle="modal" data-target="#newPartsModal"><i class='far fa-plus-square' style='color:white'></i> Add Parts</button>
            </div>

            <div class="line" style="height: 73%">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Part</th>
                            <th scope="col">Vehicle</th>
                            <th scope="col">Year</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Price</th>
                            <th scope="col">Alert</th>
                        </tr>
                        <!--Connection to the database regarding the job table-->
                        <?php
                        include 'reception/connect.php';
                        $sqlParts = "SELECT partCode,partName, vechileType, years, stockLevel,price, threshold	
                        from parts_garits";
                        $resultParts = $db->query($sqlParts);
                        if ($resultParts->num_rows > 0) {
                            while ($row = $resultParts->fetch_assoc()) {
                                $alert = $row["stockLevel"] <= $row["threshold"] ?
                                    "<i class='fas fa-exclamation-triangle' style='color:red'></i>" :
                                    "<i class='fas fa-check-square' style='color:green'></i>";


                                echo "<tr><td>" . $row["partCode"] . "</td><td>" . $row["partName"] . "</td><td>" . $row["vechileType"] . "</td><td>" . $row['years'] . "</td><td>" . $row['stockLevel'] . "</td><td>" . $row['price'] . "</td><td" .
                                    "</td><td>" . $alert . "</td></tr>";
                            }
                            echo " </thead></table>";
                        } else {
                            echo "</table><b>No Data Found.</b>";
                        }
                        $db->close();
                        ?>
                        <!--End of connection-->
            </div>
            <div class="line">
            </div>
            <div class="row justify-content-start m-0" style="margin-top: 40px;">
                <!-- <button type="button" class="btn btn-warning btn-lg col-4"><a herf="reception/receptionReport.php"><i class="bi bi-clipboard2-data"></i>Reports</a></button> -->
                <button type="button" class="btn btn-warning btn-lg col-4"><a href="reception/receptionReport.php" class="text-decoration-none text-black" target="_blank" rel="noopener noreferrer">Reports</a></button>
                <button type="button" class="btn btn-success btn-lg offset-4 col-4" data-toggle="modal" data-target="#newSaleModal"><i class="bi bi-cart4"></i> New Sale</button>
            </div>
        </div>



        <!--Modal start for new Sale-->
        <div class="modal fade" id="newSaleModal" tabindex="-1" role="dialog" aria-labelledby="newParts" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="newSale">New Sales</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="reception/receptionNewSale.php" id="">
                        <fieldset>
                            <div class="modal-body row">
                                <!--Parts details start-->
                                <form>
                                    <!-- <div>
                                        <h4><i class="bi bi-cart4"></i>Sale</h4>
                                        <button type="button" class="col-2 btn btn-primary" data-toggle="modal" data-target="#newJobModal"><i class="bi bi-plus-circle"></i>New Job</button>
                                    </div> -->
                                    <div class="row text-left justify-content-between m-0 mb-3">
                                        <h4 class="col-5 pl-0"><i class="bi bi-cart4"></i>Sale</h4>
                                        <button type="button" class="col-4 btn btn-primary"><a href="reception/receptionReceipt.php" target="_blank" rel="noopener noreferrer" class="text-decoration-none text-white">View Receipt</a></button>
                                    </div>
                                    <div>

                                        <div>
                                            <label for="reference">Reference Code:</label>
                                            <input type="text" class="form-control" id="reference" name="reference" placeholder="Enter Reference Code">
                                            <small id="reference-error"></small>
                                        </div>
                                        <h5>Parts:</h5>
                                        <div>
                                            <label for="partCode">Part Code:</label>
                                            <input type="text" class="form-control" id="partCode" name="partCode" placeholder="Enter Partcode">
                                            <small id="parts-error"></small>
                                        </div>
                                        <div>
                                            <label for="quantity">Quantity:</label>
                                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity">
                                            <small id="quantity-error"></small>
                                        </div>


                                </form>

                            </div>



                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="partsSubmit">
                </div>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
    <!--End of Modal-->



    <!--Modal start for new Parts-->
    <div class="modal fade" id="newPartsModal" tabindex="-1" role="dialog" aria-labelledby="newParts" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="addParts">Add Parts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="reception/receptionNewParts.php" id="parts-form">
                    <fieldset>
                        <div class="modal-body row">
                            <!--Parts details start-->
                            <h4>Parts <i class="fa fa-truck"></i></h4>
                            <div>
                                <label for="partCode">Part Code:</label>
                                <input type="text" class="form-control" id="partCode" name="partCode" placeholder="Enter Partcode">
                                <small id="parts-error"></small>
                            </div>
                            <div>
                                <label for="partName">Part Name:</label>
                                <input type="text" class="form-control" id="partName" name="partName" placeholder="Enter Part Name">
                                <small id="partName-error"></small>
                            </div>
                            <div>
                                <label for="manufac">Manufacturer:</label>
                                <input type="text" class="form-control" id="partsManufac" name="partsManufac" placeholder="Enter Part Manufacturer">
                                <small id="manufac-error"></small>
                            </div>
                            <div>
                                <label for="vehicleParts">Vehicle Type:</label>
                                <input type="text" class="form-control" id="vehicleParts" name="vehicleParts" placeholder="e.g Ford">
                                <small id="vehicleParts-error"></small>
                            </div>
                            <div>
                                <label for="years">Years:</label>
                                <input type="text" class="form-control" id="yearsPart" name="yearParts" placeholder="Enter Year yyyy-yyyy">
                                <small id="yearsParts-error"></small>
                            </div>
                            <div>
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="priceParts" name="priceParts" placeholder="Enter Price e.g 10.99">
                                <small id="priceParts-error"></small>
                            </div>
                            <div>
                                <label for="stockLevel">Enter Initial Stock:</label>
                                <input type="text" class="form-control" id="stockLevel" name="stockLevel" placeholder="Stock Level">
                                <small id="stockLevel-error"></small>
                            </div>
                            <div>
                                <label for="threshold">Enter the Threshold Level:</label>
                                <input type="text" class="form-control" id="threshold" name="threshold" placeholder="Threshold Level">
                                <small id="thresholdLevel-error"></small>
                            </div>

                        </div>
                        <div class="modal-footer bg-dark">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="partsSubmit">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <!--End of Modal-->

    <div class="modal fade" id="stockLedgerModal" tabindex="-1" role="dialog" aria-labelledby="stockLedger" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white">Stock Ledger</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Delivered Parts</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Modify Threshold</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-editParts-tab" data-bs-toggle="pill" data-bs-target="#pills-editParts" type="button" role="tab" aria-controls="pills-editParts" aria-selected="false">Edit Parts</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                            <form method="POST" action="reception/receptionStockLedger.php" id="stockledger-form">
                                <div>
                                    <label for="partCode">Part Code:</label>
                                    <input type="text" class="form-control" id="partCode" name="partCode" placeholder="Enter Partcode">
                                    <small id="parts-error"></small>
                                </div>

                                <div>
                                    <label for="quantityParts">Quantity:</label>
                                    <input type="text" class="form-control" id="quantityParts" name="quantityParts" placeholder="Enter Quantity">
                                    <small id="quantityParts-error"></small>
                                </div>

                                <br>
                                <p>This feature is used to update the inventory.</p>

                                <br>

                                <input type="submit" class="btn btn-success col-4 offset-8" name="partsSubmit">
                            </form>

                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form method="POST" action="reception/updateThreshold.php" id="threshold-form">
                                <fieldset>
                                    <div>
                                        <label for="partCode">Part Code:</label>
                                        <input type="text" class="form-control" id="refpartCode" name="refpartCode" placeholder="Enter Partcode">
                                        <small id="refpartCode-error"></small>
                                    </div>
                                    <div>
                                        <label for="modifyThreshold">New Threshold Level:</label>
                                        <input type="text" class="form-control" id="modifyThreshold" name="modifyThreshold" placeholder="Enter New Threshold Level">
                                        <small id="modifyThreshold-error"></small>
                                    </div>
                                    <br>
                                    <p>This feature is used to assign new threshold level.</p>
                                    <br>
                                    <input type="submit" class="btn btn-success col-4 offset-8" name="thresholdSubmit">
                                </fieldset>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-editParts" role="tabpanel" aria-labelledby="pills-editParts-tab">

                            <form method="POST" action="reception/updateParts.php">
                                <fieldset>
                                    <div>
                                        <label for="partCode">Part Code:</label>
                                        <input type="text" class="form-control" id="refpartCode" name="refpartCode" placeholder="Enter Partcode">
                                        <small id="refpartCode-error"></small>
                                    </div>


                                    <div>
                                        <label for="editPart">Modify Part:</label>
                                        <input type="text" class="form-control" id="editPart" name="editPart" placeholder="Enter New Initial Price">
                                        <small id="editPart-error"></small>
                                    </div>
                                    <br>
                                    <p>This feature is used to modify parts e.g change price of specific parts.</p>
                                    <br>

                                    <input type="submit" class="btn btn-success col-4 offset-8" name="thresholdSubmit">
                                </fieldset>
                            </form>

                        </div>
                    </div>


                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    </div>



    </div>


</body>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="reception/receptionFormValidation.js"></script>
<script src=" formValidation.js"> </script>
<script src="getButtonIndex.js"> </script>

</html>