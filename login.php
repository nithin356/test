<?php
include 'access/connection.php';
session_start();
if(isset($_POST['login']))
{
    $uid = $_POST['uid'];
    $pwd = md5($_POST['password']);

    $getuser = mysqli_query($con, "SELECT * FROM user WHERE (userid='$uid') AND upassword = '$pwd'");
    $getuserdata = mysqli_fetch_assoc($getuser);
    $getuserrow = mysqli_num_rows($getuser);
    
    if ($getuserrow == 1) {
        $_SESSION['userid'] = $getuserdata['userid'];
        $_SESSION['uname'] = $getuserdata['uname'];
        echo "<script> window.setTimeout(function(){ window.location.href='Main/Student/index.php' }, 1000); </script>";
    }  else {
        $getdc = mysqli_query($con, "SELECT * FROM dclog WHERE (id='$uid') AND pass = '$pwd'");
        $getdcs = mysqli_fetch_assoc($getdc);
        $getdcrow = mysqli_num_rows($getdc);
        if($getdcrow==1){
        $_SESSION['id'] = $getdcs['id'];
        $_SESSION['dcname'] = $getdcs['dcname'];
        echo "<script> window.setTimeout(function(){ window.location.href='Main/DC/index.php' }, 1000); </script>";
    } else {
        $getuser1 = mysqli_query($con, "SELECT * FROM staff WHERE (s_id='$uid') AND spassword = '$pwd'");
        $getuserdata1 = mysqli_fetch_assoc($getuser1);
        $getuserrow1 = mysqli_num_rows($getuser1);
        if($getuserrow1==1){
        $_SESSION['s_id'] = $getuserdata1['s_id'];
        $_SESSION['sname'] = $getuserdata1['sname'];
        echo "<script> window.setTimeout(function(){ window.location.href='Main/Student/index.php' }, 1000); </script>";
    }else {
        $getuser1 = mysqli_query($con, "SELECT * FROM lec WHERE (lname='$uid') AND pass = '$pwd'");
        $getuserdata1 = mysqli_fetch_assoc($getuser1);
        $getuserrow1 = mysqli_num_rows($getuser1);
        if($getuserrow1==1){
        $_SESSION['lname'] = $getuserdata1['lname'];
        echo "<script> window.setTimeout(function(){ window.location.href='Main/Lecturer/index.php' }, 1000); </script>";
    } else {
        $getuc = mysqli_query($con, "SELECT * FROM uclog WHERE (uname='$uid') AND pass = '$pwd'");
        $getucs = mysqli_fetch_assoc($getuc);
        $getucss = mysqli_num_rows($getuc);
        if($getucss==1){
        $_SESSION['uname'] = $getucs['uname'];
        echo "<script> window.setTimeout(function(){ window.location.href='Main/UC/index.php' }, 1000); </script>";
    }
        else {
        echo "<script>alert('Invalid Username or Password'); location.href='login.php';</script>";
        $fmsg = "Invalid Username or Password";
        }
       }
    }    
    }
    }    
}

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Course Management System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script src="sweetalert2.min.js"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">
        <style>
            body,
            html {
                margin: 0;
                padding: 0;
                height: 100%;
                color:#03a9f3;
                background: white !important;
            }
            .user_card {
                height: 400px;
                width: 350px;
                margin-top: auto;
                margin-bottom: auto;
                background: #fff;
                position: relative;
                display: flex;
                justify-content: center;
                flex-direction: column;
                padding: 10px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                border-radius: 5px;
                color:#03a9f3;

            }
            .brand_logo_container {
                position: absolute;
                height: 170px;
                width: 170px;
                top: -75px;
                border-radius: 50%;
                background: #03a9f3;
                padding: 10px;
                text-align: center;
            }
            .brand_logo {
                height: 150px;
                width: 150px;
                border-radius: 50%;
                border: 2px solid white;
            }
            .form_container {
                margin-top: 100px;
            }
            .login_btn {
                width: 100%;
                background: #03a9f3 !important;
                color: white !important;
            }
            .login_btn:focus {
                box-shadow: none !important;
                outline: 0px !important;
            }
            .login_container {
                padding: 0 2rem;
            }
            .input-group-text {
                background: #03a9f3 !important;
                color: white !important;
                border: 0 !important;
                border-radius: 0.25rem 0 0 0.25rem !important;
            }
            .input_user,
            .input_pass:focus {
                box-shadow: none !important;
                outline: 0px !important;
            }
            .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
                background-color: #03a9f3 !important;
            }
        </style>
    </head>
    <body>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <div class="d-flex justify-content-center">
                        <div class="brand_logo_container">
                            <img src="https://www.gkipeterongan.org/wp-content/uploads/2019/01/user_circle_1048392.png" class="brand_logo" alt="Logo">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center form_container">
                        <form method="POST">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control input_user" name="uid" placeholder="ID | Username if Lecturer / Tutor">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control input_pass" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <button type="submit" name="login" class="btn login_btn">Login</button>
                            </div>
                        </form>
                    </div>

                    <div class="mt-4">
                        <div class="d-flex justify-content-center links">
                            Don't have an account? <a href="register.php" class="ml-2">Sign Up</a>
                        </div>
                        <div class="d-flex justify-content-center links">
                            <a href="#">Forgot your password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
