<?php

// function getAllTablesNumRows()
// {
//     $db = connectDB();
//     $result = mysqli_query($db, "SELECT TABLE_NAME, TABLE_ROWS FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'clinic';");
//     $tbrows = array();
//     while ($row = mysqli_fetch_array($result)) {
//         $tbrows[] = $row;
//     }

//     return $tbrows;
// }


function admin_login($email, $password)
{
    $db = connectDB();
    $sql = "SELECT `a_id`,`f_name` FROM admin WHERE `a_email` = '" . $email . "' AND `a_password` = '" . $password . "'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    print_r($row);
    if (isset($row['a_id'])) {
        unset($_COOKIE);
        setcookie('admin_id', $row['a_id'], time() + (86400 * 30), "/");
        setcookie('admin_fname', $row['f_name'], time() + (86400 * 30), "/");
        return true;
    }
    return false;
}


function getAdminProfileInfo($admin_id)
{
    $db = connectDB();
    $sql = "SELECT * FROM `admin` where `a_id` = $admin_id";
    $result = mysqli_query($db, $sql);
    // $adminInfo = array();
    // while ($row = mysqli_fetch_column($result)) {
    //     $adminInfo[] = $row;
    // }
    // return $adminInfo;
    return mysqli_fetch_assoc($result);
}


function UpdateAdminProfile($admin_id,$f_name,$l_name,$a_email,$a_password)
{
    $db = connectDB();
    $sql = "UPDATE `admin` SET `f_name`='$f_name',`l_name`='$l_name',`a_email`='$a_email',`a_password`='$a_password' WHERE `a_id`=$admin_id";
    mysqli_query($db, $sql);
    
}


function addDoctor($f_name,$l_name,$dr_email,$dr_password,$IsAvailable,$job,$job_details,$dr_location,$dr_phoneNo,$v_id,$a_id)
{
    $db = connectDB();
    if ($v_id=="0")
    $sql = "INSERT INTO `doctor` (`f_name`, `l_name`, `dr_email`, `dr_password`, `IsAvailable`,`job`, `job_details`, `dr_location`, `dr_phoneNo`,  `a_id`) VALUES ('$f_name','$l_name','$dr_email','$dr_password','$IsAvailable','$job','$job_details','$dr_location','$dr_phoneNo','$a_id')";
    elseif (!$v_id=="0")
    $sql = "INSERT INTO `doctor` (`f_name`, `l_name`, `dr_email`, `dr_password`, `IsAvailable`,`job`, `job_details`, `dr_location`, `dr_phoneNo`, `v_id`, `a_id`) VALUES ('$f_name','$l_name','$dr_email','$dr_password','$IsAvailable','$job','$job_details','$dr_location','$dr_phoneNo','$v_id','$a_id')";
    return mysqli_query($db, $sql);

}
function editDoctor($dr_id,$f_name,$l_name,$dr_email,$dr_password,$IsAvailable,$job,$job_details,$dr_location,$dr_phoneNo,$v_id,$a_id)
{
    $db = connectDB();
    if ($v_id=="0")
    $sql = "UPDATE `doctor` SET `f_name`= '$f_name', `l_name`='$l_name', `dr_email`='$dr_email', `dr_password`='$dr_password', `IsAvailable`='$IsAvailable',`job`='$job', `job_details`='$job_details', `dr_location`='$dr_location', `dr_phoneNo`='$dr_phoneNo', `v_id`=NULL,`a_id`='$a_id' where `dr_id`='$dr_id'";
    elseif (!$v_id=="0")
    $sql = "UPDATE `doctor` SET `f_name`= '$f_name', `l_name`='$l_name', `dr_email`='$dr_email', `dr_password`='$dr_password', `IsAvailable`='$IsAvailable',`job`='$job', `job_details`='$job_details', `dr_location`='$dr_location', `dr_phoneNo`='$dr_phoneNo',`v_id`='$v_id', `a_id`='$a_id' where `dr_id`='$dr_id'";
    return mysqli_query($db, $sql);

}


function getAllVehicles()
{
    $db = connectDB();
    $result = mysqli_query($db, "SELECT * FROM `vehicle`");
    $Vehicles = array();
    while ($row = mysqli_fetch_array($result)) {
        $Vehicles[] = $row;
    }

    return $Vehicles;
}



function getVehicleById($vehicle_id)
{
    $db = connectDB();
    $result = mysqli_query($db, "SELECT * FROM `vehicle` where v_id=$vehicle_id");
    return mysqli_fetch_assoc($result);
}

function getDoctorInfo($doctor_id)
{
    $db = connectDB();
    $result = mysqli_query($db, "SELECT * FROM `doctor` where dr_id=$doctor_id");
    return mysqli_fetch_assoc($result);
}

function getAllDoctors()
{
    $db = connectDB();
    $result = mysqli_query($db, "SELECT * FROM `doctor` LEFT JOIN  `vehicle` ON doctor.v_id=vehicle.v_id");
    $Doctors = array();
    while ($row = mysqli_fetch_array($result)) {
        $Doctors[] = $row;
    }

    return $Doctors;
}

function deleteDoctor($doctor_id)
{
    $db = connectDB();
    $sql = "DELETE FROM doctor WHERE dr_id=$doctor_id";
    return mysqli_query($db, $sql);
}

function deleteVehicle($vehicle_id)
{
    $db = connectDB();
    $sql = "DELETE FROM vehicle WHERE v_id=$vehicle_id";
    return mysqli_query($db, $sql);
}



function addVehicle($v_name,$car_plate,$location)
{
    $db = connectDB();
    $sql = "INSERT INTO `vehicle` (`v_name`, `car_plate`, `location`) VALUES ('$v_name','$car_plate','$location')";
    return mysqli_query($db, $sql);
}
function editVehicle($v_id,$v_name,$car_plate,$location)
{
    $db = connectDB();
    $sql = "UPDATE  `vehicle` SET `v_name`='$v_name', `car_plate`='$car_plate', `location`='$location' where v_id='$v_id'";
    return mysqli_query($db, $sql);
}



function getAllPatients()
{
    $db = connectDB();
    $result = mysqli_query($db, "SELECT * FROM `patient`");
    $Patients = array();
    while ($row = mysqli_fetch_array($result)) {
        $Patients[] = $row;
    }

    return $Patients;
}

function getAllAppointments()
{
    $db = connectDB();
    $result = mysqli_query($db, "SELECT appointment.app_id,appointment.date,appointment.app_location,
                                appointment.app_time, appointment.cost,appointment.app_state,
                                concat(patient.f_name,' ',patient.l_name) AS patient_name,patient.p_email,
                                patient.p_phoneNo ,concat(doctor.f_name,' ',doctor.l_name) AS doctor_name 
                                FROM appointment JOIN patient ON appointment.p_id = patient.p_id
                                JOIN doctor ON appointment.dr_id = doctor.dr_id ORDER BY appointment.app_state");
    $Appointments = array();
    while ($row = mysqli_fetch_array($result)) {
        $Appointments[] = $row;
    }

    return $Appointments;
    
}


function getAppointRecord()
{
    $db = connectDB();
    $result = mysqli_query($db, "SELECT appointment.app_id, appointment.date, appointment.app_location, CONCAT( patient.f_name, ' ', patient.l_name ) AS patient_name, CONCAT(doctor.f_name, ' ', doctor.l_name) AS doctor_name, medical_record.med_rec_details, medical_record.treat_date FROM appointment JOIN patient ON appointment.p_id = patient.p_id JOIN doctor ON appointment.dr_id = doctor.dr_id JOIN medical_record ON appointment.app_id=medical_record.app_id;");
    $AppointmentRecord = array();
    while ($row = mysqli_fetch_array($result)) {
        $AppointmentRecord[] = $row;
    }
    return $AppointmentRecord;
}
function getAllReviews()
{   
    $db = connectDB();
    $result = mysqli_query($db, "SELECT num_stars, COUNT(*) AS num_reviews, (COUNT(*) * 100 / (SELECT COUNT(*) FROM review)) AS percentage FROM review GROUP BY num_stars ORDER BY `review`.`num_stars` DESC");
    $AllReviews = array();
    while ($row = mysqli_fetch_array($result)) {
        $AllReviews[] = $row;
    }
    return $AllReviews;
}
function getAppointmentDashboard()
{   
    $db = connectDB();
    $result = mysqli_query($db, "SELECT `app_state`, COUNT(*) AS num_apps, (COUNT(*) * 100 / (SELECT COUNT(*) FROM appointment)) AS app_ratio FROM appointment GROUP BY `app_state` ORDER BY `appointment`.`app_state` ASC");
    $AppointmentDashboard = array();
    while ($row = mysqli_fetch_array($result)) {
        $AppointmentDashboard[] = $row;
    }
    return $AppointmentDashboard;
}

function getNumOfAppoints(){
    $db = connectDB();
    $result = mysqli_query($db, "SELECT count(*) as 'appoints' FROM `appointment`");
    return mysqli_fetch_assoc($result);
}
function getNumOfDoctors(){
    $db = connectDB();
    $result = mysqli_query($db, "SELECT count(*) as 'doctors' FROM `doctor`");
    return mysqli_fetch_assoc($result);
}
function getNumOfPatients(){
    $db = connectDB();
    $result = mysqli_query($db, "SELECT count(*) as 'patients' FROM `patient`");
    return mysqli_fetch_assoc($result);
}
function getNumOfVehicles(){
    $db = connectDB();
    $result = mysqli_query($db, "SELECT count(*) as 'vehicles' FROM `vehicle`");
    return mysqli_fetch_assoc($result);
}
function getNumOfContacts(){
    $db = connectDB();
    $result = mysqli_query($db, "SELECT count(*) as 'contacts' FROM `contacts`");
    return mysqli_fetch_assoc($result);
}
function getPayments(){
    $db = connectDB();
    $result = mysqli_query($db, "SELECT SUM(`cost`) as payments FROM appointment WHERE `app_state`='Complete';");
    return mysqli_fetch_assoc($result);
}

function getAllContacts(){
    $db = connectDB();
    $result = mysqli_query($db, "SELECT * FROM `contacts` ORDER BY `sent_at` DESC");
    $contacts = array();
    while ($row = mysqli_fetch_array($result)) {
        $contacts[] = $row;
    }
    return $contacts;
}

?>