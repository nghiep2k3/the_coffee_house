<?php
require_once __DIR__ . '/views/header.php';
define('ROOT', dirname(__FILE__));
// require_once __DIR__ . '/routers/router.php';
$action = isset($_GET['action']) ? $_GET['action'] : '';?>
<div class="main">
    <style>
    a {
        text-decoration: none !important;
    }
    </style>
    <?php
    if ($action !== 'product_list'&&$action !== 'view_product'):
        require_once __DIR__ . '/views/slider.php';
        require_once __DIR__ . '/views/store_home.php';
    endif;
    ?>
</div>
<?php
    require_once __DIR__ . '/routers/products_router.php';
    require_once __DIR__ . '/views/footer.php';
    
?>