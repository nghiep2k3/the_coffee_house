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

    a {
        text-decoration: none;
    }
    </style>
</head>

<body>
    <button style="position: absolute; font-weight: bold; left: 20px;
    top: 25px;"><a style="color: red;" href="../index.php">HOME</a></button>
    <div>
        <h1 style="text-align: center;">Shopping Cart</h1>
    </div>

    <?php
    $totalAmount = 0;
    if (!empty($orders)) {
        foreach ($orders as $order) {
            $totalAmount += $order['total'];
        }
    }
    ?>

    <div style="display: flex;
    justify-content: end;
    padding-right: 80px;
    ">
        <p style="font-size: 20px;"><span style="font-size:25px;">Tổng tiền tạm tính:</span> <span
                style="color: red;"><?php echo number_format($totalAmount, 0, ',', '.'); ?></span> VNĐ</p>
        <form style="display:inline;" action="/the_coffee_house/routers/products_router.php" method="GET" id="payments">
            <input type="hidden" name="action" value="checkout">
            <input type="hidden" id="usernameInput" name="username">
            <i class="delete-button" onclick="document.getElementById('payments').submit();">Thanh toán</i>
        </form>
    </div>
    <div style="display: flex; align-items: center; justify-content: center; padding: 0 68px;">
        <div class="cart-items" style="display: flex; justify-content: start; flex-wrap: wrap;">
            <?php if (!empty($orders)): ?>
            <?php foreach ($orders as $order): ?>
            <div class="cart-item">
                <img src="<?php echo $order['product_image']; ?>" alt="<?php echo $order['product_name']; ?>">
                <h2><?php echo $order['product_name']; ?></h2>
                <p>Quantity: <?php echo $order['quantity']; ?></p>
                <p>Price: <?php echo $order['product_price']; ?> VNĐ</p>
                <p>Total: <?php echo $order['total']; ?> VNĐ</p>
                <p>Order Date: <?php echo date('Y-m-d H:i:s', $order['create_id']); ?></p>
                <form style="display:inline;" action="/the_coffee_house/routers/products_router.php" method="GET"
                    id="cart-form">
                    <input type="hidden" name="action" value="delete_order">
                    <input type="hidden" id="usernameInput" name="username" value="admin123">
                    <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                    <i class="delete-button" onclick="document.getElementById('cart-form').submit();">Xóa</i>
                </form>


            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p>No items in cart</p>
            <?php endif; ?>
        </div>
        <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var usernameFromLocalStorage = localStorage.getItem("username");
            if (usernameFromLocalStorage) {
                document.getElementById('usernameInput').value = usernameFromLocalStorage.trim();
            } else {
                console.error('No username found in LocalStorage');
            }
        });
        </script> -->
    </div>

</body>

</html>