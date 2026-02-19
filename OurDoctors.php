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
    <title>Go Home Clinic | Our Doctors</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/newstyle.css">
    <link rel="stylesheet" href="css/navstyles.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">

</head>

<body>
    <?php require_once('navbar.php'); ?>
    <div class="doc_container">
        <div class="doc_header">
            <h1>Our Doctors</h1>
        </div>
        <div class="doc_sub_container">
            <?php foreach ($AvailableDoctors as $Doctor) : ?>
            <div class="Doc_teams">
                <img src="imgs/user (2).png" alt="">
                <div class="doc_name"><?php echo $Doctor['f_name'] . ' ' . $Doctor['l_name']; ?></div>
                <div class="review_stars">
                    <?php $num_stars = round(getDpctorAvgRating($Doctor['dr_id'])['rating_avg']);
                        $count = 1;
                        while ($count <= 5) : ?>
                    <span class="fa fa-star <?php echo ($count <= $num_stars) ? " checked " : "" ?>"></span>
                    <?php ++$count;
                        endwhile; ?>
                </div>
                <div class="doc_desig"><?php echo $Doctor['job']; ?></div>
                <div class="doc_about"> <?php echo $Doctor['job_details']; ?></div>
                <div class="btn-doctor">
                    <a href="BookAbo.php?dr=<?php echo $Doctor['dr_id'] ?>" style="text-decoration: none;"><button
                            class="btn-1">Book an appointment</button></a>
                </div>

            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php require_once('footer.php'); ?>
    <script type="text/javascript" src="mobile.js"></script>
</body>

</html>