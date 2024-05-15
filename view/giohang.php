<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_POST['quantity'])) {
        foreach ($_POST['quantity'] as $id => $quantity) {
            $_SESSION["cart"][$id] = $quantity;
        }
        var_dump($_SESSION["cart"]);
    }
    ?>
    <h1>Giỏ hàng</h1>
    <div>
        <p>Stt: 1</p>
        <p>Name: ...</p>
        <p>Địa chỉ: ...</p>
        <p>Số lượng: ...</p>
        <p>Giá: ...</p>
        <p>Tổng tiền: ...</p>
    </div>

    <div>
        <p>Stt: 2</p>
        <p>Name: ...</p>
        <p>Địa chỉ: ...</p>
        <p>Số lượng: ...</p>
        <p>Giá: ...</p>
        <p>Tổng tiền: ...</p>
    </div>

    <h1>Tổng tất cả tiền: ...</h1>
</body>

</html>