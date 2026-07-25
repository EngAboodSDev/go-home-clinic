<?php
require_once 'adminWebs.php';
require_once '../dbcon.php';
require_once 'Admin.php';

if (!isAdminLoggedIn()) {
    redirect('AdminLogin.php');
}
if (isset($_GET['aId'])) {
    $AdminDetails = getAdminProfileInfo($_GET['aId']);
    if (isset($_POST['saveAdmin'])) {
        $passwordToSave = !empty($_POST['a_password']) ? md5($_POST['a_password']) : $AdminDetails['a_password'];
        UpdateAdminProfile(currentAdminId(), $_POST['f_name'], $_POST['l_name'], $_POST['a_email'], $passwordToSave);
        setcookie('admin_fname',  $_POST['f_name'], time() + (86400 * 30), "/");
        alertMessage('Update your profile successfully !');
        redirect('Dashboard.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit My Profile</title>
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/framework.css">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <style>
    .btns {
        align-items: flex-end;
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
    }

    .btns input {
        cursor: pointer;
        width: 20%;
        height: 35px;
    }

    .error {
        color: red;
    }
    </style>
    <link rel="icon" href="../imgs/logo-without-background.png" type="image/png">
</head>

<body>
    <!-- الكونتينر الي حاوي الصفحة كلها -->
    <div class="page d-flex">
        <div class="sidebar bg-white p-10 pt-20 pb-20  p-relative">
            <div class="toggle-btn" onclick="document.querySelector('.sidebar').classList.toggle('toggled')"
                style="cursor: pointer; text-align: right; color: white; margin-bottom: 20px; font-size: 20px;">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="sidebar-title p-relative txt-c mt-0">
                <i class="fa-solid fa-hospital"></i>
                <span>Admin Panel</span>
            </div>
            <ul>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="Dashboard.php">
                        <i class="fa fa-dashboard fa-fw"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class=" d-flex align-center fs-14 c-black rad-6 p-10" href="adminAbo.php">
                        <i class="fa fa-calendar-days fa-fw"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="adminMed.php">
                        <i class="fa-solid fa-book-medical"></i>
                        <span>Medical Records</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="adminPat.php">
                        <i class="fa-solid fa-hospital-user fa-fw"></i>
                        <span>Patients </span>
                    </a>
                </li>
                <li>
                    <a class=" d-flex align-center fs-14 c-black rad-6 p-10" href="adminDoc.php">
                        <i class="fa-solid fa-user-doctor fa-fw"></i>
                        <span>Doctors </span>
                    </a>
                </li>





                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="adminVeh.php">
                        <i class="fa-solid fa-truck-medical"></i>
                        <span>Vehicles</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="content w-full">
            <!-- Start Head -->
            <div class="head p-15 bg-white between-flex"
                style="height: auto; border-radius: 10px;justify-content: flex-start; margin: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); align-items: center; flex-wrap: wrap; gap: 15px;">
                <img src="../imgs/logo-without-background.png" style="width: 80px; margin: 0px;" class="imgback m-0"
                    alt="">
                <div class="welcome-text">

                    <h3 class="m-0 c-black" style="font-size: 1.2rem;">Welcome Back,
                        <?php echo currentAdminFname(); ?> !
                        <span class="wave" style="display: inline-block;">👋</span>
                    </h3>
                    <p class="m-0 mt-5 c-grey fs-14">Here's what's happening today in Go Home Clinic.</p>
                </div>
                <div class="action d-flex align-center">
                    <div class="profile" onclick="menuToggle();" style="cursor: pointer; margin: 1.2rem;">
                        <img src=" ../imgs/user.png" alt="">
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="EditProfile.php?aId=<?php echo currentAdminId(); ?>"
                                    style="display: flex; align-items: center;"><i class="fa-regular fa-user fa-fw"
                                        style="margin-right: 10px;"></i>Edit Profile</a></li>
                            <li><a href="AdminLogin.php?out=<?php echo currentAdminId(); ?>" class="log"
                                    style="display: flex; align-items: center;"><i
                                        class="fa-solid fa-arrow-right-from-bracket fa-fw"
                                        style="margin-right: 10px;"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
                <script>
                function menuToggle() {
                    const toggleMenu = document.querySelector('.menu');
                    toggleMenu.classList.toggle('active')
                }
                </script>
            </div>
            <!-- End Head -->
            <div class="content w-full form-cont">
                <div class="wrapper d-grid gap-20">
                    <!-- Start Quick Draft Widgt -->
                    <div class="quick-draft p-20 bg-white rad-10">
                        <h2 class="mt-0 mt-10"><i class="fa fa-edit c-blue"></i> Edit My Profile</h2>
                        <p class="mt-0 mb-20 c-grey fs-15"></p>
                        <form action="#" method="post">
                            <label for="">First Name:</label>
                            <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" name="f_name"
                                value="<?php echo $AdminDetails["f_name"]; ?>"><br>
                            <label for="">Last Name:</label>
                            <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" name="l_name"
                                value="<?php echo $AdminDetails["l_name"] ?>"><br>
                            <label for="">Email:</label><br>
                            <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" id="email"
                                name="a_email" value="<?php echo $AdminDetails["a_email"] ?>">
                            <span id="emailError" class="error"></span><br>

                            <label for="">Password: (Optional)</label>
                            <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="password"
                                name="a_password" placeholder="Leave empty to keep current">
                            <div class="btns">
                                <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit"
                                    name="saveAdmin" value="Save">
                                <input class="save d-block fs-14 bg-red c-white b-none w-fit btn-shape" type="button"
                                    onclick="window.location='Dashboard.php';" value="Cancel">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</body>

</html>