<?php
require_once 'webs.php';
require_once 'dbcon.php';
require_once 'Users.php';

if (isset($_GET['pout']) && is_numeric($_GET['pout'])) {
    p_logout();
    header('Refresh:0');
    redirect('Index.php');
}
if (isset($_GET['dout']) && is_numeric($_GET['dout'])) {
    d_logout();
    header('Refresh:0');
    redirect('Index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | Go Home Clinic</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framework.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/newstyle.css">
    <link rel="stylesheet" href="css/navstyles.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" /> -->
    <link rel="icon" href="imgs/logo-without-background.png" type="image/png">
</head>

<body>
    <?php require_once('navbar.php'); ?>
    <section class="intro" id="intro">
        <div class="intro-content">
            <div class="intro-text">
                <h1>Welcome to <br> Go Home Clinic.</h1>
                <p>Your trusted destination for compassionate care. We bring medical expertise to your doorstep,
                    ensuring the well-being of your beloved ones</p>
                <div class="intro-actions">
                    <a href="OurDoctors.php" class="cta-btn primary-btn">Book Appointment Now</a>
                    <a href="Contact.php" class="cta-btn secondary-btn">Call Us Today</a>
                </div>
            </div>
            <div class="intro-image">
                <div class="image-wrapper">
                    <img src="imgs/Medical care-rafiki.png" alt="Medical Care" class="floating-img" />
                    <div class="circle-bg"></div>
                </div>
            </div>
        </div>
    </section>
    <section id="about_us">
        <div class="about-container">
            <div class="about-image">
                <img src="imgs/Nursing home-rafiki.png" alt="Nursing Home Care" title="Nursing Home Care" />
                <div class="img-decoration"></div>
            </div>
            <div class="about-text">
                <h2 id="about">About Us</h2>
                <p>
                    We offer convenient periodic check-ups, sparing seniors the hassle of frequent hospital visits. Our
                    mission is to provide top-notch medical care in the comfort of their homes, ensuring their
                    well-being with expertise and care.
                </p>
                <div class="about-btn-wrapper">
                    <a href="About.php" class="cta-btn secondary-btn" id="about_btn">Read More...</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="services-container">
            <div class="services-header">
                <h2>Our Services</h2>
                <p>Comprehensive care solutions tailored to your needs</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fa-solid fa-stethoscope"></i>
                    </div>
                    <div class="service-content">
                        <h3>Regular Check-ups</h3>
                        <p>We provide scheduled periodic check-ups, eliminating the need for frequent hospital visits
                            for seniors</p>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fa-solid fa-pills"></i>
                    </div>
                    <div class="service-content">
                        <h3>Medication Management</h3>
                        <p>We assist in organizing and managing medications, helping seniors adhere to prescribed
                            regimens</p>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <div class="service-content">
                        <h3>Health Education</h3>
                        <p>We provide educational materials and advice to empower seniors and caregivers to make
                            informed health decisions</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="why_choose_us">
        <div class="wcu-container">
            <div class="wcu-header">
                <h2>Why Choose Us ?</h2>
                <p>Dedicated to providing the best home healthcare experience</p>
            </div>
            <div class="wcu-grid">
                <div class="wcu-card">
                    <div class="wcu-icon">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>
                    <h3>Expert Doctors</h3>
                    <p>Highly qualified professionals ready to serve you</p>
                </div>
                <div class="wcu-card">
                    <div class="wcu-icon">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <h3>24/7 Support</h3>
                    <p>Always here for you, anytime, anywhere</p>
                </div>
                <div class="wcu-card">
                    <div class="wcu-icon">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <h3>Affordable Care</h3>
                    <p>Premium service at fair and transparent prices</p>
                </div>
                <div class="wcu-card">
                    <div class="wcu-icon">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <h3>Personalized</h3>
                    <p>Care plans tailored specifically to your needs</p>
                </div>
            </div>
        </div>
    </section>



    <section id="stat_section">
        <div class="stat-container">
            <div class="stat-header">
                <h2>Our Achievements</h2>
                <p>We take pride in our numbers, reflecting our commitment to excellence and care</p>
            </div>
            <div class="stat-grid">
                <div class="stat-card">
                    <div class="icon-box">
                        <i class="fa-regular fa-face-grin-hearts"></i>
                    </div>
                    <div class="stat-info">
                        <div class="num">+300</div>
                        <span>Happy Patients</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="icon-box">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>
                    <div class="stat-info">
                        <div class="num">+10</div>
                        <span>Medical Team</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="icon-box">
                        <i class="fa-brands fa-searchengin"></i>
                    </div>
                    <div class="stat-info">
                        <div class="num">+12500</div>
                        <span>Website Visitors</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials">
        <div class="testimonials-container">
            <div class="testimonials-header">
                <h2>What Our Patients Say ?</h2>
                <p>Real stories from those who trusted us with their care</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="quote-icon">
                        <i class="fa-solid fa-quote-left"></i>
                    </div>
                    <p class="testimonial-text">"The care my father received was exceptional. The doctors are
                        professional and really take the time to listen."</p>
                    <div class="testimonial-author">
                        <h4>Ahmed Hassan</h4>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="quote-icon">
                        <i class="fa-solid fa-quote-left"></i>
                    </div>
                    <p class="testimonial-text">"Convenient and reliable. Having a doctor visit us at home saved us so
                        much time and stress. Highly recommend!"</p>
                    <div class="testimonial-author">
                        <h4>Sara Fadhl</h4>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="quote-icon">
                        <i class="fa-solid fa-quote-left"></i>
                    </div>
                    <p class="testimonial-text">"Truly compassionate care. They treat you like family. I felt safe and
                        well-cared for during my recovery."</p>
                    <div class="testimonial-author">
                        <h4>John Smith</h4>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php require_once('footer.php'); ?>
    <script type="text/javascript" src="mobile.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js'></script>
    <script src="./script.js"></script>

    <script>
        $(".num").each(function() {
            var n = $(this).text();
            n <= 20 ? (z = 99) : (z = 0);
            $(this)
                .prop("Counter", z)
                .animate({
                    Counter: n.replace(/,/g, ".")
                }, {
                    duration: 3000,
                    easing: "swing",
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    },
                    complete: function() {
                        $(this).text(n);
                    }
                });
        });
    </script>

</body>

</html>