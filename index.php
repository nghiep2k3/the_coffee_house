<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./assest/icons/themify-icons/themify-icons.css">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header>
        <div style="width: 60px;">
            <a href="" class="logo">
                <img src="./assest/img/logo.png" alt="">
            </a>
        </div>
        <ul class="nav-bar">
            <li><a href="">Trang chủ</a></li>
            <li><a href="">Đặt chỗ</a></li>
            <li><a href="">Menu</a></li>
            <li><a href="">Giới thiệu</a></li>
            <li><a href="">Shop</a></li>
        </ul>
        <div class="header-icon">
            <i class="header-i ti-shopping-cart"></i>
            <i class="header-i ti-search"></i>
            <i class="header-i ti-menu-alt"></i>
        </div>
        <div class="form">
            <form action="index.php" method="POST">
                <button class="login" type="submit" name="switch-login">Đăng nhập</button>
                <a href="logout.php">
                    <button class="login" type="submit" name="switch-logout">/Đăng ký</button>
                </a>
            </form>
        </div>
    </header>
    <div class="main">
    </div>
    <?php
    include "login.php";
    echo $test;
    if (isset($_POST['switch-login'])) {
        header('Location: form_login.php');
        exit;
    }
    ?>
</body>

</html>