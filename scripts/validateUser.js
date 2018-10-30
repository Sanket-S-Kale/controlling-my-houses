function validateUser() {
    var email = document.getElementById('email').value;
    var firstName = document.getElementById('fname').value;
    var lastName = document.getElementById('lname').value;
    var username = document.getElementById('uname').value;
    var role = document.getElementById('role').value;
    var password = document.getElementById('pass').value;
    var cpassword = document.getElementById('cpass').value;
    var check = false;


    if (email === "") {
        alert("Email cannot be empty");
    }

    else if (firstName === "") {
        alert("First Name cannot be empty");
    }

    else if (lastName === "") {
        alert("Last Name cannot be empty");
    }

    else if (username == "") {
        alert("Username cannot be empty");
    }


    else if (password == "") {
        alert("Password cannot be empty");
    }

    else if (cpassword == "") {
        alert("Confirm Password cannot be empty");
    }

    else if (password !== cpassword) {
        alert("Password does not match");
    } else {
        check = true;
    }
    return check;
}
