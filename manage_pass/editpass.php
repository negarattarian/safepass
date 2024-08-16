<?php
include_once 'app/backend.php';

if (isset($_POST['submit'])) {
    $fields = $_POST['arr'];
    $id = $_GET['id'];
    edit_password($fields, $id);
    header("location:index.php?m=manage_pass&p=edit-list-pass");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    @$fields = show_password_by_id($id);
}




?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">ویرایش اطلاعات پسورد</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="col-md-8">
            <form role="form" method="post" action="">
                <!-- text input -->
                <div class="form-group">
                    <label>نام کاربری:</label>
                    <input type="text" value="<?php echo $fields[0]['username']; ?>" name="arr[username]" class="form-control" placeholder="نام کاربری را وارد کنید" required>
                </div>
                <div class="form-group">
                    <label>رمز عبور:</label>
                    <input type="text" value="<?php echo $fields[0]['password']; ?>" name="arr[password]" class="form-control" placeholder="رمز عبور را وارد کنید" required>
                </div>
                <div class="form-group">
                    <label>وب‌سایت:</label>
                    <input type="text" value="<?php echo $fields[0]['website']; ?>" name="arr[website]" class="form-control" placeholder="آدرس وب‌سایت را وارد کنید" required>
                </div>
                <div class="form-group">
                    <label>توضیحات:</label>
                    <textarea rows="6" name="arr[notes]" class="form-control" placeholder="توضیحات اضافی"><?php echo $fields[0]['notes']; ?></textarea>
                </div>
                <input type="submit" name="submit" value="ویرایش" class="btn btn-info dropdown-toggle">
                <br>
            </form>
        </div>
    </div>
</div>
