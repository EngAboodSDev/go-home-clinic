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

require_once 'adminWebs.php';
require_once '../dbcon.php';
require_once 'Admin.php';


if (!isAdminLoggedIn()) {
    redirect('AdminLogin.php');
}
$vehicles = getAllVehicles();

if (isset($_POST['addDoctor'])) {
    $isSuccess = addDoctor(
        $_POST['f_name'],
        $_POST['l_name'],
        $_POST['dr_email'],
        md5($_POST['dr_password']),
        $_POST['IsAvailable'],
        $_POST['job'],
        $_POST['job_details'],
        $_POST['dr_location'],
        $_POST['dr_phoneNo'],
        $_POST['vehicles'],
        currentAdminId()
    );
    if ($isSuccess) {
        alertMessage('Addition is done Successfully ^_^ ');
        redirect('adminDoc.php');
    }
}

// $cAdminId=currentAdminId();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor | GHC Admin Panel</title>
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/framework.css">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <style>
    .none {
        display: none;
    }

    fieldset {
        border: none;

    }

    .form-group {
        display: flex;
        justify-content: space-around;
    }
    </style>
    <link rel="icon" href="../imgs/logo-without-background.png" type="image/png">
</head>

<body>
    <!--
        * Go Home Clinic Website and Dashboard - v1.0.0
        * Designed and Developed by Abdulrahman Fadhl Ameer Saif
        * @EngAboodSDev <abdulrahmanfadhl@gmail.com>
        * Copyright © 2026 Go Home Clinic (Website and Dashboard)
        * All rights reserved.
        * License - This project is licensed under the MIT License - see the LICENSE file for details.
    -->
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
                    <a class=" d-flex align-center fs-14 c-black rad-6 p-10" href="Dashboard.php">
                        <i class="fa-solid fa-house-chimney fa-fw"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class=" d-flex align-center fs-14 c-black rad-6 p-10" href="adminAbo.php">
                        <i class="fa-solid fa-calendar-days fa-fw"></i>
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
                <li>
                    <a class=" d-flex align-center fs-14 c-black rad-6 p-10" href="adminContact.php">
                        <i class="fa-solid fa-address-book fa-fw"></i>
                        <span>Contacts Requests</span>
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
                        <h2 class="mt-0 mt-10"><i class="fa-solid fa-user-plus c-blue"></i> Add Doctor</h2>
                        <p class="mt-0 mb-20 c-grey fs-15"></p>
                        <form action="" class="doc_form" method="post">
                            <fieldset>
                                <label for=""> First Name*</label>
                                <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="f_name" required
                                    type="text" placeholder="Enter Doctor First Name">

                                <label for="">Last Name</label>
                                <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="l_name" required
                                    type="text" placeholder="Enter Doctor Last Name">

                                <label for="">Email*</label>
                                <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="dr_email" required
                                    type="email" placeholder="Enter Doctor Email">

                                <label for="">Password*</label>
                                <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="dr_password" required
                                    type="password" placeholder="Enter Doctor Password">
                                <label for="">Doctor PhoneNo*</label>
                                <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="dr_phoneNo" required
                                    type="number" placeholder="Enter Doctor phone">
                                <label for="">Doctor Location</label>
                                <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="dr_location" required
                                    type="text" placeholder="Enter Doctor location">

                                <div class="form-group">
                                    <input style="cursor: pointer; width: 20%; height: 35px;"
                                        class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape next_button"
                                        type="button" value="Next">
                                </div>

                            </fieldset>

                            <fieldset class="none">
                                <lable for="IsAvailable">Is Available :</lable>
                                <select id="IsAvailable" name="IsAvailable"
                                    class="d-block mb-20 w-full p-10 b-none bg-eee rad-6">
                                    <option class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" value="1">Available
                                    </option>
                                    <option class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" value="0">Not
                                        Available</option>
                                </select>
                                <lable for="location">Select vehicle :</lable>
                                <select id="vehicles" name="vehicles"
                                    class="d-block mb-20 w-full p-10 b-none bg-eee rad-6">
                                    <option class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" value="0">None
                                    </option>

                                    <?php foreach ($vehicles as $vehicle) : ?>
                                    <option class="d-block mb-20 w-full p-10 b-none bg-eee rad-6"
                                        value="<?php echo $vehicle["v_id"]; ?>">
                                        <?php echo $vehicle["v_name"] . '    |    ' . $vehicle["location"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="">Doctor Job*</label>
                                <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="job" required
                                    type="text" placeholder="Enter Doctor Job...">
                                <label for="">Job Details*</label>
                                <textarea class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="job_details"
                                    cols="3" rows="3" required placeholder="Enter Doctor Job Details..."></textarea>

                                <div class="form-group">
                                    <input style="cursor: pointer; width: 20%; height: 35px;"
                                        class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit"
                                        name="addDoctor" value="Add">
                                </div>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    const nextButton = document.querySelector('.next_button');
    const form = document.querySelector('.doc_form');
    nextButton.addEventListener('click', e => {
        form.firstElementChild.classList.add('none');
        form.children[1].classList.add('none');
        form.lastElementChild.classList.remove('none');
    })
    </script>
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