<!--PHP runs everytime the page is opened or refreshed-->
<?php
//add function 
include 'admin_login/phpfunctions.php';

//run if add user button is clicked (Form button)
if (isset($_POST['addUserSubmit'])) {
  echo "<script>console.log('addUserButton clicked 1.3')</script>";

  addUser();
}




?>



<!DOCTYPE html>
<html lang="en">
<!---IMPORTANT, this script prevents data to be reentered if user refreshes the page-->
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>


<head>
  <title>Administrator - GARITS</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="admin_login/style.css" rel="stylesheet">
</head>

<body>
  <nav>
    <h1>Administrator</h1>
  </nav>


  <div class="row justify-content-center content shadow-sm">

    <div class="box col-6 bg-primary">
      <!-- Title -->
      <div class="line">
        <h2>User Hub</h2>
      </div>

      <!-- Subtitle -->
      <div class="line text-left">
        <h3>View/ Edit User</h3>
      </div>


      <div class="line">
        <table class="table table-hover">

          <thead>
            <tr>
              <!--Frame for table -->
              <th scope="col">StaffID</th>
              <th scope="col">FirstName</th>
              <th scope="col">Surname</th>
              <th scope="col">Role</th>
              <th scope="col">Username</th>
              <th scope="col">Password</th>
              <th scope="col">Edit</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              include 'admin_login/connect.php';
              $getUser =  $db->query("SELECT StaffID, Fname, Sname, Roles, Username, Password FROM `Staff`");

              // get number of users to add to edit button
              $numUser = mysqli_num_rows($getUser);

              //create array for edit button 
              $editButtonArray = array();

              //loop through users and assign a edit button/ form to each user 
              for ($i = 0; $i < $numUser; $i++) {

                $row = $getUser->fetch_assoc();
                $id = $row["StaffID"];

                $buttonForm = '<form action="admin_login/editUserPage.php?>" method="get">
                <input type="hidden" name ="buttonID" value ='.$id.'>
                <button type="submit" class="bi-pencil-square" id="editbutton"> </button>
                </form>';
                //push button to array 
                array_push($editButtonArray, $buttonForm);

                //add to html code 
                echo "<tr><td>" . $row["StaffID"] . "</td><td>" . $row["Fname"] . "</td><td>" . $row["Sname"] . "</td><td>" . $row["Roles"] . "</td><td>" . $row["Username"] . "</td><td>" . $row["Password"] . "</td><td>" . $editButtonArray[$i] .  "</td></tr>";
              }

              $db->close();
              ?>


            </tr>

          </tbody>

        </table>








        <!-- Button trigger modal THIS IS START OF ADD USER -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Create User
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">

            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post" id="createUser" onsubmit="return checkCreateUserAdmin()" action="adminpage.php">

                  <div class="spacer">

                    <small id="fnameTag"></small>
                    <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter First Name" maxlength="15">

                  </div>

                  <div class="spacer">

                    <small id="snameTag"></small>
                    <input type="text" name="sname" class="form-control" id="sname" placeholder="Enter Surname" maxlength="15">

                  </div>

                  <div class="spacer">
                    <small id="roleTag"></small>
                    <!-- call javascript function to enable hourly rate div -->
                    <select class="form-control" name="role" id="role" onchange="displayHourlyRate(this)">
                      <option value="" selected disabled hidden>Please select an option...</option>
                      <option>Receptionist</option>
                      <option value ="Mechanic">Mechanic</option>
                      <option value ="Foreperson">Foreperson</option>
                      <option>Franchisee</option>
                      <option>Administrator</option>
                    </select>

                  </div>
                  <div class="spacer">
                    <small id="unameTag"></small>
                    <input type="text" name="uname" class="form-control" id="uname" placeholder="Enter Username" maxlength="15">
                    <small id="unameTag"></small>
                  </div>

                  <div class="spacer">
                    <small id="pwordTag"></small>
                    <input type="text" name="pword" class="form-control" id="pword" placeholder="Enter Password" maxlength="15">
                  </div>
                  
                  <!-- input field will only display if mechanic page is selected -->
                  <div class="spacer" style="display: none;" id="rateDivID">
                    <small id="rateTag"></small>
                    <input type="text" name="rate" class="form-control" id="rate" placeholder="Enter Hourly Rate" maxlength="15">
                  </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="addUserSubmit">Add User</button>
              </div>

              </form>
            </div>

          </div>
        </div>



      </div>

      <!-- right hand side-->
    </div>
    <div class="box col-6 bg-secondary ovfsc">
      <div class="line">
        <h2>Database</h2>
      </div>



      <div class="line">
        <table class="table">
          <form method="get" action="admin_login/backup.php" name ="backupbtn">

            <button type="submit" class="btn btn-primary btn-lg">Save database </button>

          </form>

        </table>
      </div>

      <div class="line">
        <table class="table">
        <form method="get" action="admin_login/restore.php" name ="loadbtn">

          <button type="submit" class="btn btn-secondary btn-lg">Load database</button>

        </form>
        </table>
      </div>


    </div>
  </div>

</body>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="admin_login/formValidation.js"> </script>




</html>