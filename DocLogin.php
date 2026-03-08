<?php
require_once 'webs.php';
require_once 'dbcon.php';
require_once 'Users.php';

if (isDoctorLoggedIn()) {
    redirect('Index.php');
}



if (isset($_POST['d_login'])) {
    $isSuccess = d_login($_POST['dr_email'], md5($_POST['dr_password']));
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
    <title>Go Home Clinic | Doctor Login</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/newstyle.css">
    <link rel="stylesheet" href="css/navstyles.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

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


</head>


<body class="auth-body">
    <?php require_once('navbar.php'); ?>

    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-card">
                <form action="#" class="auth-form" id="loginForm" method="post">
                    <div class="auth-header">
                        <h2>Welcome back, Doctor!</h2>
                        <p>Please enter your credentials to access your dashboard</p>
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="dr_email" id="email" class="auth-input" placeholder="Enter your email"
                            required>
                        <span id="emailError" class="error"></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="dr_password" id="password" class="auth-input"
                            placeholder="********" required>
                        <span id="passwordError" class="error"></span>
                    </div>

                    <button type="submit" name="d_login" class="cta-btn primary-btn auth-submit-btn">Login</button>

                    <div class="auth-footer">
                        <p class="mt-10"><a href="Login.php" class="auth-link secondary-link">Login as Patient</a></p>
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

</body>

</html>