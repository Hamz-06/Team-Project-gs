<?php
$db = new mysqli('localhost', 'root', '', 'garit_system');
if ($db->connect_errno) {
    printf("Connection failed: %s\n", $db->connect_error);
    exit();
} else {

    $partCode = $_POST['partCode'];
    $partName = $_POST['partName'];
    $manufacture = $_POST['partsManufac'];
    $vehicleType = $_POST['vehicleParts'];
    $years = $_POST['yearParts'];
    $price = $_POST['priceParts'];
    $stockLvl = $_POST['stockLevel'];
    $threshold = $_POST['threshold'];

    $sql = "SELECT * FROM parts_garits WHERE partCode = '$partCode'";
    $sqlResult = mysqli_query($db, $sql);

    if (mysqli_num_rows($sqlResult) > 0) {
        echo "<script language='javascript'>
            alert('Parts is already in the system, use stock ledger to update.'); 
            window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
            </script>";
    } else {

        mysqli_query($db, "INSERT INTO parts_garits(partCode, partName, manufacture, vechileType, years, price, stocklevel, threshold)
            VALUES ('$partCode', '$partName','$manufacture','$vehicleType','$years','$price','$stockLvl','$threshold') ")
            or die(mysqli_error($db));

        mysqli_query($db, "INSERT INTO stockledger_garits(code)
            VALUES ('$partCode')")
            or die(mysqli_error($db));

        echo "<script language='javascript'>
                    alert('Parts Added.'); 
                    window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
                    </script>";
    }
}
