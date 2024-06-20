<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="icons/themify-icons/themify-icons.css">
    <title>Document</title>
</head>

<body>
    <header style="position: static;">
        <div class="top-left">
            <ul class="nav-bar">
                <a style="width: 60px;" href="" class="logo">
                    <img src="https://cdn.haitrieu.com/wp-content/uploads/2022/03/avatar-the-coffee-house.png" alt="">
                </a>
                <li><a href="./index.php">Trang chủ</a></li>
                <li><a class="sub" href="?action=product_list">Menu
                        <ul class="subnav">
                            <li><a href="?action=product_list">Tất cả</a></li>
                            <li class="lv2_title"><a href="">Cà phê
                                <ul class="menu_child_lv3">
                                    <li class="lv3_title"><a href="">Cà phê Việt Nam</a></li>
                                    <li class="lv3_title"><a href="">Cà phê máy</a></li>
                                </ul>
                            </a></li>
                            <li class="lv2_title"><a href="">Trà
                            <ul class="menu_child_lv3">
                                    <li class="lv3_title"><a href="">Trà trái cây</a></li>
                                    <li class="lv3_title"><a href="">Trà xanh</a></li>
                                </ul>
                            </a></li>
                            <li class="lv2_title"><a href="">Đá xay
                            <ul class="menu_child_lv3">
                                    <li class="lv3_title"><a href="">Đá xay Frosty</a></li>
                                </ul>
                            </a></li>
                            <li class="lv2_title"><a href="">Sinh tố
                            <ul class="menu_child_lv3">
                                    <li class="lv3_title"><a href="">Sinh tố hoa quả</a></li>
                                </ul>
                            </a></li>
                            <li class="lv2_title"><a href="">Bánh & Snack
                            <ul class="menu_child_lv3">
                                    <li class="lv3_title"><a href="">Bánh mặn</a></li>
                                    <li class="lv3_title"><a href="">Bánh ngọt</a></li>
                                    <li class="lv3_title"><a href="">Snack</a></li>
                                </ul>
                            </a></li>
                            <li class="lv2_title"><a href="">Thưởng thức tại nhà</a></li>
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
                    <form action="/the_coffee_house/routers/router.php" method="GET" id="user-log">
                        <button class="button login" id="login-button" type="submit" name="action" value="login">
                            <span class="button-content">Đăng nhập</span>
                        </button>
                        <button class="button login" id="register-button" type="submit" name="action" value="register">
                            <span class="button-content">Đăng ký</span>
                        </button>
                        <button style="display: none;" class="button login" id="logout" type="submit" name="action">
                            <span class="button-content">Đăng xuất</span>
                        </button>
                    </form>
                </div>
            </i>
            <form action="/the_coffee_house/routers/products_router.php" method="GET" id="cart-form">
                <input type="hidden" name="action" value="show_cart">
                <i class="header-i ti-shopping-cart" onclick="document.getElementById('cart-form').submit();"></i>
            </form>
        </div>
    </header>

    <script>
    document.getElementById("user-icon").addEventListener("click", function() {
        var dropdown = document.getElementById("user-dropdown");
        if (dropdown.style.display === "none" || dropdown.style.display === "") {
            dropdown.style.display = "block";
        } else {
            dropdown.style.display = "none";
        }
    });

    // Optional: Close the dropdown when clicking outside
    window.onclick = function(event) {
        if (!event.target.matches('#user-icon') && !event.target.closest('#user-dropdown')) {
            var dropdown = document.getElementById("user-dropdown");
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            }
        }
    }
    </script>
</body>