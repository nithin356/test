<?php include '../../access/connection.php';
include '../../access/userlog.php';

if(!$userlogin)
{
    echo "<script> window.setTimeout(function(){ window.location.href='/test/index.html' }, 0); </script>";
}
$globaluserid = $_SESSION['userid'];
$getuser = mysqli_query($con, "SELECT * FROM user WHERE userid = $globaluserid");
$getuserdata = mysqli_fetch_assoc($getuser);
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $add=$_POST['add'];
    $mail=$_POST['email'];
    $mob=$_POST['mob'];
    $date = date('Y-m-d',strtotime($_POST['date']));
    $pass=md5($_POST['pass']);
    $apass=md5($_POST['apass']);
    $cpass=md5($_POST['cpass']);
    $check=$getuserdata['upassword'];
    if($pass!=$check)
    {
        echo "<script>alert('Old Password Doesnt match');</script>";
    }*/
    if ($apass != $cpass) {
        echo "<script>alert('Passwords do not match');</script>";
        $fmsg = "Passwords do not match";
    } else {
        $sql = mysqli_query($con, "UPDATE user SET uname='$name' ,uemail='$mail' ,udate='$date' ,umobile='$mob' ,uaddr='$add',upassword='$apass' WHERE userid='$id'");
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
    <div class="vertical-nav bg-white" id="sidebar">
          <div class="py-4 px-3 mb-2 mt-2 bg-light">
            <div class="align-items-center" id="half">    
               <a class="navbar-brand text-center" href="#"><h1>C M S</h1></a>
            </div>
          </div>
          <p class="text-gray font-weight-bold text-uppercase px-3 small pb-3 mb-2 mt-3">Main</p>
          <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
              <a href="Student-dashboard.php" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>Home
              </a>  
            </li>
            <li class="nav-item">
              <a href="my-profile.php" class="nav-link text-dark font-italic bg-light">
                <i class="far fa-images mr-3 text-primary fa-fw"></i>
                My profile
              </a>
            </li>
            <li class="nav-item">
              <a href="enrol-tutorial.php" class="nav-link text-dark font-italic bg-light">
                <i class="far fa-images mr-3 text-primary fa-fw"></i>
                Enrol Unit and tutorial
              </a>
            </li>
            <li class="nav-item">
              <a href="../../access/logout.php" class="nav-link text-dark font-italic bg-light">
                <i class="far fa-images mr-3 text-primary fa-fw"></i>
                Logout
              </a>
            </li>
          </ul>
       </div>
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
    <input readonly type="text" name="id" value=" <?php echo $getuserdata['userid'];?> "></input>
    <br>
    <label>Name :</label>    
        <input type="text" name="name" value=" <?php echo $getuserdata['uname'];?> "></input>
    <br>
    <label>Email :</label>
        <input type="email" name="email" value=" <?php echo $getuserdata['uemail'];?> "></input>
    <br>
    
    <label>Phone :</label>    
        <input type="text" name="mob" value=" <?php echo $getuserdata['umobile'];?> "></input>
    <br>
    <label>DOB :</label>

        <input type="date" name="date" value="<?php echo date('Y-m-d',strtotime($getuserdata["udate"])); ?>"></input>
    <br>
    <label>Address :</label>

        <input type="textarea" name="add" value="<?php echo $getuserdata["uaddr"]; ?>"></input>
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