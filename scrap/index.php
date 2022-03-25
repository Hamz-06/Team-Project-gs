
<!--PHP runs everytime the page is opened or refreshed-->
<?php
//add function 
include 'phpfunctions.php';

//run if add user button is clicked 
if(isset($_POST['addUserSubmit']))
{
   addUser();
} 

//runs if edit user is clicked
if(isset($_POST['addUserSubmit']))
{
   
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
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="display-3 navbar-brand mb-0 h3 text-uppercase text-white">Gartis</span>
      <form class="d-flex">
        <button class="btn btn-primary text-white " type="submit">Logout</button>
      </form>
    </div>
  </nav>
  <br>
  <h1 class="display-2 text-center"><u>Administrator</u></h1>
  <br>
  <div class="content row align-items-center mt-5">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h3 class="display-4 card-title">User Accounts</h3>
          <hr>
          <div class="d-flex flex-row mt-5 mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="50" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
              <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
            </svg>
            <a href="#" class="btn btn-primary w-75" data-toggle="modal" data-target="#exampleModal">Create Account</a>
          </div>
          
          <!---Modal-->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                  <h5 class="modal-title" id="exampleModalLongTitle">Create New User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <!---create user (onsubmit- javascript function)-->
                <div class="modal-body">
                  <form method="post" id="createUser" onsubmit="return checkCreateUserAdmin()" action="adminpage.php">
     
                    <div>
                      <label for="fname">Enter First Name:</label>
                      <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter First Name" maxlength="15">
                      <small id="fnameTag"></small>
                    </div>

                    <div>
                      <label for="sname">Enter Surname:</label>
                      <input type="text" name="sname" class="form-control" id="sname" placeholder="Enter Surname" maxlength="15">
                      <small id="snameTag"></small>
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Pick a Role:</label>
                      <select class="form-control" name="role" id="role">
                        <option>Choose a Role...</option>
                        <option>Receptionist</option>
                        <option>Mechanic</option>
                        <option>Foreperson</option>
                        <option>Franchisee</option>
                        <option>Administrator</option>
                      </select>


                      <div>
                        <label for="username">Enter Username:</label>
                        <input type="text" name="uname" class="form-control" id="uname" placeholder="Enter Username" maxlength="15">
                        <small id="unameTag"></small>
                      </div>

                      <div>
                        <label for="pword">Enter Password:</label>
                        <input type="text" name="pword" class="form-control" id="pword" placeholder="Enter Password" maxlength="15">
                      </div>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-secondary" name ="addUserSubmit">submit</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!---End of Modal-->
          <div class="d-flex flex-row mt-5 mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="50" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
            </svg>
            <a href="#" class="btn btn-primary w-75" data-toggle="modal" data-target="#modifyModal">Modify Accounts</a>
            <!---Modal-->

            <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modify Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                
                

        




 
                </div>
              </div>
            </div>
            <!---End of Modal-->
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h3 class="display-4 card-title">Database</h3>
          <hr>
          <div class="d-flex flex-row mt-5 mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="50" fill="currentColor" class="bi bi-cloud-download" viewBox="0 0 16 16">
              <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z" />
              <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z" />
            </svg>
            <a href="#" class="btn btn-primary w-75">Backup Database</a>
          </div>
          <div class="d-flex flex-row mt-5 mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="50" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
              <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
            </svg>
            <a href="#" class="btn btn-primary w-75">Restore Database</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>




</body>
<script src="formValidation.js"> </script>

</html>