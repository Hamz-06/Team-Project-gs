<?php
// php Insert form for adding vehicle
include 'connect.php';
    $vehicle = $_POST['vehicle'];
    $type = $_POST['jobType'];
    // $jobDescription = $_POST['jobDes'];
    $estimateTime = $_POST['time'];
    //task
    // $task = $_POST['addTask'];
    $serviceDate = $_POST['service'];

    //check for existing vehicle
    $query_vehicle = "SELECT registrationNo FROM vehicle_garits WHERE registrationNo = '$vehicle'";
    $result_vehicle = mysqli_query($db, $query_vehicle);

    if (mysqli_num_rows($result_vehicle) <= 0) {
        echo "<script language='javascript'>
        alert('Input Error. Vehicle not found.');
        window.location.href = 'http://localhost/Team-Project-gs-master/receptionPage.php';
        </script>";
    } else {
        //prevent user from submitting 
        mysqli_query($db, "INSERT INTO job_garits(jobType,estimateTime, carRegistration,serviceDate) 
        VALUES ('$type','$estimateTime','$vehicle','$serviceDate')")
            or die(mysqli_error($db));

        //     for ($i = 0; $i < count($task); $i++) {
        //         $taskInsert = "INSERT INTO task_garits(vehicle,taskDescription)
        // VALUES ('$vehicle','$task[$i]')";
        //         mysqli_query($db, $taskInsert);
        //     }

        echo "<script language='javascript'>
    alert('Job Created.'); 
    window.location.href = 'http://localhost/Team-Project-gs-master/receptionPage.php';
    </script>";
        $db->close();
    }

