<?php
session_start();
if (!isset($_SESSION['USERID'])) {
  header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IRSC | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= SYS_URL ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= SYS_URL ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= SYS_URL ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= SYS_URL ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= SYS_URL ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= SYS_URL ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= SYS_URL ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?= SYS_URL ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= SYS_URL ?>assets/plugins/summernote/summernote-bs4.min.css">
  <style>
    .nav-treeview {
      display: none;
    }

    .nav-treeview.show {
      display: block;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!--<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="asset/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>-->

    <!----========================= MENU.php =====================================---->
    <!-- Navbar -->

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= SYS_URL ?>asset/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= SYS_URL ?>assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

        <!----========== LOGOUT============--->
        <li class="nav-item">
          <a class="nav-link" href="<?= SYS_URL ?>logout.php" role="button">
            Logout
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="<?= SYS_URL ?>assets/dist/img/irsc.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">IRSC</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <!--<div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>-->

          <!----========= Logged user's name display ===========-------->
          <div class="info">
            <a href="#" class="d-block"><?= $_SESSION['FIRSTNAME'] . " " . $_SESSION['LASTNAME'] ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!--=========== Logged user's name display =================--->
        <?php
        $userid = $_SESSION['USERID'];
        $db = dbConn();
        $sql = "SELECT * FROM user_modules um 
        INNER JOIN modules m ON m.Id=um.ModuleId 
        WHERE um.UserId='$userid' AND m.Status='1' ORDER BY Idx ASC";
        $result = $db->query($sql);
        $current_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url_without_file = preg_replace('/\/[^\/]*$/', '', $current_url);
        ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {

                $menu_url = SYS_URL . $row['Path'] . '/' . $row['File'] . '.php';
                $menu_url_without_file = preg_replace('/\/[^\/]*$/', '', $menu_url);
                $module_id = $row['ModuleId'];

                // Get sub menu items from sub-modules by module_id -- from main menu
                $sql = "SELECT * FROM sub_modules WHERE module_id='$module_id'";
                $result_sub_module = $db->query($sql);
                $has_sub_modules = $result_sub_module->num_rows > 0;

                // Determine active class for main menu
                $main_active_class = ($url_without_file == $menu_url_without_file || strpos($url_without_file, $row['Path']) !== false) ? 'active' : '';
            ?>
                <li class="nav-item <?= $has_sub_modules ? 'has-treeview' : '' ?>">
                  <a href="<?= $has_sub_modules ? '#' : $menu_url ?>" class="nav-link <?= $main_active_class ?>">
                    <i class="nav-icon <?= $row['Icon'] ?>"></i>
                    <p>
                      <?= $row['Name'] ?>
                      <?php if ($has_sub_modules) { ?>
                        <i class="right fas fa-angle-left"></i>
                      <?php } ?>
                    </p>
                  </a>
                  <?php if ($has_sub_modules) { ?>
                    <ul class="nav nav-treeview" style="display: <?= $main_active_class ? 'block' : 'none' ?>;">
                      <?php
                      // get sub menu items
                      while ($row_sub_module = $result_sub_module->fetch_assoc()) {
                        $sub_menu_url = SYS_URL . $row_sub_module['Path'] . '/' . $row_sub_module['File'] . '.php';
                        $sub_menu_url_without_file = preg_replace('/\/[^\/]*$/', '', $sub_menu_url);
                        $sub_active_class = ($url_without_file == $sub_menu_url_without_file) ? 'active' : '';
                      ?>
                        <li class="nav-item">
                          <a href="<?= $sub_menu_url ?>" class="nav-link <?= $sub_active_class ?>">
                            <i class="nav-icon <?= $row_sub_module['Icon'] ?>"></i>
                            <p> <?= $row_sub_module['Name'] ?> </p>
                          </a>
                        </li>
                      <?php } ?>
                    </ul>
                  <?php } ?>
                </li>
            <?php
              }
            }
            ?>
          </ul>
        </nav>

        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!----======================== DASHBOARD PAGE ===============================------->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= @$link ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><?= @$breadcrumb_item ?></a></li>
                <li class="breadcrumb-item active"><?= @$breadcrumb_item_active ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!------- SECTION Area - Dynamically Changed -------->

      <section class="content">
        <div class="container-fluid">
          <?php echo $content ?>
        </div>
      </section>
    </div><!-- /.content-wrapper END  -->


    <!----======================== END DASHBOARD PAGE ===============================------->

    <!-------------- FOOTER ----------------------->

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2023-2024 <a href="https://adminlte.io">IRSC</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">

      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= SYS_URL ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= SYS_URL ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= SYS_URL ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="<?= SYS_URL ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= SYS_URL ?>assets/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= SYS_URL ?>assets/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?= SYS_URL ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= SYS_URL ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= SYS_URL ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= SYS_URL ?>assets/plugins/moment/moment.min.js"></script>
  <script src="<?= SYS_URL ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= SYS_URL ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?= SYS_URL ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= SYS_URL ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= SYS_URL ?>assets/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= SYS_URL ?>assets/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= SYS_URL ?>assets/dist/js/pages/dashboard.js"></script>
  <!-- Page specific script -->
  <script>
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()
  </script>
  <!--<script>
    const submenu = document.querySelector('.nav-treeview');
    submenu.classList.add('show');
  </script>--->

</body>

</html>

<!DOCTYPE html>
<html lang="en">