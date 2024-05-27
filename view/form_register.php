<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/icons/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../login.css">
    <title>Document</title>
</head>
<body>
    <div class="form_register_box">
        <form action="form_register.php" method="post">
            <h2>Đăng Ký</h2>
            <p><i class="ti-mobile"> Số điện thoại</i></p>
            <input type="text" placeholder="Enter your phonenumber" name="phone">
            <p><i class="ti-user"> Tài Khoản</i></p>
            <input type="text" placeholder="Enter your user" name="email">
            <p><i class="ti-lock"> Mật khẩu</i></p>
            <input type="password" placeholder="Enter your password" name="password">
            <p><i class="ti-home"> Địa chỉ</i></p>
            <input type="text" placeholder="Enter your address" name="address">
            <input type="submit" name="sigup" value="Đăng ký">
        </form>
    </div>
    <?php
    include "../controller/register.php";
    if($check==1) {
        header('location: ../index.php');
    }
    ?>
</body>
</html>