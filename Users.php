<?php
// doctor operations
function d_login($email, $password)
{
    $db = connectDB();
    $sql = "SELECT `dr_id` FROM doctor WHERE `dr_email` = '" . $email . "' AND `dr_password` = '" . $password . "'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    if (isset($row['dr_id'])) {
        unset($_COOKIE);
        setcookie('doctor_id', $row['dr_id'], time() + (86400 * 30), "/");
        return true;
    }
    return false;
}


function getAllAvailableDoctors()
{
    $db = connectDB();
    $result = mysqli_query($db, "SELECT * FROM `doctor` where IsAvailable='1'");
    $AvailableDoctors = array();
    while ($row = mysqli_fetch_array($result)) {
        $AvailableDoctors[] = $row;
    }

    return $AvailableDoctors;
}

function getDoctorName($doctor_id)
{
    $db = connectDB();
    $result = mysqli_query($db, "SELECT concat(f_name,' ',l_name) as dr_name FROM `doctor` where dr_id='$doctor_id'");
    return mysqli_fetch_assoc($result);
}


// patient operations
function p_login($email, $password)
{
    $db = connectDB();
    $sql = "SELECT `p_id` FROM patient WHERE `p_email` = '" . $email . "' AND `p_password` = '" . $password . "'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    if (isset($row['p_id'])) {
        unset($_COOKIE);
        setcookie('patient_id', $row['p_id'], time() + (86400 * 30), "/");
        return true;
    }
    return false;
}


function p_register($f_name, $l_name, $p_email, $p_date, $p_password, $p_phone)
{
    $db = connectDB();
    $sql = "INSERT INTO `patient`(`f_name`, `l_name`, `p_email`, `p_date`, `p_password`, `p_phoneNo`) VALUES ('$f_name','$l_name','$p_email','$p_date','$p_password','$p_phone')";
    return mysqli_query($db, $sql);
}



function getPatientProfileInfo($patient_id)
{
    $db = connectDB();
    $sql = "SELECT * FROM `patient` where `p_id` = $patient_id";
    $result = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($result);
}


function UpdatePatientProfile($patient_id, $f_name, $l_name, $p_email, $p_date, $p_password, $p_phone)
{
    $db = connectDB();
    $sql = "UPDATE `patient` SET `f_name`='$f_name',`l_name`='$l_name',`p_email`='$p_email', `p_date`='$p_date', `p_password`='$p_password', `p_phoneNo`='$p_phone' WHERE `p_id`=$patient_id";
    return mysqli_query($db, $sql);
}


function boodAppointment($date, $app_location, $app_time, $cost, $card_number, $name_in_card, $p_id, $dr_id)
{
    $db = connectDB();
    $sql = "INSERT INTO `appointment`(`date`, `app_location`, `app_time`, `cost`, `card_number`, `name_in_card`, `p_id`, `dr_id`)VALUES ('$date','$app_location','$app_time','$cost','$card_number','$name_in_card','$p_id','$dr_id')";
    return mysqli_query($db, $sql);
}


function getPatientAppoints($patient_id, $app_state)
{
    $db = connectDB();
    if ($app_state == "Active")
        $sql = "SELECT * FROM `appointment` WHERE `p_id`='$patient_id' AND `created_date`>= NOW() - INTERVAL 24 HOUR AND `app_state`='$app_state'";
    else if ($app_state == "Complete")
        $sql = "SELECT * FROM `appointment` WHERE `p_id`='$patient_id' AND `app_state`='$app_state'";

    $result = mysqli_query($db, $sql);
    $PatientAppoints = array();
    while ($row = mysqli_fetch_array($result)) {
        $PatientAppoints[] = $row;
    }

    return $PatientAppoints;
}

function cancelMyAppoint($app_id)
{
    $db = connectDB();
    $sql = "UPDATE appointment SET `app_state`='Canceled' WHERE app_id=$app_id";
    return mysqli_query($db, $sql);
}

function getDoctorAppoints($doctor_id)
{
    $db = connectDB();
    $sql = "SELECT appointment.app_id, appointment.date, appointment.app_location, appointment.app_time ,appointment.app_state,patient.f_name ,patient.l_name  FROM `appointment` LEFT JOIN `patient` ON appointment.p_id=patient.p_id where  appointment.app_state = 'Active' AND appointment.dr_id=$doctor_id";
    $result = mysqli_query($db, $sql);
    $DoctorAppoints = array();
    while ($row = mysqli_fetch_array($result)) {
        $DoctorAppoints[] = $row;
    }

    return $DoctorAppoints;
}


function getPationByAppID($app_id)
{
    $db = connectDB();
    $result = mysqli_query($db, "SELECT patient.p_id,patient.f_name, patient.l_name,patient.p_email, patient.p_phoneNo FROM `appointment`,`patient` WHERE appointment.p_id=patient.p_id AND appointment.app_id=$app_id");
    return mysqli_fetch_assoc($result);
}


function createMedRec($app_id, $p_id, $dr_id, $med_rec_details)
{
    $db = connectDB();
    $sql = "INSERT INTO `medical_record`(`app_id`, `p_id`, `dr_id`, `med_rec_details`)VALUES ('$app_id','$p_id','$dr_id','$med_rec_details')";
    $med_rec_result = mysqli_query($db, $sql);
    if ($med_rec_result) {
        $updateAppStateSql = "UPDATE `appointment` SET `app_state`='Complete' WHERE `app_id`=$app_id";
        return mysqli_query($db, $updateAppStateSql);
    } else {
        return false;
    }
}

function updateMedRec($med_id, $med_rec_details)
{
    $current_date = date("Y-m-d H:i:s");
    $db = connectDB();
    $sql = "UPDATE  `medical_record` SET `med_rec_details`='$med_rec_details',`treat_date`='$current_date' WHERE  `med_id`='$med_id' ";
    return mysqli_query($db, $sql);
}


function getDoctorMeds($doctor_id)
{
    $db = connectDB();
    $sql = "SELECT medical_record.med_id,medical_record.app_id,patient.f_name,patient.l_name,medical_record.med_rec_details,medical_record.treat_date FROM `medical_record`, `patient` WHERE medical_record.p_id=patient.p_id AND medical_record.dr_id=$doctor_id";
    $result = mysqli_query($db, $sql);
    $DoctorMeds = array();
    while ($row = mysqli_fetch_array($result)) {
        $DoctorMeds[] = $row;
    }

    return $DoctorMeds;
}


function getMedicalRecordDetails($med_id)
{
    $db = connectDB();
    $result = mysqli_query($db, "SELECT * FROM `medical_record` WHERE `med_id`=$med_id");
    return mysqli_fetch_assoc($result);
}

function getPatientMedicalRecord($patient_id)
{
    //here
    $db = connectDB();
    $sql = "SELECT * FROM `appointment` WHERE `p_id`='$patient_id' AND `created_date`>= NOW() - INTERVAL 24 HOUR AND `app_state`='Active'";
    $result = mysqli_query($db, $sql);
    $PatientAppoints = array();
    while ($row = mysqli_fetch_array($result)) {
        $PatientAppoints[] = $row;
    }

    return $PatientAppoints;
}


function getAppointmentDetails($a_id)
{
    $db = connectDB();
    $result = mysqli_query($db, "SELECT appointment.*, medical_record.med_rec_details, medical_record.treat_date FROM `appointment` RIGHT JOIN `medical_record` ON appointment.app_id = medical_record.app_id AND appointment.p_id = medical_record.p_id WHERE appointment.app_id ='$a_id'");
    return mysqli_fetch_assoc($result);
}


function rateExperience($num_stars, $p_id, $dr_id)
{
    $db = connectDB();
    $sql = "INSERT INTO `review`(`num_stars`, `p_id`,`dr_id`)VALUES ('$num_stars','$p_id','$dr_id')";
    return mysqli_query($db, $sql);
}


function getAllReviews()
{
    $db = connectDB();
    $result = mysqli_query($db, "SELECT * FROM `review`");
    $Reviews = array();
    while ($row = mysqli_fetch_array($result)) {
        $Reviews[] = $row;
    }

    return $Reviews;
}
function getNonAvaliableDoctorTimes($dr_id, $app_date)
{
    $db = connectDB();
    $result = mysqli_query($db, "SELECT GROUP_CONCAT(app_time) AS unavilable_times FROM `appointment` WHERE dr_id=$dr_id AND app_state='Active' AND date='$app_date'");
    return mysqli_fetch_assoc($result);
}


function getDpctorAvgRating($dr_id)
{
    $db = connectDB();
    $result = mysqli_query($db, "SELECT AVG(num_stars) as rating_avg FROM `review` WHERE dr_id=$dr_id");
    return mysqli_fetch_assoc($result);
}