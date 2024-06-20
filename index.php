<?php
require_once __DIR__ . '/views/header.php';
define('ROOT', dirname(__FILE__));
$action = isset($_GET['action']) ? $_GET['action'] : '';

// require_once __DIR__ . '/routers/router.php';
if ($action !== 'product_list'):
        require_once __DIR__ . '/views/slider.php';
    endif;
require_once __DIR__ . '/routers/products_router.php';
?>
