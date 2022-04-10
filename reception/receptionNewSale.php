<?php
// php Insert form for adding vehicle
$db = new mysqli('localhost', 'root', '', 'garit_system');
if ($db->connect_errno) {
    printf("Connection failed: %s\n", $db->connect_error);
    exit();
} else {
    $reference = $_POST['reference'];
    $addPart = $_POST['partCode'];
    $quantity = $_POST['quantity'];

    $sqlPrice = "SELECT price FROM parts_garits WHERE partCode ='$addPart'";
    $resultPrice = mysqli_query($db, $sqlPrice);
    $priceRow = $resultPrice->fetch_assoc();
    $price = $priceRow['price'];
    $total = $price * $quantity;

    $sqlGreater = "SELECT stockLevel FROM parts_garits WHERE partCode ='$addPart'";
    $resultGreater = mysqli_query($db, $sqlGreater);
    $row = $resultGreater->fetch_assoc();
    $stock = $row['stockLevel'];

    if ($quantity <= $stock) {
        mysqli_query($db, "UPDATE parts_garits SET stockLevel = stockLevel - '$quantity' WHERE partCode = '$addPart'");
        mysqli_query($db, "INSERT INTO sale_garits(receiptReference, quantity, partNo, total)
    VALUES ('$reference','$quantity','$addPart',$total)")
            or die(mysqli_error($db));

        echo "<script language='javascript'>
            alert('Use View Receipt to proccess the sale details.');
            window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
            </script>";
    } else {
        echo "<script language='javascript'>
            alert('Out of Bounds!');
            window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
            </script>";
        $db->close();
    }
}
