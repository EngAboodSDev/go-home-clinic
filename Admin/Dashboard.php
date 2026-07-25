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
$Reviews = getAllReviews();
$Appointments = getAppointmentDashboard();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | GHC Admin Panel</title>
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/framework.css">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <style>
    .heading {
        font-size: 25px;
        margin-right: 25px;
    }



    .checked {
        color: orange !important;
    }

    .row {
        display: flex;
        justify-content: space-between;
    }

    /* Three column layout */
    .side {
        float: left;
        width: fit-content;
        margin-top: 10px;
        margin-right: 20px;
    }

    .middle {
        margin-top: 10px;
        float: left;
        width: 70%;
    }

    /* Place text to the right */
    .right {
        text-align: right;
    }

    /* Clear floats after the columns */
    /* .row:after {
        content: "";
        display: table;
        clear: both;
    } */

    /* The bar container */
    .bar-container {
        width: 100%;
        background-color: #f1f1f1;
        text-align: center;
        color: white;
    }

    .small {
        font-size: medium;
        color: #f1f1f1;
    }

    /* Individual bars */
    .bar-s {
        height: 18px;
        background-color: #303779;
        border-radius: 5px;
    }


    /* Responsive layout - make the columns stack on top of each other instead of next to each other */
    @media (max-width: 400px) {

        .side,
        .middle {
            width: 100%;
        }

        .row {
            flex-direction: column;
        }

        /* .right {
    display: none;
  } */
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
        <div class="sidebar bg-white p-10 pt-20 pb-20 p-relative">
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
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="Dashboard.php">
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
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="adminMed.php">
                        <i class="fa-solid fa-book-medical fa-fw"></i>
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
                        <i class="fa-solid fa-truck-medical fa-fw"></i>
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
                <h2 class="mt-0 mb-20"><i class="fa-solid fa-chart-column fa-fw c-blue"></i> Dashboard </h2>
                <div class="responsive-table">
                    <table class="fs-15 w-full">
                        <thead>
                            <tr>
                                <td><i class="fa-solid fa-calendar-days fa-fw"></i> TOTAL APPOINTMENTS</td>
                                <td><i class="fa-solid fa-hospital-user fa-fw"></i> PATIENTS</td>
                                <td><i class="fa-solid fa-user-doctor fa-fw"></i> DOCTORS</td>
                                <td><i class="fa-solid fa-truck-medical fa-fw"></i> VEHICLES</td>
                                <td><i class="fa-solid fa-address-book fa-fw"></i> CONTACT REQUESTS</td>
                                <td><i class="fa-solid fa-sack-dollar fa-fw"></i> PAYMENTS</td>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td><?php echo getNumOfAppoints()['appoints'] . " Appointments"; ?></td>
                                <td><?php echo getNumOfPatients()['patients'] . " Patients"; ?></td>
                                <td><?php echo getNumOfDoctors()['doctors'] . " Doctors"; ?></td>
                                <td><?php echo getNumOfVehicles()['vehicles'] . " Vehicles"; ?></td>
                                <td><?php echo getNumOfContacts()['contacts'] . " Requests"; ?></td>
                                <td><?php echo number_format(getPayments()['payments'], 1) . " SAR"; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br><br>
                <div class="responsive-table">
                    <table class="fs-15 w-full">
                        <thead>
                            <tr>
                                <td> <i class="fa-solid fa-calendar-days fa-fw"></i> APPOINTMENTS STATE</td>
                                <td> <i class="fa-solid fa-calculator fa-fw"></i> SUM OF APPOINTMENTS</td>
                                <td> <i class="fa-solid fa-percent fa-fw"></i> PERCENTAGE</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Appointments as $appointment) : ?>
                            <tr>
                                <td><?php echo $appointment['app_state'] . " Appointments"; ?></td>
                                <td><?php echo $appointment['num_apps'] . " From " . getNumOfAppoints()['appoints'] . " Appointments";; ?>
                                </td>
                                <td><?php echo round($appointment['app_ratio'], 2) . " %" ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <br><br>
                <?php
                $total_rate = 0;
                $num_reviews_of_stars = 0;
                $total_average = 0;

                foreach ($Reviews as $review) {
                    $total_rate += $review['num_reviews'];
                    $num_reviews_of_stars += $review['num_stars'] * $review['num_reviews'];
                }
                $total_average = round(($num_reviews_of_stars / $total_rate), 1);
                ?>
                <h2 class="mt-0 mb-20"><i class="fa-solid fa-ranking-star fa-fw c-blue"></i> Reviews </h2>
                <p><?php echo $total_average; ?> average based on <?php echo $total_rate; ?> reviews.</p>
                <hr style="border:3px solid #f1f1f1">

                <?php foreach ($Reviews as $review) :
                    $num_stars = $review['num_stars'];
                    $num_reviews_of_star = $review['num_reviews'];
                    $percentage = round($review['percentage'], 2);
                ?>
                <!-- 5- stars -->
                <div class="row">

                    <div class="side">
                        <div class="d-flex" style="gap: 2px;">
                            <?php for ($chk = 0; $chk < $num_stars; $chk++) { ?>
                            <i class="fa-solid fa-star checked small"></i>
                            <?php } ?>
                            <?php for ($nchk = 5; $nchk > $num_stars; $nchk--) { ?>
                            <i class="fa-solid fa-star small"></i>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-s" style="width:<?php echo $percentage; ?>%"></div>
                        </div>
                    </div>
                    <div class="side right">
                        <div><?php echo $num_reviews_of_star; ?></div>
                    </div>
                    <!--  end 5- stars -->
                </div>
                <?php endforeach; ?>


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