<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <style>
    .cart-item {
        border: 1px solid #ddd;
        margin: 10px;
        padding: 10px;
        width: 300px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .cart-item img {
        max-width: 100%;
        height: auto;
    }

    .cart-item h2 {
        font-size: 24px;
        margin: 10px 0;
    }

    .cart-item p {
        margin: 5px 0;
    }

    .delete-button {
        position: absolute;
        top: 10px;
        right: 10px;
        background: red;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <h1>Shopping Cart</h1>
    <div class="cart-items" style="display: flex; justify-content: start; flex-wrap: wrap;">
        <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $order): ?>
        <div class="cart-item">
            <img src="<?php echo $order['product_image']; ?>" alt="<?php echo $order['product_name']; ?>">
            <h2><?php echo $order['product_name']; ?></h2>
            <p>Quantity: <?php echo $order['quantity']; ?></p>
            <p>Price: $<?php echo $order['product_price']; ?></p>
            <p>Total: $<?php echo $order['total']; ?></p>
            <p>Order Date: <?php echo date('Y-m-d H:i:s', $order['create_id']); ?></p>
            <form action="/the_coffee_house/routers/products_router.php" method="POST" style="display:inline;">
                <input type="hidden" name="action" value="delete_order">
                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                <button type="submit" class="delete-button">Xóa</button>
            </form>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p>No items in cart</p>
        <?php endif; ?>
    </div>
</body>

</html>