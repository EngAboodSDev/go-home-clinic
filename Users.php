<!--
    * Go Home Clinic Website and Dashboard - v1.0.0
    * Designed and Developed by Abdulrahman Fadhl Ameer Saif
    * @EngAboodSDev <abdulrahmanfadhl@gmail.com>
    * Copyright © 2026 Go Home Clinic (Website and Dashboard)
    * All rights reserved.
    * License - This project is licensed under the MIT License - see the LICENSE file for details.
-->

<?php

/**
 * Go Home Clinic Website and Dashboard - v1.0.0
 *
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 *
 * Go Home Clinic is a comprehensive web-based healthcare platform designed to 
 * facilitate medical home visits. Built with PHP and MySQL, the system seamlessly 
 * connects patients with qualified healthcare professionals. Patients can browse 
 * available healthcare professionals, view their ratings, and book appointments 
 * for home visits, while doctors can manage their schedules and patient requests.
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 *
 * @package    go-home-clinic
 * @author     Abdulrahman Fadhl Ameer Saif <abdulrahmanfadhl@gmail.com> @EngAboodSDev
 * @copyright  2026 Go Home Clinic (Website and Dashboard)
 * @license    https://opensource.org  MIT License
 * @version    1.0.0
 * @link       https://github.com/EngAboodSDev/go-home-clinic
 */


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


/**
 * Go Home Clinic Website and Dashboard - v1.0.0
 *
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 *
 * Go Home Clinic is a comprehensive web-based healthcare platform designed to 
 * facilitate medical home visits. Built with PHP and MySQL, the system seamlessly 
 * connects patients with qualified healthcare professionals. Patients can browse 
 * available healthcare professionals, view their ratings, and book appointments 
 * for home visits, while doctors can manage their schedules and patient requests.
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 *
 * @package    go-home-clinic
 * @author     Abdulrahman Fadhl Ameer Saif <abdulrahmanfadhl@gmail.com> @EngAboodSDev
 * @copyright  2026 Go Home Clinic (Website and Dashboard)
 * @license    https://opensource.org  MIT License
 * @version    1.0.0
 * @link       https://github.com/EngAboodSDev/go-home-clinic
 */



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


/**
 * Go Home Clinic Website and Dashboard - v1.0.0
 *
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 *
 * Go Home Clinic is a comprehensive web-based healthcare platform designed to 
 * facilitate medical home visits. Built with PHP and MySQL, the system seamlessly 
 * connects patients with qualified healthcare professionals. Patients can browse 
 * available healthcare professionals, view their ratings, and book appointments 
 * for home visits, while doctors can manage their schedules and patient requests.
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 *
 * @package    go-home-clinic
 * @author     Abdulrahman Fadhl Ameer Saif <abdulrahmanfadhl@gmail.com> @EngAboodSDev
 * @copyright  2026 Go Home Clinic (Website and Dashboard)
 * @license    https://opensource.org  MIT License
 * @version    1.0.0
 * @link       https://github.com/EngAboodSDev/go-home-clinic
 */

 

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



/**
 * Go Home Clinic Website and Dashboard - v1.0.0
 *
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 *
 * Go Home Clinic is a comprehensive web-based healthcare platform designed to 
 * facilitate medical home visits. Built with PHP and MySQL, the system seamlessly 
 * connects patients with qualified healthcare professionals. Patients can browse 
 * available healthcare professionals, view their ratings, and book appointments 
 * for home visits, while doctors can manage their schedules and patient requests.
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 *
 * @package    go-home-clinic
 * @author     Abdulrahman Fadhl Ameer Saif <abdulrahmanfadhl@gmail.com> @EngAboodSDev
 * @copyright  2026 Go Home Clinic (Website and Dashboard)
 * @license    https://opensource.org  MIT License
 * @version    1.0.0
 * @link       https://github.com/EngAboodSDev/go-home-clinic
 */


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


/**
 * Go Home Clinic Website and Dashboard - v1.0.0
 *
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 *
 * Go Home Clinic is a comprehensive web-based healthcare platform designed to 
 * facilitate medical home visits. Built with PHP and MySQL, the system seamlessly 
 * connects patients with qualified healthcare professionals. Patients can browse 
 * available healthcare professionals, view their ratings, and book appointments 
 * for home visits, while doctors can manage their schedules and patient requests.
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 *
 * @package    go-home-clinic
 * @author     Abdulrahman Fadhl Ameer Saif <abdulrahmanfadhl@gmail.com> @EngAboodSDev
 * @copyright  2026 Go Home Clinic (Website and Dashboard)
 * @license    https://opensource.org  MIT License
 * @version    1.0.0
 * @link       https://github.com/EngAboodSDev/go-home-clinic
 */



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

function saveContact($name, $phone, $email, $subject, $message)
{
    $db = connectDB();
    $sql = "INSERT INTO `contacts`(`name`, `phone`, `email`, `subject`, `message`, `sent_at`) VALUES ('$name','$phone','$email','$subject','$message', NOW())";
    return mysqli_query($db, $sql);
}


/**
 * Go Home Clinic Website and Dashboard - v1.0.0
 *
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 *
 * Go Home Clinic is a comprehensive web-based healthcare platform designed to 
 * facilitate medical home visits. Built with PHP and MySQL, the system seamlessly 
 * connects patients with qualified healthcare professionals. Patients can browse 
 * available healthcare professionals, view their ratings, and book appointments 
 * for home visits, while doctors can manage their schedules and patient requests.
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 *
 * @package    go-home-clinic
 * @author     Abdulrahman Fadhl Ameer Saif <abdulrahmanfadhl@gmail.com> @EngAboodSDev
 * @copyright  2026 Go Home Clinic (Website and Dashboard)
 * @license    https://opensource.org  MIT License
 * @version    1.0.0
 * @link       https://github.com/EngAboodSDev/go-home-clinic
 */