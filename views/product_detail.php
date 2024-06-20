<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Detail</title>
    <style>
    .product-detail {
        border: 1px solid #ddd;
        margin: 10px;
        padding: 10px;
        width: 300px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-detail img {
        max-width: 100%;
        height: auto;
    }

    .product-detail h2 {
        font-size: 24px;
        margin: 10px 0;
    }

    .product-detail p {
        margin: 5px 0;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        margin: 10px 0;
    }

    .quantity-controls button {
        width: 30px;
        height: 30px;
        margin: 0 5px;
        font-size: 18px;
        line-height: 30px;
        text-align: center;
    }

    .quantity-controls input {
        width: 50px;
        text-align: center;
    }
    </style>
</head>

<body>
    <h1>Product Detail</h1>
    <div class="product-detail">
        <?php if (!empty($product)): ?>
        <img src="<?php echo $product->src_img; ?>" alt="<?php echo $product->name; ?>">
        <h2><?php echo $product->name; ?></h2>
        <p>Quantity: <?php echo $product->quantity; ?></p>
        <p>Price: $<?php echo $product->unit_price; ?></p>
        <p><?php echo $product->description; ?></p>
        <form action="/the_coffee_house/routers/products_router.php" method="post">
            <input type="hidden" name="action" value="add_to_cart">
            <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
            <input type="hidden" id="username" name="username" value="">
            <div class="quantity-controls">
                <button type="button" onclick="decreaseQuantity()">-</button>
                <input type="number" name="quantity" id="quantity" value="1" min="1">
                <button type="button" onclick="increaseQuantity()">+</button>
            </div>
            <button type="submit">Thêm sản phẩm</button>
        </form>
        <?php else: ?>
        <p>Product not found</p>
        <?php endif; ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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