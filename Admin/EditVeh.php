<?php
require_once 'adminWebs.php';
require_once '../dbcon.php';
require_once 'Admin.php';


if (!isAdminLoggedIn() ) {
    redirect('AdminLogin.php');
}

if (!isset ($_GET['veh_id'])){
    redirect('Dashboard.php');
}
if (isset ($_GET['veh_id'])){
    $Vehicle = getVehicleById($_GET['veh_id']);
    if (isset($_POST['editVehicle'])) {
        $isSuccess = editVehicle($_GET['veh_id'],$_POST['v_name'],$_POST['car_plate'],$_POST['location'],);
        if ($isSuccess){
         alertMessage('Modified Successfully ^_^ ');
         redirect('adminVeh.php');
        }
    
    }

}




// $cAdminId=currentAdminId();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vehicle</title>
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/framework.css">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&#038;display=swap" rel="stylesheet" />
    <style>
        .none {
            display: none;
        }

        fieldset {
            border: none;

        }

        .form-group {
            display: flex;
            justify-content: space-around;
        }
    </style>
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
                    <a class=" d-flex align-center fs-14 c-black rad-6 p-10" href="adminAbo.php">
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
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="adminPat.php">
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
            <!-- <img src="../imgs/logo-without background .png" alt=""> -->




            <div class="content w-full form-cont">
                <div class="wrapper d-grid gap-20">
                    <!-- Start Quick Draft Widgt -->
                    <div class="quick-draft p-20 bg-white rad-10">
                        <h2 class="mt-0 mt-10"><i class="fa fa-edit c-blue"></i> Edit <?php echo $Vehicle["v_name"];?> Info.</h2>
                        <p class="mt-0 mb-20 c-grey fs-15"></p>
                        <form action="" class="doc_form" method="post">
                            <fieldset>
                                <label for="">Vehicle Name*</label>
                                <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="v_name"  type="text" value="<?php echo $Vehicle["v_name"];?>">

                                <label for="">Car Plate*</label>
                                <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="car_plate"  type="text" value="<?php echo $Vehicle["car_plate"];?>">

                                <label for="location">Location*</label>
                                <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="location" required type="text" value="<?php echo $Vehicle["location"];?>">
                                    <div class="form-group">
                                    <input style="cursor: pointer; width: 20%; height: 35px;" class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" name="editVehicle" value="Save">
                                    </div>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>