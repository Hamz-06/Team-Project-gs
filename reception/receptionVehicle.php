<?php
// php Insert form for adding vehicle
$db = new mysqli('localhost', 'root', '', 'garit_system');
if ($db->connect_errno) {
    printf("Connection failed: %s\n", $db->connect_error);
    exit();
} else {
    $customerCardNumber = $_POST['customerCardNumber'];
    $registrationNumber = $_POST['regNo'];
    $manufacture = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $colour = $_POST['colour'];
    $motdate = $_POST['motdate'];

    //check for duplicates
    $query_registration = "SELECT registrationNo FROM vehicle_garits WHERE registrationNo = '$registrationNumber'";
    $result_registration = mysqli_query($db, $query_registration);

    //prevent user from submitting 
    if (mysqli_num_rows($result_registration) > 0) {
        echo "<script language='javascript'>
        alert('Input Error. Registration number provided already in the system.');
        window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
        </script>";
    } else {
        // checks whether customer exists
        $query_cardNo = ("SELECT * FROM customer_garits WHERE cardNo = '$customerCardNumber'");
        $result_card = mysqli_query($db, $query_cardNo);

        if (mysqli_num_rows($result_card) > 0) {
            $row = $result_card->fetch_assoc();
            $custCardNo = $row["cardNo"];

            mysqli_query($db, "INSERT INTO vehicle_garits (registrationNo, make,  model, year,colour, customerCardNo, motdate) 
                VALUES ('$registrationNumber','$manufacture','$model','$year','$colour','$custCardNo','$motdate')")
                or die(mysqli_error($db));

            echo "<script language='javascript'>
                alert('Registration Successful.'); 
                window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
                </script>";
        } else {
            echo "<script language='javascript'>
            alert('Input Error. Customer Not Found.');
            window.location.href = 'http://localhost/Garit_sys/receptionPage.php';
            </script>";

            $db->close();
        }
    }
}
