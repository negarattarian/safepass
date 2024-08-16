<?php
include_once 'app/backend.php';

if (isset($_POST['restore_btn'])) {
    $backupFile = $_FILES['backup_file']['tmp_name']; // Path to uploaded backup file

    if (!empty($backupFile) && is_uploaded_file($backupFile)) {
        $result = restoreDatabase($backupFile);

        if ($result === true) {
            $message = "بازگردانی نسخه پشتیبان با موفقیت انجام شد.";
            $alertClass = 'alert-success';
        } else {
            $message = "خطا در بازگردانی نسخه پشتیبان: " . $result;
            $alertClass = 'alert-danger';
        }
    } else {
        $message = "فایل بک‌آپ معتبری انتخاب نشده است.";
        $alertClass = 'alert-warning';
    }
}
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">بازگردانی نسخه پشتیبان</h3>
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
            <form action="" method="post" enctype="multipart/form-data">

                <?php if (!empty($message)): ?>
                    <div class="alert <?php echo $alertClass; ?>"><?php echo $message; ?></div>
                <?php endif; ?>
                <p>برای بازگرداندن نسخه پشتیبان، فایل بک‌آپ SQL خود را انتخاب کنید و دکمه زیر را برای بازگردانی فشار دهید.</p>
                <div class="form-group">
                    <input type="file" name="backup_file" required>
                </div>
                <input type="submit" name="restore_btn" value="بازگردانی نسخه پشتیبان" class="btn btn-info dropdown-toggle">
            </form>
        </div>
    </div>
</div>