<?php
include_once 'app/backend.php';

if (isset($_POST['btn'])) {
    $data = $_POST['frm'];
    user_login($data);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="../icon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="../icon/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../icon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../icon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../icon/apple-touch-icon-144x144.png">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>ورود به مدیریت رمز عبور</title>


    <style>

        @font-face {
            font-family: myFirstFont;
            src: url(css/iran-yekan-normal.woff);
        }

        * {
            font-family: myFirstFont, serif !important;

        }

        body {
            font-family: myFirstFont, serif !important;
        }

        span {
            font-family: myFirstFont, serif !important;
        }

        .sign__text {
            font-family: myFirstFont, serif !important;
        }

    </style>




</head>

<body>
<div class="sign">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sign__content">
                    <!-- authorization form -->

                    <form action="" method="post" class="sign__form">
                        <a href="" class="sign__logo" style="font-family: myFirstFont; font-size: 17px;">
                            صفحه ورود
                        </a>

                        <div class="sign__group">
                            <input type="text" name="frm[username]" class="sign__input" placeholder="نام کاربری" required>
                        </div>

                        <div class="sign__group">
                            <input type="password" name="frm[password]" class="sign__input" placeholder="رمز عبور اصلی" required>
                        </div>

                        <input type="submit" value="ورود" name="btn" class="sign__btn" style="background:#16b4e0!important; border:none; color: #ffffff; font-family: myFirstFont; font-size: 12px;">

                        <span class="sign__text">اکانت ندارید؟ <a href="register.php">ثبت نام کنید!</a></span>
                    </form>
                    <!-- end authorization form -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/wNumb.js"></script>
<script src="../js/nouislider.min.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/jquery.mousewheel.min.js"></script>
<script src="../js/jquery.mCustomScrollbar.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>
