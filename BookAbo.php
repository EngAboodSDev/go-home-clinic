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
    redirect('Login.php');
}
if (isDoctorLoggedIn() || !isset($_GET['dr'])) {
    redirect('Index.php');
}
if (isset($_GET['dr'])) {
    $DoctorName = getDoctorName($_GET['dr']);
    $patientInfo = getPatientProfileInfo(currentPatientId());
    $allTimes = array("09:00 AM - 10:00 AM", "10:30 AM - 11:00 AM", "12:00 PM - 01:00 PM", "01:30 PM - 02:30 PM", "03:00 PM - 04:00 PM", "04:30 PM - 05:30 PM");
    $UnAvaliableTimesArray = array();

    if (isset($_GET['date'])) {
        $UnAvaliableTimes = getNonAvaliableDoctorTimes($_GET['dr'], $_GET['date']);
        if ($UnAvaliableTimes) {
            foreach (explode(",", $UnAvaliableTimes['unavilable_times']) as  $v)
                $UnAvaliableTimesArray[] = $v;
        }
        if (isset($_POST['bookApp'])) {
            $isSuccess = boodAppointment(
                $_POST['date'],
                $_POST['app_location'],
                $_POST['app_time'],
                $_POST['cost'],
                $_POST['card_number'],
                $_POST['name_in_card'],
                currentPatientId(),
                $_GET['dr']
            );
            if ($isSuccess) {
                alertMessage('Booking is done Successfully ^_^ ');
                redirect('Index.php');
            }
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
    <title>Book an Appointment | Go Home Clinic</title>
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

    <section id="page-hero" style="--hero-bg: url('../imgs/book-an-appointment.jpg');">
        <div class="page-hero-content">
            <h1>Book Your Appointment</h1>
            <p>Schedule a home visit with our expert doctors at your convenience</p>
        </div>
    </section>

    <section id="form-section">
        <form action="#" method="post" class="form-card" id="bookingForm">

            <!-- Stepper -->
            <div class="stepper">
                <div class="step-item active" id="stepIndicator1">
                    <div class="step-circle">1</div>
                </div>
                <div class="step-line" id="stepLine1"></div>
                <div class="step-item" id="stepIndicator2">
                    <div class="step-circle">2</div>
                </div>
                <div class="step-line" id="stepLine2"></div>
                <div class="step-item" id="stepIndicator3">
                    <div class="step-circle">3</div>
                </div>
            </div>

            <!-- Step 1: Basic Details -->
            <div class="form-step active" id="step1">
                <div class="form-step-title"><i class="fa-solid fa-user"></i> Your Basic Details</div>
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" class="auth-input" readonly
                        value="<?php echo $patientInfo['f_name'] . ' ' . $patientInfo['l_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="mail">Email Address</label>
                    <input type="email" id="mail" class="auth-input" readonly
                        value="<?php echo $patientInfo['p_email']; ?>">
                </div>
                <div class="form-group">
                    <label for="tel">Contact Number</label>
                    <input type="tel" id="tel" class="auth-input" readonly
                        value="<?php echo $patientInfo['p_phoneNo']; ?>">
                </div>
                <div class="form-btn-group">
                    <button type="button" class="cta-btn primary-btn auth-submit-btn" onclick="goToStep(2)">
                        Next <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 2: Appointment Details -->
            <div class="form-step" id="step2">
                <div class="form-step-title"><i class="fa-solid fa-calendar-check"></i> Appointment Details</div>
                <div class="form-group">
                    <label for="doc_name">Selected Doctor</label>
                    <input type="text" id="doc_name" class="auth-input" value="<?php echo $DoctorName['dr_name']; ?>"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="date">Date *</label>
                    <input type="date" id="date" name="date" class="auth-input"
                        value="<?php echo isset($_GET['date']) ? "$_GET[date]" : "" ?>" min="<?= date('Y-m-d') ?>"
                        max="<?= date('Y-m-d', strtotime('+7 days')) ?>" required>
                </div>
                <div class="form-group">
                    <label for="time">Time *</label>
                    <select id="time" name="app_time" required>
                        <option value="" selected disabled>Select Appointment Time</option>
                        <?php foreach ($allTimes as $time) { ?>
                        <option value="<?php echo $time; ?>"
                            <?php echo in_array($time, $UnAvaliableTimesArray) ? "disabled" : "" ?>><?php echo $time; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="location">Location *</label>
                    <select name="app_location" required>
                        <option value="Al Hofuf">Al Hofuf</option>
                        <option value="Al Mubarraz">Al Mubarraz</option>
                    </select>
                </div>
                <div class="price-display">
                    <span class="price-label">Price per hour</span>
                    <span class="price-value">100 SR</span>
                </div>
                <button type="button" class="cta-btn primary-btn auth-submit-btn" id="nextToPayment"
                    style="width: 100%;">
                    Next <i class="fa-solid fa-arrow-right"></i>
                </button>

                <div class="auth-footer" style="margin-top: 1.5rem; text-align: center;">
                    <p><a href="javascript:void(0)" onclick="goToStep(1)" class="auth-link secondary-link"><i
                                class="fa-solid fa-arrow-left"></i> Back to Step 1</a></p>
                </div>
            </div>

            <!-- Step 3: Payment Details -->
            <div class="form-step" id="step3">
                <div class="form-step-title"><i class="fa-solid fa-credit-card"></i> Payment Details</div>
                <div class="price-display">
                    <span class="price-label">Service Price</span>
                    <span class="price-value" id="price">100 SR</span>
                </div>
                <div class="price-display">
                    <span class="price-label">Service Fee</span>
                    <span class="price-value">10 SR</span>
                </div>
                <div class="price-display total">
                    <span class="price-label">Total Price</span>
                    <span class="price-value" id="totalprice">110 SR</span>
                </div>
                <input type="hidden" id="inputcost" name="cost" value="110">
                <div class="form-group" style="margin-top: 1.5rem;">
                    <label for="card_num">Card Number</label>
                    <input type="number" id="card_num" name="card_number" class="auth-input"
                        placeholder="Enter Card Number e.g. 4535*****" required>
                </div>
                <div class="form-group">
                    <label for="name_card">Name on Card</label>
                    <input type="text" id="name_card" name="name_in_card" class="auth-input"
                        placeholder="Enter Name on the Card" required>
                </div>
                <button type="submit" class="cta-btn primary-btn auth-submit-btn" name="bookApp" style="width: 100%;">
                    <i class="fa-solid fa-check"></i> Confirm Booking
                </button>

                <div class="auth-footer" style="margin-top: 1.5rem; text-align: center;">
                    <p><a href="javascript:void(0)" onclick="goToStep(2)" class="auth-link secondary-link"><i
                                class="fa-solid fa-arrow-left"></i> Back to Step 2</a></p>
                </div>
            </div>
        </form>
    </section>

    <?php require_once('footer.php'); ?>

    <script>
    // Date change handler
    const app_date = document.getElementById("date");
    app_date.addEventListener("change", function() {
        var selectedDate = app_date.value;
        window.location.href = "BookAbo.php?dr=<?php echo $_GET['dr']; ?>&date=" + selectedDate;
    });

    const selectedTime = document.getElementById("time");

    // Stepper Navigation
    function goToStep(stepNum) {
        // Hide all steps
        document.querySelectorAll('.form-step').forEach(s => s.classList.remove('active'));
        // Show target step
        document.getElementById('step' + stepNum).classList.add('active');

        // Update stepper indicators
        for (let i = 1; i <= 3; i++) {
            const indicator = document.getElementById('stepIndicator' + i);
            indicator.classList.remove('active', 'completed');
            if (i < stepNum) indicator.classList.add('completed');
            if (i === stepNum) indicator.classList.add('active');
        }
        // Update step lines
        for (let i = 1; i <= 2; i++) {
            const line = document.getElementById('stepLine' + i);
            line.classList.toggle('active', i < stepNum);
        }
    }

    // Next to payment - validate step 2
    document.getElementById('nextToPayment').addEventListener('click', function() {
        const date = document.getElementById('date');
        if (date.value !== "" && selectedTime.value !== "") {
            goToStep(3);
        } else {
            alert('Please select a date and time for your appointment.');
        }
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