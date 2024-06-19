<?php
require_once __DIR__ . '/views/header.php';
define('ROOT', dirname(__FILE__));
// require_once __DIR__ . '/routers/router.php';
require_once __DIR__ . '/routers/products_router.php';
require_once __DIR__ . '/routers/add_router.php';
$action = isset($_GET['action']) ? $_GET['action'] : '';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>The Coffee House</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <?php if ($action !== 'product_list'):
            require_once __DIR__ . '/views/slider.php';
        endif;
            ?>
</body>
</html>