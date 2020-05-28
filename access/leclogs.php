<?php
include 'connection.php';
session_start();

if(isset($_SESSION['lname']))
{
    $globaluname2 = $_SESSION['lname'];
    $userlogin = true;
}
else
{
    $userlogin = false;
}
?>
