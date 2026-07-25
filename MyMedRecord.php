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
if (!isPatientLoggedIn()) {
    redirect('Index.php');
}
$myAppoints = getPatientAppoints(currentPatientId(), 'Complete');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Completed Appointments | Go Home Clinic</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framework.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/newstyle.css">
    <link rel="stylesheet" href="css/navstyles.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <link rel="icon" href="imgs/logo-without-background.png" type="image/png">
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
    <?php require_once('navbar.php'); ?>

    <section id="page-hero" style="--hero-bg: url('../imgs/medical-record.jpg');">
        <div class="page-hero-content">
            <h1>Completed Appointments</h1>
            <p>View your past appointments, medical records, and rate your experience</p>
        </div>
    </section>

    <section id="list-section">
        <div class="list-container">
            <?php if ($myAppoints) {
                foreach ($myAppoints as $myAppoint) : ?>
            <div class="list-card">
                <div class="list-card-avatar">
                    <img src="imgs/user (2).png" alt="Doctor">
                </div>
                <div class="list-card-info">
                    <div class="card-name"><?php echo getDoctorName($myAppoint['dr_id'])['dr_name'] ?></div>
                    <div class="card-details">
                        <span><i class="fa-solid fa-calendar-days"></i>
                            <?php echo date('d F, Y', strtotime($myAppoint['date'])) ?></span>
                        <span><i class="fa-solid fa-clock"></i> <?php echo $myAppoint["app_time"]; ?></span>
                    </div>
                </div>
                <div class="list-card-actions">
                    <a href="RateExperience.php?pId=<?php echo currentPatientId(); ?>&dId=<?php echo $myAppoint['dr_id'] ?>"
                        class="btn-action btn-secondary-action">
                        <i class="fa-solid fa-star"></i> Rate
                    </a>
                    <a href="RecordDetails.php?a=<?php echo $myAppoint['app_id'] ?>"
                        class="btn-action btn-primary-action">
                        <i class="fa-solid fa-eye"></i> View Details
                    </a>
                </div>
            </div>
            <?php endforeach;
            } else { ?>
            <div class="list-empty">
                <i class="fa-solid fa-clipboard-check"></i>
                <p>You don't have any completed appointments yet.</p>
            </div>
            <?php } ?>
        </div>
    </section>

    <?php require_once('footer.php'); ?>
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