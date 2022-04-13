<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mot reminder</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav>
        <h1>Receptionist</h1>
    </nav>

    <div class="container">
        <br>
        <br>
        <div class="col">
            <table class="table table-bordered border-dark">
                <thead>
                    <!-- name of table  -->
                    <tr>

                        <th scope="col">Address</th>
                        <th scope="col">Name of customer</th>
                        <th scope="col">Vehicle reg</th>
                        <th scope="col">MOT renewal test date</th>
                        <th scope="col">Download PDF</th>

                    </tr>
                </thead>
                <!-- data for table -->
                <tbody>

                    <tr>
                        <?php
                        include 'connect.php';
                        //get todays date 
                        $todayDate = date("Y-m-d");
                        $todayDateFive = date('Y-m-d', strtotime($todayDate . ' + 5 days'));


                        //get all mot vehicles
                        $getVehicles =  $db->query("SELECT * FROM `motreminder` WHERE motdate > '$todayDate' AND motdate<='$todayDateFive'");

                        // get number of users to add to edit button
                        $numVehicles = mysqli_num_rows($getVehicles);


                        //create array for edit button 
                        $editButtonArray = array();
                        //loop through users and assign a edit button/ form to each user 
                        for ($i = 0; $i < $numVehicles; $i++) {

                            $row = $getVehicles->fetch_assoc();

                            //assign regNo to button to use as name -> (is a primary key)
                            $regNo = $row["registrationNo"];


                            $buttonForm = '<form action="motReport.php?>" method="get">
           
                <button type="submit" class="bi bi-arrow-down-circle" id="editbutton" name="regNo" value =' . $regNo . '> </button>
                </form>';
                            //push button to array 
                            array_push($editButtonArray, $buttonForm);

                            //add to html code 
                            echo "<tr><td>" . $row["address"] . "</td><td>" . $row["fname"] . " " . $row["sname"] . "</td><td>" . $row["registrationNo"] . "</td><td>" . $row["motdate"] . "</td><td>" . $buttonForm . "</td></tr>";
                        }

                        $db->close();
                        ?>


                    </tr>
                </tbody>



            </table>

        </div>


    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</html>