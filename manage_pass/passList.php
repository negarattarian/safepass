<?php
include_once 'app/backend.php';

@$passwords = show_passwords();

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
        <div class="table-responsive">
            <table class="table no-margin">
                <thead>
                <tr>
                    <th>نام کاربری</th>
                    <th>رمز عبور</th>
                    <th>وب‌سایت</th>
                    <th>توضیحات</th>
                    <th>دسته بندی</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php if (@$passwords): ?>
                    <?php foreach ($passwords as $password): ?>
                        <tr>
                            <td><?php echo $password['username']; ?></td>
                            <td>
                                <span class="masked-password"><?php echo str_repeat('*', strlen($password['password'])); ?></span>
                                <span class="real-password" style="display:none;"><?php echo $password['password']; ?></span>
                                <button type="button" class="btn btn-default btn-xs show-password">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td><?php echo $password['website']; ?></td>
                            <td><?php echo $password['notes']; ?></td>
                            <td><?php echo $password['group_name']; ?></td>
                            <td>
                                <button type="button" class="btn btn-info" onclick="copyPassword(this)">کپی</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">هیچ رکوردی یافت نشد</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Function to copy password to clipboard
    function copyPassword(button) {
        var realPasswordSpan = button.closest('tr').querySelector('.real-password');
        var password = realPasswordSpan.innerText;

        // Create a temporary textarea to copy the password
        var tempTextarea = document.createElement('textarea');
        tempTextarea.value = password;
        document.body.appendChild(tempTextarea);
        tempTextarea.select();
        document.execCommand('copy');
        document.body.removeChild(tempTextarea);

        // Show popup message
        var popup = document.createElement('div');
        popup.innerText = 'پسورد با موفقیت کپی شد';
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

    // Function to toggle between masked and real password
    document.querySelectorAll('.show-password').forEach(function(button) {
        button.addEventListener('click', function() {
            var passwordContainer = button.closest('td');
            var maskedPasswordSpan = passwordContainer.querySelector('.masked-password');
            var realPasswordSpan = passwordContainer.querySelector('.real-password');

            if (maskedPasswordSpan.style.display !== 'none') {
                maskedPasswordSpan.style.display = 'none';
                realPasswordSpan.style.display = 'inline-block';
            } else {
                maskedPasswordSpan.style.display = 'inline-block';
                realPasswordSpan.style.display = 'none';
            }
        });
    });
</script>
