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
                <li><a href="Login.php" >Login As Patient</a></li>    
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
    
    <div class="logform">
        <form action="#" class="sub_form" id="loginForm" method="post" >
            <div class="upper_form">
                <h2>Welcome back, Doctor! </h2>
                <label>Email:</label>
                <br><br>
                <input type="email" name="dr_email" id="email" placeholder="Type here...">
                <span id="emailError" class="error"></span><br><br>
                <label>Password:</label>
                <br><br>
                <input type="password" name="dr_password" id="password" placeholder="********">
                <span id="passwordError" class="error"></span>
                <div class="log_btn">
                    <button type="submit" name="d_login" >Login</button>
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