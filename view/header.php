<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="top-left">
            <ul class="nav-bar">
                <a style="width: 60px;" href="" class="logo">
                    <img src="../assets/img/logo.png" alt="">
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
                    <form action="index.php" method="post" id="user-log">
                        <button class="button login" id="login-button" type="submit" name="switch-login">
                            <span class="button-content">Đăng nhập</span>
                        </button>
                        <button class="button login" id="register-button" type="submit" name="switch-register">
                            <span class="button-content">Đăng ký</span>
                        </button>
                        <div id="user-greeting" style="display: none;">
                            <span id="username-display"></span>
                        </div>
                        <button style="display: none;" class="button login" id="logout" type="submit"
                            name="switch-logout">
                            <span class="button-content">Đăng xuất</span>
                        </button>
                    </form>
                </div>
            </i>
            <i class="header-i ti-shopping-cart"></i>
        </div>
        <?php
                require_once "../controller/loginController.php";
                $controller = new LoginController();
                if ($_SERVER['REQUEST_URI'] == '/login' && $_SERVER['REQUEST_METHOD'] == 'POST') {$controller->handleLogin();
} else {
    $controller->showLoginForm();
}
                if(isset($_POST['switch-login'])) {
                    header('location: ./form_login.php');
                }
                if(isset($_POST['switch-register'])) {
                    header('location: ./form_register.php');
                }
            ?>
        <?php
        if(isset($_POST['switch-logout'])) {
            require_once "../controller/logout.php";
        }
        ?>
    </header>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var loginButton = document.getElementById("login-button");
        var registerButton = document.getElementById("register-button");
        var userIcon = document.getElementById("user-icon");
        var userDropdown = document.getElementById("user-dropdown");
        var userGreeting = document.getElementById("user-greeting");
        var logoutButton = document.getElementById("logout");

        userIcon.addEventListener("click", function() {
            if (userDropdown.style.display === "none" || userDropdown.style.display === "") {
                userDropdown.style.display = "flex";
            } else {
                userDropdown.style.display = "none";
            }
        });

        window.onclick = function(event) {
            if (!event.target.matches('#user-icon')) {
                if (userDropdown.style.display === "flex") {
                    userDropdown.style.display = "none";
                }
            }
        };

        var role = localStorage.getItem("role");
        if (role === 'admin') {
            var adminRoles = document.getElementsByClassName("admin-role");
            for (var i = 0; i < adminRoles.length; i++) {
                adminRoles[i].style.display = "inline-block";
            }
        }
        var username = localStorage.getItem("username");
        if (username) {
            userGreeting.style.display = "block";
            document.getElementById("username-display").innerText = username;
            loginButton.style.display = "none";
            registerButton.style.display = "none";
            logoutButton.style.display = "block";
        } else {
            userGreeting.style.display = "none";
            loginButton.style.display = "flex";
            registerButton.style.display = "flex";
            logoutButton.style.display = "none";
        }

        logoutButton.addEventListener("click", function() {
            localStorage.removeItem("role");
            localStorage.removeItem("username");
        });
    });
    </script>
</body>

</html>