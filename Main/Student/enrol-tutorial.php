<?php include '../../access/connection.php';
include '../../access/userlog.php';

if(!$userlogin)
{
    echo "<script> window.setTimeout(function(){ window.location.href='/test/index.html' }, 0); </script>";
}
$getsem1 = mysqli_query($con, "SELECT * FROM dc");

if(isset($_POST['submit']))
{
$unit = $_POST['unit'];
$getsem = mysqli_query($con, "SELECT * FROM user where unit='$unit'");
$getsemdata = mysqli_fetch_assoc($getsem);
$count = mysqli_num_rows($getsem);
if ($count > 0) {
  echo "<script>alert('Already Exists'); location.href='enrol-tutorial.php';</script>";
  $fmsg = "Already Exists";
}
else{
            $query = mysqli_query($con, "INSERT INTO user (unit) VALUES ('$unit')");
            if ($query) {
                echo "<script>alert('Added'); location.href='enrol-tutorial.php';</script>";
                $smsg = "Added";
            } else {
                echo "<script>alert('User Registered Falied'); location.href='enrol-tutorial.php';</script>";
                echo $fmsg = "Falied";
            }
    }
  }
?>
<html>
  
  <head>
    <title>Course Management System</title>
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
           </li><li class="nav-item">
              <a href="timetable.php" class="nav-link text-dark font-italic bg-light">
                <i class="far fa-images mr-3 text-primary fa-fw"></i>
              Time Table
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
input,select{
    width: 100%;
}
</style> 
    <div class="row text-white">
    <div class="col-lg-7 mx-auto">
    <form method="POST">
    <label>Select Unit/Tutorial: *</label>
    <select name="unit" >
    <option selected hidden>Select</option>
    <?php
    while($getsemdata1 = mysqli_fetch_assoc($getsem1)){
    ?>
    <option value="<?php echo $getsemdata1['unit'];?>"><?php echo $getsemdata1['unit'];?></option>
    <?php } ?>
</select>
    </br>
    </br>
<input type="submit" name="submit" value="Select Unit/tutorial"/>
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