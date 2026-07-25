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

if (!isPatientLoggedIn()) {
    redirect('Index.php');
}
if (isset($_GET['pId'])) {
    $PatientDetails = getPatientProfileInfo($_GET['pId']);
    if (isset($_POST['savePatient'])) {
        $passwordToSave = !empty($_POST['p_password']) ? md5($_POST['p_password']) : $PatientDetails['p_password'];
        UpdatePatientProfile(currentPatientId(), $_POST['f_name'], $_POST['l_name'], $_POST['p_email'], $_POST['p_date'], $passwordToSave, $_POST['p_phone']);
        alertMessage('Update your profile successfully !');
        redirect('Index.php');
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit My Profile | Go Home Clinic</title>

    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framework.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/navstyles.css">
    <link rel="stylesheet" href="css/newstyle.css">
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
                <form method="post" action="" class="auth-form" id="editProfileForm">
                    <div class="auth-header">
                        <h2>Edit My Profile</h2>
                        <p>Update your personal information below</p>
                    </div>

                    <input type="hidden" name="recipient">

                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="f_name">First Name</label>
                            <input required type="text" id="f_name" name="f_name" maxlength="50" class="auth-input"
                                value="<?php echo $PatientDetails["f_name"]; ?>">
                            <span id="first_name_error" class="error-message"></span>
                        </div>
                        <div class="form-group half-width">
                            <label for="l_name">Last Name</label>
                            <input required type="text" id="l_name" name="l_name" maxlength="50" class="auth-input"
                                value="<?php echo $PatientDetails["l_name"]; ?>">
                            <span id="last_name_error" class="error-message"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="p_email">Email Address</label>
                        <input required type="email" id="p_email" name="p_email" maxlength="50" class="auth-input"
                            value="<?php echo $PatientDetails["p_email"]; ?>">
                        <span id="email_error" class="error-message"></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="p_date">Birth Date</label>
                            <input required type="date" id="p_date" name="p_date" min="1900-09-19" max="2023-09-19"
                                class="auth-input" value="<?php echo $PatientDetails["p_date"]; ?>">
                        </div>
                        <div class="form-group half-width">
                            <label for="p_phone">Phone Number</label>
                            <input type="tel" id="p_phone" name="p_phone" class="auth-input"
                                value="<?php echo $PatientDetails["p_phoneNo"]; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="password">Password (Optional)</label>
                            <input type="password" id="password" name="p_password" class="auth-input"
                                placeholder="Leave empty to keep current">
                            <span id="password_error" class="error-message"></span>
                        </div>
                        <div class="form-group half-width">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" name="password" class="auth-input"
                                placeholder="Leave empty to keep current">
                            <span id="confirm_password_error" class="error-message"></span>
                        </div>
                    </div>

                    <button type="submit" name="savePatient" class="cta-btn primary-btn auth-submit-btn">
                        <i class="fa-solid fa-check"></i> Save Changes
                    </button>

                    <div class="auth-footer">
                        <p><a href="Index.php" class="auth-link secondary-link"><i class="fa-solid fa-arrow-left"></i>
                                Back to Home</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php require_once('footer.php'); ?>

    <script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const form = document.querySelector('#editProfileForm');
        const firstNameInput = document.querySelector('input[name="f_name"]');
        const lastNameInput = document.querySelector('input[name="l_name"]');
        const emailInput = document.querySelector('input[name="p_email"]');
        const passwordInput = document.querySelector('input[name="p_password"]');
        const confirmPasswordInput = document.querySelector('#confirm_password');

        const firstNameError = document.querySelector('#first_name_error');
        const lastNameError = document.querySelector('#last_name_error');
        const emailError = document.querySelector('#email_error');
        const passwordError = document.querySelector('#password_error');
        const confirmPasswordError = document.querySelector('#confirm_password_error');

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
            firstNameError.textContent = '';
            lastNameError.textContent = '';
            emailError.textContent = '';
            passwordError.textContent = '';
            confirmPasswordError.textContent = '';

            let isValid = true;
            if (!validateFirstName()) isValid = false;
            if (!validateLastName()) isValid = false;
            if (!validateEmail()) isValid = false;
            if (!validatePassword()) isValid = false;
            if (!validateConfirmPassword()) isValid = false;

            if (!isValid) {
                event.preventDefault();
            }
        });

        function validateFirstName() {
            const val = firstNameInput.value.trim();
            if (val.length < 3) {
                firstNameError.textContent = 'First Name should have at least 3 characters';
                return false;
            }
            firstNameError.textContent = '';
            return true;
        }

        function validateLastName() {
            const val = lastNameInput.value.trim();
            if (val.length < 5) {
                lastNameError.textContent = 'Last Name should have at least 5 characters';
                return false;
            }
            lastNameError.textContent = '';
            return true;
        }

        function validateEmail() {
            const val = emailInput.value.trim();
            const pattern =
                /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (!pattern.test(val)) {
                emailError.textContent = 'Please Enter Valid Email Address';
                return false;
            }
            emailError.textContent = '';
            return true;
        }

        function validatePassword() {
            const val = passwordInput.value;
            if (val === '') {
                passwordError.textContent = '';
                return true;
            }
            if (val.length < 6) {
                passwordError.textContent = 'Password must be at least 6 characters long';
                return false;
            }
            if (!/[A-Z]/.test(val)) {
                passwordError.textContent = 'Password must contain at least one uppercase letter';
                return false;
            }
            if (!/[a-z]/.test(val)) {
                passwordError.textContent = 'Password must contain at least one lowercase letter';
                return false;
            }
            passwordError.textContent = '';
            return true;
        }

        function validateConfirmPassword() {
            if (passwordInput.value === '' && confirmPasswordInput.value === '') {
                confirmPasswordError.textContent = '';
                return true;
            }
            if (passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordError.textContent = 'Passwords do not match';
                return false;
            }
            confirmPasswordError.textContent = '';
            return true;
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