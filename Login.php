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

if (isset($_POST['p_login'])) {
    $isSuccess = p_login($_POST['p_email'], md5($_POST['p_password']));
    if ($isSuccess)
        redirect('Index.php');
    else alertMessage('Invalid Email or password');
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Patient Sign In | Go Home Clinic</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framework.css">
    <link rel="stylesheet" href="css/newstyle.css">
    <link rel="stylesheet" href="css/navstyles.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <style>
    .error {
        color: red;
    }


    .loginType {
        display: flex;
        gap: 40px;
        justify-content: flex-start;
        flex-wrap: nowrap;
        flex-direction: row;
    }
    </style>
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
            <div class="auth-card">
                <form action="#" class="auth-form" id="loginForm" method="post">
                    <div class="auth-header">
                        <h2>Welcome Back</h2>
                        <p>Please enter your details to sign in as a patient</p>
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="p_email" id="email" class="auth-input" placeholder="Enter your email"
                            required>
                        <span id="emailError" class="error"></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="p_password" id="password" class="auth-input" placeholder="********"
                            required>
                        <span id="passwordError" class="error"></span>
                    </div>

                    <button type="submit" name="p_login" class="cta-btn primary-btn auth-submit-btn">Sign In</button>

                    <div class="auth-footer">
                        <p>Don't have an account? <a href="PatientReg.php" class="auth-link">Sign Up</a></p>
                        <p class="mt-10"><a href="DocLogin.php" class="auth-link secondary-link">Login as Doctor</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php require_once('footer.php'); ?>
    <script>
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('emailError');

    emailInput.addEventListener('input', function() {
        if (!isValidEmail(emailInput.value)) {
            emailError.textContent = 'Invalid email address';
        } else {
            emailError.textContent = '';
        }
    });

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
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