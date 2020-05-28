<?php 
include '../../access/connection.php';
include '../../access/uclogs.php';
if(!$userlogin)
{
    echo "<script> window.setTimeout(function(){ window.location.href='/test/index.html' }, 0); </script>";

}

$getall=mysqli_query($con,"SELECT * FROM dc");
$getall1=mysqli_query($con,"SELECT * FROM uclog");
$getuc=mysqli_fetch_assoc($getall1);
if(isset($_POST['insert'])){
$id=$_POST['del'];
$sem=$_POST['sem'];
$cam=$_POST['cam'];
$unit=$_POST['unit'];
$day=$_POST['day'];
$date = date('Y-m-d',strtotime($_POST['date']));
$time1=$_POST['time1'];
$time2=$_POST['time2'];
$sqli = mysqli_query($con,"UPDATE uclog SET camp='$cam', sem='$sem', unit='$unit', from_time='$time1', to_time='$time2', day_to='$day', date_to='$date' WHERE sem='$sem'");
    if ($sqli) {
        echo "<script>alert('User Updated');</script>";
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
    <div class="col-lg-10 mx-auto">
   <style>
    table, th, td {
        border: 1px solid black;
        color: white;
    }
    input{
     width: 100%;
    }
    </style>
    <form method="POST">
    
    Unit List :
    <table style="width: 100%;">
  <tr>
    <th>Campus</th>
    <th>Semester</th>
    <th>Unit</th>
    <th>Date</th>
    <th>From</th>
    <th>To</th>
    <th>Action</th>
  </tr>
  <?php
  while($getdetails=mysqli_fetch_assoc($getall)){?>
  <tr>
  <?php if($getuc['camp']!=""){?>

    <td><input type="text" required name="cam" value="<?php echo $getuc['camp'];?>"></td>
  
    <?php } else {?>
    <td><input type="text" required name="cam" placeholder="Enter Campus"></td>
  <?php } ?>
    <td><input type="text" required name="sem" value="<?php echo $getdetails['sem'];?>"/></td>
    <td><input type="text" readonly required name="unit" value="<?php echo $getdetails['unit'];?>"></td>
    <td>
    <?php if($getuc['day_to']==""){?>
    <select name="day"><option selected hidden>Select</option>
    <option value="Sunday">Sunday</option>
    <option value="Monday">Monday</option>
    <option value="Tuesday">Tuesday</option>
    <option value="Wednesday">Wednesday</option>
    <option value="Thursday">Thursday</option>
    <option value="Friday">Friday</option>
    <option value="Saturday">Saturday</option>
    </select>
    <?php } else {?>
    <input type="text" required name="day" value="<?php echo $getuc['day_to'];?>"/>
    <?php } ?>    
    <?php if($getuc['date_to']!=""){?>
    <input type="date" required name="date" value="<?php echo date('Y-m-d',strtotime($getuc["date_to"]));?>">
    <?php } else {?>
    <input type="date" required name="date" ></td>
    <?php } ?>   
    </td>
    <?php if($getuc['from_time']!=""){?>
        <td><input type="time" required name="time1" value="<?php echo $getuc['from_time'];?>"></td>    
    <?php } else {?>
    <td><input type="time" required name="time1" ></td>
    <?php } ?>
    
    <?php if($getuc['to_time']!=""){?>
        <td><input type="time" required name="time2" value="<?php echo $getuc['to_time'];?>"></td>    
    <?php } else {?>
    <td><input type="text" required name="time2" ></td>
    <?php } ?>
    <td>
    <input type="hidden" value="<?php echo $getuc['sem'];?>" name="del"/>
    <input type=submit name="insert" value="Update"/></td>
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