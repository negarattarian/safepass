<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"> بررسی قدرت پسورد</h3>
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
        <br>
        <div class="row justify-content-center text-center mr-auto">
            <div style="width: 35%; margin-right: auto!important; margin-left: auto!important;">
                <input style="border-radius: 5px;text-align: center" type="password" class="form-control" id="passwordInput" placeholder="رمز عبور را وارد کنید">
                <div id="passwordStrengthIndicator" style="margin-top: 5px;"></div>
            </div>
        </div>
    </div>
    <br><br><br>
    <!-- /.box-body -->
</div>

<style>

</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('passwordInput');
        const passwordStrengthIndicator = document.getElementById('passwordStrengthIndicator');

        passwordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            const strength = checkPasswordStrength(password);
            updateInputColor(strength);
            updateIndicatorText(strength);
        });

        function checkPasswordStrength(password) {
            // Dummy logic for password strength calculation
            // You can implement your own logic here
            // For example, check length, complexity, etc.
            if (password.length >= 8) {
                return 'strong';
            } else if (password.length >= 5) {
                return 'medium';
            } else {
                return 'weak';
            }
        }

        function updateInputColor(strength) {
            if (strength === 'weak') {
                passwordInput.style.backgroundColor = '#f8d7da'; // قرمز Bootstrap
                passwordInput.style.borderColor = '#f5c6cb'; // قرمز Bootstrap
                passwordInput.style.color = '#721c24'; // متن قرمز تیره
            } else if (strength === 'medium') {
                passwordInput.style.backgroundColor = '#ffeeba'; // زرد Bootstrap
                passwordInput.style.borderColor = '#ffcd71'; // زرد Bootstrap
                passwordInput.style.color = '#856404'; // متن زرد تیره
            } else if (strength === 'strong') {
                passwordInput.style.backgroundColor = '#d4edda'; // سبز Bootstrap
                passwordInput.style.borderColor = '#c3e6cb'; // سبز Bootstrap
                passwordInput.style.color = '#155724'; // متن سبز تیره
            }
        }

        function updateIndicatorText(strength) {
            let text = '';
            if (strength === 'weak') {
                text = 'رمز عبور ضعیف';
            } else if (strength === 'medium') {
                text = 'رمز عبور متوسط';
            } else if (strength === 'strong') {
                text = 'رمز عبور قوی';
            }
            passwordStrengthIndicator.textContent = text;
        }
    });
</script>
