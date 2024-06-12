<?php
    // include 'view/header.php';
    // include 'view/slider.php';
    include 'config/config.php';
    include 'models/UserModel.php';
    include 'Controllers\UserController.php';
    $database = new Database();
    $userModel = new UserModel($database);
    $userController = new UserController($userModel);
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    if ($action == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username;
    echo $password;
    if ($userController->login($username, $password)) {
        header("Location: secure.php");
        exit();
    } else {
        $error = "Invalid username or password.";
        include 'view/login.php';
    }
} else {
    include 'login.php';
}
echo '21312321';
?>