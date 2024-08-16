<?php
ob_start();
include_once 'app/backend.php';
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت کاربر</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="dist/css/rtl.css">
    <!-- persian Date Picker -->
    <link rel="stylesheet" href="dist/css/persian-datepicker-0.4.5.min">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">پنل</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>کنترل پنل مدیریت</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="dist/img/aa.png" class="user-image" alt="User Image">
                            <span class="hidden-xs">


                                کاربر

                                <?php

                                echo $_SESSION['username'];

                                ?>

</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="dist/img/aa.png" class="img-circle" alt="User Image">
                                <p>
                                    کاربر


                                    <?php

                                    echo $_SESSION['username'];

                                    ?>

                                    <small>کاربر وب سایت</small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">پروفایل</a>
                                </div>
                                <div class="pull-left">
                                    <a href="logout.php" class="btn btn-default btn-flat">خروج</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- right side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-right image">
                    <img src="dist/img/aa.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-right info">
                    <p>کاربر

                        <?php

                        echo $_SESSION['username'];

                        ?>

                    </p>
                    <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="جستجو">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">منو</li>
                <li class="active treeview">
                    <!--          <a href="#">-->
                    <!--            <i class="fa fa-dashboard"></i> <span>داشبرد</span>-->
                    <!--            <span class="pull-left-container">-->
                    <!--              <i class="fa fa-angle-right pull-left"></i>-->
                    <!--            </span>-->
                    <!--          </a>-->
                    <!--          <ul class="treeview-menu">-->
                    <!--            <li class="active"><a href="index.php"><i class="fa fa-circle-o"></i> داشبرد اول</a></li>-->
                    <!--            <li><a href="index.php"><i class="fa fa-circle-o"></i> داشبرد دوم</a></li>-->
                    <!--          </ul>-->
                </li>
                <li>
                    <a href="index.php?m=index&p=index">
                        <i class="fa fa-th"></i> <span>صفحه اصلی</span>
                        <span class="pull-left-container">
            </span>
                    </a>
                </li>

                <!--                <li class="treeview">-->
                <!--                    <a href="#">-->
                <!--                        <i class="fa fa-pie-chart"></i>-->
                <!--                        <span>مدیریت پسورد ها</span>-->
                <!--                        <span class="pull-left-container">-->
                <!--              <i class="fa fa-angle-right pull-left"></i>-->
                <!--            </span>-->
                <!--                        <ul class="treeview-menu">-->
                <!--                            <li><a href="index.php?m=manage_pass&p=passList"><i class="fa fa-list"></i> <span>دیتابیس پسوردها</span></a>-->
                <!--                            </li>-->
                <!--                            <li><a href="index.php?m=manage_pass&p=addPassword"><i class="fa fa-save"></i> <span>ذخیره رکورد جدید</span></a>-->
                <!--                            </li>-->
                <!--                            <li><a href="index.php?m=manage_pass&p=edit-list-pass"><i class="fa fa-edit"></i><span>ویرایش پسورد</span></a>-->
                <!--                            </li>-->
                <!---->
                <!--                            <li><a href="index.php?m=manage_pass&p=deleteList"><i class="fa fa-trash"></i> <span>حذف پسورد</span></a>-->
                <!--                            </li>-->
                <!--                        </ul>-->
                <!--                </li>-->


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>مدیریت پسورد ها</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="index.php?m=manage_pass&p=passList"><i class="fa fa-list"></i> <span>دیتابیس پسوردها</span></a>
                        </li>
                        <li><a href="index.php?m=manage_pass&p=addPassword"><i class="fa fa-save"></i>
                                <span>درج پسورد</span></a>
                        </li>
                        <li><a href="index.php?m=manage_pass&p=edit-list-pass"><i
                                        class="fa fa-edit"></i><span>ویرایش پسورد</span></a>
                        </li>

                        <li><a href="index.php?m=manage_pass&p=deleteList"><i class="fa fa-trash"></i>
                                <span>حذف پسورد</span></a>
                        </li>
                    </ul>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>مدیریت دسته ها</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="index.php?m=group&p=group-list"><i class="fa fa-list"></i>
                                <span>لیست دسته بندی ها</span></a>
                        </li>
                        <li><a href="index.php?m=group&p=add-group"><i class="fa fa-save"></i>
                                <span>درج دسته بندی جدید</span></a>
                        </li>
                        <li><a href="index.php?m=group&p=edit-list-group"><i class="fa fa-edit"></i> <span>ویرایش دسته ها</span></a>
                        </li>
                        <li><a href="index.php?m=group&p=delete-list-group"><i class="fa fa-trash"></i>
                                <span>حذف دسته بندی</span></a></li>
                    </ul>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>ابزار های مدیریت پسورد</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="index.php?m=utils&p=check_pass"><i
                                        class="fa fa-magic"></i><span>بررسی قدرت پسورد</span></a></li>
                        <li><a href="index.php?m=utils&p=create_pass"><i
                                        class="fa fa-magic"></i><span>ایجاد پسورد قدرتمند</span></a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>پشتیبان گیری</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="index.php?m=backup&p=get-backup"><i
                                        class="fa fa-magic"></i><span>دریافت نسخه پشتیبان</span></a></li>
                        <li><a href="index.php?m=backup&p=restore_backup"><i class="fa fa-magic"></i><span>بازگردانی نسخه پشتیبان</span></a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>گزارشات سیستم</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="index.php?m=log&p=log-list"><i class="fa fa-magic"></i><span>بررسی لاگ‌ها</span></a>
                        </li>
                        <li><a href="index.php?m=log&p=delete-log"><i class="fa fa-magic"></i><span>پاک کردن لاگ‌های سیستم</span></a>
                        </li>
                    </ul>
                </li>


<!--                <li class="header">مدیریت پسورد ها</li>-->
<!--                <li><a href="index.php?m=manage_pass&p=passList"><i class="fa fa-list"></i> <span>دیتابیس پسوردها</span></a>-->
<!--                </li>-->
<!--                <li><a href="index.php?m=manage_pass&p=addPassword"><i class="fa fa-save"></i>-->
<!--                        <span>درج پسورد</span></a>-->
<!--                </li>-->
<!--                <li><a href="index.php?m=manage_pass&p=edit-list-pass"><i-->
<!--                                class="fa fa-edit"></i><span>ویرایش پسورد</span></a>-->
<!--                </li>-->
<!---->
<!--                <li><a href="index.php?m=manage_pass&p=deleteList"><i class="fa fa-trash"></i>-->
<!--                        <span>حذف پسورد</span></a>-->
<!--                </li>-->
<!---->
<!--                <li class="header">مدیریت دسته ها</li>-->
<!---->
<!--                <li><a href="index.php?m=group&p=group-list"><i class="fa fa-list"></i>-->
<!--                        <span>لیست دسته بندی ها</span></a>-->
<!--                </li>-->
<!--                <li><a href="index.php?m=group&p=add-group"><i class="fa fa-save"></i>-->
<!--                        <span>درج دسته بندی جدید</span></a>-->
<!--                </li>-->
<!--                <li><a href="index.php?m=group&p=edit-list-group"><i class="fa fa-edit"></i> <span>ویرایش دسته ها</span></a>-->
<!--                </li>-->
<!--                <li><a href="index.php?m=group&p=delete-list-group"><i class="fa fa-trash"></i>-->
<!--                        <span>حذف دسته بندی</span></a></li>-->
<!---->
<!---->
<!--                <li class="header">ابزار های مدیریت پسورد</li>-->
<!---->
<!--                <li><a href="index.php?m=utils&p=check_pass"><i-->
<!--                                class="fa fa-magic"></i><span>بررسی قدرت پسورد</span></a></li>-->
<!--                <li><a href="index.php?m=utils&p=create_pass"><i-->
<!--                                class="fa fa-magic"></i><span>ایجاد پسورد قدرتمند</span></a></li>-->
<!---->
<!---->
<!--                <li class="header">پشتیبان گیری</li>-->
<!---->
<!--                <li><a href="index.php?m=backup&p=get-backup"><i-->
<!--                                class="fa fa-magic"></i><span>دریافت نسخه پشتیبان</span></a></li>-->
<!--                <li><a href="index.php?m=backup&p=restore_backup"><i class="fa fa-magic"></i><span>بازگردانی نسخه پشتیبان</span></a>-->
<!--                </li>-->
<!---->
<!--                <li class="header">گزارشات سیستم</li>-->
<!---->
<!--                <li><a href="index.php?m=backup&p=get-backup"><i class="fa fa-magic"></i><span>بررسی لاگ‌ها</span></a>-->
<!--                </li>-->
<!--                <li><a href="index.php?m=backup&p=restore_backup"><i class="fa fa-magic"></i><span>پاک کردن لاگ‌های سیستم</span></a>-->
<!--                </li>-->
<!---->
<!--                <li class="treeview">-->
<!--                    <ul class="treeview-menu">-->
<!--                        <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> نوار بالا</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li>-->
<!---->
<!--                </li>-->


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                داشبرد
                <small>کنترل پنل مدیریت</small>
            </h1>
            <ol class="breadcrumb">
                <!--        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>-->
                <!--        <li class="active">داشبرد</li>-->
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">


            <?php

            @$m = $_GET['m'] ? $_GET['m'] : 'index';
            @$p = $_GET['p'] ? $_GET['p'] : 'index';

            include_once "$m/$p.php";
            ?>


            <!-- Small boxes (Stat box) -->
            <div class="row">


            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
