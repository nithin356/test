<?php
include 'access/connection.php';


//button name: register
if (isset($_POST['button'])) {
    
    $uid = $_POST['uid'];
    $cname = $_POST['cname'];
    $cadd = $_POST['caddr'];
    $date = date('Y-m-d',strtotime($_POST['date']));
    $cemail = $_POST['cemail'];
    $cmobile = $_POST['cmobile'];
    $apassword = md5($_POST['apassword']);
    $cpassword = md5($_POST['cpassword']);

    if ($apassword != $cpassword) {
        echo "<script>alert('Passwords do not match'); location.href='register.php';</script>";
        $fmsg = "Passwords do not match";
    } else {

        $check = mysqli_query($con, "SELECT * from user WHERE uemail='$cemail' OR umobile='$cmobile'");
        $count = mysqli_num_rows($check);
        if ($count > 0) {
            echo "<script>alert('User already Exists'); location.href='register.php';</script>";
            $fmsg = "User already Exists";
        } else {
            $query = mysqli_query($con, "INSERT INTO user (userid,uname,uemail,udate,umobile,uaddr,upassword) VALUES ('$uid','$cname','$cemail','$date','$cmobile','$cadd','$apassword')");
            if ($query) {
                echo "<script>alert('User Registered'); location.href='login.php';</script>";
                $smsg = "User Registered";
            } else {
                echo "<script>alert('User Registered Falied'); location.href='register.php';</script>";
                echo $fmsg = "Registration Falied";
            }
        }
    }
}
?>
<!DOCTYPE html>
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
                height: 600px;
                width: 500px;
                margin-top: auto;
                margin-bottom: auto;
                background: #fff;
                position: relative;
                flex-direction: column;
                padding: 5px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                border-radius: 5px;
                color:#03a9f3;

            }
            .form_container {
                margin-top: 80px;
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
    <body onload='document.form1.text1.focus()'>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                <div style="text-align: center; font-size:30px;">
                    <p>CMS</p>
                </div>
                    <div class="d-flex justify-content-center form_container">
                        </br>
                        <form name="form1" method="POST">
                        <div class="input-group mb-3">
                                <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" required name="uid" class="form-control input_user" value="" placeholder="Staff ID">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" required name="cname" class="form-control input_user" value="" placeholder="Staff Name">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input type="text" required name="cemail" class="form-control input_user" placeholder="Email ID">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                </div>
                                <input type="text" required name="caddr" class="form-control input_user"  placeholder="Address">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="Date" required name="date" class="form-control input_user" >
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="number" required name="cmobile" class="form-control input_user"  placeholder="Phone number">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" required name="apassword" class="form-control input_pass"  onclick="CheckPassword(document.form1.apassword)" placeholder="Password">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" required  name="cpassword" class="form-control input_pass"  placeholder="Confirm Password">
                            </div>
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <button type="submit" name="button" class="btn login_btn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
function CheckPassword(inputtxt) 
{ 
var paswd=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
if(inputtxt.value.match(paswd)) 
{ 
alert('Password is highly Secured')
return true;
}
else
{ 
alert('6 to 12 characters in length Contains at least 1 lower case letter, 1 uppercase letter, 1 number and one of following special characters ! @ # $ % ^')
return false;
}
}  

</script>
