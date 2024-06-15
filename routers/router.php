<?php
session_start();
// define('ROOT', dirname(__FILE__));
define('APP_PATH', ROOT . '/routers');
define('VIEW_PATH', 'views');

// Include các file cần thiết
require_once 'config/config.php';
require_once 'services/UserService.php';
require_once 'controllers/UserController.php';

// Khởi tạo các đối tượng cần thiết
$database = new Database();
$userService = new UserService($database);
$userController = new UserController($userService);

// Xử lý các action từ URL
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'login':
        handleLogin($userController);
        break;
        
    default:
        require VIEW_PATH . '/login.php';
        break;
}
function handleLogin($userController) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($userController->login($username, $password)) {
            header("Location: views/sercure.php");
            exit();
        } else {
            $error = "Invalid username or password.";
            require VIEW_PATH . '/login.php';
        }
    } else {
        require VIEW_PATH . '/login.php';
    }
}
?>