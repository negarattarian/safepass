<?php
include_once 'app/backend.php';

@$passwords = show_passwords();

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    delete_password($id);
    header("location:index.php?m=manage_pass&p=deleteList&deleted=$id");
}
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">حذف رکوردهای پسورد</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table no-margin">
                <thead>
                <tr>
                    <th>نام کاربری</th>
                    <th>رمز عبور</th>
                    <th>وب‌سایت</th>
                    <th>توضیحات</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php if (@$passwords): ?>
                    <?php foreach ($passwords as $password): ?>
                        <tr>
                            <td><?php echo $password['username']; ?></td>
                            <td><?php echo $password['password']; ?></td>
                            <td><?php echo $password['website']; ?></td>
                            <td><?php echo $password['notes']; ?></td>
                            <td>
                                <a href="index.php?m=manage_pass&p=deleteList&deleteid=<?php echo $password['id']; ?>">
                                    <button type="button" class="btn btn-info  btn-danger ">حذف</button>
                                </a>
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
    <!-- /.box-body -->
</div>

<script>
    // Function to show delete success message
    function showDeleteSuccessMessage() {
        var popup = document.createElement('div');
        popup.innerText = 'رکورد با موفقیت حذف شد.';
        popup.style.position = 'fixed';
        popup.style.bottom = '20px';
        popup.style.left = '50%';
        popup.style.transform = 'translateX(-50%)';
        popup.style.backgroundColor = '#f35050';
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

    // Check if there's a success message in the URL query and show it
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('deleted')) {
        showDeleteSuccessMessage();
    }
</script>