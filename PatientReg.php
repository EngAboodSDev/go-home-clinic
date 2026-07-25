<!--
    * Go Home Clinic Website and Dashboard - v1.0.0
    * Designed and Developed by Abdulrahman Fadhl Ameer Saif
    * @EngAboodSDev <abdulrahmanfadhl@gmail.com>
    * Copyright © 2026 Go Home Clinic (Website and Dashboard)
    * All rights reserved.
    * License - This project is licensed under the MIT License - see the LICENSE file for details.
-->
<?php

/**
 * Go Home Clinic Website and Dashboard - v1.0.0
 *
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 *
 * Go Home Clinic is a comprehensive web-based healthcare platform designed to 
 * facilitate medical home visits. Built with PHP and MySQL, the system seamlessly 
 * connects patients with qualified healthcare professionals. Patients can browse 
 * available healthcare professionals, view their ratings, and book appointments 
 * for home visits, while doctors can manage their schedules and patient requests.
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 *
 * @package    go-home-clinic
 * @author     Abdulrahman Fadhl Ameer Saif <abdulrahmanfadhl@gmail.com> @EngAboodSDev
 * @copyright  2026 Go Home Clinic (Website and Dashboard)
 * @license    https://opensource.org  MIT License
 * @version    1.0.0
 * @link       https://github.com/EngAboodSDev/go-home-clinic
 */


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
    <title>Patient Register | Go Home Clinic</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framework.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" type="text/css" href="css/navstyles.css">
    <link rel="stylesheet" type="text/css" href="css/newstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <link rel="icon" href="imgs/logo-without-background.png" type="image/png">
</head>

<body class="auth-body">
    <!--
        * Go Home Clinic Website and Dashboard - v1.0.0
        * Designed and Developed by Abdulrahman Fadhl Ameer Saif
        * @EngAboodSDev <abdulrahmanfadhl@gmail.com>
        * Copyright © 2026 Go Home Clinic (Website and Dashboard)
        * All rights reserved.
        * License - This project is licensed under the MIT License - see the LICENSE file for details.
    -->
    <?php require_once('navbar.php'); ?>

    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-card reg-card">
                <form method="post" action="" class="auth-form" id="regForm">
                    <div class="auth-header">
                        <h2>Create an Account</h2>
                        <p>Join Go Home Clinic to access personalized mobile healthcare services</p>
                    </div>

                    <input type="hidden" name="recipient">

                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="f_name">First Name</label>
                            <input required type="text" id="f_name" name="f_name" maxlength="50" class="auth-input"
                                placeholder="First Name">
                            <span id="first_name_error" class="error"></span>
                        </div>
                        <div class="form-group half-width">
                            <label for="l_name">Last Name</label>
                            <input required type="text" id="l_name" name="l_name" maxlength="50" class="auth-input"
                                placeholder="Last Name">
                            <span id="last_name_error" class="error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="p_email">Email Address</label>
                        <input required type="email" id="p_email" name="p_email" maxlength="50" class="auth-input"
                            placeholder="Enter your email">
                        <span id="email_error" class="error"></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="p_date">Birth Date</label>
                            <input required type="date" id="p_date" name="p_date" min="1900-09-19" max="2023-10-15"
                                class="auth-input">
                        </div>
                        <div class="form-group half-width">
                            <label for="p_phone">Phone Number</label>
                            <input type="number" id="p_phone" name="p_phone" class="auth-input"
                                placeholder="Enter phone number">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="password">Password</label>
                            <input required type="password" id="password" name="p_password" class="auth-input"
                                placeholder="********">
                            <span id="password_error" class="error"></span>
                        </div>
                        <div class="form-group half-width">
                            <label for="confirm_password">Confirm Password</label>
                            <input required type="password" id="confirm_password" name="password" class="auth-input"
                                placeholder="********">
                            <span id="confirm_password_error" class="error"></span>
                        </div>
                    </div>

                    <button type="submit" name="p_signup" class="cta-btn primary-btn auth-submit-btn">Sign Up</button>

                    <div class="auth-footer">
                        <p>Already have an account? <a href="Login.php" class="auth-link">Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
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
            const emailPattern =
                /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
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
    <!--
        * Go Home Clinic Website and Dashboard - v1.0.0
        * Designed and Developed by Abdulrahman Fadhl Ameer Saif
        * @EngAboodSDev <abdulrahmanfadhl@gmail.com>
        * Copyright © 2026 Go Home Clinic (Website and Dashboard)
        * All rights reserved.
        * License - This project is licensed under the MIT License - see the LICENSE file for details.
    -->

</body>

</html>
<!--
    * Go Home Clinic Website and Dashboard - v1.0.0
    * Designed and Developed by Abdulrahman Fadhl Ameer Saif
    * @EngAboodSDev <abdulrahmanfadhl@gmail.com>
    * Copyright © 2026 Go Home Clinic (Website and Dashboard)
    * All rights reserved.
    * License - This project is licensed under the MIT License - see the LICENSE file for details.
-->