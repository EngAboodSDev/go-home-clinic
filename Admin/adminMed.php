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
$AppointmentsRecord = getAppointRecord();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Records | GHC Admin Panel</title>
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/framework.css">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
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
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="adminAbo.php">
                        <i class="fa-solid fa-calendar-days fa-fw"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="adminMed.php">
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
                    <a class=" d-flex align-center fs-14 c-black rad-6 p-10" href="adminVeh.php">
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
            <!-- Start Project Table -->
            <div class="projects p-20 bg-white rad-10 m-20">
                <h2 class="mt-0 mb-20"> <i class="fa fa-book-medical fa-fw c-blue"></i> Medical Records</h2>
                <div class="responsive-table">
                    <table class="fs-15 w-full">
                        <thead>
                            <tr>
                                <td>Patient Name</td>
                                <td>Appointment Date</td>
                                <td>Location</td>
                                <td>Doctor Name</td>
                                <td>Treatment Date</td>
                                <td>Record Details</td>
                                <!-- <td>Actions</td> -->


                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($AppointmentsRecord as $Appointment) : ?>
                            <tr>
                                <td><?php echo $Appointment["patient_name"]; ?></td>
                                <td><?php echo date('d F, Y', strtotime($Appointment["date"])) ?></td>
                                <td><?php echo $Appointment["app_location"]; ?></td>
                                <td><?php echo $Appointment["doctor_name"]; ?></td>
                                <td><?php echo date('d F, Y', strtotime($Appointment["treat_date"])) ?></td>
                                <td><?php echo $Appointment["med_rec_details"]; ?></td>
                                <!-- <td><a href="EditDoc.php?d_id=<?php // echo $doctor["dr_id"]; 
                                                                        ?>" ><i style="margin-left: 20px; margin-right: 10px;" class="fa fa-edit c-blue" aria-hidden="true">
                            </i></a> 
                            <a href="adminDoc.php?del_dr=<?php //echo $doctor["dr_id"]; 
                                                            ?>" ><i class="fa fa-trash c-red " aria-hidden="true"></i></a> 
                            </td> -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Project Table -->
            <div class="admin-copyright">
                <p>© 2026 All Rights Reserved to GO HOME CLINIC</p>
                <p class="developer">Designed with love <i style="color: red;" class="fa fa-heart"></i>
                    by
                    <a href="mailto:abdulrahmanfadhl@gmail.com">Abdulrahman Fadhl</a>
                    | @EngAboodSDev
                </p>
            </div>
        </div>
    </div>
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