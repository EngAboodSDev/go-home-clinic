
<?php
require_once 'adminWebs.php';
require_once '../dbcon.php';
require_once 'Admin.php';

if (isAdminLoggedIn()) {
  redirect('Dashboard.php');
}

if(isset($_GET['out']) && is_numeric($_GET['out'])){
    admin_logout();
    header('Refresh:0');
}

if (isset($_POST['login'])) {
  $isSuccess = admin_login($_POST['Email'], $_POST['Password']);
  if ($isSuccess)
    redirect('Dashboard.php');
  else alertMessage('Invalid Email or password');
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/newstyle.css">
    <link rel="stylesheet" href="../css/navstyles.css">

    <style>
        .error {
            color: red;
        }
    </style>

   
</head>
<header class="navbar">
    <a class="navlogo" href="../Index.php"><img src="../imgs/logo-without background .png" alt="logo" width="70"
            height="70"></a>
</header>

<body class="logbody">
    <div class="AdminLogform">
        <form action="#" class="sub_form" id="loginForm" method="post">
            <div class="upper_form">
                <h2>Admin Log in</h2>
                <label>Email:</label>
                <br><br>
                <input type="email" name="Email" id="email" placeholder="Type here...">
                <br>
                <span id="emailError" class="error"></span>
                <label>Password:</label>
                <br><br>
                <input type="password" name="Password" id="password" placeholder="********">
                <br>
                <span id="passwordError" class="error"></span>
                <div class="log_btn">
                    <button type="submit" name="login">Login</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        const emailInput = document.getElementById('email');
        // const passwordInput = document.getElementById('password');
        const emailError = document.getElementById('emailError');
        // const passwordError = document.getElementById('passwordError');

        emailInput.addEventListener('input', function () {
            if (!isValidEmail(emailInput.value)) {
                emailError.textContent = 'Invalid email address';
            } else {
                emailError.textContent = '';
            }
        });

        // passwordInput.addEventListener('input', function () {
        //     // You should replace this with an actual check against your database
        //     // This is a simple example for demonstration purposes
        //     if (passwordInput.value !== 'correctpassword') {
        //         passwordError.textContent = 'Invalid password';
        //     } else {
        //         passwordError.textContent = '';
        //     }
        // });

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // document.getElementById('loginForm').addEventListener('submit', function (e) {
        //     if (!isValidEmail(emailInput.value) || passwordInput.value !== 'correctpassword') {
        //         e.preventDefault(); // Prevent form submission if there are errors
        //     }
        // });
    </script>
</body>

</html>