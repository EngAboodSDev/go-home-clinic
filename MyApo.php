<?php
require_once 'webs.php';
require_once 'dbcon.php';
require_once 'Users.php';

if (!isPatientLoggedIn()) {
    redirect('Index.php');
}
$myAppoints = getPatientAppoints(currentPatientId(), 'Active');

if (isset($_GET['c'])) {
    $isSuccess = cancelMyAppoint($_GET['c']);
    if ($isSuccess) {
        alertMessage('Canceled Successfully ^_^ ');
        redirect('MyApo.php');
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Appointments | Go Home Clinic</title>
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
            <h1>My Appointments</h1>
            <p>View and manage your upcoming appointments with our doctors</p>
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
                                <span><i class="fa-solid fa-location-dot"></i> <?php echo $myAppoint["app_location"]; ?></span>
                                <span><i class="fa-solid fa-coins"></i> <?php echo $myAppoint["cost"] . ' SR'; ?></span>
                            </div>
                        </div>
                        <div class="list-card-actions">
                            <a href="MyApo.php?c=<?php echo $myAppoint['app_id'] ?>" class="btn-action btn-danger-action"
                                onclick="return confirm('Are you sure you want to cancel this appointment?')">
                                <i class="fa-solid fa-xmark"></i> Cancel
                            </a>
                        </div>
                    </div>
                <?php endforeach;
            } else { ?>
                <div class="list-empty">
                    <i class="fa-solid fa-calendar-xmark"></i>
                    <p>You don't have any active appointments yet.</p>
                    <a href="OurDoctors.php" class="btn-action btn-primary-action"
                        style="display:inline-flex; margin-top:1rem;">
                        <i class="fa-solid fa-plus"></i> Book an Appointment
                    </a>
                </div>
            <?php } ?>
        </div>
    </section>

    <?php require_once('footer.php'); ?>
    <script type="text/javascript" src="mobile.js"></script>
</body>

</html>