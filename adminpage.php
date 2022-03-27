<!--PHP runs everytime the page is opened or refreshed-->
<?php
//add function 
include 'phpfunctions.php';

//run if add user button is clicked 
if (isset($_POST['addUserSubmit'])) {
  addUser();
}

if (isset($_POST['editUserSubmit'])) {
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
  <title>Mechanic - GARITS</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>

<body>
  <nav>
    <h1>Mechanic</h1>
  </nav>


  <div class="row justify-content-center content shadow-sm">

    <div class="box col-6 bg-primary">
      <!-- Title -->
      <div class="line">
        <h2>User Hub</h2>
      </div>

      <!-- Subtitle -->
      <div class="line text-left">
        <h3>Edit User</h3>
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
              include 'connect.php';
              $getUser =  $db->query("SELECT StaffID, Fname, Sname, Roles, Username, Password FROM `Staff`");

              // get number of users to add to edit button
              $numUser = mysqli_num_rows($getUser);
              //create array for edit button 

              $editButtonArray = array();
              //loop through users and assign a edit button to each user 
              for ($i = 0; $i < $numUser; $i++) {

                $row = $getUser->fetch_assoc();
                array_push($editButtonArray, '<td><button type="button" class="bi-pencil-square" id="editbutton" data-bs-toggle="modal" data-bs-target="#exampleModal2"> </button></td>');
                echo "<tr><td>" . $row["StaffID"] . "</td><td>" . $row["Fname"] . "</td><td>" . $row["Sname"] . "</td><td>" . $row["Roles"] . "</td><td>" . $row["Username"] . "</td><td>" . $row["Password"] . "</td><td>" . $editButtonArray[$i] .  "</td></tr>";
              }

              ?>


            </tr>

          </tbody>

        </table>


        <!--Modal num2 (USED TO EDIT USER - Similar to create user) -->

        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">

            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post" id="editUser" onsubmit="return checkEditUserAdmin()" action="adminpage.php">

                  <div class="spacer">

                    <small id="editFnameTag"></small>
                    <input type="text" name="editFname" class="form-control" id="editFname" placeholder="Enter First Name" value="sdsd" maxlength="15">

                  </div>

                  <div class="spacer">

                    <small id="editSnameTag"></small>
                    <input type="text" name="editSname" class="form-control" id="editSname" placeholder="Enter Surname" maxlength="15">

                  </div>

                  <div class="spacer">
                    <small id="editRoleTag"></small>
                    <select class="form-control" name="editRole" id="editRole">
                      <option>Choose a Role...</option>
                      <option>Receptionist</option>
                      <option>Mechanic</option>
                      <option>Foreperson</option>
                      <option>Franchisee</option>
                      <option>Administrator</option>
                    </select>

                  </div>
                  <div class="spacer">
                    <small id="editUnameTag"></small>
                    <input type="text" name="editUname" class="form-control" id="editUname" placeholder="Enter Username" maxlength="15">

                  </div>

                  <div class="spacer">
                    <small id="editPwordTag"></small>
                    <input type="text" name="editPword" class="form-control" id="editPword" placeholder="Enter Password" maxlength="15">
                  </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="editUserSubmit">Save changes</button>
              </div>

              </form>
            </div>

          </div>
        </div>


        <!-- Button trigger modal THIS IS START OF ADD USER -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Launch demo modal
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
                    <select class="form-control" name="role" id="role">
                      <option>Choose a Role...</option>
                      <option>Receptionist</option>
                      <option>Mechanic</option>
                      <option>Foreperson</option>
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


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="addUserSubmit">Save changes</button>
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
          <button type="button" class="btn btn-primary btn-lg">Large button</button>

        </table>
      </div>

      <div class="line">
        <table class="table">

          <button type="button" class="btn btn-secondary btn-lg">Large button</button>
        </table>
      </div>


    </div>
  </div>

</body>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="formValidation.js"> </script>
<script src="getButtonIndex.js"> </script>



</html>