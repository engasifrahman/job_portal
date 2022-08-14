/* BEGIN Salary Range Value Printing Code Used in employer/em_post_circular.php*/
//Salary From
var salary_fromIn = document.getElementById("salaryFrom");
var salary_fromOut = document.getElementById("salary_fromValue");
salary_fromOut.innerHTML = salary_fromIn.value;

salary_fromIn.oninput = function() {
  salary_fromOut.innerHTML = this.value;
}

//Salary To
var salary_toIn = document.getElementById("salaryTo");
var salary_toOut = document.getElementById("salary_toValue");
salary_toOut.innerHTML = salary_toIn.value;

salary_toIn.oninput = function() {
  salary_toOut.innerHTML = this.value;
}
/* END Salary Range Value Printing Code*/

/* BEGIN Experience Range Value Printing Code Used in employer/em_post_circular.php*/
//Experience From
var exp_fromIn = document.getElementById("expFrom");
var exp_fromOut = document.getElementById("exp_fromValue");
exp_fromOut.innerHTML = exp_fromIn.value;

exp_fromIn.oninput = function() {
  exp_fromOut.innerHTML = this.value;
}

//Experience To
var exp_toIn = document.getElementById("expTo");
var exp_toOut = document.getElementById("exp_toValue");
exp_toOut.innerHTML = exp_toIn.value;

exp_toIn.oninput = function() {
  exp_toOut.innerHTML = this.value;
}
/* END Experience Range Value Printing Code*/

/* BEGIN Age Range Value Printing Code Used in employer/em_post_circular.php*/
//Age From
var age_fromIn = document.getElementById("ageFrom");
var age_fromOut = document.getElementById("age_fromValue");
age_fromOut.innerHTML = age_fromIn.value;

age_fromIn.oninput = function() {
  age_fromOut.innerHTML = this.value;
}

//Age To
var age_toIn = document.getElementById("ageTo");
var age_toOut = document.getElementById("age_toValue");
age_toOut.innerHTML = age_toIn.value;

age_toIn.oninput = function() {
  age_toOut.innerHTML = this.value;
}
/* END Age Range Value Printing Code*/

/* BEGIN Radio Button Checking Code for Salary Range Used in employer/em_post_circular.php*/ 
function Show_Salary_Range() {
    var radio = document.getElementById("salary_range_open");
    var rangeArea = document.getElementById("salary_rangeArea");
    if (radio.checked == true){salary_rangeArea
        rangeArea.style.display = "block";
    } 
    else{
       rangeArea.style.display = "none";
    }
}
function No_Salary_Range() {
    var radio = document.getElementById("salary_range_close");
    var rangeArea = document.getElementById("salary_rangeArea");
    if (radio.checked == true){
        rangeArea.style.display = "none";
    }
}
function Noo_Salary_Range() {
    var radio = document.getElementById("salary_range_hide");
    var rangeArea = document.getElementById("salary_rangeArea");
    if (radio.checked == true){
        rangeArea.style.display = "none";
    }
}
/* END Radio Button Checking Code for Salary Range */ 

/* BEGIN Radio Button Checking Code for Experience Range Used in employer/em_post_circular.php*/ 
function Show_Exp_Range() {
    var radio = document.getElementById("exp_range_open");
    var rangeArea = document.getElementById("exp_rangeArea");
    if (radio.checked == true){salary_rangeArea
        rangeArea.style.display = "block";
    } 
    else{
       rangeArea.style.display = "none";
    }
}
function No_Exp_Range() {
    var radio = document.getElementById("exp_range_close");
    var rangeArea = document.getElementById("exp_rangeArea");
    if (radio.checked == true){
        rangeArea.style.display = "none";
    }
}
/* END Radio Button Checking Code for Experience Range*/ 
