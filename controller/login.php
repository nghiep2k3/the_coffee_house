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
        $stmt = $conn->prepare("SELECT * FROM account WHERE user=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['mySession'] = $username;
            $_SESSION['role'] = $row['role']; 
            $role = $_SESSION['role'];
            echo "<script>
                    localStorage.setItem('username', '$username');
                    localStorage.setItem('role', '$role');
                    setTimeout(function() {";
                echo "window.location.href = '../view/index.php';";
            echo "}, 2000);
                  </script>";
        } else {
            echo "Sai tài khoản hoặc mật khẩu";
        }
        $stmt->close();
        $conn->close();
    }
    ?>
</body>

</html>