<?php
include_once 'app/backend.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    delete_group($id);
    header("location: index.php?m=group&p=delete-list-group");
}

@$groups = show_password_groups();
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">لیست دسته های پسورد</h3>
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
                                <button type="button"
                                        class="btn btn-sm <?php echo $group['status'] == '1' ? 'btn-success' : 'btn-danger'; ?>"
                                        style="pointer-events: none; cursor: default;">
                                    <?php echo $group['status'] == '1' ? 'فعال' : 'غیرفعال'; ?>
                                </button>
                            </td>
                            <td>
                                <form method="post" style="display: inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $group['id']; ?>">
                                    <button type="submit" name="delete" class="btn btn-danger btn-sm"
                                            onclick="return confirm('آیا از حذف این دسته بندی مطمئن هستید؟')">حذف
                                    </button>
                                </form>
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
</script>
