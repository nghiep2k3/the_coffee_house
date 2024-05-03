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
    <div id="main">
        <header>
            <div style="width: 60px;">
                <a href="" class="logo">
                    <img src="./assest/img/logo.png" alt="">
                </a>
            </div>
            <i class="ti-menu-alt"></i>
            <ul class="nav-bar">
                <li><a href="">Home</a></li>
                <li><a href="">About us</a></li>
                <li><a href="">Product</a></li>
                <li><a href="">Customer</a></li>
            </ul>
            <div class="header-icon">
                <i class="header-i ti-shopping-cart"></i>
                <i class="header-i ti-search"></i>
            </div>
            <div class="form">
                <form action="index.php" method="post">
                    <button class="login" type="submit" name="switch-login">Đăng nhập</button>
                    <a href="logout.php">
                        <button class="login" type="submit" name="switch-logout">/Đăng ký</button>
                    </a>
                </form>
            </div>
        </header>
        <?php
        if (isset($_POST['switch-login'])) {
            echo 'Đăng nhập';
            header('location:login.php');
        }

        ?>

        <!-- Nghiep -->
        <div class="container_drink">
            <div class="left_drink">
                <img src="https://file.hstatic.net/1000075078/file/banner_app_f2a5895397a14c4f9d2eb65f7d998990.jpg"
                    alt="">
            </div>
            <div class="right_drink">
                <div class="banner1"><img
                        src="https://product.hstatic.net/1000075078/product/1697442235_cloudfee-hanh-nhan-nuong_52548ef041bb41148e3bbb5ceba2d540_large.jpg"
                        alt=""></div>
                <div class="banner2"><img
                        src="https://product.hstatic.net/1000075078/product/1675355354_bg-tch-sua-da-no_4fbf208885ed464ab4b5e145336d42a2_large.jpg"
                        alt=""></div>
            </div>
        </div>
    </div>

</body>

</html>