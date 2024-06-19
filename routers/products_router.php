<?php
// routers/products_router.php
define('BASE_URL', '/the_coffee_house');
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../controllers/ProductController.php';
require_once __DIR__ . '/../controllers/CategoriesController.php';

$ProductsController = new ProductController();
$CategoriesController = new CategoriesController();

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
            $ProductsController->view($_GET['id']); // Sửa lại biến $controller thành $ProductsController
        }
        break;
    case 'add_to_cart':
        echo '1111';
        $ProductsController->addToCart();
        break;
    default:
        break;
}
?>