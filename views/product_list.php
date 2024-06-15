<!-- views/product_list.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <style>
    .product-list {
        display: flex;
        flex-wrap: wrap;
    }

    .product-item {
        border: 1px solid #ddd;
        margin: 10px;
        padding: 10px;
        width: 200px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-item img {
        max-width: 100%;
        height: auto;
    }

    .product-item h2 {
        font-size: 18px;
        margin: 10px 0;
    }

    .product-item p {
        margin: 5px 0;
    }
    </style>
</head>

<body>
    <h1>Product List</h1>
    <div class="product-list">
        <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
        <div class="product-item">
            <img src="<?php echo $product->src_img; ?>" alt="<?php echo $product->name; ?>">
            <h2><?php echo $product->name; ?></h2>
            <p>Quantity: <?php echo $product->quantity; ?></p>
            <p>Price: $<?php echo $product->unit_price; ?></p>
            <p><?php echo $product->description; ?></p>
            <p><a href="?action=view_product&id=<?php echo $product->id; ?>">Chi tiết sản phẩm</a></p>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p>No products found</p>
        <?php endif; ?>
    </div>
</body>

</html>