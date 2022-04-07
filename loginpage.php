<!--PHP runs everytime the page is opened or refreshed-->
<?php
include 'admin_login/connect.php';
/*Checks to see if fname and etc.. exist from the the form. If it exists it
will assign the variables */
if (isset($_POST['uname']) && isset($_POST['pword'])) {
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];
}
/*Checks to see if a post request was made (usually from form) */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    //select roles if uname and pword exist 
    $queryUsername = "SELECT Roles FROM `Staff` WHERE Username = '$uname' AND password = '$pword'";

    //result for query 
    $resultQueryUsername = $db->query($queryUsername);
    $numRows = mysqli_num_rows($resultQueryUsername);

    // if $row returned no results from the query, then create a javascript alert
    if ($numRows <= 0) {
        // this will alert the user 
        echo "<script language='javascript'>
            alert('Please enter valid credentials.');
            
            </script>";
    } else {
        //while loop only run once as only 1 role is taken from query 
        while ($row = $resultQueryUsername->fetch_assoc()) {

            //switch statement add more stuff 
            switch ($row["Roles"]) {
                case 'Receptionist':
                    // redirect to this page
                    header("location: receptionPage.php");

                    break;
                case 'Administrator':
                    // redirect to this page
                    header("Location: adminpage.php");
                    break;
                default:
                    echo "JUST INCASE";
            }
        }
    }
}
    //Add a default admin if no row is returned from User 
    //Should we delete the default account after another account has been created??????

    $getNumRows = $db->query("Select Username from Staff");
    $sizeOfRow = mysqli_num_rows($getNumRows);
    if ($sizeOfRow <1) {
        //no staff users so add to db 
        $db->query( "INSERT INTO `Staff` (`StaffID`, `Fname`, `Sname`, `Roles`, `Username`, `Password`) 
        VALUES (NULL, 'default', 'admin', 'Administrator', 'default', 'admin')");
    } else {
        //more then 1 user detected 
    }
?>




<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="utf-8">
    <!---IMPORTANT, this script prevents data to be reentered if user refreshes the page-->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <title>Garits</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body class="bg-light">
    <section class="container-fluid w-100">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 co;-md-3">

                <div class="row justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </div>
                <br>

                <p class="display-3 text-center text-uppercase">Gartis System</p>
                <form class="form-container" method="post" onsubmit="return checkLogin()" action="loginpage.php">
                    <div class="form-group">
                        <label for="uName">Username:</label>
                        <input type="username" class="form-control" id="uname" aria-describedby="userHelp" placeholder="Enter Username" name="uname">
                        <small id="unameTag"></small>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password:</label>
                        <input type="password" class="form-control" id="pword" placeholder="Password" name="pword">
                        <small id="pwordTag"></small>
                    </div>
                    <br>
                    <button type="login" class="btn btn-primary w-100">Login</button>
                </form>
            </section>
        </section>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</body>
<script src="formValidation.js"> </script>

</html>