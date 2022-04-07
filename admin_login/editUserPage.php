<!--PHP runs everytime the page is opened or refreshed-->
<?php
include 'connect.php';
include 'phpfunctions.php';



    //run if add user button is clicked 
    
    if (isset($_GET['buttonID'])) {
        
        $id = $_GET['buttonID'];
        echo $id;
        $getOneUser =  $db->query("SELECT StaffID, Fname, Sname, Roles, Username, Password, hourlyRate FROM `Staff` WHERE StaffID=$id");
        $getOneUser = $getOneUser->fetch_assoc();
    } else if(isset($_POST['editUserSubmit'])){ //should refresh once user clicks submit
        
        editUser();
       
    }else{
        header('location: ../adminpage.php');
    }
  


$db->close();


?>



<!DOCTYPE html>
<html lang="en">
<!---IMPORTANT, this script prevents data to be reentered if user refreshes the page-->
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="style.css" rel="stylesheet">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
               
            </div>
            <div class="modal-body">
                <form method="post" id="editUser" onsubmit="return checkEditUserAdmin()" action="editUserPage.php">

                    <input type="hidden" name = "userID" id = "userID" value = "<?php echo $getOneUser["StaffID"]?>">

                    <div class="spacer">

                        <small id="editFnameTag"></small>
                        <input type="text" name="editFname" class="form-control" id="editFname" placeholder="Enter First Name" value="<?php echo $getOneUser["Fname"] ?>" maxlength="15">

                    </div>

                    <div class="spacer">

                        <small id="editSnameTag"></small>
                        <input type="text" name="editSname" class="form-control" id="editSname" placeholder="Enter Surname" value="<?php echo $getOneUser["Sname"] ?>" maxlength="15">

                    </div>

                    <div class="spacer">
                        <small id="editRoleTag"></small>


                        <select name="editRole" id="editRole" class="form-control">
                            <option <?php if ($getOneUser["Roles"] === 'Receptionist') echo 'selected="selected"'; ?>>Receptionist</option>
                            <option <?php if ($getOneUser["Roles"] === 'Mechanic') echo 'selected="selected"'; ?>>Mechanic</option>
                            <option <?php if ($getOneUser["Roles"] === 'Foreperson') echo 'selected="selected"'; ?>>Foreperson</option>
                            <option <?php if ($getOneUser["Roles"] === 'Franchisee') echo 'selected="selected"'; ?>>Franchisee</option>
                            <option <?php if ($getOneUser["Roles"] === 'Administrator') echo 'selected="selected"'; ?>>Administrator</option>
                        </select>

                    </div>
                    <div class="spacer">
                        <small id="editUnameTag"></small>
                        <input type="text" name="editUname" class="form-control" id="editUname" placeholder="Enter Username" value="<?php echo $getOneUser["Username"] ?>" maxlength="15">

                    </div>

                    <div class="spacer">
                        <small id="editPwordTag"></small>
                        <input type="text" name="editPword" class="form-control" id="editPword" placeholder="Enter Password" value="<?php echo $getOneUser["Password"] ?>" maxlength="15">
                    </div>
                    <!-- hourly rate, only mechanic should see this visible  -->
                 

                    <div class="spacer" id="editRateBox"  <?php if ($getOneUser["Roles"]==='Mechanic'){echo "style='display:block'";}else{echo "style='display : none'";}?>>   
                        <small id="editUserTag"></small>
                        <input type="text" name="editRate" class="form-control" id="editRate" placeholder="Enter hourly Rate" value="<?php echo $getOneUser["hourlyRate"] ?>" maxlength="15">
                    </div>

                    <div class="modal-footer">

                        <a href="../adminpage.php"> 
                            <button class="btn btn-primary">Go back</button>
                        </a> 
            
                        <button type="submit" class="btn btn-primary" name="editUserSubmit">Edit user</button>

                    </div>
                </form>

     

            </div>

            

        </div>

    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="formValidation.js"> </script>


</html>