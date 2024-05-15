<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_POST['login'])) {
        require_once "../connect.php";
        $username = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM account WHERE user='$username' and password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['mySession'] = $username;
            echo "<script>
                    localStorage.setItem('username', '$username');
                    setTimeout(function() {
                        window.location.href = '../index.php';
                    }, 2000);
                  </script>";
        } else {
            echo "Sai tài khoản hoặc mật khẩu";
        }
    }
    ?>
</body>

</html>