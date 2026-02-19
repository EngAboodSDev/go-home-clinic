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
    <title>Go Home Clinic | Upcoming Appointments </title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/newstyle.css">
    <link rel="stylesheet" href="css/navstyles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <style>
    .doc_sub_container {
        max-width: 70%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        border-radius: 10px;
        margin-bottom: 50px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        padding: 2px;
    }

    .Doc_teams {
        min-width: max-content;
        width: -webkit-fill-available;
        display: flex;
        align-items: center;
        padding: 0px;
        margin: 2px;
        align-content: center;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .Doc_teams img {
        width: 80px;
        height: 80px;
    }

    .doc_about {
        text-align: start;
        padding: 0px 5px;

    }

    .btn-doctor {
        /* width: 500px; */
        margin: 5px;
    }

    @media (max-width:578px) {

        .doc_sub_container {
            max-width: 90%;
        }

        .Doc_teams {
            min-width: auto;
            width: -webkit-fill-available;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-wrap: wrap;
            align-content: space-between;

        }

        .Doc_teams img {
            width: 40px;
            height: 40px;
        }

    }
    </style>
</head>

<body>
    <?php require_once('navbar.php'); ?>


    <div class="doc_container">
        <div class="doc_header">
            <h1>Medical Records</h1>
        </div>

        <div class="doc_sub_container">
            <?php if ($docMeds) {
                foreach ($docMeds as $docMed) :   ?>
            <div class="Doc_teams">
                <img src="imgs/user (2).png" alt="">
                <div class="doc_name"><?php echo $docMed['f_name'] . ' ' . $docMed['l_name']; ?></div>
                <div class="doc_about">
                    <i class="fa fa-calendar"></i>
                    <?php echo date('d F, Y h:i A', strtotime($docMed['treat_date'])); ?><br>
                </div>
                <div class="btn-doctor">
                    <a href="EditMedRec.php?ap=<?php echo $docMed['app_id']; ?>&md=<?php echo $docMed['med_id']; ?>"
                        style="text-decoration: none;"><button class="btn-1">Edit Medical Record</button></a>
                </div>
            </div>
            <?php endforeach;
            } else { ?>
            <center>There are no appointments yet.</center>
            <?php } ?>


        </div>
    </div>
    <?php require_once('footer.php'); ?>
    <script type="text/javascript" src="mobile.js"></script>
</body>

</html>