<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Secure Page</title>
</head>
<body>
    <h2>Chào mừng, <?php echo $_SESSION['user']['username']; ?></h2>
    <p>Đây là trang bảo mật.</p>
    <a href="logout.php">Đăng xuất</a>
</body>
</html>
