<?php
require_once 'adminWebs.php';
require_once '../dbcon.php';
require_once 'Admin.php';
if (!isAdminLoggedIn()) {
    redirect('AdminLogin.php');
}
$patients = getAllPatients();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Patients</title>
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/framework.css">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&#038;display=swap" rel="stylesheet" />
    <link rel="icon" href="../imgs/logo-without-background.png" type="image/png">
</head>

<body>
    <!-- الكونتينر الي حاوي الصفحة كلها -->
    <div class="page d-flex">
        <div class="sidebar bg-white p-20 p-relative">
            <h3 class="p-relative txt-c mt-0">Admin</h3>
            <ul>
                <li>
                    <a class=" d-flex align-center fs-14 c-black rad-6 p-10" href="Dashboard.php">
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
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="adminPat.php">
                        <i class="fa-regular fa-user fa-fw"></i>
                        <span>Patients </span>
                    </a>
                </li>
                <li>
                    <a class=" d-flex align-center fs-14 c-black rad-6 p-10" href="adminVeh.php">
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
                <h2 class="mt-0 mb-20"> <i class="fa-regular fa-user fa-fw c-blue"></i> Patients</h2>
                <div class="responsive-table">
                    <table class="fs-15 w-full">
                        <thead>
                            <tr>
                                <td>Full Name</td>
                                <td>Email</td>
                                <td>Patient Phone</td>
                                <td>Patients Date</td>
                                <!-- <td>Actions</td> -->


                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($patients as $patient) : ?>
                                <tr>
                                    <td><?php echo $patient["f_name"] . " " . $patient["l_name"]; ?></td>
                                    <td><?php echo $patient["p_email"]; ?></td>
                                    <td><?php echo $patient["p_phoneNo"]; ?></td>
                                    <td><?php echo $patient["p_date"]; ?></td>
                                    <!-- <td><a href="EditDoc.php?d_id=<?php // echo $doctor["dr_id"]; 
                                                                        ?>" ><i style="margin-left: 20px; margin-right: 10px;" class="fa fa-edit c-blue" aria-hidden="true">
                            </i></a> 
                            <a href="adminDoc.php?del_dr=<?php //echo $doctor["dr_id"]; 
                                                            ?>" ><i class="fa fa-trash c-red " aria-hidden="true"></i></a> 
                            </td> -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Project Table -->
        </div>
    </div>
</body>

</html>