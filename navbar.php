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


// if no one is logined 
if (!isPatientLoggedIn() && !isDoctorLoggedIn())
    echo '
<header class="navbar">
    <a class="navlogo" href="Index.php"><img src="imgs/logo-without-background.png" alt="logo" width="70" height="70"></a>
    <nav>
        <ul class="nav__links">
            <li><a href="Index.php">Home</a></li>
            <li><a href="OurDoctors.php">Our Doctors</a></li>
            <li><a href="About.php">About Us</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="Contact.php">Contact Us</a></li>
        </ul>
    </nav>
    <p class="menu cta">Menu</p>
    <a class="cta primary-btn" href="Login.php">Join Us</a>
</header>
<div id="mobile__menu" class="overlay">
    <a class="close">&times;</a>
    <div class="overlay__content">
        <a href="Index.php">Home</a>
        <a href="OurDoctors.php">Our Doctors</a>
        <a href="About.php">About Us</a>
        <a href="faq.php">FAQ</a>
        <a href="Contact.php">Contact Us</a>
        <a href="Login.php">Join Us</a>
    </div>
</div>
';

// if patient is login and doctor is not
if (isPatientLoggedIn() && !isDoctorLoggedIn())
    echo '
<header class="navbar">
    <a class="navlogo" href="Index.php"><img src="imgs/logo-without-background.png" alt="logo" width="70" height="70"></a>
    <nav>
        <ul class="nav__links">
        <li><a href="Index.php">Home</a></li>
        <li><a href="OurDoctors.php">Our Doctors</a></li>
        <li><a href="MyApo.php">My appointments</a></li>
        <li><a href="MyMedRecord.php">Completed Appointments</a></li>
        <li><a href="About.php">About Us</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="Contact.php">Contact Us</a></li>
        </ul>
    </nav>
    <p class="menu cta">Menu</p>
    <div class="between-flex btn-lo ">
        <div class="action">
            <div class="profile" onclick="menuToggle()">
                <img src="imgs/user.png" alt="">
            </div>
    <div class="menu">
        <ul>
            <li><img src="imgs/edit.png" alt=""><a href="EditProfile.php?pId=' . currentPatientId() . '">Edit Profile</a></li>
            <li><img src="imgs/log-out.png" alt=""><a href="Index.php?pout=' . currentPatientId() . '" class="log">Logout</a></li>
        </ul>
        </div>
    </div>
    </div>
    <script>
        function menuToggle() {
            const toggleMenu = document.querySelector(".action .menu");
            toggleMenu.classList.toggle("active");
        }
    </script>
</header>
<div id="mobile__menu" class="overlay">
    <a class="close">&times;</a>
    <div class="overlay__content">
        <a href="Index.php">Home</a>
        <a href="OurDoctors.php">Our Doctors</a>
        <a href="MyApo.php">My appointments</a>
        <a href="MyMedRecord.php">Completed Appointments</a>
    <a href="About.php">About Us</a>
    <a href="faq.php">FAQ</a>
    <a href="Contact.php">Contact Us</a>
    </div>
</div>
';


// if Doctor is login and patiend is not
if (!isPatientLoggedIn() && isDoctorLoggedIn())
    echo '
<header class="navbar">
    <a class="navlogo" href="Index.php"><img src="imgs/logo-without-background.png" alt="logo" width="70" height="70"></a>
    <nav>
        <ul class="nav__links">
            <li><a href="Index.php">Home</a></li>
            <li><a href="UpcomingAbo.php">Upcoming appointments</a></li>
            <li><a href="MedicalRecords.php">Medical Records</a></li>
            <li><a href="About.php">About Us</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="Contact.php">Contact Us</a></li>
        </ul>
    </nav>
    <p class="menu cta">Menu</p>
    <div class="between-flex btn-lo ">
        <div class="action">
            <div class="profile" onclick="menuToggle();">
                <img src="imgs/user.png" alt="">
            </div>
            <div class="menu">
                <ul>
                    <li><img src="imgs/log-out.png" alt=""><a href="Index.php?dout=' . currentDoctorId() . '" class="log">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <script>
    function menuToggle() {
        const toggleMenu = document.querySelector(".action .menu");
    toggleMenu.classList.toggle("active");
    }
    </script>
</header>
<div id="mobile__menu" class="overlay">
    <a class="close">&times;</a>
    <div class="overlay__content">
        <a href="Index.php">Home</a>
        <a href="UpcomingAbo.php">Upcoming appointments</a>
        <a href="MedicalRecords.php">Medical Records</a>
        <a href="About.php">About Us</a>
        <a href="faq.php">FAQ</a>
        <a href="Contact.php">Contact Us</a>
    </div>
</div>
';

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