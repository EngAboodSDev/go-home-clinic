<?php
require_once 'webs.php';
require_once 'dbcon.php';
require_once 'Users.php';


if (!isDoctorLoggedIn()) {
    redirect('Index.php');
} else {

    if (!isset($_GET['md']) || !isset($_GET['ap'])) {
        redirect('index.php');
    } else if (isset($_GET['md']) && isset($_GET['ap'])) {
        $patient = getPationByAppID($_GET['ap']);
        $medDetails = getMedicalRecordDetails($_GET['md']);
        if (isset($_POST['updateMedRec'])) {
            $isSuccess = updateMedRec($_GET['md'], $_POST['medRecDetails']);
            if ($isSuccess) {
                alertMessage('Modified successfully  ^_^');
                redirect('MedicalRecords.php');
            }
        }
    } else {
        redirect('Index.php');
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Medical Record | Go Home Clinic</title>
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
            <h1>Edit Medical Record</h1>
            <p>Update the patient's medical record details</p>
        </div>
    </section>

    <section id="form-section">
        <form action="#" method="post" class="form-card">
            <div class="form-card-header">
                <h2><i class="fa-solid fa-pen-to-square" style="color: #f59e0b;"></i> Edit Record</h2>
                <p>Modify the medical record information below</p>
            </div>

            <div class="form-group">
                <label for="pname">Patient Name</label>
                <input type="text" id="pname" name="pname" class="auth-input"
                    value="<?php echo $patient['f_name'] . ' ' . $patient['l_name']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="medRecDetails">Medical Record Details *</label>
                <textarea name="medRecDetails" id="medRecDetails" required
                    placeholder="Enter diagnosis, treatment plan, prescriptions, and other medical notes..."><?php echo $medDetails['med_rec_details']; ?></textarea>
            </div>

            <button type="submit" class="cta-btn primary-btn auth-submit-btn" name="updateMedRec" style="width: 100%;">
                <i class="fa-solid fa-check"></i> Update & Save
            </button>

            <div class="auth-footer" style="margin-top: 1.5rem; text-align: center;">
                <p><a href="MedicalRecords.php" class="auth-link secondary-link"><i class="fa-solid fa-arrow-left"></i>
                        Back to Medical Records</a></p>
            </div>
        </form>
    </section>

    <?php require_once('footer.php'); ?>
    <script type="text/javascript" src="mobile.js"></script>
</body>

</html>