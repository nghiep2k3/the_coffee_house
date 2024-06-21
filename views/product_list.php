<!DOCTYPE html>
<html lang="en">
<?php
// require_once __DIR__ . '/../routers/products_router.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/product.css">
    <link rel="stylesheet" href="./icons/themify-icons/themify-icons.css">
</head>

<body>
    <div class="main">
        <?php require_once __DIR__ . '/header.php'; ?>
        <div class="product">
            <div class="sidebar">
                <ul class="cate-product">
                    <li class="all-item"><a href="?action=product_list">All Items</a></li>
                    <?php foreach ($categories as $category): ?>
                    <li><a
                            href="?action=product_list&category_id=<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->CateName); ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="item-container">
                <?php foreach ($products as $product): ?>
                <div class="box-item">
                    <div class="item-img">
                        <img src="<?php echo htmlspecialchars($product->src_img); ?>"
                            alt="<?php echo htmlspecialchars($product->name); ?>" class="img-tea-item">
                    </div>
                    <!-- <div class="item-tt">
                        <p class="name-tea"><?php echo htmlspecialchars($product->name); ?></p>
                        <p class="price"><?php echo htmlspecialchars($product->unit_price); ?> đ</p>
                        <p><a href="?action=view_product&id=<?php echo $product->id; ?>">Chi tiết sản phẩm</a></p>
                        <button class="btn-item" name="check-log">Thêm vào giỏ</button>
                    </div> -->

                    <div class="item-tt">
                        <form action="/the_coffee_house/routers/products_router.php" method="post">
                            <input type="hidden" name="action" value="add_to_cart">
                            <p class="name-tea"><?php echo htmlspecialchars($product->name); ?></p>
                            <p class="price"><?php echo htmlspecialchars($product->unit_price); ?> đ</p>
                            <p><a href="?action=view_product&id=<?php echo $product->id; ?>">Chi tiết sản phẩm</a></p>
                            <input style="display: none;" type="hidden" name="product_id"
                                value="<?php echo $product->id; ?>">
                            <input style="display: none;" id="username" type="hidden" name="username" value="">
                            <input style="display: none;" type="number" name="quantity" id="quantity" value="1" min="1">
                            <button class="btn-item" name="check-log" type="submit">Thêm sản phẩm</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var storedUsername = localStorage.getItem('username');
        if (storedUsername) {
            document.getElementById('username').value = storedUsername;
        }
    });
    </script>
</body>

</html>