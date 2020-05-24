<?php include '../../access/connection.php';
include '../../access/dclogs.php';

if(!$userlogin)
{
    echo "<script> window.setTimeout(function(){ window.location.href='/test/index.html' }, 0); </script>";
}
$getsem1 = mysqli_query($con, "SELECT * FROM dc");
if(isset($_POST['submit']))
{
$lec = $_POST['lec'];
$unit = $_POST['unit'];
$getsem = mysqli_query($con, "SELECT * FROM lec where ='$unit' and sem='$sem'");
$getsemdata = mysqli_fetch_assoc($getsem);
$count = mysqli_num_rows($getsem);
if ($count > 0) {
echo "<script>alert('Already Exists'); location.href='dcreg.php';</script>";
$fmsg = "Already Exists";
}
else{
        $query = mysqli_query($con, "INSERT INTO lec (unit,lname) VALUES ('$lec','$unit')");
        if ($query) {
            echo "<script>alert('staff alloted'); location.href='allotment.php';</script>";
            $smsg = "Added";
        } else {
            echo "<script>alert('staff alloted Falied'); location.href='allotment.php';</script>";
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
  <style>
select,input{
    width: 100%;
}
</style> 
  
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
    <form method="POST">
    <label>Select Unit:*</label>
    <select name="unit" id="">
    <?php

    while($getsemdata1 = mysqli_fetch_assoc($getsem1)){
    ?>
    <option value="<?php echo $getsemdata['unit'];?>"></option>
    <?php } ?>
</select>
    <br/>
    <label>Add Teacher/Lecturer:*</label>
    <input type=text required name="lec"/>
    <br/>
    <br/>
    <input type="submit" name="submit" ></input>
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