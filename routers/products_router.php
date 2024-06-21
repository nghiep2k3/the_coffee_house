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
            if ($categoryId) {
                $ProductsController->listByCategory($categoryId);
            } else {
                $ProductsController->list();
                $CategoriesController->getAllCategories();
            }
            break;
        case 'view_product':
            if (isset($_GET['id'])) {
                $ProductsController->view($_GET['id']);
            }
            break;
        case 'show_cart':
            if (!empty($username)) {
                $ProductsController->showCart($username);
            }
            break;
        case 'delete_order':
            if (!empty($username)) {
                $ProductsController->deleteOrder($username);
            }
            break;
        case 'checkout':
            if (!empty($username)) {
                $ProductsController->checkout($username);
            }
            break;
        default:
            break;
    }
} elseif ($method === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    $user = isset($_POST['user']) ? trim($_POST['user']) : '';
    switch ($action) {
        case 'add_to_cart':
            $ProductsController->addToCart();
        case 'add_product':
            $ProductsController->addProduct();
            break;
        // case 'delete_order':
        //     $ProductsController->deleteOrder('vinhmom123');
        //     break;
        default:
            break;
    }
}
?>