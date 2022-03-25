<?php 
function addUser(){

    /*Checks to see if fname and etc.. exist from the the form. If it exists it
    will assign the variables */
    if (
        isset($_POST['fname']) && isset($_POST['sname']) && isset($_POST['role']) && isset($_POST['pword'])) {
        $fname = $_POST['fname'];
        $sname = $_POST['sname'];
        $role = $_POST['role'];
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];
    }
    /*Checks to see if a post request was made (usually from form) */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //connects to database 
        include 'connect.php';
    
        //gets all username from the database 
        $getUsername =  $db->query("SELECT Username FROM `Staff`");
        //gets the number of usernames  
        $numRows = mysqli_num_rows($getUsername);
    
        /*this variable checks to see how many times this loop is run. This is used to make sure 
        data is added once the username row is at the end*/
        $startCheck=1;
        while ($row = $getUsername->fetch_assoc()) { //goes through usernames 
        
        //if username is detected
        if ($row["Username"] == $uname) {
    
            echo "<script>alert('Username is taken. Try another Username');</script>";
            break;
        } else if ($row['Username'] != $uname && $startCheck==$numRows) {  //adds one user at the end of the loop(This is to prevent multiple data entries)
    
            //insert userdetails into sql
            $insertUserName = "INSERT INTO `Staff` (`StaffID`, `Fname`, `Sname`, `Roles`, `Username`, `Password`) 
            VALUES (NULL, '$fname', '$sname', '$role', '$uname', '$pword')";
    
            $db->query($insertUserName);
        }
        //loop incrementation 
        $startCheck++;
        }
        $db->close();
    }

}

?>