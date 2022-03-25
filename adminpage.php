<!--PHP runs everytime the page is opened or refreshed-->
<?php
//add function 
    include 'phpfunctions.php';

    //run if add user button is clicked 
    if (isset($_POST['addUserSubmit'])) {
        addUser();
    }

    //runs if edit user is clicked
    if (isset($_POST['addUserSubmit'])) {
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
                            <td scope="row">ad</td>
                            <td>Mason</td>
                            <td>Chef</td>
                            <td>fff</td>
                            <td>asda</td>
                            <td><i class="bi bi-pencil-square"></i></td>
                        </tr>

                    </tbody>


                </table>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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

</html>