<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./assest/icons/themify-icons/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./login.css">
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
                <li><a class="sub" href="">Menu
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
            <div class="form" id="login-form">
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
            <div id="user-greeting" style="display: none;">
                <span>Welcome, <span id="username-display"></span></span>
            </div>
        </header>
        <!-- <div class="slider">
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
        </div> -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner slider">
                <div class="carousel-item active">
                    <img src="./assest/img/coffee-2562435_1280.jpg" class="d-block w-100" alt="...">
                    <div class="text-content">
                        <h2 class="text-heading">a place of tranquility</h2>
                        <div class="text-description">Lorem ipsum dolor sit amet consectetur adipisi</div>
                        <button class="button read-more">
                            <span class="button-content">Đọc thêm</span>
                        </button>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./assest/img/coffee-shop-393954_1280.jpg" class="d-block w-100" alt="...">
                    <!-- <div class="text-content">
                    <h2 class="text-heading">a place of tranquility</h2>
                    <div class="text-description">Lorem ipsum dolor sit amet consectetur adipisi</div>
                    <button class="button read-more">
                        <span class="button-content">Đọc thêm</span>
                    </button> -->
                </div>
                <div class="carousel-item">
                    <img src="./assest/img/pexels-photo-3968061.jpeg" class="d-block w-100" alt="...">
                    <!-- <div class="text-content"> -->
                    <!-- <h2 class="text-heading">a place of tranquility</h2>
                    <div class="text-description">Lorem ipsum dolor sit amet consectetur adipisi</div>
                    <button class="button read-more">
                        <span class="button-content">Đọc thêm</span>
                    </button> -->
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var username = localStorage.getItem("username");
        if (username) {
            document.getElementById("login-form").style.display = "none";
            document.getElementById("username-display").textContent = username;
            document.getElementById("user-greeting").style.display = "block";
            document.getElementById("user-greeting").style.color = "white";
        }
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>