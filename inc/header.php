<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="icons/themify-icons/themify-icons.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="top-left">
            <ul class="nav-bar">
                <a style="width: 60px;" href="" class="logo">
                    <img src="https://cdn.haitrieu.com/wp-content/uploads/2022/03/avatar-the-coffee-house.png" alt="">
                </a>
                <li><a href="./index.php">Trang chủ</a></li>
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
                <li><a href=""></a></li>
                <li class="admin-role" style="display: none;"><a href="./admin.php">Quản lý</a></li>
            </ul>
        </div>
        <div class="header-icon">
            <i class="header-i ti-search"></i>
            <i id="user-icon" class="header-i ti-user">
                <div id="user-dropdown" class="dropdown-content">
                    <form action="header.php" method="post" id="user-log">
                        <button class="button login" id="login-button" type="submit" name="switch-login">
                            <span class="button-content">Đăng nhập</span>
                        </button>
                        <button class="button login" id="register-button" type="submit" name="switch-register">
                            <span class="button-content">Đăng ký</span>
                        </button>
                        <button style="display: none;" class="button login" id="logout" type="submit"
                            name="switch-logout">
                            <span class="button-content">Đăng xuất</span>
                        </button>
                    </form>
                </div>
            </i>
            <i class="header-i ti-shopping-cart"></i>
        </div>
    </header>
</body>
</html>