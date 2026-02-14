<?php
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
    <title>Go Home Clinic | Patient Sign In</title>
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
</head>
<body class="logbody">
    <header class="navbar">
        <a class="navlogo" href="Index.php"><img src="imgs/logo-without background .png" alt="logo" width="70"
                height="70"></a>
        <nav>
            <ul class="nav__links">
                <li><a href="Index.php" >Back To Home Page</a></li>    
                <li><a href="DocLogin.php" >Login As Doctor</a></li>    
            </ul>
        </nav>
        <p class="menu cta">Menu</p>
    </header>

    <div id="mobile__menu" class="overlay">
        <a class="close">&times;</a>
        <div class="overlay__content">
          <a href="Index.php">Back To Home Page</a>
          <a href="DocLogin.php">Login As Doctor</a>
        </div>
    </div>
    <div class="logform">
        <form action="#" class="sub_form" id="loginForm" method="post">
            <div class="upper_form">
                <h2>Welcome Back</h2>
                <label>Email:</label>
                <br><br>
                <input type="email" name="p_email" id="email" placeholder="Type here..." required>
                <span id="emailError" class="error"></span><br><br>
                <label>Password:</label>
                <br><br>
                <input type="password" name="p_password" id="password" placeholder="********" required >
                <span id="passwordError" class="error"></span>
                <div class="log_btn">
                    <button type="submit" name="p_login" >Login</button>
                </div>
                <div class="logbottom-form">
                    <div class="no-account">Don't have an account ?</div>
                    <a href="PatientReg.php" class="Signup">Sign In</a>
                </div>
            </div>
            
        </form>
    </div>
    <script>
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('emailError');

        emailInput.addEventListener('input', function () {
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