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
if (isset($_GET['pId']) && isset($_GET['dId'])) {
    if (isset($_POST['rate'])) {
        $isSuccess = rateExperience($_POST['num_stars'], $_GET['pId'], $_GET['dId']);
        if ($isSuccess) {
            alertMessage('Thank You for Rating Our Services ^_^');
            redirect('MyMedRecord.php');
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rate Your Experience | Go Home Clinic</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framework.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/navstyles.css">
    <link rel="stylesheet" href="css/newstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <link rel="icon" href="imgs/logo-without-background.png" type="image/png">
</head>

<body class="auth-body">
    <!--
        * Go Home Clinic Website and Dashboard - v1.0.0
        * Designed and Developed by Abdulrahman Fadhl Ameer Saif
        * @EngAboodSDev <abdulrahmanfadhl@gmail.com>
        * Copyright © 2026 Go Home Clinic (Website and Dashboard)
        * All rights reserved.
        * License - This project is licensed under the MIT License - see the LICENSE file for details.
    -->
    <?php require_once('navbar.php'); ?>

    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-card rate-card">
                <form method="post" action="#" class="auth-form">
                    <div class="auth-header">
                        <h2>Rate Your Experience</h2>
                        <p>Tell us how was your experience with our doctor</p>
                    </div>

                    <div class="rate-doctor-name">
                        <i class="fa-solid fa-user-doctor" style="color: #f59e0b; margin-right: 0.5rem;"></i>
                        <?php echo isset($_GET['dId']) ? getDoctorName($_GET['dId'])['dr_name'] : "" ?>
                    </div>

                    <div class="rate-stars">
                        <span class="fa-solid fa-star checked"></span>
                        <span class="fa-solid fa-star checked"></span>
                        <span class="fa-solid fa-star checked"></span>
                        <span class="fa-solid fa-star checked"></span>
                        <span class="fa-solid fa-star checked"></span>
                    </div>

                    <input type="hidden" id="num_stars" name="num_stars" value="5">

                    <button type="submit" name="rate" class="cta-btn primary-btn auth-submit-btn">
                        <i class="fa-solid fa-paper-plane"></i> Submit Rating
                    </button>

                    <div class="auth-footer">
                        <p><a href="MyMedRecord.php" class="auth-link secondary-link">
                                <i class="fa-solid fa-arrow-left"></i> Back to Records
                            </a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php require_once('footer.php'); ?>

    <script>
    const stars = document.querySelectorAll('.rate-stars .fa-star');
    const numOfStars = document.getElementById('num_stars');

    stars.forEach((star, index) => {
        // Click to set rating
        star.addEventListener('click', () => {
            stars.forEach((s) => s.classList.remove('checked'));
            for (let i = 0; i <= index; i++) {
                stars[i].classList.add('checked');
            }
            numOfStars.value = index + 1;
        });

        // Hover effect
        star.addEventListener('mouseenter', () => {
            stars.forEach((s, i) => {
                s.classList.toggle('hover-active', i <= index);
            });
        });

        star.addEventListener('mouseleave', () => {
            stars.forEach((s) => s.classList.remove('hover-active'));
        });
    });
    </script>
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