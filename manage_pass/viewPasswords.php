<?php
include_once 'app/backend.php';

if (!isset($_GET['groupid'])) {
    header("location:index.php?m=manage_pass&p=groupList");
    exit();
}

$groupId = intval($_GET['groupid']);  // Ensure $groupId is an integer for security
$passwords = get_passwords_by_group($groupId);
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">لیست پسوردها</h3>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table no-margin">
                <thead>
                <tr>
                    <th>نام کاربری</th>
                    <th>پسورد</th>
                    <th>وبسایت</th>
                    <th>توضیحات</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($passwords): ?>
                    <?php foreach ($passwords as $password): ?>
                        <tr>
                            <td><?php echo $password['username']; ?></td>
                            <td id="password_<?php echo $password['id']; ?>"><?php echo $password['password']; ?></td>
                            <td><?php echo $password['website']; ?></td>
                            <td><?php echo $password['notes']; ?></td>
                            <td>
                                <button onclick="copyPassword(<?php echo $password['id']; ?>)" class="btn btn-primary btn-sm">کپی پسورد</button>
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

<div style="text-align: center; margin-top: 20px;">
    <button onclick="goBack()" class="btn btn-danger">بازگشت</button>
</div>

<script>
    function goBack() {
        window.history.back();
    }

    function copyPassword(passwordId) {
        var passwordElement = document.getElementById('password_' + passwordId);
        var tempInput = document.createElement('input');
        tempInput.setAttribute('type', 'text');
        tempInput.setAttribute('value', passwordElement.innerText);
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);

        // Show copied message
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
</script>
