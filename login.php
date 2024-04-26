<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./assest/icons/themify-icons/themify-icons.css">
    <title>Document</title>
</head>
<body>
    <?php
        include "connect.php";
        session_start();

        if(isset($_POST['login'])) {
            $username = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM account WHERE user='$username' and password='$password'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)==1) {
                $_SESSION['mySession'] = $username;
                header("location:index.php");
            }
            else {
                echo "Sai tài khoản hoặc mật khẩu";
            }
        }
    ?>
<!-- <div class="modal js-modal"> -->
    <form action="login.php" method="post">
        <div class="modal-container js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>
            <header class="modal-header">
                <i class="modal-heading-icon ti-bag">
                    Order
                </i>
            </header>
            <div class="modal-body">
                <label for="send-email" class="modal-lable">
                    <i class="ti-user"></i>
                    Tên của bạn
                </label>
                <input id="send-email" name="email" type="text" required class="modal-input" placeholder="Enter your name...">
                <label for="send-password" class="modal-lable">
                    <i class="ti-home"></i>
                    Mật khẩu
                </label>
                <input id="send-address" name="password" type="password" required class="modal-input"
                    placeholder="Enter your password...">
                <button class="login-js" type="submit" name="login" id="buy-ticket">
                    Đăng Nhập <i class="ti-check"></i>
                </button>
            </div>
            <footer class="modal-footer">
                <p class="modal-help">Need <a href="#">help?</a></p>
            </footer>
        </div>
    </form>
        <!-- </div> -->
</body>
</html>