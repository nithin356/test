<?php
include 'connection.php';
session_start();

if(isset($_SESSION['s_id']))
{
    $globaluserid1 = $_SESSION['s_id'];
    $globaluname1 = $_SESSION['sname'];
    $userlogin = true;
}
else
{
    $userlogin = false;
}
?>
