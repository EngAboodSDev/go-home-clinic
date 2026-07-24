<?php
require_once 'webs.php';
require_once 'dbcon.php';
require_once 'Users.php';
if (!isDoctorLoggedIn()) {
    redirect('Index.php');
}
$docAppoints = getDoctorAppoints(currentDoctorId());
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Upcoming Appointments | Go Home Clinic</title>
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
            <h1>Upcoming Appointments</h1>
            <p>Manage your scheduled patient appointments and create medical records</p>
        </div>
    </section>

    <section id="list-section">
        <div class="list-container">
            <?php if ($docAppoints) {
                foreach ($docAppoints as $docAppoint) : ?>
                    <div class="list-card">
                        <div class="list-card-avatar">
                            <img src="imgs/user (2).png" alt="Patient">
                        </div>
                        <div class="list-card-info">
                            <div class="card-name"><?php echo $docAppoint['f_name'] . ' ' . $docAppoint['l_name']; ?></div>
                            <div class="card-details">
                                <span><i class="fa-solid fa-calendar-days"></i>
                                    <?php echo date('d F, Y', strtotime($docAppoint['date'])); ?></span>
                                <span><i class="fa-solid fa-clock"></i> <?php echo $docAppoint["app_time"]; ?></span>
                                <span><i class="fa-solid fa-location-dot"></i> <?php echo $docAppoint["app_location"]; ?></span>
                            </div>
                        </div>
                        <div class="list-card-actions">
                            <a href="AddMedRec.php?ap=<?php echo $docAppoint['app_id']; ?>"
                                class="btn-action btn-primary-action">
                                <i class="fa-solid fa-file-medical"></i> Create Record
                            </a>
                        </div>
                    </div>
                <?php endforeach;
            } else { ?>
                <div class="list-empty">
                    <i class="fa-solid fa-calendar-xmark"></i>
                    <p>There are no upcoming appointments.</p>
                </div>
            <?php } ?>
        </div>
    </section>

    <?php require_once('footer.php'); ?>
    <script type="text/javascript" src="mobile.js"></script>
</body>

</html>