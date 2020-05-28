<?php 
include '../../access/connection.php';
include '../../access/uclogs.php';
if(!$userlogin)
{
    echo "<script> window.setTimeout(function(){ window.location.href='/test/index.html' }, 0); </script>";
}
$getall=mysqli_query($con,"SELECT * FROM uclog");
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
    <style>
    table, th, td {
        border: 1px solid black;
        color: white;
    }
    input{
     width: 100%;
    }
    </style>  
  
    <div class="row text-white">
    <div class="col-lg-7 mx-auto">
      <p class="lead">Time Table</p>
      <table style="width: 100%;">
  <tr>
    <th>Campus</th>
    <th>Semester</th>
    <th>Unit</th>
    <th>Date</th>
    <th>From</th>
    <th>To</th>
</tr>
<?php
  while($getdetails=mysqli_fetch_assoc($getall)){?>
  <tr>
  <td><?php echo $getdetails['camp'];?></td>
  <td><?php echo $getdetails['sem'];?></td>
  <td><?php echo $getdetails['unit'];?></td>
  <td><?php echo $getdetails['date_to'];?>,<?php echo $getdetails['day_to'];?></td>
  <td><?php echo $getdetails['from_time'];?></td>
  <td><?php echo $getdetails['to_time'];?></td>
  </tr>
  <?php }?>
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