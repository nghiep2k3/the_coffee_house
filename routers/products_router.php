<?php
// routers/products_router.php
require_once __DIR__ . '/../controllers/ProductController.php';

$controller = new ProductController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action === 'list_products') {
        $controller->list();
    } elseif ($action === 'view_product' && isset($_GET['id'])) {
        $controller->view($_GET['id']);
    }
}


?>