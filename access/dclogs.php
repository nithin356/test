<?php
include 'connection.php';
session_start();

if(isset($_SESSION['id']))
{
    $globaluserid = $_SESSION['id'];
    $globaluname = $_SESSION['dcname'];
    $userlogin = true;
}
else
{
    $userlogin = false;
}
?>
