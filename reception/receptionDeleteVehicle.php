<?php
// php Insert form for adding vehicle
$db = new mysqli('localhost', 'root', '', 'garit_system');
if ($db->connect_errno) {
    printf("Connection failed: %s\n", $db->connect_error);
    exit();
} else {
    $regNo = $_POST['regNo'];
    echo $regNo;
    $regNo_Query = "DELETE FROM vehicle_garits WHERE registrationNo = '$regNo'";
    mysqli_query($db, $regNo_Query);

    echo "<script language='javascript'>
            alert('Vehicle Removed.');
            window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
            </script>";

    $db->close();
}
