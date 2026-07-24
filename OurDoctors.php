<?php
require_once 'webs.php';
require_once 'dbcon.php';
require_once 'Users.php';
$AvailableDoctors = getAllAvailableDoctors();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Our Doctors | Go Home Clinic</title>
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

    <section id="doctors-hero">
        <div class="doctors-hero-content">
            <h1>Our Expert Doctors.</h1>
            <p>Meet our dedicated team of healthcare professionals, providing compassionate and specialized care
                directly at your home</p>
        </div>
    </section>

    <section id="doctors-main">
        <div class="doctors-container">
            <div class="doctors-grid">
                <?php foreach ($AvailableDoctors as $Doctor) : ?>
                <div class="Doc_teams">
                    <div class="doc-img-container">
                        <img src="imgs/user (2).png" alt="Doctor Profile">
                    </div>
                    <div class="doc-card-content">
                        <div class="doc_name"><?php echo $Doctor['f_name'] . ' ' . $Doctor['l_name']; ?></div>
                        <div class="doc_desig"><?php echo $Doctor['job']; ?></div>
                        <div class="review_stars">
                            <?php $num_stars = round(getDpctorAvgRating($Doctor['dr_id'])['rating_avg']);
                                $count = 1;
                                while ($count <= 5) : ?>
                            <span
                                class="fa-solid fa-star <?php echo ($count <= $num_stars) ? " checked " : "" ?>"></span>
                            <?php ++$count;
                                endwhile; ?>
                        </div>
                        <div class="doc_about"> <?php echo $Doctor['job_details']; ?></div>
                        <div class="btn-doctor">
                            <a href="BookAbo.php?dr=<?php echo $Doctor['dr_id'] ?>" style="text-decoration: none;">
                                <button class="btn-1">Book an appointment</button>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php require_once('footer.php'); ?>
    <script type="text/javascript" src="mobile.js"></script>
</body>

</html>