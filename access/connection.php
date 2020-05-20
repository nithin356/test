<?php
$con = mysqli_connect("localhost","root","","assignment");
if(!$con)
{
    echo "DB Connection error";
}
session_start();
if(isset($_SESSION['userid']))
{
    $globaluserid = $_SESSION['userid'];
    $globaluname = $_SESSION['uname'];
    $userlogin = true;
}
else
{
    $userlogin = false;
}
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
