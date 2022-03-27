//gets id of elements 
function $(id) {
    return document.getElementById(id);
}


var name_valid = /^[A-Za-z]+$/;  //regex that makes sure data is valid


function checkCreateUserAdmin(){
    //gets data from form 
    
    const firstName = $("fname").value.trim();
    const secondName = $("sname").value.trim();
    const role = $("role").value.trim();
    const userName = $("uname").value.trim();
    const password = $("pword").value.trim();
    
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
    }else if (!firstName.match(name_valid)) {  //letters only 

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
    }else if (!firstName.match(name_valid)) {  //letters only 

        $("unameTag").style.display = "inline";
        $("snameTag").innerHTML = "Letters Only.";

    } else {
        $("unameTag").style.display = "none"; // remove error message
        usernameValid = true; // set boolean variable to true
    }

    var roleValid = false; // set boolean value to false
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


    
    // if all boolean variables are true then return true 
    if (firstnameValid && secondnameValid && usernameValid && passwordValid && roleValid) {
        
        return true;            
    }else{
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




