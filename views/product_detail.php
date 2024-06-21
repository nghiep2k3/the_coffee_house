<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Detail</title>
    <link rel="stylesheet" href="./css/product_detail.css">
</head>
<body>
    <div class="product-detail">
        <?php if (!empty($product)): ?>
            <div class="product-img">
                <img src="<?php echo $product->src_img; ?>" alt="<?php echo $product->name; ?>">
            </div>
            <div class="product-information">
                <h2><?php echo $product->name; ?></h2>
                <p class="product-price">Price: $<?php echo $product->unit_price; ?></p>
                <p class="infor">Quantity: <?php echo $product->quantity; ?></p>
                <span>Mô tả sản phẩm:</span>
                <p class="infor"><?php echo $product->description; ?></p>
                <form action="/the_coffee_house/routers/products_router.php" method="post">
                    <input type="hidden" name="action" value="add_to_cart">
                    <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                    <input type="hidden" id="username" name="username" value="">
                    <div class="quantity-controls">
                        <button type="button" onclick="decreaseQuantity()">-</button>
                        <input type="number" name="quantity" id="quantity" value="1" min="1">
                        <button type="button" onclick="increaseQuantity()">+</button>
                    </div>
                    <button class="button-add" type="submit">Thêm sản phẩm</button>
                </form>
            <?php else: ?>
                <p>Product not found</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="sub-product">
        <h4>Sản phẩm liên quan</h2>
            <div class="list-product-combo">
                <div class="menu-item">
                    <div class="menu-item-image">
                        <img src="https://product.hstatic.net/1000075078/product/1669736893_hi-tea-vai_2c1ad452802240c5a0adb614272aa08d_large.png"
                            alt="">
                    </div>
                    <div class="menu-item-info">
                        <h3>
                            <a href="">Hi-Tea Vải</a>
                        </h3>
                        <div class="price_product_item">49.000đ</div>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-item-image">
                        <img src="https://product.hstatic.net/1000075078/product/1655348107_mochi-choco_fe25bd3567f140fa83d5e817e06683af_large.jpg"
                            alt="">
                    </div>
                    <div class="menu-item-info">
                        <h3>
                            <a href="">Mochi Kem Chocolate</a>
                        </h3>
                        <div class="price_product_item">19.000đ</div>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-item-image">
                        <img src="https://product.hstatic.net/1000075078/product/1717387639_dau-pho-mai_9689e15c727345fdbba97d2a0932fb4b_large.jpg"
                            alt="">
                    </div>
                    <div class="menu-item-info">
                        <h3>
                            <a href="">Dâu Phô Mai Tươi (Không kèm Phao)</a>
                        </h3>
                        <div class="price_product_item">55.000đ</div>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-item-image">
                        <img src="https://product.hstatic.net/1000075078/product/1669736835_ca-phe-sua-da_e6168b6a38ec45d2b4854d2708b5d542_large.png"
                            alt="">
                    </div>
                    <div class="menu-item-info">
                        <h3>
                            <a href="">Cà Phê Sữa Đá</a>
                        </h3>
                        <div class="price_product_item">29.000đ</div>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-item-image">
                        <img src="https://product.hstatic.net/1000075078/product/1709023492_com-chien-hai-san_8595c888d246443faf19eaabc7cdfbb3_large.jpg"
                            alt="">
                    </div>
                    <div class="menu-item-info">
                        <h3>
                            <a href="">Cơm Chiên Hải Sản</a>
                        </h3>
                        <div class="price_product_item">49.000đ</div>
                    </div>
                </div>
            </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var storedUsername = localStorage.getItem('username');
            if (storedUsername) {
                document.getElementById('username').value = storedUsername;
            }
        });

        function increaseQuantity() {
            let quantityInput = document.getElementById('quantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function decreaseQuantity() {
            let quantityInput = document.getElementById('quantity');
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }
    </script>
</body>
</html>