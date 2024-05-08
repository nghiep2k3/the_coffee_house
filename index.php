<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./assest/icons/themify-icons/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="main">
        <header>
            <div style="width: 60px;">
                <a href="" class="logo">
                    <img src="./assest/img/logo.png" alt="">
                </a>
            </div>
            <ul class="nav-bar">
                <li><a href="">Trang chủ</a></li>
                <li><a href="">Đặt chỗ</a></li>
                <li ><a class="sub" href="">Menu
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
                    include "login.php";
                    if(isset($_POST['switch-login'])) {
                        header('location:form_login.php');
                    }
                    if(isset($_POST['switch-register'])) {
                        header('location:form_register.php');
                    }
                ?>
            </div>
        </header>
        <div class="slider">
            <i class="ti-angle-left icon-slider-left"></i>
            <i class="ti-angle-right icon-slider-right"></i>
            <div class="text-content">
                <h2 class="text-heading">a place 
                    of tranquility</h2>
                <div class="text-description">Lorem ipsum dolor sit amet consectetur adipisi</div>
                <button class="button read-more">
                    <span class="button-content">Đọc thêm</span>
                </button>
            </div>
        </div>
    </div>
</body>

</html>