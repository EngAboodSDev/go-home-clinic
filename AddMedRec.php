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

if (!isset($_GET['ap'])) {
    redirect('index.php');
}
if (!isDoctorLoggedIn()) {
    redirect('Index.php');
}
if (isset($_GET['ap'])) {
    $patient = getPationByAppID($_GET['ap']);
    if (isset($_POST['createMedRec'])) {
        $isSuccess = createMedRec($_GET['ap'], $patient['p_id'], currentDoctorId(), $_POST['medRecDetails']);
        if ($isSuccess) {
            alertMessage('Creation is done successfully !');
            redirect('UpcomingAbo.php');
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
    <title>Create Medical Record | Go Home Clinic</title>
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
            <h1>Create Medical Record</h1>
            <p>Document the patient's diagnosis, treatment, and medical notes</p>
        </div>
    </section>

    <section id="form-section">
        <form action="#" method="post" class="form-card">
            <div class="form-card-header">
                <h2><i class="fa-solid fa-file-medical" style="color: #f59e0b;"></i> New Medical Record</h2>
                <p>Fill in the medical record details for this patient</p>
            </div>

            <div class="form-group">
                <label for="pname">Patient Name</label>
                <input type="text" id="pname" name="pname" class="auth-input"
                    value="<?php echo $patient['f_name'] . ' ' . $patient['l_name']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="medRecDetails">Medical Record Details *</label>
                <textarea name="medRecDetails" id="medRecDetails" required
                    placeholder="Enter diagnosis, treatment plan, prescriptions, and other medical notes..."></textarea>
            </div>

            <button type="submit" class="cta-btn primary-btn auth-submit-btn" name="createMedRec" style="width: 100%;">
                <i class="fa-solid fa-check"></i> Create Record
            </button>

            <div class="auth-footer" style="margin-top: 1.5rem; text-align: center;">
                <p><a href="UpcomingAbo.php" class="auth-link secondary-link"><i class="fa-solid fa-arrow-left"></i>
                        Back to Upcoming Appointments</a></p>
            </div>
        </form>
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