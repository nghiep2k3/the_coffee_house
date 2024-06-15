<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../icons/themify-icons/themify-icons.css">
</head>

<body> 
    <div class="main">
        <?php require_once './header.php'; ?>
        <div class="product">
            <div class="sidebar">
                <ul class="cate-product">
                    <li class="all-item"><a href="danhmuc.php">All Items</a></li>
                    <li><a href="">Herbal Tea</a></li>
                    <li><a href="">Fruit Tea</a></li>
                    <li><a href="">Cupcake</a></li>
                    <li><a href="">Tiramisu</a></li>
                </ul>
                <ul class="cate-product">
                    <li class="all-item">Danh mục sản phẩm</li>
                    <?php foreach ($categories as $category): ?>
                        <li><a class="infor-extra" href="danhmuc.php?iddm=<?= $category['id'] ?>"><?= $category['CateName'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="item-container">
                <?php foreach ($products as $product): ?>
                    <div class="box-item">
                        <?php if ($product['best_seller'] == 1): ?>
                            <span class="status-product"></span>
                        <?php endif; ?>
                        <div class="item-img">
                            <img src="<?= $product['image'] ?>" alt="" class="img-tea-item">
                        </div>
                        <div class="item-tt">
                            <p class="name-tea"><?= $product['name'] ?></p>
                            <p class="price"><?= $product['unit_price'] ?> đ</p>
                            <button class="btn-item" data-product-id="<?= $product['id'] ?>">Thêm vào giỏ</button>
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
