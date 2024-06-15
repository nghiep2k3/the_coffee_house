<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="form_box">
        <form method="post" action="?action=login">
        <h2>Đăng Nhập</h2>
                <p>Tài Khoản</p>
                <input type="text" placeholder="Enter your username" name="username" required>
                <p>Mật khẩu</p>
                <input type="password" placeholder="Enter your password" name="password" required>
                <input type="submit" name="login" value="Đăng nhập">
                <a href="#">Quên mật khẩu?</a>
        </form>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    </div>
</body>
</html>
