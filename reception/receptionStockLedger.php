<?php
// php Insert form for adding vehicle
$db = new mysqli('localhost', 'root', '', 'garit_system');
if ($db->connect_errno) {
    printf("Connection failed: %s\n", $db->connect_error);
    exit();
} else {
    $partCode = $_POST['partCode'];
    $quantity = $_POST['quantityParts'];

    $query_part = "SELECT * FROM parts_garits WHERE partCode = '$partCode'";
    $partCode_result = mysqli_query($db, $query_part);

    if (mysqli_num_rows($partCode_result) > 0) {

        $row = $partCode_result->fetch_assoc();
        $partNo = $row['partCode'];

        // $query_partExist = "SELECT * FROM stockledger_garits WHERE code = '$partNo'";
        // $partExist_result = mysqli_query($db, $query_partExist);

        $queryMonth = "SELECT dateReported FROM stockledger_garits WHERE code = '$partCode' AND date_format(dateReported, '%m') = MONTH(CURDATE())";
        $resultMonth = mysqli_query($db, $queryMonth);


        if (mysqli_num_rows($resultMonth) > 0) {
            mysqli_query($db, "UPDATE stockledger_garits SET delivery = delivery + '$quantity' WHERE code = '$partNo'");
            mysqli_query($db, "UPDATE parts_garits SET stockLevel = stockLevel + '$quantity' WHERE partCode = '$partNo'");
            echo "<script language='javascript'>
            alert('Inventory Updated.'); 
            window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
            </script>";
        } else {
            mysqli_query($db, "INSERT INTO stockledger_garits(code, delivery)
    VALUES ('$partCode','$quantity')")
                or die(mysqli_error($db));
            mysqli_query($db, "UPDATE parts_garits SET stockLevel = stockLevel + '$quantity' WHERE partCode = '$partNo'");

            echo "<script language='javascript'>
    alert('Inventasdfsdafdd.'); 
    window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
    </script>";
        }
    } else {
        echo "<script language='javascript'>
            alert('Input Error. Part not found.');
            window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
            </script>";
        $db->close();
    }
}
