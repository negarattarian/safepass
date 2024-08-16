<?php
include_once 'app/backend.php';

$message = '';

if (isset($_POST['btn'])) {
    $backupFile = backupDatabase();

    if (!empty($backupFile)) {
        $message = "بک‌آپ با موفقیت گرفته شد و در دایرکتوری root ثبت شد: $backupFile";
    } else {
        $message = "خطا در ایجاد بک‌آپ!";
    }
}
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">دریافت نسخه پشتیبان</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="col-md-6">
            <form action="" method="post">
                <?php if (!empty($message)): ?>
                    <div class="alert alert-success"><?php echo $message; ?></div>
                <?php endif; ?>
                <p>پس از ثبت دکمه، یک نسخه پشتیبان از دیتابیس با نام فایل backup_YYYY-MM-DD_HH-II-SS.sql ایجاد خواهد
                    شد.</p>
                <input type="submit" name="btn" value="ثبت و ذخیره نسخه پشتیبان" class="btn btn-info dropdown-toggle">
            </form>
        </div>
    </div>
</div>
