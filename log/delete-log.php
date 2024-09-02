<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>گزارشات سیستم | کنترل پنل</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../dist/css/bootstrap-theme.css">
    <link rel="stylesheet" href="../../dist/css/rtl.css">
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../dist/css/AdminLTE.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; ?>
                <?php foreach ($logs as $log): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($counter++, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($action_descriptions[$log['action']] ?? 'عملیات ناشناخته', ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($log['datetime'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <form method="post" action="log/delete-log-code.php" onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این لاگ را حذف کنید؟');">
                                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($log['user_id'], ENT_QUOTES, 'UTF-8'); ?>">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($log['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                <button type="submit" name="delete" value="1" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
</body>
</html>
