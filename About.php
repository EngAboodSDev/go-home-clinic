<?php
require_once 'webs.php';
require_once 'dbcon.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us | Go Home Clinic</title>
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
    <section id="about-hero">
        <div class="about-hero-content">
            <h1>About Go Home Clinic.</h1>
            <p>Your trusted partner in convenient and accessible healthcare. We are on a mission to transform the way
                you receive medical care, bringing expertise directly to your doorstep</p>
        </div>
    </section>

    <section id="core-values">
        <div class="core-values-container">
            <div class="core-values-header">
                <h2>Our Foundation</h2>
                <p>Guided by a commitment to excellence and patient-centric care</p>
            </div>
            <div class="core-values-grid">
                <div class="core-value-card">
                    <div class="value-icon">
                        <i class="fa-solid fa-rocket"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>To provide accessible, integrated medical care that empowers individuals to live healthier lives.
                        We deliver top-quality services with utmost convenience, ensuring every interaction improves
                        well-being.</p>
                </div>

                <div class="core-value-card">
                    <div class="value-icon">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>To redefine the future of healthcare where high-quality medical care is effortless and
                        personalized. We strive to be the leaders in mobile innovation, making integrated care
                        universally accessible.</p>
                </div>

                <div class="core-value-card">
                    <div class="value-icon">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h3>Our Objectives</h3>
                    <ul class="objective-list">
                        <li><i class="fa-solid fa-check"></i> Broaden Accessibility to underserved regions.</li>
                        <li><i class="fa-solid fa-check"></i> Technological Advancement in telemedicine.</li>
                        <li><i class="fa-solid fa-check"></i> Uphold unwavering standards of excellence.</li>
                        <li><i class="fa-solid fa-check"></i> Empower patients through health resources.</li>
                        <li><i class="fa-solid fa-check"></i> Deep Community Involvement and education.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php require_once('footer.php'); ?>
    <script type="text/javascript" src="mobile.js"></script>
</body>

</html>