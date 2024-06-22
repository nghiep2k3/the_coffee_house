<?php
// routers/products_router.php
define('BASE_URL', '/the_coffee_house');
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../controllers/ProductController.php';
require_once __DIR__ . '/../controllers/CategoriesController.php';

$ProductsController = new ProductController();
$CategoriesController = new CategoriesController();
$username = isset($_GET['username']) ? trim($_GET['username']) : '';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $categoryId = isset($_GET['category_id']) ? $_GET['category_id'] : '';

    switch ($action) {
        case 'product_list':
            $ProductsController->list_admin();
            break;
        default:
            break;
    }
} elseif ($method === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    $user = isset($_POST['user']) ? trim($_POST['user']) : '';
    switch ($action) {
        case 'add_product':
            $ProductsController->addProduct();
            break;
        default:
            break;
    }
}
?>