<?php
include 'connection.php';
session_start();

if(isset($_SESSION['id']))
{
    $globaluserid2 = $_SESSION['id'];
    $globaluname2 = $_SESSION['dcname'];
    $userlogin = true;
}
else
{
    $userlogin = false;
}
?>
