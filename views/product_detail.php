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
        <form action="?action=add_to_cart" method="post">
            <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
            <input type="hidden" name="username" value="test_user"> <!-- Thay thế bằng tên người dùng đăng nhập -->
            <input type="hidden" name="quantity" value="1"> <!-- Giá trị mặc định, có thể thay đổi -->
            <button type="submit">Thêm sản phẩm</button>
        </form>
        <?php else: ?>
        <p>Product not found</p>
        <?php endif; ?>
    </div>
</body>

</html>