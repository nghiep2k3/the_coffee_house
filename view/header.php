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
                <img src="../assets/img/logo.png" alt="">
            </a>
        </div>
        <ul class="nav-bar">
            <li><a href="">Trang chủ</a></li>
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
                </ul></a></li>
            <li><a href="">Giới thiệu</a></li>
            <li><a href="">Shop</a></li>
            <li><a href=""></a></li>
            <li class="admin-role" style="display: none;"><a href="./admin.php">Quản lý</a></li>
        </ul>
        <div class="header-icon">
            <i class="header-i ti-shopping-cart"></i>
            <i class="header-i ti-search"></i>
            <i class="header-i ti-menu-alt"></i>
        </div>
        <div class="form" id="login-form">
            <form action="index.php" method="post">
                <button class="button login" type="submit" name="switch-login">
                    <span class="button-content">Đăng nhập</span>
                </button>
                <button class="button login" type="submit" name="switch-register">
                    <span class="button-content">Đăng ký</span>
                </button>
            </form>
            <?php
                require_once "../controller/login.php";
                if(isset($_POST['switch-login'])) {
                    header('location: ./form_login.php');
                }
                if(isset($_POST['switch-register'])) {
                    header('location: ./form_register.php');
                }
            ?>
        </div>
        <div id="user-greeting" style="display: none;">
            <span>Welcome, <span id="username-display"></span></span>
        </div>
        <form action="index.php" method="post">
            <button style="display: none;" class="button login" id="logout" type="submit" name="switch-logout">
                <span class="button-content">Đăng xuất</span>
            </button>
        </form>
        <?php
        if(isset($_POST['switch-logout'])) {
            require_once "../controller/logout.php";
        }
        ?>
    </header>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var role = localStorage.getItem("role");
            if (role === 'admin') {
                var adminRoles = document.getElementsByClassName("admin-role");
                for (var i = 0; i < adminRoles.length; i++) {
                    adminRoles[i].style.display = "inline-block";
                }
            }
            document.getElementById("logout").addEventListener("click", function() {
                localStorage.removeItem("role");
                localStorage.removeItem("username");
            });
        });
    </script>
</body>
</html>
