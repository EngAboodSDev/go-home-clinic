<?php
require_once 'webs.php';
require_once 'dbcon.php';
require_once 'Users.php';
if (!isDoctorLoggedIn()) {
    redirect('Index.php');
}
$docMeds = getDoctorMeds(currentDoctorId());
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Medical Records | Go Home Clinic</title>
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
            <h1>Medical Records</h1>
            <p>View and edit medical records for your patients</p>
        </div>
    </section>

    <section id="list-section">
        <div class="list-container">
            <?php if ($docMeds) {
                foreach ($docMeds as $docMed) : ?>
                    <div class="list-card">
                        <div class="list-card-avatar">
                            <img src="imgs/user (2).png" alt="Patient">
                        </div>
                        <div class="list-card-info">
                            <div class="card-name"><?php echo $docMed['f_name'] . ' ' . $docMed['l_name']; ?></div>
                            <div class="card-details">
                                <span><i class="fa-solid fa-calendar-days"></i>
                                    <?php echo date('d F, Y h:i A', strtotime($docMed['treat_date'])); ?></span>
                            </div>
                        </div>
                        <div class="list-card-actions">
                            <a href="EditMedRec.php?ap=<?php echo $docMed['app_id']; ?>&md=<?php echo $docMed['med_id']; ?>"
                                class="btn-action btn-primary-action">
                                <i class="fa-solid fa-pen-to-square"></i> Edit Record
                            </a>
                        </div>
                    </div>
                <?php endforeach;
            } else { ?>
                <div class="list-empty">
                    <i class="fa-solid fa-file-circle-xmark"></i>
                    <p>There are no medical records yet.</p>
                </div>
            <?php } ?>
        </div>
    </section>

    <?php require_once('footer.php'); ?>
    <script type="text/javascript" src="mobile.js"></script>
</body>

</html>