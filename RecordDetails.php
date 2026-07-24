<?php
require_once 'webs.php';
require_once 'dbcon.php';
require_once 'Users.php';
if (!isPatientLoggedIn()) {
    redirect('Index.php');
}
if (!isset($_GET['a'])) {
    redirect('Index.php');
}
if (isset($_GET['a'])) {
    $app_details = getAppointmentDetails($_GET['a']);
    $patient = getPationByAppID($_GET['a']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Medical Record Details | Go Home Clinic</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framework.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/newstyle.css">
    <link rel="stylesheet" href="css/navstyles.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <link rel="icon" href="imgs/logo-without-background.png" type="image/png">
</head>

<body>
    <?php require_once('navbar.php'); ?>

    <section id="page-hero" style="--hero-bg: url('../imgs/medical-record.jpg');">
        <div class="page-hero-content">
            <h1>Medical Record Details</h1>
            <p>Complete details of your appointment and medical record</p>
        </div>
    </section>

    <section id="form-section">
        <div class="detail-card">
            <!-- Patient Info -->
            <div class="detail-section">
                <div class="detail-section-title">
                    <i class="fa-solid fa-user"></i> Patient Information
                </div>
                <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label">Full Name</div>
                        <div class="detail-value"><?php echo $patient['f_name'] . ' ' . $patient['l_name']; ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Email</div>
                        <div class="detail-value"><?php echo $patient['p_email']; ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Contact Number</div>
                        <div class="detail-value"><?php echo $patient['p_phoneNo']; ?></div>
                    </div>
                </div>
            </div>

            <!-- Appointment Info -->
            <div class="detail-section">
                <div class="detail-section-title">
                    <i class="fa-solid fa-calendar-check"></i> Appointment Details
                </div>
                <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label">Doctor Name</div>
                        <div class="detail-value"><?php print_r(getDoctorName($app_details['dr_id'])['dr_name']) ?>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Date</div>
                        <div class="detail-value"><?php echo date('d F, Y', strtotime($app_details['date'])); ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Time Period</div>
                        <div class="detail-value"><?php echo $app_details["app_time"] ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Location</div>
                        <div class="detail-value"><?php echo $app_details['app_location']; ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Total Price</div>
                        <div class="detail-value"><?php echo $app_details['cost']; ?> SA</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Card Number</div>
                        <div class="detail-value">**************</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Name on Card</div>
                        <div class="detail-value"><?php echo $app_details['name_in_card']; ?></div>
                    </div>
                </div>
            </div>

            <!-- Medical Record -->
            <div class="detail-section">
                <div class="detail-section-title">
                    <i class="fa-solid fa-file-medical"></i> Medical Record
                </div>
                <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label">Created Date</div>
                        <div class="detail-value">
                            <?php echo date('d F, Y h:i A', strtotime($app_details['treat_date'])); ?></div>
                    </div>
                    <div class="detail-item full-width">
                        <div class="detail-label">Medical Record Details</div>
                        <div class="detail-value text-block"><?php echo $app_details['med_rec_details']; ?></div>
                    </div>
                </div>
            </div>

            <div class="detail-actions">
                <a href="MyMedRecord.php" class="auth-link secondary-link">
                    <i class="fa-solid fa-arrow-left"></i> Back to Records
                </a>
            </div>
        </div>
    </section>

    <?php require_once('footer.php'); ?>
    <script type="text/javascript" src="mobile.js"></script>
</body>

</html>