/* BEGIN Salary Range Value Printing Code Used in employer/em_post_circular.php*/
//Salary From
var salary_fromIn_edit = document.getElementById("salaryFrom_edit");
var salary_fromOut_edit = document.getElementById("salary_fromValue_edit");
salary_fromOut_edit.innerHTML = salary_fromIn_edit.value;

salary_fromIn_edit.oninput = function() {
  salary_fromOut_edit.innerHTML = this.value;
}

//Salary To
var salary_toIn_edit = document.getElementById("salaryTo_edit");
var salary_toOut_edit = document.getElementById("salary_toValue_edit");
salary_toOut_edit.innerHTML = salary_toIn_edit.value;

salary_toIn_edit.oninput = function() {
  salary_toOut_edit.innerHTML = this.value;
}
/* END Salary Range Value Printing Code*/

/* BEGIN Experience Range Value Printing Code Used in employer/em_post_circular.php*/
//Experience From
var exp_fromIn_edit = document.getElementById("expFrom_edit");
var exp_fromOut_edit = document.getElementById("exp_fromValue_edit");
exp_fromOut_edit.innerHTML = exp_fromIn_edit.value;

exp_fromIn_edit.oninput = function() {
  exp_fromOut_edit.innerHTML = this.value;
}

//Experience To
var exp_toIn_edit = document.getElementById("expTo_edit");
var exp_toOut_edit = document.getElementById("exp_toValue_edit");
exp_toOut_edit.innerHTML = exp_toIn_edit.value;

exp_toIn_edit.oninput = function() {
  exp_toOut_edit.innerHTML = this.value;
}
/* END Experience Range Value Printing Code*/

/* BEGIN Age Range Value Printing Code Used in employer/em_post_circular.php*/
//Age From
var age_fromIn_edit = document.getElementById("ageFrom_edit");
var age_fromOut_edit = document.getElementById("age_fromValue_edit");
age_fromOut_edit.innerHTML = age_fromIn_edit.value;

age_fromIn_edit.oninput = function() {
  age_fromOut_edit.innerHTML = this.value;
}

//Age To
var age_toIn_edit = document.getElementById("ageTo_edit");
var age_toOut_edit = document.getElementById("age_toValue_edit");
age_toOut_edit.innerHTML = age_toIn_edit.value;

age_toIn_edit.oninput = function() {
  age_toOut_edit.innerHTML = this.value;
}
/* END Age Range Value Printing Code*/

/* BEGIN Radio Button Checking Code for Salary Range Used in employer/em_post_circular.php*/ 
function Show_Salary_Range_Edit() {
    var radio = document.getElementById("salary_Range_Edit_open");
    var rangeArea = document.getElementById("salary_Range_EditArea");
    if (radio.checked == true){salary_Range_EditArea
        rangeArea.style.display = "block";
    } 
    else{
       rangeArea.style.display = "none";
    }
}
function No_Salary_Range_Edit() {
    var radio = document.getElementById("salary_Range_Edit_close");
    var rangeArea = document.getElementById("salary_Range_EditArea");
    if (radio.checked == true){
        rangeArea.style.display = "none";
    }
}
function Noo_Salary_Range_Edit() {
    var radio = document.getElementById("salary_Range_Edit_hide");
    var rangeArea = document.getElementById("salary_Range_EditArea");
    if (radio.checked == true){
        rangeArea.style.display = "none";
    }
}
/* END Radio Button Checking Code for Salary Range */ 

/* BEGIN Radio Button Checking Code for Experience Range Used in employer/em_post_circular.php*/ 
function Show_Exp_Range_Edit() {
    var radio = document.getElementById("exp_Range_Edit_open");
    var rangeArea = document.getElementById("exp_Range_EditArea");
    if (radio.checked == true){salary_Range_EditArea
        rangeArea.style.display = "block";
    } 
    else{
       rangeArea.style.display = "none";
    }
}
function No_Exp_Range_Edit() {
    var radio = document.getElementById("exp_Range_Edit_close");
    var rangeArea = document.getElementById("exp_Range_EditArea");
    if (radio.checked == true){
        rangeArea.style.display = "none";
    }
}
/* END Radio Button Checking Code for Experience Range*/ 
