<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payments</title>
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    p {
        height: 25px;
    }

    .Inputs {
        height: 30px;
        width: 400px;

    }

    .Label {
        font-size: 25px;
        margin-bottom: 10px;
    }
    </style>
</head>

<body>
    <?php
    $totalAmount = 0;
    $totalQuantity = 0;
    if (!empty($orders)) {
        foreach ($orders as $order) {
            $totalAmount += $order['total'];
            $totalQuantity += $order['quantity'];
        }
    }
    ?>
    <h1 style="text-align: center;">Thanh toán sản phẩm</h1>
    <div style="display: flex;justify-content: space-between;
    margin: 0 50px;">
        <div>
            <form action="/the_coffee_house/routers/products_router.php" method="POST">
                <input type="hidden" name="action" value="payments">
                <div class="Label">
                    <label for="fullname">Họ và tên:</label>
                </div>
                <input class="Inputs" type="text" id="fullname" name="fullname" required><br><br>

                <div class="Label">
                    <label for="phone">Số điện thoại:</label>
                </div>
                <input class="Inputs" type="tel" id="phone" name="phone" required><br><br>

                <div class="Label">
                    <label for="address">Địa chỉ giao hàng:</label>
                </div>
                <input class="Inputs" type="text" id="address" name="address" required><br><br>
                <input id="usernameInput" type="text" name="totalAmount" value="<?php echo $totalAmount?>">
                <input id="usernameInput" type="text" name="totalQuantity" value="<?php echo $totalQuantity?>">

                <button type="submit">Thanh toán</button>
            </form>
        </div>

        <div>
            <p style="font-size: 20px; text-transform: uppercase; font-weight: bold;">Danh sách sản phẩm</p>
            <div style="max-height: 316px; width: 350px; overflow: scroll;">
                <?php if (!empty($orders)): ?>
                <?php foreach ($orders as $order): ?>
                <div style=" display: flex; align-items: center;">
                    <div style="width: 100px; margin-right: 15px;">
                        <img style="width: 100%;" src=" <?php echo $order['product_image']; ?>"
                            alt="<?php echo $order['product_name']; ?>">
                    </div>

                    <div>
                        <p>Tên sản phẩm: <?php echo $order['product_name']; ?></p>
                        <p>Số lượng: <?php echo $order['quantity']; ?></p>
                        <p>Tổng tiền: <?php echo number_format($order['product_price'], 0, ',', '.'); ?> VNĐ</p>
                    </div>
                </div>

                <?php endforeach; ?>
                <?php else: ?>
                <p>No items in cart</p>
                <?php endif; ?>
            </div>
            <p style="font-size: 20px; margin-top: 8px;">Tổng sản phẩm:
                <?php echo $totalQuantity; ?>
            </p>
            <p style="font-size: 20px;">Thành tiền: <span
                    style="color: red;"><?php echo number_format($totalAmount, 0, ',', '.'); ?></span> VNĐ
            </p>
        </div>
    </div>
</body>

</html>