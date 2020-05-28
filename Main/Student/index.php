<?php
include '../../access/connection.php';
include '../../access/userlog.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Course Management System</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="/test/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="/test/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/test/lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/test/css/style.css" rel="stylesheet">
</head>

<body>
  <header id="header">
    <div class="container">
<!--my commit-->
      <div id="logo" class="pull-left">
        <p style="size:500px; color: white;">Course Management System</p>
      </div>
      <!--Commit-->

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Home</a></li>
          <li><a href="#services">Details</a></li>
          <?php
        
          if($userlogin)
          {?>
          <?php if(isset($_SESSION['userid'])){?>
            <li class="menu-has-children"><a href=""><?php echo $globaluname ?> </a>
            <ul>
            <li><a href="../Student/Student-dashboard.php">Dashboard</a></li>
            <li><a href="../../access/logout.php">Logout</a></li>
            </ul>
            </li>
          <?php }} else {?>
          <li class="menu-has-children"><a href="">Login/Register</a>
            <ul>
            <li><a href="../../login.php">Login</a></li>
            <li><a href="../../register.php">Student Register</a></li>
            <li><a href="../../academic-staff-register.php">Staff Register</a></li>
            </ul>
          </li>
          <?php }?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <h1>Course Management System</h1>
      <a href="#services" class="btn-get-started">Get Started</a>
    </div>
  </section><!-- #hero -->

  <main id="main">

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">Details</h3>
          <p class="section-description"></p>
        </div>
        <a href="Student-dashboard.php">
        <div class="row">
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href="Student-dashboard.php"><i class="fa fa-user"></i></a></div>
              <h4 class="title"><a href="Student-dashboard.php">Unit Enrollment</a></h4>
              <p class="description">Enrol to unit</p>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
              <div class="icon"><a href="Student-dashboard.php"><i class="fa fa-info-circle"></i></a></div>
              <h4 class="title"><a href="Student-dashboard.php">Unit Details</a></h4>
              <p class="description">Details of particular unit</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
              <div class="icon"><a href="Student-dashboard.php"><i class="fa fa-calendar"></i></a></div>
              <h4 class="title"><a href="Student-dashboard.php">Time Table</a></h4>
              <p class="description">Individual table</p>
            </div>
          </div>
          </a>
        </div>

      </div>
    </section><!-- #services -->
  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>CMS</strong>. <br>
        All Rights Reserved
      </div>
      </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="/test/lib/jquery/jquery.min.js"></script>
  <script src="/test/lib/jquery/jquery-migrate.min.js"></script>
  <script src="/test/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/test/lib/easing/easing.min.js"></script>
  <script src="/test/lib/wow/wow.min.js"></script>
  <script src="/test/lib/waypoints/waypoints.min.js"></script>
  <script src="/test/lib/counterup/counterup.min.js"></script>
  <script src="/test/lib/superfish/hoverIntent.js"></script>
  <script src="/test/lib/superfish/superfish.min.js"></script>
  <script src="/test/js/main.js"></script>

</body>
</html>
