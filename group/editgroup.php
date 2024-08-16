<?php
include_once 'app/backend.php';

if (isset($_POST['submit'])) {
    $fields = $_POST['arr'];
    $id = $_GET['groupid'];
    edit_group($fields, $id);
    header("location:index.php?m=group&p=edit-list-group");
}

if (isset($_GET['groupid'])) {
    $id = $_GET['groupid'];
    $group = show_group_by_id($id);
}

?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">ویرایش اطلاعات دسته بندی</h3>
    </div>
    <div class="box-body">
        <div class="col-md-8">
            <form role="form" method="post" action="">
                <div class="form-group">
                    <label>نام دسته بندی:</label>
                    <input type="text" value="<?php echo $group['name']; ?>" name="arr[name]" class="form-control" placeholder="نام دسته را وارد کنید" required>
                </div>
                <div class="form-group">
                    <label>توضیحات:</label>
                    <textarea rows="6" name="arr[description]" class="form-control" placeholder="توضیحات دسته بندی را وارد کنید"><?php echo $group['note']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>وضعیت دسته:</label>
                    <select class="form-control" name="arr[status]" required>
                        <option value="1" <?php echo $group['status'] == '1' ? 'selected' : ''; ?>>فعال</option>
                        <option value="0" <?php echo $group['status'] == '0' ? 'selected' : ''; ?>>غیرفعال</option>
                    </select>
                </div>
                <input type="submit" name="submit" value="ویرایش" class="btn btn-primary dropdown-toggle">
                <br>
            </form>
        </div>
    </div>
</div>
