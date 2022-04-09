//gets id of elements 
function $(id) {
    return document.getElementById(id);
}


var name_valid = /^[A-Za-z]+$/;  //regex that makes sure data is valid
var float_valid = /^[+-]?([0-9]*[.])?[0-9]+/;

function checkCreateUserAdmin(){
    //gets data from form 
    
    const firstName = $("fname").value.trim();
    const secondName = $("sname").value.trim();
    const role = $("role").value.trim();
    const userName = $("uname").value.trim();
    const password = $("pword").value.trim();
    //hourly rate
    const hourlyRate = $("rate").value.trim(); 
    
    // firstname validation
    var firstnameValid = false; // set boolean value to false
    if (firstName == "") { // if empty then replace error message text with "Please fill in this field"
        $("fnameTag").style.display = "inline";
        $("fnameTag").innerHTML = "Please fill in this field.";
    }else if (!firstName.match(name_valid)) {  //letters only 

        $("fnameTag").style.display = "inline";
        $("fnameTag").innerHTML = "Letters Only.";

    } else {
        $("fnameTag").style.display = "none"; // remove error message
        firstnameValid = true; // set boolean variable to true
    }

    // secondname validation
    var secondnameValid = false; // set boolean value to false
    if (secondName == "") { // if empty then replace error message text with "Please fill in this field"
        $("snameTag").style.display = "inline";
        $("snameTag").innerHTML = "Please fill in this field.";
    }else if (!secondName.match(name_valid)) {  //letters only 

        $("snameTag").style.display = "inline";
        $("snameTag").innerHTML = "Letters Only.";

    } else {
        $("snameTag").style.display = "none"; // remove error message
        secondnameValid = true; // set boolean variable to true
    }

    var usernameValid = false; // set boolean value to false
    if (userName == "") { // if empty then replace error message text with "Please fill in this field"
        $("unameTag").style.display = "inline";
        $("unameTag").innerHTML = "Please fill in this field.";
    }else if (!userName.match(name_valid)) {  //letters only 

        $("unameTag").style.display = "inline";
        $("unameTag").innerHTML = "Letters Only.";

    } else {
        $("unameTag").style.display = "none"; // remove error message
        usernameValid = true; // set boolean variable to true
    }

    var roleValid = false; // set boolean value to false

    console.log(role);
    if (role == "") { // if empty then replace error message text with "Please fill in this field"
        $("roleTag").style.display = "inline";
        $("roleTag").innerHTML = "Please fill in this field.";
    }else if (!role.match(name_valid)) {  //letters only 

        $("roleTag").style.display = "inline";
        $("roleTag").innerHTML = "Letters Only.";

    } else {
        $("roleTag").style.display = "none"; // remove error message
        roleValid = true; // set boolean variable to true
    }

    var passwordValid = false; // set boolean value to false
    if (password == "") { // if empty then replace error message text with "Please fill in this field"
        $("pwordTag").style.display = "inline";
        $("pwordTag").innerHTML = "Please fill in this field.";
    }else if (!password.match(name_valid)) {  //letters only 

        $("pwordTag").style.display = "inline";
        $("pwordTag").innerHTML = "Letters Only.";

    } else {
        $("pwordTag").style.display = "none"; // remove error message
        passwordValid = true; // set boolean variable to true
    }


    //check hourly rate if role is mechanic 
    
    function checkHourlyRate(){
        //if mechanic - > return triue 
        switch(role){
            case "Mechanic":
                //if empty
                if (hourlyRate==""){
                    $("rateTag").style.display = "inline";
                    $("rateTag").innerHTML = "Please fill in this field.";
                    return false;
                }else if(!hourlyRate.match(float_valid)){

                    $("rateTag").style.display = "inline";
                    $("rateTag").innerHTML = "Incorrect format";
                    return false;
                }else{
                    $("rateTag").style.display = "none";
                    
                    return true;
                }
            
            default:
                return true;
                
        }

        //else -> return false 
    }



    
    // if all boolean variables are true then return true 
    if (firstnameValid && secondnameValid && usernameValid && passwordValid && roleValid && checkHourlyRate()) {
        
        return true;            
    }else{
        return false;
    } 
}

///////////////////////////
//Allow hourly rate to be displayed if the user selects mecahnic/foreperson as a role 

function displayHourlyRate(valOfRole){
    console.log(valOfRole.value);
  
    if (valOfRole.value=="Mechanic" || valOfRole.value=="Foreperson"){
        $("rateDivID").style.display="block";
        //set default value of mechahic and foreperson 
        if (valOfRole.value=="Mechanic"){
            $("rate").value = 105;
        }else{
            $("rate").value = 125;
        }

        

        

    }else{
        $("rateDivID").style.display="none";
        
    }




 
}

//display edited hourly rate div box
function displayEditedHourlyRate(){

    document.getElementById('editRateBox').style.display ='block';
}


///////////////////
function checkEditUserAdmin() {
    //gets data from form 
    
    const editFirstName = $("editFname").value.trim();
    const editSecondName = $("editSname").value.trim();
    const editRole = $("editRole").value.trim();
    const editUserName = $("editUname").value.trim();
    const editPassword = $("editPword").value.trim();
    //mechanic 
    const editHourlyRate = $("editRate").value.trim();

    // editFirstName validation
    var editFnameValid = false; // set boolean value to false
    if (editFirstName == "") { // if empty then replace error message text with "Please fill in this field"
        $("editFnameTag").style.display = "inline";
        $("editFnameTag").innerHTML = "Please fill in this field.";
    } else if (!editFirstName.match(name_valid)) {  //letters only 

        $("editFnameTag").style.display = "inline";
        $("editFnameTag").innerHTML = "Letters Only.";

    } else {
        $("editFnameTag").style.display = "none"; // remove error message
        editFnameValid = true; // set boolean variable to true
    }

    // editSecondName validation
    var editSecondNameValid = false; // set boolean value to false
    if (editSecondName == "") { // if empty then replace error message text with "Please fill in this field"
        $("editSnameTag").style.display = "inline";
        $("editSnameTag").innerHTML = "Please fill in this field.";
    } else if (!editSecondName.match(name_valid)) {  //letters only 

        $("editSnameTag").style.display = "inline";
        $("editSnameTag").innerHTML = "Letters Only.";

    } else {
        $("editSnameTag").style.display = "none"; // remove error message
        editSecondNameValid = true; // set boolean variable to true
    }

    var editUsernameValid = false; // set boolean value to false
    if (editUserName == "") { // if empty then replace error message text with "Please fill in this field"
        $("editUnameTag").style.display = "inline";
        $("editUnameTag").innerHTML = "Please fill in this field.";
    } else if (!editUserName.match(name_valid)) {  //letters only 

        $("editUnameTag").style.display = "inline";
        $("editUnameTag").innerHTML = "Letters Only.";

    } else {
        $("editUnameTag").style.display = "none"; // remove error message
        editUsernameValid = true; // set boolean variable to true
    }

    var editRoleValid = false; // set boolean value to false
    if (editRole == "") { // if empty then replace error message text with "Please fill in this field"
        $("editRoleTag").style.display = "inline";
        $("editRoleTag").innerHTML = "Please fill in this field.";
    } else if (!editRole.match(name_valid)) {  //letters only 

        $("editRoleTag").style.display = "inline";
        $("editRoleTag").innerHTML = "Letters Only.";

    } else {
        $("editRoleTag").style.display = "none"; // remove error message
        editRoleValid = true; // set boolean variable to true
    }

    var editPasswordValid = false; // set boolean value to false
    if (editPassword == "") { // if empty then replace error message text with "Please fill in this field"
        $("editPwordTag").style.display = "inline";
        $("editPwordTag").innerHTML = "Please fill in this field.";
    } else if (!editPassword.match(name_valid)) {  //letters only 

        $("editPwordTag").style.display = "inline";
        $("editPwordTag").innerHTML = "Letters Only.";

    } else {
        $("editPwordTag").style.display = "none"; // remove error message
        editPasswordValid = true; // set boolean variable to true
    }

    
    //optional mechanic hourly rate
    function checkEditedHourlyRate(){
        switch(editRole){
            case "Mechanic":
                //if empty
                if (editHourlyRate==""){
                    $("editUserTag").style.display = "inline";
                    $("editUserTag").innerHTML = "Please fill in this field.";
                    return false;
                }else if(!editHourlyRate.match(float_valid)){

                    $("editUserTag").style.display = "inline";
                    $("editUserTag").innerHTML = "Incorrect format";
                    return false;
                }else{
                    $("editUserTag").style.display = "none";
                    
                    return true;
                }
            
            default:
                return true;
                
        }
    }



    // if all boolean variables are true then return true 
    if (editFnameValid && editSecondNameValid && editUsernameValid && editPasswordValid && editRoleValid && checkEditedHourlyRate()) {

        return true;
    } else {
        return false;
    }
}


function checkLogin(){
    const uname = $("uname").value.trim();
    const pword = $("pword").value.trim();
    
    // username validation
    var username = false; // set boolean value to false
    if (uname == "") { // if empty then replace error message text with "Please fill in this field"
        $("unameTag").style.display = "inline";
        $("unameTag").innerHTML = "Please fill in this field.";
    }else if (!uname.match(name_valid)) {  //letters only 

        $("unameTag").style.display = "inline";
        $("unameTag").innerHTML = "Letters Only.";

    } else {
        $("unameTag").style.display = "none"; // remove error message
        username = true; // set boolean variable to true
    }

    // password validation
    var password = false; // set boolean value to false
    if (pword == "") { // if empty then replace error message text with "Please fill in this field"
        $("pwordTag").style.display = "inline";
        $("pwordTag").innerHTML = "Please fill in this field.";
    }else {
        $("pwordTag").style.display = "none"; // remove error message
        password = true; // set boolean variable to true
    }

    // if all boolean variables are true then return true 
    if (password && username) {
    
        return true;            
    }else{
        return false;
    }

}




