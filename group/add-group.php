<?php
include_once 'app/backend.php';

if(isset($_POST['btn'])){
    $data = $_POST['arr'];
    add_password_group($data);
    header("location:index.php?m=group&p=group-list");
}
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">افزودن دسته بندی پسورد</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label>نام دسته بندی</label>
                    <input type="text" class="form-control" name="arr[name]" placeholder="نام دسته بندی را وارد کنید" required>
                </div>
                <div class="form-group">
                    <label>توضیحات</label>
                    <textarea rows="6" class="form-control" name="arr[note]" placeholder="توضیحات دسته بندی را وارد کنید"></textarea>
                </div>
                <div class="form-group">
                    <label>وضعیت دسته</label>
                    <select class="form-control" name="arr[status]" required>
                        <option value="1">فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                </div>
                <br>
                <input type="submit" name="btn" value="ثبت" class="btn btn-info dropdown-toggle">
            </form>
        </div>
    </div>
</div>

<script>
    function generatePassword() {
        var length = 12;
        var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+~`|}{[]:;?><,./-=";
        var password = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            password += charset.charAt(Math.floor(Math.random() * n));
        }
        document.getElementById("password").value = password;

        // Show popup message
        var popup = document.createElement('div');
        popup.innerText = 'رمز عبور تصادفی تولید شد';
        popup.style.position = 'fixed';
        popup.style.bottom = '20px';
        popup.style.left = '50%';
        popup.style.transform = 'translateX(-50%)';
        popup.style.backgroundColor = '#4CAF50';
        popup.style.color = '#fff';
        popup.style.padding = '10px';
        popup.style.borderRadius = '5px';
        popup.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.2)';
        popup.style.zIndex = '1000';
        document.body.appendChild(popup);

        setTimeout(function() {
            document.body.removeChild(popup);
        }, 2000);
    }

    function togglePassword() {
        var passwordField = document.getElementById("password");
        var toggleIcon = document.getElementById("togglePasswordIcon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        }
    }
</script>
