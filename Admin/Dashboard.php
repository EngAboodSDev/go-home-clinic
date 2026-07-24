<?php
require_once 'adminWebs.php';
require_once '../dbcon.php';
require_once 'Admin.php';


if (!isAdminLoggedIn()) {
    redirect('AdminLogin.php');
}
$Reviews = getAllReviews();
$Appointments = getAppointmentDashboard();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/framework.css">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&#038;display=swap" rel="stylesheet" />
    <style>
        .heading {
            font-size: 25px;
            margin-right: 25px;
        }



        .checked {
            color: orange !important;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        /* Three column layout */
        .side {
            float: left;
            width: fit-content;
            margin-top: 10px;
            margin-right: 20px;
        }

        .middle {
            margin-top: 10px;
            float: left;
            width: 70%;
        }

        /* Place text to the right */
        .right {
            text-align: right;
        }

        /* Clear floats after the columns */
        /* .row:after {
        content: "";
        display: table;
        clear: both;
    } */

        /* The bar container */
        .bar-container {
            width: 100%;
            background-color: #f1f1f1;
            text-align: center;
            color: white;
        }

        .small {
            font-size: medium;
            color: #f1f1f1;
        }

        /* Individual bars */
        .bar-s {
            height: 18px;
            background-color: #303779;
            border-radius: 5px;
        }


        /* Responsive layout - make the columns stack on top of each other instead of next to each other */
        @media (max-width: 400px) {

            .side,
            .middle {
                width: 100%;
            }

            .row {
                flex-direction: column;
            }

            /* .right {
    display: none;
  } */
        }
    </style>
    <link rel="icon" href="../imgs/logo-without-background.png" type="image/png">
</head>

<body>
    <!-- الكونتينر الي حاوي الصفحة كلها -->
    <div class="page d-flex">
        <div class="sidebar bg-white p-20 p-relative">
            <h3 class="p-relative txt-c mt-0">Admin</h3>
            <ul>
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="Dashboard.php">
                        <i class="fa fa-dashboard fa-fw"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="adminAbo.php">
                        <i class="fa fa-calendar fa-fw"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="adminMed.php">
                        <i class="fa fa-hand-holding-medical"></i>
                        <span>Medical Records</span>
                    </a>
                </li>

                <li>
                    <a class=" d-flex align-center fs-14 c-black rad-6 p-10" href="adminDoc.php">
                        <i class="fa-regular fa-circle-user fa-fw"></i>
                        <span>Doctors </span>
                    </a>
                </li>



                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="AddDoc.php">
                        <i class="fa-solid fa-square-plus"></i>
                        <span>Add Doctor</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="">
                        <i class="fa-regular fa-user fa-fw"></i>
                        <span>Patients </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="adminVeh.php">
                        <i class="fa fa-car-side"></i>
                        <span>Vehicles</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="AddVeh.php">
                        <i class="fa-solid fa-square-plus"></i>
                        <span>Add Vehicle</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="content w-full">
            <!-- Start Head -->
            <div class="head  p-15 between-flex">
                <div class="action">
                    <div class="profile" onclick="menuToggle();">
                        <img src="../imgs/user.png" alt="">
                    </div>
                    <div class="menu">
                        <ul>
                            <li><img src="../imgs/edit.png" alt=""><a href="EditProfile.php?aId=<?php echo currentAdminId(); ?>">Edit Profile</a></li>
                            <li><img src="../imgs/log-out.png" alt=""><a href="AdminLogin.php?out=<?php echo currentAdminId(); ?>" class="log">Logout</a></li>
                        </ul>
                    </div>
                </div>

                <script>
                    function menuToggle() {
                        const toggleMenu = document.querySelector('.menu');
                        toggleMenu.classList.toggle('active')
                    }
                </script>
            </div>
            <!-- End Head -->
            <img src="../imgs/logo-without-background.png" class="imgback" alt="">
            <!-- Start Project Table -->
            <div class="projects p-20 bg-white rad-10 m-20">
                <h2 class="mt-0 mb-20"><i class="fa fa-dashboard fa-fw c-blue"></i> Dashboard </h2>
                <div class="responsive-table">
                    <table class="fs-15 w-full">
                        <thead>
                            <tr>
                                <td><i class="fa fa-calendar fa-fw"></i>TOTAL APPOINTMENTS</td>
                                <td><i class="fa-regular fa-circle-user fa-fw"></i> DOCTORS</td>
                                <td><i class="fa-regular fa-user fa-fw"></i> PATIENTS</td>
                                <td><i class="fa fa-car-side"></i> VEHICLES</td>
                                <td><i class="fa fa-solid fa-sack-dollar"></i> PAYMENTS</td>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td><?php echo getNumOfAppoints()['appoints'] . " Appointments"; ?></td>
                                <td><?php echo getNumOfDoctors()['doctors'] . " Doctors"; ?></td>
                                <td><?php echo getNumOfPatients()['patients'] . " Patients"; ?></td>
                                <td><?php echo getNumOfVehicles()['vehicles'] . " Vehicles"; ?></td>
                                <td><?php echo getPayments()['payments'] . " SR"; ?></td>

                        </tbody>
                    </table>
                </div>
                <br><br>
                <div class="responsive-table">
                    <table class="fs-15 w-full">
                        <thead>
                            <tr>
                                <td> <i class="fa fa-calendar fa-fw"></i> APPOINTMENTS STATE</td>
                                <td> <i class="fa-solid fa-calculator"></i> SUM OF APPOINTMENTS</td>
                                <td> <i class="fa-solid fa-percent"></i> PERCENTAGE</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Appointments as $appointment) : ?>
                                <tr>
                                    <td><?php echo $appointment['app_state'] . " Appointments"; ?></td>
                                    <td><?php echo $appointment['num_apps'] . " From " . getNumOfAppoints()['appoints'] . " Appointments";; ?></td>
                                    <td><?php echo round($appointment['app_ratio'], 2) . " %" ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <br><br>
                <?php
                $total_rate = 0;
                $num_reviews_of_stars = 0;
                $total_average = 0;

                foreach ($Reviews as $review) {
                    $total_rate += $review['num_reviews'];
                    $num_reviews_of_stars += $review['num_stars'] * $review['num_reviews'];
                }
                $total_average = round(($num_reviews_of_stars / $total_rate), 1);
                ?>
                <h2 class="mt-0 mb-20"><i class="fa fa-ranking-star fa-fw c-blue"></i> Reviews </h2>
                <p><?php echo $total_average; ?> average based on <?php echo $total_rate; ?> reviews.</p>
                <hr style="border:3px solid #f1f1f1">

                <?php foreach ($Reviews as $review) :
                    $num_stars = $review['num_stars'];
                    $num_reviews_of_star = $review['num_reviews'];
                    $percentage = round($review['percentage'], 2);
                ?>
                    <!-- 5- stars -->
                    <div class="row">

                        <div class="side">
                            <div>
                                <?php for ($chk = 0; $chk < $num_stars; $chk++) { ?>
                                    <span class="fa fa-star checked small">
                                    <?php } ?>
                                    <?php for ($nchk = 5; $nchk > $num_stars; $nchk--) { ?>
                                        <span class="fa fa-star small">
                                        <?php } ?>

                            </div>
                        </div>
                        <div class="middle">
                            <div class="bar-container">
                                <div class="bar-s" style="width:<?php echo $percentage; ?>%"></div>
                            </div>
                        </div>
                        <div class="side right">
                            <div><?php echo $num_reviews_of_star; ?></div>
                        </div>
                        <!--  end 5- stars -->
                    </div>
                <?php endforeach; ?>


            </div>

            <!-- End Project Table -->
        </div>
    </div>
</body>

</html>