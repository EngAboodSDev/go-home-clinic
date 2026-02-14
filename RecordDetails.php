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

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Go Home Clinic | Medical Record Details </title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/newstyle.css">
    <link rel="stylesheet" href="css/navstyles.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <style>
        .title {
            font-size: large;
            font-weight: 600;
        }

        .title::before {
            content: '';
            border-radius: 10px;
            border-color: black;
        }

        .titleValue {
            font-size: medium;
            font-weight: 400;
        }

        .none {
            display: none;
        }
    </style>
</head>

<body>
    <?php require_once('navbar.php'); ?>

    <div>
        <h1>Medical Record Details</h1>
    </div>
    <form action="#" method="post" class="app_form">
        <fieldset>
            <legend><span class="number">1</span>Your Basic details</legend>
            <p class="title">Your Name: <span class="titleValue"><?php echo $patient['f_name'] . ' ' . $patient['l_name']; ?></span></p>
            <p class="title">Your Email: <span class="titleValue"><?php echo $patient['p_email']; ?></span></p>
            <p class="title">Contant Number: <span class="titleValue"><?php echo $patient['p_phoneNo']; ?></span></p><br><br>
        </fieldset>

        <fieldset>
            <legend><span class="number">2</span>Your appointment details</legend>

            <p class="title">Doctor Name: <span class="titleValue"> <?php print_r(getDoctorName($app_details['dr_id'])['dr_name']) ?></span></p>
            <p class="title">Appointment Date: <span class="titleValue"> <?php echo date('d F, Y', strtotime($app_details['date'])); ?></span></p>
            <p class="title">Appointment Time Period: <span class="titleValue"> <?php echo $app_details["app_time"] ?> </span></p>
            <p class="title">Location: <span class="titleValue"> <?php echo $app_details['app_location']; ?></span></p>
            <p class="title">Total Price: <span class="titleValue"> <?php echo $app_details['cost']; ?> SA</span></p>
            <p class="title">Card Number: <span class="titleValue">**************</span></p>
            <p class="title">Name In Your Card : <span class="titleValue"><?php echo $app_details['name_in_card']; ?></span></p><br><br>
        </fieldset>

        <fieldset>
            <legend><span class="number">3</span>Medical record details</legend>
            <p class="title">Created Date: <span class="titleValue"><?php echo date('d F, Y h:i A', strtotime($app_details['treat_date'])); ?></span></p>
            <p class="title">Medical Record: <br> <span class="titleValue"><?php echo $app_details['med_rec_details']; ?></span></p>
        </fieldset>
        <br><br>
        <a type="button" class="cancel" href="MyMedRecord.php">Close</a>
    </form>
    <script type="text/javascript" src="mobile.js"></script>

</body>

</html>