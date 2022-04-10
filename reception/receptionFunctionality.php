<?php
// php Insert form for creating customer 
$db = new mysqli('localhost', 'root', '', 'garit_system');
if ($db->connect_errno) {
    printf("Connection failed: %s\n", $db->connect_error);
    exit();
} else {
    $firstName = $_POST['name'];
    $surname = $_POST['sname'];
    $address = $_POST['address'];
    $postCode = $_POST['pcode'];
    $phoneNumber = $_POST['phone'];
    $faxNumber = $_POST['fax'];
    $type = $_POST['inlineRadioOptions'];
    $query_telephone = "SELECT telephone FROM customer_garits WHERE telephone = '$phoneNumber'";
    $result_telephone = mysqli_query($db, $query_telephone);

    //prevent user from submitting 
    if (mysqli_num_rows($result_telephone) > 0) {
        echo "<script language='javascript'>
            alert('Input Error. Telephone number provided already in the system.');
            window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
            </script>";
    } else {
        mysqli_query($db, "INSERT INTO customer_garits(fname, sname,  address, pcode, telephone,faxNo,customerType) 
                VALUES ('$firstName','$surname','$address','$postCode','$phoneNumber','$faxNumber','$type')")
            or die(mysqli_error($db));

        echo "<script language='javascript'>
                alert('Registration Successful.');
                window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
                </script>";

        $db->close();
    }
}

// end of customer 
///////////////////////////////
