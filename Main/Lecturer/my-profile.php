<?php include '../../access/connection.php';
include '../../access/leclogs.php';

if(!$userlogin)
{
    echo "<script> window.setTimeout(function(){ window.location.href='/test/index.html' }, 0); </script>";
}
$getuser = mysqli_query($con, "SELECT * FROM lec WHERE lname = '$globaluname2'");
$getuserdata = mysqli_fetch_assoc($getuser);
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $pass=md5($_POST['pass']);
    $apass=md5($_POST['apass']);
    $cpass=md5($_POST['cpass']);
    $check=$getuserdata['pass'];
    if($pass!=$check)
    {
        echo "<script>alert('Old Password Doesnt match');</script>";
    }
    if ($apass != $cpass) {
        echo "<script>alert('Passwords do not match');</script>";
        $fmsg = "Passwords do not match";
    } else {
        $sql = mysqli_query($con, "UPDATE lec SET lname='$name' , pass='$apass' WHERE id='$id'");
        if ($sql) {
            echo "<script>alert('User Updated');</script>";
            $smsg = "User Updated";
        } else {
            echo "<script>alert('User Update Falied');</script>";
            echo $fmsg = "update Falied";
        }
    }

}


?>
<html>
  
  <head>
    <title>Common Cents Party</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
  
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
  </head>
  
  
  <body>
    <!-- Start vertical navbar -->
    <header id="header">
    <?php require 'header.php';?>
    </header>

    <!-- Start Page content holder -->
    <div class="page-content p-5" id="content">
      
    <!-- Toggle button -->
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bolder">Toggle</small></button>
      
    <!-- Content Header -->   
        <h2 class="display-4 font-weight-bold text-center text-white">Course Management System</h2>
        <div class="separator mt-4"></div>
      
    <!-- content -->
        
<style>
input{
    width: 100%;
}
</style>  
    <div class="row text-white">
    <div class="col-lg-7 mx-auto">
    <form method="POST">
    <label>ID :</label>
    <input readonly type="text" name="id" value=" <?php echo $getuserdata['id'];?> "></input>
    <br>
    <label>Name :</label>    
        <input type="text" name="name" value=" <?php echo $getuserdata['lname'];?> "></input>
    <br>
    <label>Password :</label>
    <input type="password" name="pass" placeholder="Enter Old Password"></input>
    <input type="password" name="apass" placeholder="Enter New Password"></input>
    <br>
    <br>
        <input type="password" name="cpass" placeholder="Confirm New Password"></input>
    <br>
    </br>
        <input style="color:blue" type="submit" name="submit"></input>
    </form>

    </div>
  </div>
      
    </div>
      

  </body>
  
  
<script>
$(function() {
  // Sidebar toggle behavior
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });
});
</script>  
</html>