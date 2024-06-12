<?php
    include 'inc/header.php';
    include 'inc/slider.php';
    include 'config.php';
    include 'UserModel.php';
    include 'UserController.php';
    $database = new Database();
$userModel = new UserModel($database);
$userController = new UserController($userModel);
$action = isset($_GET['action']) ? $_GET['action'] : '';
if ($action == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
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
?>    