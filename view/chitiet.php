<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .figure {
        height: 200px;
        width: 200px;
    }

    img {
        width: 100%;
    }

    p {
        font-size: 25px;
    }
    </style>
</head>
<?php
require_once "../controller/product_detail.php";
?>

<body>
    <h1>Chi tiết sản phẩm</h1>
    <h1>Đây là id số: <?= $product['id'] ?></h1>
    <h1>Giá:</h1>
    <p><?= $product['unit_price'] ?>K</p>
    <h1>Số lượng: </h1>
    <p><?= $product['quantity'] ?></p>
    <form action="giohang.php?action=add" method="POST">
        <h1>Nhập số lượng mua</h1>
        <input type="number" value="1" name="quantity[<?=$product['id']?>]" id="">
        <input type="submit" name="" id="" value="Mua sản phẩm">
    </form>
    <h1>Hình ảnh sản phẩm</h1>
    <div class="figure">
        <img src="<?= $product['src_img'] ?>" alt="Lỗi">
    </div>
    <h1>Mô tả sản phẩm:</h1>
    <p><?= $product['description'] ?></p>

</body>


</html>