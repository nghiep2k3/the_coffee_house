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
            <form action="index1.php" method="post">
                <button class="login" type="submit" name="switch-login">Đăng nhập</button>
                <a href="logout.php">
                    <button class="login" type="submit" name="switch-logout">/Đăng ký</button>
                </a>
            </form>
        </div>
    </header>
    <?php
        if(isset($_POST['switch-login'])) {
            echo'Đăng nhập';
            header('location:login.php');
        }
        if(!isset($_SESSION['mySession'])) {
            echo '<button class="login" type="submit" name="switch-login">(' . $_SESSION['mySession'] . ')</button>';
        }
    ?>
</body>

</html>