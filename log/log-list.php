<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>گزارشات سیستم | کنترل پنل</title>
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

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>

<?php
// Fetch logs (Consider adding filtering/sanitization if user input is involved)
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
                <i class="fa fa-globe"></i> لیست گزارشات سیستم (لاگ‌ها)
                <small class="pull-left"><?php echo date('d M Y'); ?></small>
            </h2>
        </div>
    </div>

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped table-bordered">
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
                        <td><?php echo htmlspecialchars($counter++, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($action_descriptions[$log['action']] ?? 'عملیات ناشناخته', ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars(date('d M Y H:i:s', strtotime($log['datetime'])), ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
</body>
</html>
