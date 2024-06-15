<?php
// index.php
require_once __DIR__ . '/../controllers/ProductController.php';

$controller = new ProductController();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'list_products':
            $controller->list();
            break;
        case 'product_detail':
            if (isset($_GET['id'])) {
                $controller->view($_GET['id']);
            }
            break;
        case 'add_to_cart':
            echo '1111';
            $controller->addToCart();
            break;
        default:
            // $controller->list();
            break;
    }
}
?>