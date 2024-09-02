<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>گزارشات سیستم | کنترل پنل</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="../../dist/css/rtl.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>

<?php
// Fetch logs
$logs = show_logs();

// Define action descriptions
$action_descriptions = [
    '1' => 'ورود کاربر',
    '2' => 'اضافه کردن رمز عبور',
    '3' => 'اضافه کردن دسته بندی',
    '4' => 'خروج کاربر',
    '5' => 'پشتیبان‌گیری از پایگاه داده',
    '6' => 'بازگرداندن پایگاه داده'
];
?>

<!-- Main content -->
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> لیست گزارشات سیستم(لاگ‌ها)
                <small class="pull-left"><?php echo date('d M Y'); ?></small>
            </h2>
        </div>
    </div>

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>شماره</th>
                    <th>عملیات</th>
                    <th>تاریخ و زمان</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                <?php foreach ($logs as $log): ?>
                    <tr>
                        <td><?php echo $counter++; ?></td>
                        <td><?php echo isset($action_descriptions[$log['action']]) ? $action_descriptions[$log['action']] : 'عملیات ناشناخته'; ?></td>
                        <td><?php echo $log['datetime']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
</body>
</html>
