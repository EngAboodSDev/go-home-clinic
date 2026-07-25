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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FAQ | Go Home Clinic</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framework.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" type="text/css" href="css/newstyle.css">
    <link rel="stylesheet" type="text/css" href="css/navstyles.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <link rel="icon" href="imgs/logo-without-background.png" type="image/png">
</head>

<body class="faq_body">
    <!--
        * Go Home Clinic Website and Dashboard - v1.0.0
        * Designed and Developed by Abdulrahman Fadhl Ameer Saif
        * @EngAboodSDev <abdulrahmanfadhl@gmail.com>
        * Copyright © 2026 Go Home Clinic (Website and Dashboard)
        * All rights reserved.
        * License - This project is licensed under the MIT License - see the LICENSE file for details.
    -->
    <?php require_once('navbar.php'); ?>

    <section id="faq-hero">
        <div class="faq-hero-content">
            <h1>Frequently Asked Questions.</h1>
            <p>Find answers to common questions about our mobile clinic services, appointments, and specialized care for
                elderly patients</p>
        </div>
    </section>

    <section id="faq-main">
        <div class="faq-container">
            <div class="faq-item">
                <div class="faq-question">
                    <span>What services does the Go Home Clinic provide?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Certainly! As a mobile clinic catering to those suffering from chronic diseases such as diabetes
                        and high blood pressure, we understand the unique healthcare needs of our patients. In addition
                        to general medical services such as examinations and vaccinations, we offer specialized care and
                        management for chronic conditions. Our services include medication management, dietary guidance,
                        and personalized treatment plans to improve the quality of life for our patients.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>Are the healthcare professionals qualified and licensed?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Absolutely! All healthcare professionals on our mobile clinic team are highly qualified and
                        licensed. You can trust that you will receive expert care from experienced professionals who
                        prioritize your well-being. Our team includes licensed physicians, nurses, and specialists
                        dedicated to providing the best possible healthcare services to our patients.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>How often should elderly patients have examinations?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>For elderly patients, regular examinations are vital. Depending on their age and health
                        conditions, we generally recommend scheduling examinations at least once every six months. It is
                        important to prioritize routine check-ups to monitor and manage chronic diseases effectively.
                        Our
                        healthcare professionals will work with each elderly patient to establish an appropriate
                        examination schedule tailored to their specific needs and health status.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>How do I cancel or reschedule an appointment?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>If you need to cancel or reschedule an appointment, please notify us as soon as possible. You can
                        do this by contacting our clinic through our website/app or by giving us a call. We kindly
                        request that you provide adequate notice so we can accommodate other patients in need.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <span>How do I book an appointment?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>To book an appointment, you can easily do so by visiting our website/app or calling our clinic
                        directly. Our friendly staff will guide you through the process and find a suitable time slot
                        for you.</p>
                </div>
            </div>
        </div>
    </section>

    <?php require_once('footer.php'); ?>
    <script type="text/javascript" src="mobile.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const faqQuestions = document.querySelectorAll(".faq-question");

        faqQuestions.forEach((question) => {
            question.addEventListener("click", () => {
                const item = question.parentElement;
                const isActive = item.classList.contains("active");

                // Close other items
                document.querySelectorAll(".faq-item").forEach((i) => {
                    i.classList.remove("active");
                });

                // Toggle current item
                if (!isActive) {
                    item.classList.add("active");
                }
            });
        });
    });
    </script>
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