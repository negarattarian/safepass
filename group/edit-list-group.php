<?php
include_once 'app/backend.php';

@$groups = show_password_groups();
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
                <?php if (@$groups): ?>
                    <?php foreach ($groups as $group): ?>
                        <tr>
                            <td><?php echo $group['name']; ?></td>
                            <td><?php echo $group['note']; ?></td>
                            <td><?php echo $group['created_date']; ?></td>
                            <td>
                                <button type="button" class="btn btn-sm <?php echo $group['status'] == '1' ? 'btn-success' : 'btn-danger'; ?>" style="pointer-events: none; cursor: default;">
                                    <?php echo $group['status'] == '1' ? 'فعال' : 'غیرفعال'; ?>
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" onclick="editGroup(<?php echo $group['id']; ?>)">ویرایش</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">هیچ رکوردی یافت نشد</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function editGroup(groupId) {
        window.location.href = 'index.php?m=group&p=editgroup&groupid=' + groupId;
    }
</script>
