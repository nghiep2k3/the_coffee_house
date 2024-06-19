<!DOCTYPE html>
<html lang="en">
<?php
    require_once __DIR__ . '/../routers/products_router.php'; 
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
                    <div class="item-tt">
                        <p class="name-tea"><?php echo htmlspecialchars($product->name); ?></p>
                        <p class="price"><?php echo htmlspecialchars($product->unit_price); ?> đ</p>
                        <button class="btn-item" name="check-log">Thêm vào giỏ</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.btn-item');
        buttons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const productId = this.getAttribute('data-product-id');
                const user = localStorage.getItem('username');
                if (user) {
                    window.location.href = `chitiet.php?id=${productId}`;
                } else {
                    alert('Bạn cần đăng nhập để thêm sản phẩm vào giỏ.');
                    window.location.href = './form_login.php';
                }
            });
        });
    });
    </script>
</body>

</html>