<?php
require_once 'webs.php';
require_once 'dbcon.php';
require_once 'Users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sendContact'])) {
    $isSuccess = saveContact(
        $_POST['name'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['subject'],
        $_POST['message']
    );
    if ($isSuccess) {
        alertMessage('Your message has been sent successfully!');
    } else {
        alertMessage('An error occurred. Please try again.');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact Us | Go Home Clinic</title>
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

    <section id="contact-hero">
        <div class="contact-hero-content">
            <h1>Contact Us.</h1>
            <p>We are here to help. Reach out to us for any inquiries or support. Our team is available 24/7 to ensure
                your well-being</p>
        </div>
    </section>

    <section id="contact-main">
        <div class="contact-container">
            <div class="contact-info">
                <div class="info-header">
                    <h2>Get In Touch With Us Now!</h2>
                    <p>Multiple ways to stay connected with Go Home Clinic</p>
                </div>
                <div class="info-grid">
                    <div class="core-value-card">
                        <div class="value-icon">
                            <i class="fa-solid fa-location-dot fa-beat-fade"></i>
                        </div>
                        <h3>Our Location</h3>
                        <p>Riyadh, Saudi Arabia<br> We serve patients throughout the city and surrounding areas.
                        </p>
                    </div>

                    <div class="core-value-card">
                        <div class="value-icon">
                            <i class="fa-solid fa-phone fa-beat-fade"></i>
                        </div>
                        <h3>Direct Contact</h3>
                        <p>Call us at: +966 560 000 000<br>Email: info@go-home-clinic.com</p>
                    </div>

                    <div class="core-value-card">
                        <div class="value-icon">
                            <i class="fa-solid fa-share-nodes fa-beat-fade"></i>
                        </div>
                        <h3>Connect With Us</h3>
                        <div class="social-links-grid">
                            <a href="https://www.facebook.com/go-home-clinic" class="social-link"><i
                                    class="fa-brands fa-facebook-f fa-float"></i></a>
                            <a href="https://x.com/go-home-clinic" class="social-link"><i
                                    class="fa-brands fa-x-twitter fa-float"></i></a>
                            <a href="https://www.instagram.com/go-home-clinic" class="social-link"><i
                                    class="fa-brands fa-instagram fa-float"></i></a>
                            <a href="https://www.linkedin.com/in/go-home-clinic" class="social-link"><i
                                    class="fa-brands fa-linkedin-in fa-float"></i></a>
                        </div>
                    </div>

                    <div class="core-value-card">
                        <div class="value-icon">
                            <i class="fa-solid fa-clock fa-beat-fade"></i>
                        </div>
                        <h3>Availability</h3>
                        <p>Our mobile clinic is available 24 hours a day, 7 days a week, including holidays.</p>
                    </div>
                </div>
            </div>

            <div class="contact-form-wrapper">
                <form action="" method="POST" class="contact-form">
                    <h2>Send Us a Message</h2>
                    <p>Have questions? We'd love to hear from you</p>
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" placeholder="Your Phone Number" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Your Message" rows="6" required></textarea>
                    </div>
                    <button type="submit" name="sendContact" class="cta-btn primary-btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <?php require_once('footer.php'); ?>
    <script type="text/javascript" src="mobile.js"></script>
</body>

</html>