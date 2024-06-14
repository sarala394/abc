<?php
session_start();
if(!isset($_SESSION['USERID'])){
 header("Location:login.php");
}
include '../function.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BIT TEST</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/mystyle.css" rel="stylesheet" type="text/css"/>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center my-header-bg">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.html"><span>BIT</span></a></h1>
        
        <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          
          
          <li><a class="getstarted scrollto register-btn" href="register.php" >WELCOME, <?=  $_SESSION['FIRSTNAME']?></a></li>
          <li><a class="getstarted scrollto bg-success" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  
  <main id="main">
      <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Dashboard</h2>
          <ol>
            <li><a href="index.html">Customer</a></li>
            <li>Dashboard</li>
          </ol>
        </div>

      </div>
    </section>

      <section class="inner-page">
      <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
          extract($_POST);
          $userid=$_SESSION['USERID'];
          $db= dbConn();
          $time_duration = '01:00:00';

          $stime=strtotime($time); //========find end time==========
          $endtime=date("H:i", strtotime("+60 minutes", $stime));

          //========find customer id from select query=============
          $sql="SELECT * FROM customers WHERE UserId='$userid'";
          $result=$db->query($sql);
          $row=$result->fetch_assoc();
          $customer_id=$row['CustomerId'];


          $sql= "INSERT INTO appointments(customer_id,date,start_time,end_time )VALUES ('$customer_id','$date','$time','$endtime')";
          $db->query($sql);

          //unset($_SESSION['action']);
          //unset($_SESSION['date']);
          //unset($_SESSION['time']);

          echo "<div class='alert alert-success'>Your Booking has been confirmed.......</div>";

        }
          if(isset($_SESSION['action'])){
            if($_SESSION['action']=='booking'){
              echo $_SESSION['date'];
              echo $_SESSION['time'];
              ?>
              <Form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="date" value="<?= $_SESSION['date'] ?>">
                <input type="hidden" name="time" value="<?= $_SESSION['time'] ?>">
                <button type="submit" class="btn btn-warning">Click here to confirm your booking</button>
            </form>
              <?php
            }
          }
        ?>
      </div>
    </section>
  </main>
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>UCSC</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
        Designed by Sarala
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
  




