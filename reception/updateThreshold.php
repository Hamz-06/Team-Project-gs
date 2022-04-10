<?php
// php Insert form for adding vehicle
$db = new mysqli('localhost', 'root', '', 'garit_system');
if ($db->connect_errno) {
    printf("Connection failed: %s\n", $db->connect_error);
    exit();
} else {
    $pcode = $_POST['refpartCode'];
    $threshold = $_POST['modifyThreshold'];

    $query_part = "SELECT * FROM parts_garits WHERE partCode = '$pcode'";
    $partCode_result = mysqli_query($db, $query_part);

    if (mysqli_num_rows($partCode_result) > 0) {
        mysqli_query($db, "UPDATE parts_garits SET threshold = '$threshold' WHERE partCode = '$pcode'");
        echo "<script language='javascript'>
        alert('Threshold successfully updated.');
        window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
        </script>";
    } else {
        echo "<script language='javascript'>
        alert('Part not found.');
        window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
        </script>";
    }
}
