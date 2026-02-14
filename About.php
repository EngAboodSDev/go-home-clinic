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
  <title>Go Home Clinic | About Us </title>
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/newstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/navstyles.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</head>

<body>
<?php require_once('navbar.php'); ?>
  <section class="sec">
    <div class="top">
      <h3> About Us </h3>
    <p class="section-lead">Welcome to GO HOME CLINIC, your trusted partner in convenient and accessible healthcare.
      At GO HOME CLINIC, we are on a mission to transform the way you receive medical care. We understand the challenges
      of accessing quality healthcare, and that's why we've reimagined the healthcare experience for you.
      Our mobile clinic brings integrated medical care to your doorstep, putting your health and well-being at the
      forefront.</p>
    </div>
    <div class="services-grid">
      <div class="service service1">
        <i class="ti-bar-chart"></i>
        <i class="fa-solid fa-rocket"></i>

        <h4>Mission </h4>
        <p>Our mission is to provide accessible, integrated medical care that empowers individuals to live healthier,
          more comfortable lives. We are committed to delivering top-quality healthcare services with the utmost
          convenience, ensuring that every push of a button leads to improved well-being.
          Our goal is to revolutionize healthcare delivery, making it more patient-centric, efficient, and tailored to
          your unique needs..</p>
      </div>

    <div class="service service2">
      <i class="ti-light-bulb"></i>
      <i class="fa-regular fa-lightbulb fa-2xs" style="color: #4252bb;"></i>
      <h4>vision </h4>
      <p>At GO HOME CLINIC,our vision is to redefine the future of healthcare. We envision a world where accessing
        high-quality medical care is not only effortless but also deeply personalized. We strive to be at the forefront
        of innovation in mobile healthcare, continuously expanding our services and reach to make integrated medical
        care universally accessible.
        Our vision is to be the trusted partner that enhances the lives of individuals and communities by delivering
        healthcare at the push of a button</p>
    <!-- </div> -->
    </div>

    <div class="service service3">
      <i class="ti-money"></i>
      <i class="fa-solid fa-list-check fa-2xs"></i>
      <h4>Objectives </h4>
      <p>Broaden Accessibility: Extend our mobile clinic's geographic footprint, ensuring that integrated medical care
        is accessible to underserved regions.

        Technological Advancement: Continuously upgrade our technological infrastructure, particularly in telemedicine,
        to facilitate secure, efficient healthcare consultations.

        Exemplary Care: Uphold unwavering standards of healthcare excellence through rigorous quality control measures
        and continuous improvement initiatives.

        Patient Empowerment: Equip patients with knowledge and resources to actively manage their health, fostering
        informed decision-making.

        Community Involvement: Actively engage with local communities through comprehensive health education programs,
        outreach efforts, and strategic partnerships to bolster holistic well-being.</p>

    </div>
    </div>
  </section>
  <?php require_once ('footer.php');?>
  <script type="text/javascript" src="mobile.js"></script>
</body>

</html>