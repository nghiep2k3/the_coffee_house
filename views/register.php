<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assest/icons/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="form_register_box">
        <form action="?action=register" method="post">
            <h2>Đăng Ký</h2>
            <p><i class="ti-mobile"> Số điện thoại</i></p>
            <input type="text" placeholder="Enter your phonenumber" name="phone">
            <p><i class="ti-user"> Tài Khoản</i></p>
            <input type="text" placeholder="Enter your user" name="username">
            <p><i class="ti-lock"> Mật khẩu</i></p>
            <input type="password" placeholder="Enter your password" name="password">
            <p><i class="ti-home"> Nhập lại mật khẩu</i></p>
            <input type="password" placeholder="Enter your password again" name="re-password">
            <input type="submit" name="sigup" value="Đăng ký">
        </form>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>