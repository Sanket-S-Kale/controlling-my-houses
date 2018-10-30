'use strict';

function checkHouseData() {
    if (document.getElementById('owner').value == null || document.getElementById('owner').value == "") {
        alert('Please select owner.');
    }else if (document.getElementById('accountant').value == null || document.getElementById('accountant').value == "") {
        alert('Please select accountant.');
    }else if (document.getElementById('houseName').value == null || document.getElementById('houseName').value == "") {
        alert('Please enter House Name.');
    }else if (document.getElementById('address').value == null || document.getElementById('address').value == "") {
        alert('Please enter street address.');
    }else if (document.getElementById('city').value == null || document.getElementById('city').value == "") {
        alert('Please enter expense city.');
    }else if (document.getElementById('state').value == null || document.getElementById('state').value == "") {
        alert('Please enter expense state.');
    }else if (document.getElementById('zip').value == null || document.getElementById('zip').value == "") {
        alert('Please enter expense zip code.');
    }else if (document.getElementById('amount').value == null || document.getElementById('amount').value == "") {
        alert('Please enter expense amount.');
    }
};