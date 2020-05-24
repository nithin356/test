<?php include '../../access/connection.php';
include '../../access/dclogs.php';

if(!$userlogin)
{
    echo "<script> window.setTimeout(function(){ window.location.href='/test/index.html' }, 0); </script>";
}
$getsem1 = mysqli_query($con, "SELECT * FROM lec");
if(isset($_POST['submit']))
{
$access = $_POST['access'];
$lec = $_POST['lec'];
        $query = mysqli_query($con, "UPDATE lec SET  access='$access' where lname='$lec'");
        if ($query) {
            echo "<script>alert('Access enabled'); location.href='index.php';</script>";
            $smsg = "Added";
        } else {
            echo "<script>alert('Access Falied'); location.href='index.php';</script>";
            echo $fmsg = "Falied";
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
select{
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
    <label>Select Staff:*</label>
    <select name="lec" id="">
    
    <option selected hidden>Select</option>
    <?php 
    while($getsemdata1 = mysqli_fetch_assoc($getsem1)){
    ?>
    <option value="<?php echo $getsemdata1['lname'];?>"><?php echo $getsemdata1['lname'];?></option>
    <?php } ?></select>
    <br/>
    <label>Add access:*</label>
    <select required name="access" id="" >
    <option selected hidden>Select</option>
    <option value="1">Grant Access</option>
    <option value="0">No action allowed</option>
    </select>
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