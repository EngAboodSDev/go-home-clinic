<?php

function redirect(String $page)
{
    echo "<script>window.location.href='" . $page . "'</script>";
}

function alertMessage($message)
{
    echo "<script>alert('" . $message . "')</script>";
}

function isPatientLoggedIn()
{
    return isset($_COOKIE['patient_id']);
}
function isDoctorLoggedIn()
{
    return isset($_COOKIE['doctor_id']);
}

function currentPatientId()
{
    return $_COOKIE['patient_id'];
}
function currentDoctorId()
{
    return $_COOKIE['doctor_id'];
}

function p_logout()
{
    setcookie('patient_id', null, time() - 3600, "/");
    unset($_COOKIE['patient_id']);
}
function d_logout()
{
    setcookie('doctor_id', null, time() - 3600, "/");
    unset($_COOKIE['doctor_id']);
}