//gets id of elements 
function $(id) {
    return document.getElementById(id);
}

var submission = false;

$("register-form").addEventListener("submit", (e) => {
    if (submission == false) {
        e.preventDefault();
        checkCustomerForm(); // check for errors
    }
});


var name_valid = /^[A-Za-z]+$/;  //regex that makes sure data is valid
var numberValidation = /^[0-9]+$/; // validation for only numric input
var dateValidation =/^[0-9][0-9][0-9][0-9][-][0-9][0-9][-][0-9][0-9]/; //date validation

function checkCustomerForm(){
    const fnameInput = $("name").value.trim();
    const surnameInput = $("sname").value.trim();
    const addressInput = $("address").value.trim();
    const pcodeInput = $("pcode").value.trim();
    const numberInput = $("phone").value.trim();
    const faxnoInput = $("fax").value.trim();

    //validation for the customer name 
    var fnameValid = false;

    if (fnameInput == "") { // if empty then replace error message text with "Please fill in this field"
        $("name-error").style.display = "inline";
        $("name-error").innerHTML = "Please fill in this field.";
    }else if (!fnameInput.match(name_valid)) {  //letters only 

        $("name-error").style.display = "inline";
        $("name-error").innerHTML = "Letters Only.";

    } else {
        $("name-error").style.display = "none"; // remove error message
        fnameValid = true; // set boolean variable to true
    }//end of customer name validation

    //validation for surname
    var snameValid = false;

    if (surnameInput == "") { 
        $("sname-error").style.display = "inline";
        $("sname-error").innerHTML = "Please fill in this field.";
    }else if (!surnameInput.match(name_valid)) {  

        $("sname-error").style.display = "inline";
        $("sname-error").innerHTML = "Letters Only.";

    } else {
        $("sname-error").style.display = "none"; 
        snameValid = true; 
    }//end of surname validation

    //validation for customer address
    var addressValid = false;
    if(addressInput ==""){
        $("address-error").style.display = "inline";
        $("address-error").innerHTML = "Please fill in this field."
    }else{
        $("address-error").style.display = "none";
        addressValid = true;
    }//end of address validation

    //validation for postcode 
    var postcodeValidation = false;

    if(pcodeInput == ""){
        $("pcode-error").style.display = "inline";
        $("pcode-error").innerHTML = "Please fill in this field."
    }else{
        $("pcode-error").style.display = "none";
        postcodeValidation = true;
    }//end of postcode validation

    //validation for phoneNumber 
    var phoneNumberValidation = false;

    if(numberInput == ""){
        $("phone-error").style.display = "inline";
        $("phone-error").innerHTML = "Please fill in this field."
    }else if(!numberInput.match(numberValidation)){
        $("phone-error").style.display = "inline";
        $("phone-error").innerHTML = "Invalid input. Please provide only numeric values.*";
    }else{
        $("phone-error").style.display = "none";
        phoneNumberValidation = true;
     }//end of postcode validation

      //validation for phoneNumber 
    var faxNumberValidation = false;

    if (faxnoInput == "") {
        $("fax-error").style.display = "inline";
        $("fax-error").innerHTML = "No provided fax number.";
        faxNumberValidation = true;
     }else if(!faxnoInput.match(numberValidation)){
        $("fax-error").style.display = "inline";
        $("fax-error").innerHTML = "Invalid input. Please provide only numeric values.*"; //when symbols and alphabet values is present, provide this error message
     }else{
        $("fax-error").style.display = "inline";
        $("fax-error").innerHTML = "Valid fax number.";
        faxNumberValidation = true;
     }
    //end of postcode validation




     // if all boolean variables are true then return true 
    function isValid() {
        if (fnameValid && snameValid && addressValid && postcodeValidation && phoneNumberValidation &&faxNumberValidation) {
            submission = true;
            //submit form if sumbmission is true
            document.getElementById("register-form").submit();
    
        } else if (!(fnameValid && snameValid && addressValid && postcodeValidation && phoneNumberValidation && faxNumberValidation)) {
            alert("Oops!...Something went wrong. Please try again.");
        }
        }
    isValid();


}

var vehicleSubmission = false;

$("vehicle-form").addEventListener("submit", (e) => {
    if (vehicleSubmission == false) {
        e.preventDefault();
        vehicleFormCheck(); // check for errors
    }
});

function vehicleFormCheck(){
    const customerCardNumberInput = $("customerCardNumber").value.trim();
    const registrationInput = $("regno").value.trim();
    const manfacturerInput = $("make").value.trim();
    const modelInput = $("model").value.trim();
    const yearInput = $("year").value.trim();
    const colourInput = $("colour").value.trim();

    //validation for customer card number
    var customerNoValid = false;
    if(customerCardNumberInput==""){
        $("customerCardNumber-error").style.display = "inline";
        $("customerCardNumber-error").innerHTML = "No provided customer card number.";
    }else if (!customerCardNumberInput.match(numberValidation)) {  
        $("customerCardNumber-error").style.display = "inline";
        $("customerCardNumber-error").innerHTML = "Incorrect Input.";
    } else {
        $("customerCardNumber-error").style.display = "none"; 
        customerNoValid = true; 
    }// end of validation 

    //regnumber validation
    var regNoValid = false;
    console.log(registrationInput);
    if(registrationInput==""){
        $("registration-error").style.display = "inline";
        $("registration-error").innerHTML = "No provided registration number.";
    }else {
        $("registration-error").style.display = "none"; 
        regNoValid = true; 
    }// end of validation 



    //validation for the manufacturer of the vehicle
    var manfacturerValidation = false;
    if(manfacturerInput==""){
        $("make-error").style.display = "inline";
        $("make-error").innerHTML = "No provided manufacturer.";
    }else {
        $("make-error").style.display = "none"; 
        manfacturerValidation = true; 
    }//end of validation'

    //validation for model
    var modelValidation = false;
    if(modelInput==""){
        $("model-error").style.display = "inline";
        $("model-error").innerHTML = "No provided model.";
    }else {
        $("model-error").style.display = "none"; 
        modelValidation = true; 
    }//end of validation]

    //year validation
    var yearValidation = false;
    if(yearInput==""){
        $("year-error").style.display = "inline";
        $("year-error").innerHTML = "No provided year.";
    } else {
        $("year-error").style.display = "none"; 
        yearValidation = true; 
    }//end of validation

    //colour validation 
    var colourValid = false;
    if(colourInput==""){
        $("colour-error").style.display = "inline";
        $("colour-error").innerHTML = "No provided colour.";
    }else if (!colourInput.match(name_valid)) {  
        $("colour-error").style.display = "inline";
        $("colour-error").innerHTML = "Incorrect Input.";
    } else {
        $("colour-error").style.display = "none"; 
        colourValid = true; 
    }

    function vehicleFormValid(){
        if(customerNoValid && manfacturerValidation && modelValidation && yearValidation &&colourValid &&regNoValid ){

            vehicleSubmission = true;
            document.getElementById("vehicle-form").submit();

        }else if(!(customerNoValid && manfacturerValidation && modelValidation && yearValidation)){
            alert("Oops!...Something went wrong. Please try again.");
        }
    }
    vehicleFormValid();
}

//job form check 
var jobSubmission = false;

$("job-form").addEventListener("submit", (e) => {
    if (jobSubmission == false) {
        e.preventDefault();
        jobFormCheck(); // check for errors
    }
});


//adds a default time to service date- 10 days ahead of time 




function jobFormCheck(){
    const vehiclePlateInput = $("vehicle").value.trim();
    const jobType = $("jobType").value.trim();
    const hoursInput = $("time").value.trim();
    const servicedate = $("servicedate").value.trim();
    

    //validation for vehicle plate number
    var plateNumberValid = false;
    if(vehiclePlateInput==""){
        $("vehicle-error").style.display = "inline";
        $("vehicle-error").innerHTML = "No provided vehicle plate number.";
    } else {
        $("vehicle-error").style.display = "none"; 
        plateNumberValid = true; 
    }// end of validation 

    //validation for job type 
    var jobTypeValid = false;
    if(jobType==""){
        $("jobtype-error").style.display = "inline";
        $("jobtype-error").innerHTML = "No provided job type.";
    } else {
        $("jobtype-error").style.display = "none"; 
        jobTypeValid = true; 
    }//end of validation

    //validation for estimate time
    var hoursvalidation = false;
    if(hoursInput==""){
        $("time-error").style.display = "inline";
        $("time-error").innerHTML = "No provided hours number.";
    } else {
        $("time-error").style.display = "none"; 
        hoursvalidation = true; 
    }
    console.log(servicedate);
    //validation for date 
    var serviceDateValidation = false;
    if(!servicedate.match(dateValidation)){
        $("date-error").style.display = "inline";
        $("date-error").innerHTML = "No provided date.";
        
    }else{
        $("date-error").style.display = "none";
        serviceDateValidation=true;
    }
    



    function jobFormValid(){
        if(plateNumberValid && jobTypeValid && hoursvalidation && serviceDateValidation){

            jobSubmission = true;
            document.getElementById("job-form").submit();

        }else{
            alert("Oops!...Something went wrong. Please try again.");
        }
    }
    jobFormValid();
}


///////////////////////////////////////////

var addpartsSubmission = false;

$("parts-form").addEventListener("submit", (e) => {
    if (addpartsSubmission == false) {
        e.preventDefault();
       
        addPartFormCheck(); // check for errors
    }
});

function addPartFormCheck(){
    const partInput = $("partCode").value.trim();
    const partNameInput = $("partName").value.trim();
    const manufacturerInput = $("partsManufac").value.trim();
    const vehicleTypeInput = $("vehicleParts").value.trim();
    const yearsInput = $("yearsPart").value.trim();
    const priceInput = $("priceParts").value.trim();
    const stockLevelInput = $("stockLevel").value.trim();
    const thresholdInput = $("threshold").value.trim();
  
   

    var partValid = false;
    if(partInput ==""){
        $("parts-error").style.display = "inline";
        $("parts-error").innerHTML = "No part code provided.";       
    }else{
        $("parts-error").style.display = "None";
        partValid = true;
    }
    var partNameValid = false;
    if(partNameInput ==""){
        $("partName-error").style.display = "inline";
        $("partName-error").innerHTML = "Part name code not provided.";       
    }else{
        $("partName-error").style.display = "None";
        partNameValid = true;
    }
    var manuValid = false;
    if(manufacturerInput==""){
        $("manufac-error").style.display = "inline";
        $("manufac-error").innerHTML = "Part manufacturer not provided.";       
    }else{
        $("manufac-error").style.display = "None";
        manuValid = true;
    }
    var vehicleTypeValid = false;
    if(vehicleTypeInput ==""){
        $("vehicleParts-error").style.display = "inline";
        $("vehicleParts-error").innerHTML = "Vehicle Type not provided.";       
    }else{
        $("vehicleParts-error").style.display = "None";
        vehicleTypeValid = true;
    }
    var yearsValid = false;
    if(yearsInput ==""){
        $("yearsParts-error").style.display = "inline";
        $("yearsParts-error").innerHTML = "Years not provided.";       
    }else{
        $("yearsParts-error").style.display = "None";
        yearsValid = true;
    }
    var priceValid = false;
    if(priceInput ==""){
        $("priceParts-error").style.display = "inline";
        $("priceParts-error").innerHTML = "Initial price not provided.";       
    }else{
        $("priceParts-error").style.display = "None";
        priceValid = true;
    }
    var stocklvlValid = false;
    if(stockLevelInput ==""){
        $("stockLevel-error").style.display = "inline";
        $("stockLevel-error").innerHTML = "Stocklevel not provided.";       
    }else{
        $("stockLevel-error").style.display = "None";
        stocklvlValid = true;
    }
    var thresholdValid = false;
    if(thresholdInput ==""){
        $("thresholdLevel-error").style.display = "inline";
        $("thresholdLevel-error").innerHTML = "Threshold Level not provided.";       
    }else{
        $("thresholdLevel-error").style.display = "None";
        thresholdValid = true;
    }

    function addPartsValid(){
        if(partValid && partNameValid && manuValid && vehicleTypeValid && yearsValid && priceValid && stocklvlValid && thresholdValid){

            addpartsSubmission = true;
            document.getElementById("parts-form").submit();

        }else if(!(partValid && partNameValid && manuValid && vehicleTypeValid && yearsValid && priceValid && stocklvlValid && thresholdValid)){
            alert("Oops!...Something went wrong. Please try again.");
        }
    }

    console.log("bittons clicked");
    addPartsValid();
}
