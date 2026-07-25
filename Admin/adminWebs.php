<?php

function redirect(String $page)
{
    echo "<script>window.location.href='" . $page . "'</script>";
}

function alertMessage($message)
{
    echo "<script>alert('" . $message . "')</script>";
}

function isAdminLoggedIn()
{
    return isset($_COOKIE['admin_id']);
}

function currentAdminId()
{
    return $_COOKIE['admin_id'];
}
function currentAdminFname()
{
    return $_COOKIE['admin_fname'];
}

function admin_logout()
{
    setcookie('admin_id', null, time() - 3600, "/");
    setcookie('admin_fname', null, time() - 3600, "/");
    unset($_COOKIE['admin_id'],$_COOKIE['admin_fname']);
}
?>