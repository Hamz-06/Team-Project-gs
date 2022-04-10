<?php
// php Insert form for adding vehicle
$db = new mysqli('localhost', 'root', '', 'garit_system');
if ($db->connect_errno) {
    printf("Connection failed: %s\n", $db->connect_error);
    exit();
} else {
    $vehicle = $_POST['vehicle'];
    $type = $_POST['jobType'];
    $jobDescription = $_POST['jobDes'];
    $estimateTime = $_POST['time'];
    //task
    $task = $_POST['addTask'];
    $serviceDate = $_POST['service'];

    //check for existing vehicle
    $query_vehicle = "SELECT registrationNo FROM vehicle_garits WHERE registrationNo = '$vehicle'";
    $result_vehicle = mysqli_query($db, $query_vehicle);

    if (mysqli_num_rows($result_vehicle) <= 0) {
        echo "<script language='javascript'>
        alert('Input Error. Vehicle not found.');
        window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
        </script>";
    } else {
        //prevent user from submitting 
        mysqli_query($db, "INSERT INTO job_garits(jobType,  jobDescription, estimateTime, carRegistration,serviceDate) 
        VALUES ('$type','$jobDescription','$estimateTime','$vehicle','$serviceDate')")
            or die(mysqli_error($db));

        for ($i = 0; $i < count($task); $i++) {
            $taskInsert = "INSERT INTO task_garits(vehicle,taskDescription)
    VALUES ('$vehicle','$task[$i]')";
            mysqli_query($db, $taskInsert);
        }

        echo "<script language='javascript'>
    alert('Job Created.'); 
    window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
    </script>";
        $db->close();
    }
}
