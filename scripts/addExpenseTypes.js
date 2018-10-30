'use strict';
function validateForms() {
    var expensetype = document.myforms.expenseType;
    var description = document.myforms.description;

    if (ValidateExpenseType(expensetype)) {

    }
    if (ValidateDescription(description)) {

    }

    return false;

};

function ValidateExpenseType(expensetype) {
    if (expensetype.value.length == 0) {
        alert("Expense Type field cannot be empty!");
        expensetype.focus();
    }
    else {
        return true;
    }
};

function ValidateDescription(description) {
    if (description.value.length == 0) {
        alert("Description field cannot be empty!");
        description.focus();
    }
    else {
        return true;
    }
};