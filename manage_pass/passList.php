<?php
include_once 'app/backend.php';

$passwords = show_passwords();

?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">لیست پسوردها</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>

    </div>
    <div class="box-body">
        <?php if (!empty($passwords)): ?>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>عنوان</th>
                    <th>نام کاربری</th>
                    <th>پسورد</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($passwords as $password): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($password['title'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($password['username'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($password['password'], ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>هیچ پسوردی برای نمایش وجود ندارد.</p>
        <?php endif; ?>
    </div>
</div>
