<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
            <div style="width: 60px;">
                <a href="" class="logo">
                    <img src="./assest/img/logo.png" alt="">
                </a>
            </div>
            <ul class="nav-bar">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="">Đặt chỗ</a></li>
                <li><a class="sub" href="danhmuc.php">Menu
                        <ul class="subnav">
                            <li><a href="">Tất cả</a></li>
                            <li><a href="">Cà phê</a></li>
                            <li><a href="">Trà</a></li>
                            <li><a href="">Cloud</a></li>
                            <li><a href="">Tea Healthy</a></li>
                            <li><a href="">Đá xay</a></li>
                            <li><a href="">Bánh&snack</a></li>
                            <li><a href="">Thưởng thức tại nhà</a></li>
                        </ul>
                    </a></li>
                <li><a href="">Giới thiệu</a></li>
                <li><a href="">Shop</a></li>
            </ul>
            <div class="header-icon">
                <i class="header-i ti-shopping-cart"></i>
                <i class="header-i ti-search"></i>
                <i class="header-i ti-menu-alt"></i>
            </div>
            <div class="form">
                <form action="index.php" method="post">
                    <button class=" button login" type="submit" name="switch-login">
                        <span class="button-content">Đăng nhập</span>
                    </button>
                    <button class="button login" type="submit" name="switch-register">
                        <span class="button-content">Đăng ký</span>
                    </button>
                </form>
                <?php
                    require_once "./controller/login.php";
                    if(isset($_POST['switch-login'])) {
                        header('location: ./view/form_login.php');
                    }
                    if(isset($_POST['switch-register'])) {
                        header('location: ./view/form_register.php');
                    }
                ?>
            </div>
        </header>
</body>
</html>