<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">ایجاد پسورد قدرتمند</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="جمع‌شدن">
                <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="حذف">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="row justify-content-center text-center mr-auto">
            <div style="width: 30%; margin-right: auto!important; margin-left: auto!important;">
                <div id="generatedPassword" class="form-control" style="margin-top: 10px; background-color: #f0f0f0; color: #333; border: 1px solid #ccc; padding: 10px; border-radius: 5px; text-align: center;"></div>
                <br>
                <button class="btn btn-success " style="margin-top: 10px;" onclick="generatePassword()">ایجاد پسورد قدرتمند</button>
                <br>
                <button class="btn btn-secondary" style="margin-top: 10px;" onclick="copyPassword()">کپی پسورد</button>
            </div>
        </div>
    </div>
    <br><br>
    <!-- /.box-body -->
</div>

<script>
    function generatePassword() {
        var length = 12;
        var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+~`|}{[]:;?><,./-=";
        var password = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            password += charset.charAt(Math.floor(Math.random() * n));
        }
        document.getElementById("generatedPassword").innerText = password;
    }

    function copyPassword() {
        var password = document.getElementById("generatedPassword").innerText;

        // Create a temporary textarea to copy the password
        var tempTextarea = document.createElement('textarea');
        tempTextarea.value = password;
        document.body.appendChild(tempTextarea);
        tempTextarea.select();
        document.execCommand('copy');
        document.body.removeChild(tempTextarea);

        // Show popup message
        var popup = document.createElement('div');
        popup.innerText = 'پسورد با موفقیت کپی شد.';
        popup.style.position = 'fixed';
        popup.style.bottom = '20px';
        popup.style.left = '50%';
        popup.style.transform = 'translate(-50%, 0)';
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
