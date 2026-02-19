<?php
require_once 'webs.php';
require_once 'dbcon.php';
require_once 'Users.php';

if (isPatientLoggedIn()) {
    redirect('Index.php');
}
if (isset($_POST['p_signup'])) {

    $isSuccess = p_register($_POST['f_name'], $_POST['l_name'], $_POST['p_email'], $_POST['p_date'], md5($_POST['p_password']), $_POST['p_phone']);
    if ($isSuccess) {
        alertMessage(' Your Sign Up Successfully ^_^ ');
        redirect('Login.php');
    } else {
        alertMessage('Registeration failed try again!');
    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Go Home Clinic | Patient Reqister</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" type="text/css" href="css/navstyles.css">
    <link rel="stylesheet" type="text/css" href="css/newstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">

</head>

<body class="re_body">
    <header class="navbar">
        <a class="navlogo" href="Index.php"><img src="imgs/logo-without background .png" alt="logo" width="70"
                height="70"></a>
        <nav>
            <ul class="nav__links">
                <li><a href="Index.php">Back To Home Page</a></li>
                <li><a href="Login.php">Login As Patient</a></li>
            </ul>
        </nav>
        <p class="menu cta">Menu</p>
    </header>

    <div id="mobile__menu" class="overlay">
        <a class="close">&times;</a>
        <div class="overlay__content">
            <a href="Index.php">Back To Home Page</a>
            <a href="Login.php">Login As Patient</a>
        </div>
    </div>
    <div class="reg_form">
        <div class="re-sub-form">

            <form method="post" action="" class="re_form">
                <br>
                <h2 style="text-align: center;">Sign Up</h2><br>
                <input type="hidden" name="recipient">
                <p><label>First Name: <br>
                        <input required type="text" size="25" name="f_name" maxlength="50" placeholder="Patient's First Name">

                    </label></p>
                <span id="first_name_error" class="error-message"></span>
                <p>
                    <label>Last Name: <br>
                        <input required type="text" name="l_name" size="25" maxlength="50"
                            placeholder="Patient's Last Name">
                    </label>
                </p>
                <span id="last_name_error" class="error-message"></span>

                <p><label>Email: <br>
                        <input required type="email" size="30" name="p_email" maxlength="50" placeholder="abc@xyz.com">
                    </label></p>
                <span id="email_error" class="error-message"></span>

                <p><label>Birth Date: <br>
                        <input required type="date" min="1900-09-19" name="p_date" max="2023-10-15">
                    </label></p>
                <p><label>Phone No.:
                        <input type="number" name="p_phone" placeholder="Enter phone number" /></label></p>
                <p><label>Password: <br>
                        <input required name="p_password" type="password" id="password" placeholder="*********">
                    </label></p>
                <span id="password_error" class="error-message"></span>

                <p><label>Confirm Password: <br>
                        <input required name="password" type="password" id="confirm_password" placeholder="*********">
                    </label></p>
                <span id="confirm_password_error" class="error-message"></span>

                <div class="btn">
                    <button type="submit" name="p_signup">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    <?php require_once('footer.php'); ?>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            // Get references to the form and its inputs
            const form = document.querySelector('.re_form');
            const firstNameInput = document.querySelector('input[name="f_name"]');
            const lastNameInput = document.querySelector('input[name="l_name"]');
            const emailInput = document.querySelector('input[name="p_email"]');
            const passwordInput = document.querySelector('input[name="p_password"]');
            const confirmPasswordInput = document.querySelector('#confirm_password');

            // Get references to the error message elements
            const firstNameError = document.querySelector('#first_name_error');
            const lastNameError = document.querySelector('#last_name_error');
            const emailError = document.querySelector('#email_error');
            const passwordError = document.querySelector('#password_error');
            const confirmPasswordError = document.querySelector('#confirm_password_error');

            // Add event listeners for input fields
            firstNameInput.addEventListener('input', () => {
                validateFirstName();
            });

            lastNameInput.addEventListener('input', () => {
                validateLastName();
            });

            emailInput.addEventListener('input', () => {
                validateEmail();
            });

            passwordInput.addEventListener('input', () => {
                validatePassword();
            });

            confirmPasswordInput.addEventListener('input', () => {
                validateConfirmPassword();
            });

            form.addEventListener('submit', function(event) {

                // Reset error messages
                firstNameError.textContent = '';
                lastNameError.textContent = '';
                emailError.textContent = '';
                passwordError.textContent = '';
                confirmPasswordError.textContent = '';

                // Perform validation
                let isValid = true;

                // Validate First Name (at least 3 characters)
                if (!validateFirstName()) {
                    isValid = false;

                }

                // Validate Last Name (at least 5 characters)
                if (!validateLastName()) {
                    isValid = false;
                }

                // Validate Email
                if (!validateEmail()) {
                    isValid = false;
                }

                // Validate Password (6 to 8 characters, at least one lowercase, one uppercase, one digit, and one special character)
                if (!validatePassword()) {
                    isValid = false;
                }

                // Validate Confirm Password (matches the password)
                if (!validateConfirmPassword()) {
                    isValid = false;
                }

                // If all validations not pass, Prevent the form from submitting
                if (!isValid) {
                    event.preventDefault();
                }
            });

            // Validation functions
            function validateFirstName() {
                const firstNameValue = firstNameInput.value.trim();
                if (firstNameValue.length < 3) {
                    firstNameError.textContent = 'First Name should have at least 3 characters';
                    return false;
                } else {
                    firstNameError.textContent = '';
                    return true;
                }
            }

            function validateLastName() {
                const lastNameValue = lastNameInput.value.trim();
                if (lastNameValue.length < 5) {
                    lastNameError.textContent = 'Last Name should have at least 5 characters';
                    return false;
                } else {
                    lastNameError.textContent = '';
                    return true;
                }
            }

            function validateEmail() {
                const emailValue = emailInput.value.trim();
                const emailPattern = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                if (!emailPattern.test(emailValue)) {
                    emailError.textContent = 'Please Enter Valid Email Address';
                    return false;
                } else {
                    emailError.textContent = '';
                    return true;
                }
            }

            function validatePassword() {
                const passwordValue = passwordInput.value;

                // Password should be at least 6 characters long
                if (passwordValue.length < 6) {
                    passwordError.textContent = 'Password must be at least 6 characters long';
                    return false;
                }

                // Password should contain at least one uppercase letter
                if (!/[A-Z]/.test(passwordValue)) {
                    passwordError.textContent = 'Password must contain at least one uppercase letter';
                    return false;
                }

                // Password should contain at least one lowercase letter
                if (!/[a-z]/.test(passwordValue)) {
                    passwordError.textContent = 'Password must contain at least one lowercase letter';
                    return false;
                }

                // You can add your other requirements here, like special characters, etc.

                passwordError.textContent = '';
                return true;
            }


            function validateConfirmPassword() {
                const passwordValue = passwordInput.value;
                const confirmPasswordValue = confirmPasswordInput.value;
                if (passwordValue !== confirmPasswordValue) {
                    confirmPasswordError.textContent = 'Passwords do not match';
                    return false;
                } else {
                    confirmPasswordError.textContent = '';
                    return true;
                }
            }
        });
    </script>
    <script type="text/javascript" src="mobile.js"></script>


</body>



</html>