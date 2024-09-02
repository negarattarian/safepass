<?php
include_once 'app/backend.php';

$groups = show_password_groups();
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">لیست دسته بندی های پسورد</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table no-margin">
                <thead>
                <tr>
                    <th>نام دسته بندی</th>
                    <th>توضیحات</th>
                    <th>تاریخ ایجاد</th>
                    <th>وضعیت دسته بندی</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($groups && count($groups) > 0): ?>
                    <?php foreach ($groups as $group): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($group['note'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($group['created_date'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <button type="button" class="btn btn-sm <?php echo $group['status'] == '1' ? 'btn-success' : 'btn-danger'; ?>" style="pointer-events: none; cursor: default;">
                                    <?php echo $group['status'] == '1' ? 'فعال' : 'غیرفعال'; ?>
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" onclick="editGroup(<?php echo htmlspecialchars($group['id'], ENT_QUOTES, 'UTF-8'); ?>)">ویرایش</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">هیچ رکوردی یافت نشد.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function editGroup(groupId) {
        window.location.href = 'index.php?m=group&p=editgroup&groupid=' + encodeURIComponent(groupId);
    }
</script>
لهف 