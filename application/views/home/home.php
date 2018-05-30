<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>E-request</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/dist/css/skins/_all-skins.min.css">

        <!-- jQuery 3 -->
        <script src="<?php echo base_url() ?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue-light sidebar-mini wysihtml5-supported" style="height: auto; min-height: 100%;">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo base_url() ?>/home/" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>E-</b>req</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>E-</b>request</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url() ?>/assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?= $_SESSION['employee']->firstName . ' ' . $_SESSION['employee']->lastName ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url() ?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                        <p>

                                            <?= $_SESSION['employee']->firstName . ' ' . $_SESSION['employee']->lastName ?>
                                            <small>Department: <b><?= $_SESSION['departement']->name ?></b></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="row">

                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">

                                        <div class="pull-right">
                                            <a href="<?= base_url('login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->

                        </ul>
                    </div>
                </nav>
            </header>

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url() ?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?= $_SESSION['employee']->firstName . ' ' . $_SESSION['employee']->lastName ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Role: <?php
                                if ($_SESSION['user']->idType == 1) {
                                    echo 'Administrator';
                                } else if ($_SESSION['user']->idType == 2) {
                                    echo 'Head of departement';
                                } else if ($_SESSION['user']->idType == 3) {
                                    echo 'General Manager';
                                } else if ($_SESSION['user']->idType == 4) {
                                    echo 'financial chief';
                                } else {
                                    echo 'Employee';
                                }
                                ?></a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php include_once('leftNavBar.php') ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <!--
                <section class="content-header">
                  <h1>
                    Blank page
                    <small>it all starts here</small>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                  </ol>
                </section>
            
                <!-- Main content -->
                <section class="content">

                    <?= $section ?>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 0.0.1
                </div>
                <strong>Copyright &copy; 2018 <a href="#">imodeliz</a>.</strong> All rights
                reserved.
            </footer>

            ->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url() ?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url() ?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() ?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>/assets/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url() ?>/assets/dist/js/demo.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
        <!-- Bootstrap WYSIHTML5 -->

        <script>
            $(document).ready(function () {
                $('.sidebar-menu').tree();



            })
        </script>
    </body>
</html>
