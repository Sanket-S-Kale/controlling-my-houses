'use strict';
function checkExpenseData() {
    if (document.getElementById('expenseType').value == null || document.getElementById('expenseType').value == "") {
        alert('Please select an expense type.');
    }else if (document.getElementById('expenseInfo').value == null || document.getElementById('expenseInfo').value == "") {
        alert('Please enter the expense details.');
    }else if (document.getElementById('amount').value == null || document.getElementById('amount').value == "") {
        alert('Please enter expense amount.');
    }
}