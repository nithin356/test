<?php
include 'connection.php';
session_start();

if(isset($_SESSION['uname']))
{
    $globaluname2 = $_SESSION['uname'];
    $userlogin = true;
}
else
{
    $userlogin = false;
}
?>
