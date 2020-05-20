<?php
//$con = mysqli_connect("localhost","root","","assignment");
$con = mysqli_connect("sql12.freemysqlhosting.net","sql12342050","7xeEihcyJb","sql12342050");

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
