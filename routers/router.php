<?php
session_start();

define('BASE_URL', '/the_coffee_house');
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../services/UserService.php';
require_once __DIR__ . '/../controllers/UserController.php';   

$database = new Database();
$userService = new UserService($database);
$userController = new UserController($userService);
$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
    case 'login':
        handleLogin($userController);
        break;
    case 'register':
        handleRegister($userController);
        break;
    default:
        require __DIR__ . '/../views/login.php';
        break;
}
function handleLogin($userController) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($userController->login($username, $password)) {
            header("Location: " . BASE_URL . "/index.php");
            exit();
        } else {
            $error = "Invalid username or password.";
            require __DIR__ . '/../views/login.php';
        }
    } else {
        require __DIR__ . '/../views/login.php';
    }
}
function handleRegister($userController) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $rePass = $_POST['re-password'];
        if ($userController->register($phone, $username, $password, $rePass)) {
            header("Location: " . BASE_URL . "/index.php");
            exit();
        } else {
            $error = "Registration failed.";
            require __DIR__ . '/../views/register.php';
        }
    } else {
        require __DIR__ . '/../views/register.php';
    }
}
?>
