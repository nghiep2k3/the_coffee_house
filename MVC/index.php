<?php
session_start();
require_once 'core/Controller.php';
require_once 'core/Model.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/UserController.php';
require_once 'models/UserModel.php';

// Xác định controller và action từ URL
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

// Tạo tên class controller
$controllerClass = ucfirst($controllerName) . 'Controller';

// Khởi tạo controller và gọi action
$controller = new $controllerClass();
$controller->$actionName();
?>