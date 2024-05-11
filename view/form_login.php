<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../login.css">
    <title>Document</title>
</head>

<body>
    <div class="form_box">
        <form action="form_login.php" method="post">
            <h2>Đăng Nhập</h2>
            <p>Tài Khoản</p>
            <input type="text" placeholder="Enter your user" name="email">
            <p>Mật khẩu</p>
            <input type="password" placeholder="Enter your password" name="password">
            <input type="submit" name="login" value="Đăng nhập">
            <!-- <button class="button" name="login">
                <span class="button-content">Đăng nhập</span>
            </button> -->
            <a href="#">Quên mật khẩu?</a>
        </form>
    </div>
    <?php
    require_once "../controller/login.php";
    ?>
</body>

</html>