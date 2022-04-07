

<?php

function addUser()
{

    /*Checks to see if fname and etc.. exist from the the form. If it exists it
    will assign the variables */
    if (isset($_POST['fname']) && isset($_POST['sname']) && isset($_POST['role']) && isset($_POST['pword'])) {
        $fname = $_POST['fname'];
        $sname = $_POST['sname'];
        $role = $_POST['role'];
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];
        //mechanic only 
        $hourlyRate = $_POST['rate'];

    }
    /*Checks to see if a post request was made (usually from form) */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //connects to database 
        include 'connect.php';

        //gets all username from the database 
        $getUsername =  $db->query("SELECT Username FROM `Staff`");
        //gets the number of usernames  
        $numRows = mysqli_num_rows($getUsername);

        /*runs a loop to check for duplicate user, if false enter data */



        if ($numRows == 0) {
            $insertUserName = "INSERT INTO `Staff` (`StaffID`, `Fname`, `Sname`, `Roles`, `Username`, `Password`, `hourlyRate`) 
            VALUES (NULL, '$fname', '$sname', '$role', '$uname', '$pword', '$hourlyRate')";
            $db->query($insertUserName);
        }

        for ($i = 0; $i < $numRows; $i++) {
            echo "<script>console.log('GO Through Code Increment');</script>";
            $row = $getUsername->fetch_assoc();

            if ($row["Username"] == $uname) {

                echo "<script>alert('Username is taken. Try another Username');</script>";
                break;
            } else if ($row['Username'] != $uname && $i == $numRows - 1) {  //adds one user at the end of the loop(This is to prevent multiple data entries)

                //insert userdetails into sql
                $insertUserName = "INSERT INTO `Staff` (`StaffID`, `Fname`, `Sname`, `Roles`, `Username`, `Password`,`hourlyRate`) 
                VALUES (NULL, '$fname', '$sname', '$role', '$uname', '$pword', '$hourlyRate')";

                $db->query($insertUserName);
            }
        }

        $db->close();
    }
}

function editUser()
{
    include 'connect.php';



    /*Checks to see if fname and etc.. exist from the the form. If it exists it
    will assign the variables */
    if (isset($_POST['editFname']) && isset($_POST['editSname']) && isset($_POST['editPword'])) {

        $userID = $_POST['userID'];
        $editedfname = $_POST['editFname'];
        $editedsname = $_POST['editSname'];
        $editedrole = $_POST['editRole'];
        $editeduname = $_POST['editUname'];
        $editedpword = $_POST['editPword'];
        //hourly rate mechanic optional
        $editedrate = $_POST['editRate'];

        echo $editedfname;
        echo $editedpword;
        echo $editedrole;
    }


    /*Checks to see if a post request was made (usually from form) */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $sqlEditUser = "UPDATE `Staff` SET `Fname` = '$editedfname', `Sname` = '$editedsname', `Roles` = '$editedrole', `Username` = '$editeduname', `Password`='$editedpword', `hourlyRate`='$editedrate' WHERE `StaffID` = '$userID'";

        $db->query($sqlEditUser);
        
        
        $db->close();
        echo "<script>
        alert('User has been edited');
        window.location.replace('../adminpage.php');
        </script>";
        

    }
        


}

?>
