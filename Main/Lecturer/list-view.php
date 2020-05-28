<?php 
include '../../access/connection.php';
include '../../access/leclogs.php';
if(!$userlogin)
{
    echo "<script> window.setTimeout(function(){ window.location.href='/test/index.html' }, 0); </script>";

}
if(isset($_POST['insert'])){
    $id=$_POST['del'];
    $unit=$_POST['unit'];
    $sqli = mysqli_query($con,"UPDATE user SET unit=$unit where userid='$id'");
    if ($sqli) {
        echo "<script>alert('User Updated');</script>";
        $smsg = "User Updated";
    } else {
        echo "<script>alert('User Update Falied');</script>";
        echo $fmsg = "update Falied";
    }
}
if(isset($_POST['submit'])){
    $id=$_POST['del'];
    $unit=$_POST['unit'];


        $sql = mysqli_query($con, "DELETE FROM user WHERE userid='$id'");
        if ($sql) {
            echo "<script>alert('User Deleted');</script>";
            $smsg = "User Updated";
        } else {
            echo "<script>alert('User Update Falied');</script>";
            echo $fmsg = "update Falied";
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
       
    <?php include 'header.php'; ?>
    </header>

    <!-- Start Page content holder -->
    <div class="page-content p-5" id="content">
      
    <!-- Toggle button -->
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bolder">Toggle</small></button>
      
    <!-- Content Header -->   
        <h2 class="display-4 font-weight-bold text-center text-white">Course Management System</h2>
        <div class="separator mt-4"></div>
      
    <!-- content -->
        
  
    <div class="row text-white">
    <div class="col-lg-7 mx-auto">
   <style>
    table, th, td {
        border: 1px solid black;
        color: white;
    }
    </style>
    Tutor List :
    <table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Unit</th>
    <th>Action</th>
  </tr>

  <?php
  $gets = mysqli_query($con, "SELECT * FROM lec");
  while($getstudent=mysqli_fetch_assoc($gets)){
  ?>
  <tr>
    <form method="POST">
    <td><?php echo $getstudent['id'];?></td>
    <td><?php echo $getstudent['lname'];?></td>
    <td><?php echo $getstudent['unit'];?></td>
    <?php if($getstudent['access']=='0'){?>
            <td>Access Not Allowed</td>
    <?php }else{ ?>
    <td>Access Allowed</td>
    <?php } ?>
  </tr>
  <?php } ?>
  </form>
</table>
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