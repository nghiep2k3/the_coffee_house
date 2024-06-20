<?php
// routers/products_router.php
define('BASE_URL', '/the_coffee_house');
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../controllers/ProductController.php';
require_once __DIR__ . '/../controllers/CategoriesController.php';

$ProductsController = new ProductController();
$CategoriesController = new CategoriesController();

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
            $username = 'nghiep2k3'; // Thay thế bằng tên người dùng đăng nhập thực tế
            $ProductsController->showCart($username);
            break;
        default:
            break;
    }
} elseif ($method === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    switch ($action) {
        case 'add_to_cart':
            $ProductsController->addToCart();
            break;
        case 'delete_order':
            $ProductsController->deleteOrder();
            break;
        default:
            break;
    }
}
?>